<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/loginStyle.css'); ?>">
</head>
<body>
<body>

    <div class="login-form">
        <form action="<?= base_url('auth/login') ?>" method="post">
            <h2 class="text-center">Log in</h2>
            <?=
                
                $this->session->flashdata('alert');
                    
                if(isset($_SESSION['alert'])){
                    unset($_SESSION['alert']);
                }
            ?>     

            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Log in</button>
            </div>       
        </form>
        <p class="text-center"><a href="<?= base_url('auth/register'); ?>">Create an Account</a></p>
    </div>
    
</body>
</html>