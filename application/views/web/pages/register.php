<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/registerStyle.css'); ?>">
</head>
<body>
    
    <div class="signup-form">
        <form action="<?= base_url('auth/register'); ?>" method="post">
            <h2>Register</h2>
            <p class="hint-text">Create your account. It's free and only takes a minute.</p>
            <div class="form-group">
                <div class="col"><input type="text" class="form-control" name="nama" placeholder="Nama" value="<?= set_value('nama'); ?>"></div>
                <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                <?= form_error('email','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <?= form_error('password','<small class="text-danger pl-3">','</small>'); ?>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                <?= form_error('confirm_password','<small class="text-danger pl-3">','</small>'); ?>
            </div>        
            <div class="form-group">
                <input type="text" class="form-control" name="alamat" placeholder="Alamat">
                <?= form_error('alamat','<small class="text-danger pl-3">','</small>'); ?>
            </div>        
            <div class="form-group">
                <input type="text" class="form-control" name="nomorTelepon" placeholder="Nomor Telepon">
                <?= form_error('nomorTelepon','<small class="text-danger pl-3">','</small>'); ?>
            </div>        
            <div class="form-group">
                <button type="submit" class="btn btn-success btn-lg btn-block">Register</button>
            </div>
                
            <div class="text-center">Already have an account? <a href="<?= base_url('auth/login'); ?>">Sign in</a></div>
        </form>
    </div>

</body>
</html>