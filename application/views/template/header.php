<!-- AWALAN HEADER-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Restoran Dapur Bunda BAHAGIA</title>
    <!-- Icons-->
    <link href="node_modules/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="node_modules/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="<?php echo base_url('asset/');?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('asset/');?>vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="<?php echo base_url('asset/'); ?>img/brand/logo.svg" width="89" height="25" alt="CoreUI Logo">
        <img class="navbar-brand-minimized" src="<?php echo base_url('asset/'); ?>img/brand/sygnet.svg" width="30" height="30" alt="CoreUI Logo">
      </a> -->
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
  
      </button>
      <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item px-3">
          <a class="nav-link" href="<?php echo base_url('index.php/Login/logout')?>">LOGOUT</a>
        </li>
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <img class="img-avatar" src="<?php echo base_url('asset/');?>img/avatars/6.jpg" />
          </a>
        </li>
      </ul>
    </header>
  
    <div class="app-body">
      <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <!-- <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('index.php/admin/'); ?>">
                <i class="nav-icon icon-speedometer"></i> Dashboard
              </a>
            </li> -->
            <?php
                    if ($this->session->userdata('id_level')=='1'){
                ?>
            <li class="nav-title">MASTER</li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('index.php/admin/level'); ?>">
                <i class="nav-icon icon-drop"></i> Level</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('index.php/admin/masakan'); ?>">
                <i class="nav-icon icon-pencil"></i> Masakan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('index.php/admin/user'); ?>">
                <i class="nav-icon icon-pencil"></i> User</a>
            </li>
            <?php
                    }
            ?>
            <?php
                    if ($this->session->userdata('id_level')=='1' or $this->session->userdata('id_level')=='2' ){
            ?>
            <li class="nav-title">Daftar Menu</li>
            <li class="nav-item nav-dropdown">
              <a class="nav-link" href="<?php echo base_url('index.php/admin/transaksi'); ?>">
                <i class="nav-icon icon-puzzle"></i> Appetizer</a>
              <a class="nav-link" href="<?php echo base_url('index.php/admin/transaksi'); ?>">
                <i class="nav-icon icon-puzzle"></i> Makanan Utama</a>
              <a class="nav-link" href="<?php echo base_url('index.php/admin/transaksi'); ?>">
                <i class="nav-icon icon-puzzle"></i> Minuman</a>
            </li>
                      
               <li class="nav-title">Laporan</li>
            <li class="nav-item nav-dropdown">
              <a class="nav-link" href="<?php echo base_url('index.php/admin/laporan'); ?>">
                <i class="nav-icon icon-puzzle"></i> Laporan PDF</a>
            </li>
            <?php
                    }
            ?>
          </ul>
        </nav>

        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
      <!-- AKHIR HEADER-->