<?php 
include 'baglan.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Rent a Car </title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-car"></i> <span>Rent a Car</span></a>
          </div>

          <div class="clearfix"></div>
          <?php 
          session_start();
          $user_deger=$_SESSION["user_id"];
          $baglan = mysqli_connect("localhost", "root", "12345678", "carsharingdb");
          $profil = " SELECT * FROM hesapacdb  WHERE   id='$user_deger' AND yetki=1";
          $sonuc = mysqli_query($baglan, $profil);
          while ($cekilen_veri = mysqli_fetch_array($sonuc)) {
            $ad = $cekilen_veri['ad'];
            $soyad = $cekilen_veri['soyad'];

            ?>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Hoşgeldiniz,</span>
                <h2><?php echo $cekilen_veri['ad'];  
                echo " ";
                echo $cekilen_veri['soyad'];
                ?></h2>

              </div>
            </div>

            <!-- /menu profile quick info -->

            <br />
          <?php   } ?>
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Menü</h3>
              <ul class="nav side-menu">

                <li><a href="kullanicilar.php"><i class="fa fa-rocket"></i> Kullanıcılar <span class=""></span></a>
                </li>
                <li><a href="admin_ekle.php"><i class="fa fa-rocket"></i> Admin Ekle <span class=""></span></a>
                </li>
                    <li><a href="site_hakkinda_ekle.php"><i class="fa fa-rocket"></i> Site Hakkında <span class=""></span></a>
                </li>

              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <?php 
      session_start();
      $user_deger=$_SESSION["user_id"];
      $baglan = mysqli_connect("localhost", "root", "12345678", "carsharingdb");
      $profil = " SELECT * FROM hesapacdb  WHERE   id='$user_deger' AND yetki=1";
      $sonuc = mysqli_query($baglan, $profil);
      while ($cekilen_veri = mysqli_fetch_array($sonuc)) {
        $ad = $cekilen_veri['ad'];
        $soyad = $cekilen_veri['soyad'];

        ?>
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/img.jpg" alt=""><?php echo $cekilen_veri['ad'];  
                    echo " ";
                    echo $cekilen_veri['soyad'];
                    ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="login.php"><i class="fa fa-sign-out pull-right"></i>Çıkış Yap</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <?php   } ?>