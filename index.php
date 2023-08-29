<?php 
include 'koneksi.php';

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome Admin Binamedika</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="dark-mode.css">
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <style>


    .notification-container {
      margin-bottom: 8px;
      display: flex;
      flex-direction: column;
    }
    
    .notification {
      display: flex;
      align-items: center;
      padding: 3px;
      margin-bottom: 10px;
      font-size: 15px;
      /* font-family: "Arial"; */
      font-weight: bold;
    }
    .notification-stock {
      display: flex;
      align-items: center;
      padding: 3px;
      margin-bottom: 10px;
      font-size: 15px;
      /* font-family: "Arial"; */
      font-weight: bold;
      
    }
    .notification-kadaluwarsa {
      justify-content: flex-end;
    }

    .notification-akan-kadaluwarsa {
      justify-content: flex-start;
    }
    .notification-kadaluwarsa {
      float: right;
    }

    .notification-akan-kadaluwarsa  {
      float: left;
    }
    .notification-stock-hampir-habis{
      justify-content: flex-start;
    }
    .notification-stock-habis{
      justify-content: flex-end;
    }
    .notification-stock-hampir-habis {
      float: left;
    }
    .notification-stock-habis {
      float: right; 
    }
    .notification .obat-status {
      font-weight: bold;
      margin-left: 10px;
    }
    .notification .obat-status-stock {
      font-weight: bold;
      margin-left: 10px;
      
    }
    .notification-kadaluwarsa .obat-status {
      color: red;
      font-size: 10px;
      /* background-color: #828282; */
      
      padding: 3px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
      justify-content: center; /* Menengahkan teks horizontal */
    }
    .notification-akan-kadaluwarsa .obat-status {
      color: #FFC700;
      font-size: 10px;
      /* background-color: #828282; */
      padding: 3px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
      justify-content: center; /* Menengahkan teks horizontal */
    }
    .notification-stock-hampir-habis .obat-status-stock {
      color: #FFC700;
      font-size: 10px;
      /* background-color: #828282; */
      padding: 3px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
      justify-content: center; /* Menengahkan teks horizontal */
    }
    .notification-stock-habis .obat-status-stock {
      color: red;
      font-size: 10px;
      /* background-color: #828282; */
      padding: 3px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
      justify-content: center; /* Menengahkan teks horizontal */
    }
  </style>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <!-- <div class="search-bar">
    <style>
        #search-input:focus ~ .menu-item {      
            display: none;      
        }       

        #search-input:focus ~ .menu-item[data-menu*="data-obat"] {      
            display: block;
        }
    </style>
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="search" id="search-input" placeholder="SEARCH...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div> -->
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">KLINIK BINA MEDIKA</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- <li>
                        <a href="#" class="notification-button" onclick="showNotification()">
                            <i class="material-icons">notifications</i>
                            <span class="notification-count" id="notificationCount">0</span>
                        </a>
                    </li> -->
                    <!-- <li>
                      <a class="dark-mode-button" onclick="toggleDarkMode()">
                        <i class="material-icons">brightness_4</i>
                      </a>
                    </li> -->
                    <li>
                    <a href="#" class="zoom-in-button" onclick="goFullscreen()">
                        <i class="material-icons">zoom_out_map</i>
                    </a>
                    </li>
                    <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Selamat Datang binamedika !</div>
                    <div class="email">binamedika.bale@gmail.com</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <!-- Call Search -->
                    <!-- <li><a class="js-search" data-close="true" ><i class="material-icons">search</i></a></li> -->
                    <!-- #END# Call Search -->
                    <li class="header">MENU UTAMA</li>
                    <li class="active">
                        <a href="../../index.php">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">book</i>
                            <span>DATA MASTER</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/tables/datapasien.php">
                                <i class="material-icons">assignment</i>
                                <span>DATA PASIEN</span>
                                </a>
                            <li>
                                <a href="pages/tables/datadokter.php">
                                    <i class="material-icons">content_copy</i>
                                    <span>DATA DOKTER</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li>
                        <a href="pages/tables/datapasien.php">
                            <i class="material-icons">book</i>
                            <span>DATA PASIEN</span>
                        </a>
                    </li>
                    <li>
                        <a href="pages/tables/datadokter.php">
                            <i class="material-icons">content_copy</i>
                            <span>DATA DOKTER</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>OBAT</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/tables/dataobat.php">
                                    <span>DATA OBAT</span>
                                </a>
                            <li>
                                <a href="pages/tables/import.php" >
                                    <span>IMPORT DATA OBAT</span>
                                </a>
                            </li>
                            <li>
                                <a href="pages/tables/histori.php" >
                                    <span>RIWAYAT UPLOAD</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="pages/tables/riwayatobat.php">
                            <i class="material-icons">layers</i>
                            <span>RIWAYAT OBAT</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2023 <a href="javascript:void(0);">Binamedika</a>.
                </div>
                <div class="version">
                    <b>Version: </b> D.S.F.D
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                    <ul class="demo-choose-skin">
                        <li data-theme="red" class="active">
                            <div class="red"></div>
                            <span>Red</span>
                        </li>
                        <li data-theme="pink">
                            <div class="pink"></div>
                            <span>Pink</span>
                        </li>
                        <li data-theme="purple">
                            <div class="purple"></div>
                            <span>Purple</span>
                        </li>
                        <li data-theme="deep-purple">
                            <div class="deep-purple"></div>
                            <span>Deep Purple</span>
                        </li>
                        <li data-theme="indigo">
                            <div class="indigo"></div>
                            <span>Indigo</span>
                        </li>
                        <li data-theme="blue">
                            <div class="blue"></div>
                            <span>Blue</span>
                        </li>
                        <li data-theme="light-blue">
                            <div class="light-blue"></div>
                            <span>Light Blue</span>
                        </li>
                        <li data-theme="cyan">
                            <div class="cyan"></div>
                            <span>Cyan</span>
                        </li>
                        <li data-theme="teal">
                            <div class="teal"></div>
                            <span>Teal</span>
                        </li>
                        <li data-theme="green">
                            <div class="green"></div>
                            <span>Green</span>
                        </li>
                        <li data-theme="light-green">
                            <div class="light-green"></div>
                            <span>Light Green</span>
                        </li>
                        <li data-theme="lime">
                            <div class="lime"></div>
                            <span>Lime</span>
                        </li>
                        <li data-theme="yellow">
                            <div class="yellow"></div>
                            <span>Yellow</span>
                        </li>
                        <li data-theme="amber">
                            <div class="amber"></div>
                            <span>Amber</span>
                        </li>
                        <li data-theme="orange">
                            <div class="orange"></div>
                            <span>Orange</span>
                        </li>
                        <li data-theme="deep-orange">
                            <div class="deep-orange"></div>
                            <span>Deep Orange</span>
                        </li>
                        <li data-theme="brown">
                            <div class="brown"></div>
                            <span>Brown</span>
                        </li>
                        <li data-theme="grey">
                            <div class="grey"></div>
                            <span>Grey</span>
                        </li>
                        <li data-theme="blue-grey">
                            <div class="blue-grey"></div>
                            <span>Blue Grey</span>
                        </li>
                        <li data-theme="black">
                            <div class="black"></div>
                            <span>Black</span>
                        </li>
                    </ul>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="widget info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">PASIEN</div>
                            <div class="number count-to-pasien" id="jumlahPasienWidget" data-from="0" data-to="PLACEHOLDER" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">book</i>
                        </div>
                        <div class="content">
                            <div class="text">DOKTER</div>
                            <div class="number count-to-dokter"id="jumlahDokterWidget" data-from="0" data-to="PLACEHOLDER" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">table</i>
                        </div>
                        <div class="content">
                            <div class="text">OBAT</div>
                            <div class="number count-to-obat" id="jumlahObatWidget" data-from="0" data-to="PLACEHOLDER" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person</i>
                        </div>
                        <div class="content">
                            <div class="text">RIWAYAT OBAT</div>
                            <div class="number count-to-riwayat" id="jumlahRiwayatObatWidget" data-from="0" data-to="PLACEHOLDER" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h4>Pemberitahuan Obat</h4>
                        </div>
                        <div class="body">
                            <div class="notification-container" style="height: 100%;" >
                                <div class="notification-box">
                                    <?php
                                    $dataObat = mysqli_query($koneksi, "SELECT * FROM dataobat");
                                    while ($d = mysqli_fetch_array($dataObat)) {
                                        // Calculate notification date (e.g., 5 days before expiration)
                                        $kadaluwarsa = strtotime($d['kadaluwarsa']);
                                        $pemberitahuan = strtotime('-5 days', $kadaluwarsa);
                                        $today = strtotime(date('Y-m-d'));
                                    
                                        // Check if the drug is still far from expiration date
                                        if ($pemberitahuan > $today) {
                                            continue; // Skip to the next iteration if the drug is still far from expiration
                                        }
                                    
                                        // Check if the drug has already expired
                                        if ($kadaluwarsa < $today) {
                                            $status = 'Kadaluwarsa';
                                            $class = 'notification-kadaluwarsa';
                                        } elseif ($pemberitahuan <= $today && $today < $kadaluwarsa) {
                                            $status = 'Akan Kadaluwarsa';
                                            $class = 'notification-akan-kadaluwarsa';
                                        } else {
                                            continue; // Skip to the next iteration if the drug is safe (not expired or about to expire)
                                        }
                                    
                                        echo "<div class='notification {$class}'>";
                                        echo "<span class='kode_obat'>{$d['kode_obat']}</span>";
                                        echo "<span class='obat-status'>{$status}</span>";
                                        echo "</div>";
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Browser Usage -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="header">
                            <h4>Pemberitahuan Stock Obat</h4>
                        </div>
                        <div class="body">
                            <div class="notification-container" style="height: 100%;">
                                <div class="notification-box">
                                      <?php
                                          $dataobat = mysqli_query($koneksi, "SELECT * FROM dataobat");
                                          while ($s = mysqli_fetch_array($dataobat)) {
                                            $stockSisa = $s['min_stock'];

                                            // Check if the stock quantity is running low
                                            if ($stockSisa < 10 && $stockSisa > 0) {
                                              $statusStock = 'Stock Hampir Habis';
                                              $classStock = 'notification-stock-hampir-habis';
                                            } elseif ($stockSisa == 0) {
                                              $statusStock = 'Stock Habis';
                                              $classStock = 'notification-stock-habis';
                                            } else {
                                              continue; // Skip to the next iteration if the stock quantity is sufficient
                                            }
                                        
                                            echo "<div class='notification-stock {$classStock}'>";
                                            echo "<span class='kode_obat-stock'>{$s['kode_obat']}</span>";
                                            echo "<span class='obat-status-stock'>{$statusStock}</span>";
                                            echo "</div>";
                                          }
                                      ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Browser Usage -->
            </div>
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>


    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>

    <!-- <script src="script.js"></script> -->
    <script src="dark-mode.js"></script>
    <!----widgets tampilan jumlah data ----->
    <!-- <script src="js/script.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
  <!-- Script untuk mengambil data dari get_data.php dan mengisi widget -->
  <script>

  function goFullscreen() {
    var element = document.documentElement; // Get the root element of the document (the entire page)

    if (isFullscreen()) {
      exitFullscreen();
    } else {
      requestFullscreen(element);
    }
  }

  function requestFullscreen(element) {
    if (element.requestFullscreen) {
      element.requestFullscreen();
    } else if (element.mozRequestFullScreen) {
      element.mozRequestFullScreen();
    } else if (element.webkitRequestFullscreen) {
      element.webkitRequestFullscreen();
    } else if (element.msRequestFullscreen) {
      element.msRequestFullscreen();
    }
  }

  function exitFullscreen() {
    if (document.exitFullscreen) {
      document.exitFullscreen();
    } else if (document.mozCancelFullScreen) {
      document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
      document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) {
      document.msExitFullscreen();
    }
  }

  function isFullscreen() {
    return (
      document.fullscreenElement ||
      document.webkitFullscreenElement ||
      document.mozFullScreenElement ||
      document.msFullscreenElement
    );
  }
    function showNotification() {
        // Cek apakah ada data baru yang belum dilihat
        if (newDataCount > 0) {
            // Membuat pesan notifikasi
            var notificationMessage = "Anda telah membuat " + newDataCount + " data baru di data pasien.";

            // Menampilkan notifikasi
            if ("Notification" in window) {
                Notification.requestPermission().then(function (permission) {
                    if (permission === "granted") {
                        var notificationOptions = {
                            body: notificationMessage,
                            icon: "pages/ui/notification-icon.png" // Ganti dengan URL icon notifikasi Anda
                        };

                        var notification = new Notification("Notifikasi", notificationOptions);
                    }
                });
            } else {
                alert("Browser Anda tidak mendukung Web Notifications.");
            }

            // Setelah notifikasi ditampilkan, reset jumlah data baru menjadi 0
            newDataCount = 0;
            updateNotificationCount(); // Memperbarui tampilan angka notifikasi
        }
    }

    function updateNotificationCount() {
        // Update tampilan angka notifikasi pada icon
        var notificationCountElement = document.getElementById("notificationCount");
        notificationCountElement.innerText = newDataCount;
    }

    $(document).ready(function() {
        $(document).ready(function() {
            // Mengambil data dari skrip PHP yang Anda buat
            $.ajax({
              url: 'get_data.php', // Ganti dengan alamat skrip PHP yang Anda buat
              method: 'GET',
              dataType: 'json',
              success: function(data) {
                // Mengisi widget dengan angka yang diperoleh dari data PHP
                $('.count-to-pasien').countTo({
                  from: 0, // Angka awal
                  to: data.jumlah_pasien, // Angka dari data PHP
                  speed: 1000, // Kecepatan animasi penghitungan
                  formatter: formatter, // Format angka (opsional)
                });
                $('.count-to-dokter').countTo({
                    from: 0, // Angka awal
                    to: data.jumlah_dokter, // Angka dari data PHP untuk jumlah dokter
                    speed: 1000, // Kecepatan animasi penghitungan
                    formatter: formatter, // Format angka (opsional)
                });

                $('.count-to-obat').countTo({
                    from: 0, // Angka awal
                    to: data.jumlah_obat, // Angka dari data PHP untuk jumlah obat
                    speed: 1000, // Kecepatan animasi penghitungan
                    formatter: formatter, // Format angka (opsional)
                });

                $('.count-to-riwayat').countTo({
                    from: 0, // Angka awal
                    to: data.jumlah_riwayat, // Angka dari data PHP untuk jumlah riwayat obat
                    speed: 1000, // Kecepatan animasi penghitungan
                    formatter: formatter, // Format angka (opsional)
                });
              },
              error: function() {
                // Tangani kesalahan jika data tidak dapat diambil
                console.log('Terjadi kesalahan saat mengambil data.');
              }
            });
        
            // Fungsi untuk mengatur format angka (opsional)
            function formatter(value, options) {
              return value.toFixed(options.decimals).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
                });
    });


</script>

</body>

</html>
