<?php
include_once '../../koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Obat Bina medika</title>
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

    <!-- JQuery DataTable Css -->
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

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
                    <!-- <li >
                        <a href="datapasien.php">
                            <i class="material-icons">book</i>
                            <span>DATA PASIEN</span>
                        </a>
                    </li>
                    <li>
                        <a href="datadokter.php">
                            <i class="material-icons">content_copy</i>
                            <span>DATA DOKTER</span>
                        </a>
                    </li> -->
                    <li class="active">
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>OBAT</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="active" >
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
                <h2>
                    Obat Bina Medika
                    <small>Diambil dari <a href="dataobat.php" target="_blank">data obat klinik</a></small>
                </h2>
            </div>
      <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                        <button class="btn btn-info btn-sm" onclick=" printTable()" style="background-color: #00FFF; border-color: gray; color: white;">
                                 <i class="material-icons">print</i> &nbsp; Cetak Laporan
                            </button>
                        <a href="obat_tambah.php" class="btn btn-info btn-sm pull" style="background-color:#00FFF; border-color:gray; color:white"><i class="material-icons">note_add</i> &nbsp Tambah Data Baru</a>  
                        </div>
                        <div class="body" >
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="table-print">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Obat</th>
                                      <th>Tgl Masuk Obat</th>
                                      <th>Nama Obat</th>
                                      <th>Satuan</th>
                                      <th>Tempat Penyimpanan</th>
                                      <th>Harga Beli</th>
                                      <th>Harga jual</th>
                                      <th>tgl Kadaluwarsa</th>
                                      <th>Sisa Stock</th>
                                      <th>Stock</th>
                                      <th >Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include '../../koneksi.php';
                                    $no=1;
                                    $data = mysqli_query($koneksi,"SELECT * FROM dataobat");
                                    while($d = mysqli_fetch_array($data)){
                                      ?>
                                          <tr>
                                              <td><?php echo  $no++ ?></td>
                                              <td><?php echo $d['kode_obat'] ?></td>
                                              <td><?php echo $d['tgl_masuk'] ?></td>
                                              
                                              <td><?php echo $d['nama_obat'] ?></td>
                                              <td><?php echo $d['satuan'] ?></td>
                                              <td><?php echo $d['penyimpanan'] ?></td>
                                              <td><?php echo 'Rp ' . number_format($d['harga_beli'], 0, ',', '.'); ?></td>
                                              <td><?php echo 'Rp ' . number_format($d['harga_jual'], 0, ',', '.'); ?></td>
                                              <td><?php echo $d['kadaluwarsa'] ?></td>
                                              <td><?php echo $d['min_stock'] ?></td>
                                              <td><?php echo $d['stock'] ?></td>
                                              <td>
                                                <button type="button" class="btn bg-deep-orange waves-effect" onclick="location.href='obat_edit.php?kode_obat=<?php echo $d['kode_obat']; ?>'"><i class="material-icons">edit</i></button>
                                                <button type="button" class="btn bg-orange waves-effect" onclick="deleteObat('<?php echo $d['kode_obat']; ?>')" data-toggle="modal" data-target="#deleteModal"><i class="material-icons">delete</i></button>
                                            </td>
                                          </tr>
                                          <?php 
                                      }
                                      ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
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

    <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
    <script>
    function deleteObat(kode_obat) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            window.location.href = 'obat_hapus.php?kode_obat=' + kode_obat;
        }
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


  function printTable() {
  let tableToPrint = document.getElementById('table-print'); // Ganti 'table-print' dengan ID tabel Anda
  let printDate = new Date().toLocaleDateString('en-GB'); // Mendapatkan tanggal percetakan dengan format dd/mm/yyyy
  let newWin = window.open('', 'Print-Window');

  // Menghapus kolom "Action" dan "Tempat Penyimpanan" dari tabel sebelum mencetak
  let headers = tableToPrint.querySelectorAll('thead th');
  for (let i = 0; i < headers.length; i++) {
    let headerText = headers[i].textContent.trim();
    if (headerText === 'Action' || headerText === 'Tempat Penyimpanan') {
      headers[i].style.display = 'none';
      let cells = tableToPrint.querySelectorAll(`tbody td:nth-child(${i + 1})`);
      for (let j = 0; j < cells.length; j++) {
        cells[j].style.display = 'none';
      }
    }
  }

  // Tambahkan jarak antar kolom (padding) pada sel header (th)
  for (let i = 0; i < headers.length; i++) {
    headers[i].style.padding = '8px'; // Sesuaikan nilai padding sesuai keinginan Anda
  }

  // Tambahkan jarak antar kolom (padding) pada sel data (td)
  let cells = tableToPrint.querySelectorAll('tbody td');
  for (let i = 0; i < cells.length; i++) {
    cells[i].style.padding = '8px'; // Sesuaikan nilai padding sesuai keinginan Anda
  }

  newWin.document.open();
  newWin.document.write('<html><head><title>Data Obat Klinik Bina Medika </title></head><body><h1 style="text-align: center;">KLINIK BINA MEDIKA</h1><p style="text-align: center; font-size: 15px;"> Jl. Raya Banjaran Barat No.154, Baleendah, Kec. Baleendah, Kabupaten Bandung, Jawa Barat 40375</p><p style="text-align: center; font-size: 18px;">Pendataan Laporan Ketersedian Obat</p><p style="text-align: right;">Tanggal Percetakan: ' + printDate + '</p>' + tableToPrint.outerHTML + '</body></html>');
  newWin.document.close();
  newWin.focus();
  newWin.print();
  newWin.close();

  // Setelah mencetak, kembalikan tampilan kolom "Action" dan "Tempat Penyimpanan" ke semula
  for (let i = 0; i < headers.length; i++) {
    let headerText = headers[i].textContent.trim();
    if (headerText === 'Action' || headerText === 'Tempat Penyimpanan') {
      headers[i].style.display = '';
      let cells = tableToPrint.querySelectorAll(`tbody td:nth-child(${i + 1})`);
      for (let j = 0; j < cells.length; j++) {
        cells[j].style.display = '';
      }
    }
  }

  // Setelah mencetak, kembalikan properti padding pada sel header (th) ke nilai semula
  for (let i = 0; i < headers.length; i++) {
    headers[i].style.removeProperty('padding');
  }

  // Setelah mencetak, kembalikan properti padding pada sel data (td) ke nilai semula
  for (let i = 0; i < cells.length; i++) {
    cells[i].style.removeProperty('padding');
  }
}





</script>

</body>

</html>
