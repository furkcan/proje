<?php 
include 'site_assets/inc/giris-kontrol.php';
include 'panel/inc/ayar.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Yönetim Paneli</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="site_assets/vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <!-- Google fonts - Popppins for copy-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
  <!-- orion icons-->
  <link rel="stylesheet" href="site_assets/css/orionicons.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="site_assets/css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="site_assets/css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.png?3">
    
      </head>
      <body>
        <!-- navbar-->
        <header class="header">
          <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="index.php" class="navbar-brand font-weight-bold text-uppercase text-base">YÖNETİM PANELİ</a>
            <ul class="ml-auto d-flex align-items-center list-unstyled mb-0"></ul>
          </nav>
        </header>
        <div class="d-flex align-items-stretch">
          <div id="sidebar" class="sidebar py-3">
            <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">Menü</div>
            <ul class="sidebar-menu list-unstyled">

              <li class="sidebar-list-item"><a href="index.php" class="sidebar-link text-muted <?php if ($sayfa == 'anasayfa') echo "active";?>"><i class="o-home-1 mr-3 text-gray"></i><span>Anasayfa</span></a></li>


              <li class="sidebar-list-item"><a href="araclar.php"  class="sidebar-link text-muted <?php if ($sayfa == 'araclar') echo "active";?>"><i class="fa fa-car mr-3 text-gray"></i><span>Araçlar</span></a>
              </li>







              <li class="sidebar-list-item"><a href="cikis.php" class="sidebar-link text-muted"><i class="o-exit-1 mr-3 text-gray"></i><span>Çıkış</span></a></li>
            </ul>


          </div>
