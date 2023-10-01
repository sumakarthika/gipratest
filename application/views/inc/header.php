<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gipra Test</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="<?=base_url('assets/admin/css/ionicons.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/adminlte.min.css">
   <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/bootstrap.css">
   <link rel="stylesheet" href="<?=base_url()?>assets/admin/css/dataTables.bootstrap4.min.css">
   
 <link href="<?=base_url('assets/admin/css/jquery-ui.min.css')?>" rel='stylesheet' type='text/css'>
    
   <style>
   .color-white{color:#fff!important;}
   </style>
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light color-white"  style="background-color:#00949e;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars color-white"></i></a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">        
       Welcome <?=ucfirst($this->session->userdata('username'))?>&nbsp;<a class="color-white" href="<?=base_url('manager/signout')?>"><i class="fa fa-sign-out"></i>&nbsp;Signout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->