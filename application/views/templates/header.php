<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title?></title>
    <link rel="stylesheet" href="<?=base_url().'assets\css\bootstrap.min.css'?>">
    <link rel="stylesheet" href="<?=base_url().'assets\css\custom.css?v='.time();?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
</head>
<body>
<div class="container">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
  <a class="navbar-brand" href="<?=base_url().'wallpapers/view'?>">Wallpapers</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?=base_url().'wallpapers/view'?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <?php
            if($this->session->userdata('logged_in')):
        ?>
        <li class="nav-item">
        <a class="nav-link" href="<?=base_url().'admins/insertWallpaper'?>">Upload</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="<?=base_url().'admins/logout'?>">Logout</a>
      </li>
        <?php endif; ?>
         <?php
            if(!$this->session->userdata('logged_in')):
        ?>
        <li class="nav-item">
        <a class="nav-link" href="<?=base_url().'admins/login'?>">Login</a>
      </li>
        <?php endif; ?>
    </ul>
    <!-- <form class="form-inline my-2 my-lg-3" method="POST"> -->
      <?=form_open(base_url().'wallpapers/search/',"class='form-inline my-2 my-lg-3'")?>
      <input class="form-control" type="text" name="query" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0 btn-outline-primary" type="submit">Search</button>
    </form>
  </div>
</nav>
<?php if($this->session->flashdata('admin_loggedin')):?>
<div class="alert alert-success"><?=$this->session->flashdata('admin_loggedin')?></div>
<?php endif;?>
<?php if($this->session->flashdata('user_log_out')):?>
<div class="alert alert-success"><?=$this->session->flashdata('user_log_out')?></div>
<?php endif;?>
