<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gipra Test</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background-color:#ccc">
<div class="login-box">
 
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
	<div class="login-logo">
    <a href="#"><b>Gipra</b> Test</a>
  </div>
    
      <p class="login-box-msg">Sign in to start your session</p>
        <?php 
		print_r($error);
		
		if($this->session->flashdata('success')){?>
		<div class="alert alert-danger"><?=$this->session->flashdata('success')?></div>
		<?php }?>
      <form action="<?=base_url('login')?>" method="post"autocomplete="off">
        <div class="input-group mb-3">
          <input type="text" name="email" class="form-control" placeholder="Email" value="" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
		 <div class="input-group mb-3">.
		 <select name="usertype" class="form-control" required >
		 <option value="">Select user type</option>
		 <?php foreach ($usertype as $row){?>
			 <option value="<?=$row->id?>"><?=$row->name?></option>
		 <?php }?>
		 </select>          
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
           
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="sign In" required>
          </div>
          <!-- /.col -->
        </div>
      </form>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=base_url()?>assets/admin/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/admin/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>assets/admin/js/adminlte.min.js"></script>
</body>
</html>
