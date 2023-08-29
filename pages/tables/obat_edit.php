<?php
include_once '../../koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Pasien Binamedika</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="../../plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="../../plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="../../plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
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
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
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
                <a class="navbar-brand" href="../../index.php">KLINIK BINA MEDIKA</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                    <a href="#" class="zoom-in-button" onclick="goFullscreen()">
                        <i class="material-icons">zoom_out_map</i>
                    </a>
                    </li>
                    <!-- #END# Tasks -->
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
                    <img src="../../images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Selamat Datang binamedika !</div>
                    <div class="email">binamedika@gmail.com</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <!-- <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li> -->
                            <!-- <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li> -->
                            <li><a href="../../logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
                        <!-- Menu -->
                        <div class="menu">
                <ul class="list">
                    <li class="header">MENU UTAMA</li>
                    <li>
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
                                <a href="datapasien.php">
                                <i class="material-icons">assignment</i>
                                <span>DATA PASIEN</span>
                                </a>
                            <li>
                                <a href="datadokter.php">
                                    <i class="material-icons">content_copy</i>
                                    <span>DATA DOKTER</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="active">
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>OBAT</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="active">
                                <a href="dataobat.php">
                                    <span>DATA OBAT</span>
                                </a>
                            <li>
                                <a href="import.php" >
                                    <span>IMPORT DATA OBAT</span>
                                </a>
                            </li>
                            <li>
                                <a href="histori.php" >
                                    <span>RIWAYAT UPLOAD</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="riwayatobat.php">
                            <i class="material-icons">layers</i>
                            <span>RIWAYAT OBAT</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
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
                <h2>KLINIK BINA MEDIKA</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                DATA OBAT
                                <!-- <small>Different sizes and widths</small> -->
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <!-- <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul> -->
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <h2 class="card-inside-title">Edit Data Obat</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                  <?php 
                                  $kode_obat = $_GET['kode_obat'];
                                  $data = mysqli_query($koneksi,"select * from dataobat where kode_obat='$kode_obat'");
                                  while($d = mysqli_fetch_array($data)){
                                  ?>
                                    <form action="obat_update.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                            <div class="form-line">
                                                <label>Kode Obat</label>
                                                <input type="hidden" name="kode_obat" value="<?php echo $d['kode_obat']; ?>">
                                                    <input type="text" class="form-control" name="kode_obat" required="required" value="<?php echo $d['kode_obat'] ?>">
                                                    
                                            </div>
                                        </div>
                                     <div class="form-group">
                                            <div class="form-line">
                                                <label>Tgl Masuk Obat</label>
                                                <input type="date" class="form-control" name="tgl_masuk" required="required" value="<?php echo $d['tgl_masuk']; ?>">
                                            
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Nama Obat</label>
                                                 <input type="text" class="form-control" name="nama_obat" value="<?php echo $d['nama_obat'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Satuan</label>
                                                <select class="form-control" name="satuan"value="<?php echo $d['satuan'] ?>">
                                                <option disable selected></option>
                                                <option value="pcs">PCS</option>
                                                <option value="Botol">BOTOL</option>
                                                <option value="Tablet">TABLET</option>
                                                <option value="Kapsul">KAPSUL/PIL</option>
                                                <option value="Tube">TUBE</option>
                                                <option value="Tetes">OBAT TETES</option>
                                                <option value="Injeksi">INJEKSI</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                            <label>Tempat Penyimpanan</label>
                                                <select class="form-control" name="penyimpanan"value="<?php echo $d['penyimpanan'] ?>">
                                                <option disable selected></option>
                                                <option value="Etalase1">ETALASE 1</option>
                                                <option value="Etalase2">ETALASE 2</option>
                                                <option value="Etalase3">ETALASE 3</option>
                                                <option value="Etalase4">ETALASE 4</option>
                                                <option value="Etalase5">ETALASE 5</option>
                                                <option value="Rak1">RAK 1</option>
                                                <option value="Rak2">RAK 2</option>
                                                <option value="Rak3">RAK 3</option>
                                                <option value="Rak4">RAK 4</option>
                                                <option value="Rak5">RAK 5</option>
                                                <option value="Rak6">RAK 6</option>
                                                <option value="Rak7">RAK 7</option>
                                                <option value="Lemari">LEMARI</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Harga Beli</label>
                                                <input type="text" class="form-control" name="harga_beli" value="<?php echo $d['harga_beli'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Harga Jual</label>
                                                <input type="text" class="form-control" name="harga_jual" value="<?php echo $d['harga_jual'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Tgl Kadaluwarsa</label>
                                                <input type="date" class="form-control" name="kadaluwarsa" value="<?php echo $d['kadaluwarsa'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Sisa Stock</label>
                                                <input type="text" class="form-control" name="min_stock" value="<?php echo $d['min_stock'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Stock</label>
                                                <input type="text" class="form-control" name="stock" value="<?php echo $d['stock'] ?>">
                                            </div>
                                        </div>
                                        <div class="footer">
                                            <a href="dataobat.php" type="button" class="btn bg-grey waves-effect">Kembali</a>
                                            <button id="submitBtn" class="btn bg-red waves-effect" type="submit">Simpan</button>
                                        </div>
                                    </form>
                                    <?php 
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
        </div>
        <div id="notification"></div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Autosize Plugin Js -->
    <script src="../../plugins/autosize/autosize.js"></script>

    <!-- Moment Plugin Js -->
    <script src="../../plugins/momentjs/moment.js"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="../../plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="../../plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/forms/basic-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
    <script>
        document.getElementById('submitBtn').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah formulir dikirim secara normal

        // Mengambil data dari formulir
        var formData = new FormData(document.querySelector('form'));

        // Membuat objek permintaan AJAX
        var request = new XMLHttpRequest();

        // Mengatur tindakan saat respons diterima dari server
        request.onload = function() {
            if (request.status === 200) {
                // Menampilkan notifikasi jika data berhasil masuk ke database
                showNotification('Data berhasil diubah.', 'success');
                // Pengalihan halaman akan dilakukan setelah 3 detik
                setTimeout(function() {
                    window.location.href = 'dataobat.php';
                }, 3000);
            } else {
                // Menampilkan notifikasi jika terjadi kesalahan
                showNotification('Terjadi kesalahan saat menambahkan data.', 'danger');
            }
        };

        // Mengirim permintaan POST ke server
        request.open('POST', 'obat_update.php');
        request.send(formData);
    });

    // Menampilkan notifikasi
    function showNotification(message, type) {
        // Membuat elemen notifikasi
        var notification = document.createElement('div');
        notification.className = 'alert alert-' + type;
        notification.innerHTML = message;

        // Menambahkan notifikasi ke dalam elemen dengan id "notification" di atas formulir
        var notificationSection = document.getElementById('notification');
        notificationSection.innerHTML = ''; // Menghapus notifikasi sebelumnya (jika ada)
        notificationSection.appendChild(notification);
        
        // Menampilkan notifikasi
        notificationSection.style.display = 'block';

        // Menghapus notifikasi setelah beberapa detik
        setTimeout(function() {
            notificationSection.style.display = 'none';
        }, 3000);
    }
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
</script>


<style>
    /* CSS to display the notification at the center-top of the browser window */
    #notification {
        position: fixed;
        top: 10%; /* Mengubah posisi top untuk memusatkan notifikasi */
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        text-align: center;
        padding: 10px;
        width: 300px;
        max-width: 80%; /* Memperbarui max-width dengan nilai persentase */
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        display:none;
    }
</style>
</body>
</html>
