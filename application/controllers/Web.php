<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Web extends CI_Controller
{

    public function user()
    {
        $data                          = array();
        $data['all_featured_products'] = $this->web_model->get_all_featured_product();
        $data['all_new_products']      = $this->web_model->get_all_new_product();
        $data['title'] = 'Shop';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('web/inc/sideU',$data);
        $this->load->view('web/inc/top',$data);
        $this->load->view('web/pages/user',$data);
        $this->load->view('web/inc/bottom');
    }
    public function admin()
    {
        $data                          = array();
        $data['all_featured_products'] = $this->web_model->get_all_featured_product();
        $data['all_new_products']      = $this->web_model->get_all_new_product();

        $data['title'] = 'Admin';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

        $this->load->library('grocery_CRUD');
        $crud = new grocery_CRUD();
        $crud->set_table('tbl_product');
        $output = $crud->render();

        $this->load->view('web/inc/sideA',$data);
        $this->load->view('web/inc/top',$data);
        $this->load->view('web/pages/productsA',$output);
        $this->load->view('web/inc/bottom');
    }


    public function cart()
    {
        $data                  = array();
        $data['cart_contents'] = $this->cart->contents();
        $data['title'] = 'Shop';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('web/inc/sideU',$data);
        $this->load->view('web/inc/top',$data);
        $this->load->view('web/pages/cart', $data);
        $this->load->view('web/inc/bottom');
    }

    public function product()
    {
        $this->load->library('pagination');

        $config['base_url'] = base_url('web/product');
        $config['total_rows'] = $this->db->get('tbl_product')->num_rows();
        $config['per_page'] = 8;
        $config['num_links'] = 2;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['prev_link'] = '&lt; Previous';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['last_link'] = false;
        $config['next_link'] = 'Next &gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';

        $this->pagination->initialize($config);

        $data                    = array();
        $data['get_all_product'] = $this->web_model->get_all_product_pagi($config['per_page'], $this->uri->segment('3'));
        $data['title'] = 'Shop';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('web/inc/sideU',$data);
        $this->load->view('web/inc/top',$data);
        $this->load->view('web/pages/product', $data);
        $this->load->view('web/inc/bottom');
    }

    public function single($id)
    {
        $data                       = array();
        $data['get_single_product'] = $this->web_model->get_single_product($id);
        $data['get_all_category']   = $this->web_model->get_all_category();
        $data['title'] = 'Shop';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('web/inc/sideU',$data);
        $this->load->view('web/inc/top',$data);
        $this->load->view('web/pages/single', $data);
        $this->load->view('web/inc/bottom');
    }

    public function error()
    {
        $data = array();
        $data['title'] = 'Shop';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('web/inc/sideU',$data);
        $this->load->view('web/inc/top',$data);
        $this->load->view('web/pages/error');
        $this->load->view('web/inc/bottom');
    }

    public function category_post($id)
    {
        $data                    = array();
        $data['get_all_product'] = $this->web_model->get_all_product_by_cat($id);
        $data['title'] = 'Shop';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('web/inc/sideU',$data);
        $this->load->view('web/inc/top',$data);
        $this->load->view('web/pages/product', $data);
        $this->load->view('web/inc/bottom');
    }

    public function save_cart()
    {
        $data       = array();
        $product_id = $this->input->post('product_id');
        $results    = $this->web_model->get_product_by_id($product_id);

        $data['id']      = $results->product_id;
        $data['name']    = $results->product_title;
        $data['price']   = $results->product_price;
        $data['qty']     = $this->input->post('qty');
        $data['options'] = array('product_image' => $results->product_image);

        $this->cart->insert($data);
        redirect('cart');
    }

    public function update_cart()
    {
        $data          = array();
        $data['qty']   = $this->input->post('qty');
        $data['rowid'] = $this->input->post('rowid');

        $this->cart->update($data);
        redirect('cart');
    }

    public function remove_cart()
    {

        $data = $this->input->post('rowid');
        $this->cart->remove($data);
        redirect('cart');
    }



    public function user_form()
    {
        $data = array();
        $data['title'] = 'Shop';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('web/inc/sideU',$data);
        $this->load->view('web/inc/top',$data);
        $this->load->view('web/pages/user_form');
        $this->load->view('web/inc/bottom');
    }

    public function checkout()
    {
        $data = array();
        $data['title'] = 'Shop';
        $data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('web/inc/sideU',$data);
        $this->load->view('web/inc/top',$data);
        $this->load->view('web/pages/checkout');
        $this->load->view('web/inc/bottom');
    }



 

}
