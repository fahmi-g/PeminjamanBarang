<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if($this->form_validation->run() == false)
        {
            $this->load->view('web/pages/login');
        }else{
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email'=>$email])->row_array();
        
        if($user['email'] == $email)
        {
            if(password_verify($password,$user['password']))
            {
                $data = [
                    'email' => $user['email'],
                    'nama' => $user['nama'],
                    'role_id' => $user['role_id'],
                    'alamat' => $user['alamat'],
                    'nomorTelepon' => $user['nomorTelepon']
                ];

                $this->session->set_userdata($data);

                if($user['role_id'] == 1)
                {
                    redirect('web/admin');
                }else{
                    redirect('web/user');
                }
            }else{
                $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert"> Email/password salah. </div>');
                redirect('auth/login');
            }
        }else{
            $this->session->set_flashdata('alert', '<div class="alert alert-danger" role="alert"> Email/password salah. </div>');
            redirect('auth/login');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique'=>'This email is already exist']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[confirm_password]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|trim|matches[password]');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('nomorTelepon', 'Nomor Telepon', 'required|numeric');

        if($this->form_validation->run() == false)
        {
            $this->load->view('web/pages/register');
        }else{
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'nomorTelepon' => htmlspecialchars($this->input->post('nomorTelepon', true))
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert"> Telah berhasil register, silahkan login </div>');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $items = array('email', 'nama', 'role_id', 'alamat', 'nomorTelepon');

        $this->session->unset_userdata($items);
        $this->session->set_flashdata('alert', '<div class="alert alert-success" role="alert"> Anda berhasil keluar </div>');
        redirect('auth/login');
    }
}