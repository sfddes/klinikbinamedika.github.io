<?php
require __DIR__ . '/../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportKoneksi
{
    private $conn;
  
    public function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $dbname = "klinik_db";
    
        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        if (!$this->conn) {
            die("Koneksi database gagal: " . mysqli_connect_error());
        }
    }
    public function importData($uploadedFile)
    {
        $filePath = '../../pages/tables/file/' . $uploadedFile['name'];
  
        // Simpan file yang diunggah ke lokasi tujuan
        move_uploaded_file($uploadedFile['tmp_name'], $filePath);
        $nama_file = $uploadedFile['name'];
  
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $highestColumn = $worksheet->getHighestColumn();
        $highestRow = $worksheet->getHighestRow();
        echo "Jumlah baris dalam file Excel: " . $highestRow . "<br>"; // Tambahkan ini untuk melacak jumlah baris yang terdeteksi
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn);
  
        $jumlah_baris_import = 0; // Deklarasi awal variabel jumlah_baris_import
  
        for ($row = 2; $row <= $highestRow; $row++) {
            $rowData = $worksheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, null, true, false)[0];
            // Mengecek jika semua kolom dalam baris kosong
            if (empty(array_filter($rowData))) {
                continue; // Skip baris ini dan lanjut ke baris berikutnya
            }
            
            // Proses masukkan data ke database
            $no = $rowData[0];
            $kode_obat = $rowData[1];
            $tgl_masuk = $rowData[2];
            $nama_obat = $rowData[3];
            $satuan = $rowData[4];
            $penyimpanan = $rowData[5];
            $harga_beli = $rowData[6];
            $harga_jual = $rowData[7];
            $kadaluwarsa = $rowData[8];
            $min_stock = $rowData[9];
            $stock = $rowData[10];
                    
            // Konversi format tanggal dari "1-sep-2021" menjadi "yyyy/mm/dd"
            if (!empty($tgl_masuk)) {
                $tgl_masuk = date('Y/m/d', strtotime($tgl_masuk));
            } else {
                $tgl_masuk = NULL; // Set nilai kosong jika tgl_masuk kosong
            }
            
            if (!empty($kadaluwarsa)) {
                $kadaluwarsa = date('Y/m/d', strtotime($kadaluwarsa));
            } else {
                $kadaluwarsa = NULL; // Set nilai kosong jikakadaluwarsa kosong
            }
    
            $jumlah_baris_import++;

            // Check if the data with the same 'kode_obat' already exists in the database
            $existingCheckQuery = "SELECT COUNT(*) as count FROM dataobat WHERE kode_obat = '$kode_obat'";
            $existingCheckResult = mysqli_query($this->conn, $existingCheckQuery);
            $existingDataCount = mysqli_fetch_assoc($existingCheckResult)['count'];

            if ($existingDataCount > 0) {
                // Data with the same 'kode_obat' already exists, update the existing data
                $updateQuery = "UPDATE dataobat SET min_stock = min_stock + '$min_stock', stock = stock + '$stock' WHERE kode_obat = '$kode_obat'";
    
                $updateResult = mysqli_query($this->conn, $updateQuery);

                if (!$updateResult) {
                    die("Gagal mengupdate data: " . mysqli_error($this->conn));
                }
            } else {
                // Data with the same 'kode_obat' doesn't exist, proceed with insertion
                $insertQuery = "INSERT INTO dataobat (kode_obat, tgl_masuk, nama_obat, satuan, penyimpanan, harga_beli, harga_jual, kadaluwarsa, min_stock, stock) 
                                VALUES ('$kode_obat', '$tgl_masuk', '$nama_obat', '$satuan', '$penyimpanan', '$harga_beli', '$harga_jual', '$kadaluwarsa', '$min_stock', '$stock')";                          

                $insertResult = mysqli_query($this->conn, $insertQuery);
                if (!$insertResult) {
                    die("Gagal menyimpan data: " . mysqli_error($this->conn));
                }
            }
        }
        
        // Simpan informasi waktu akses dan jumlah baris yang diimpor ke tabel 'progress'
        date_default_timezone_set('Asia/Jakarta');
        $waktu_upload = date('Y-m-d H:i:s');
        $sqlProgress = "INSERT INTO progress (nama_file, waktu_upload, jmlh_baris_import) VALUES ('$nama_file', '$waktu_upload', '$jumlah_baris_import')";
        $resultProgress = mysqli_query($this->conn, $sqlProgress);
        if (!$resultProgress) {
            die("Gagal menyimpan informasi progres: " . mysqli_error($this->conn));
        }
        
        echo "Impor data selesai. <br>";
        echo "Waktu upload: " . $waktu_upload . "<br>";
        echo "Jumlah baris diimpor: " . $jumlah_baris_import . "<br>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $koneksi = new ImportKoneksi();
        $koneksi->importData($_FILES['file']);
    } else {
        echo "Terjadi kesalahan dalam mengunggah file.";
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Obat Bina Medika</title>

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

    <!-- Colorpicker Css -->
    <link href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="../../plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="../../plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="../../plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="../../plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="../../plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />

        <!-- Tambahkan CSS dan JavaScript Dropzone.js -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
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
        <div class="user-info">
                <div class="image">
                    <img src="../../images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">petugas binamedika</div>
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
                            <li >
                                <a href="dataobat.php">
                                    <span>DATA OBAT</span>
                                </a>
                            <li class="active">
                                <a href="import.php" >
                                    <span>IMPORT DATA OBAT</span>
                                </a>
                            <li >
                                <a href="histori.php">
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
                <h2>FILE OBAT IMPORT</h2>
            </div>
            <!-- File Upload | Drag & Drop OR With Click & Choose -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                FILE UPLOAD - SERET & JATUHKAN / KLIK & PILIH
                                <small>Diambil dari <a href="import.php" target="_blank">Klinik Bina Medika</a></small>
                            </h2>
                        </div>
                        <div class="body">
                            <form action="import.php" id="myDropzone" class="dropzone" method="post" enctype="multipart/form-data">
                                <div class="dz-message">
                                    <div class="drag-icon-cph">
                                        <i class="material-icons">touch_app</i>
                                    </div>
                                    <h3>Seret file ke sini atau Klik untuk upload</h3>
                                    <h4>Pastikan extensi yang digunakan excel (.xlsx) file maximum 10MB</h4>
                                </div>
                                <div class="fallback">
                                    <input name="file" id="file" type="file" accept=".xlsx" required />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->
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

    <!-- Bootstrap Colorpicker Js -->
    <script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>

    <!-- Dropzone Plugin Js -->
    <script src="../../plugins/dropzone/dropzone.js"></script>

    <!-- Input Mask Plugin Js -->
    <script src="../../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="../../plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="../../plugins/jquery-spinner/js/jquery.spinner.js"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="../../plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- noUISlider Plugin Js -->
    <script src="../../plugins/nouislider/nouislider.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/forms/advanced-form-elements.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
    <script>
    Dropzone.options.myDropzone = {
        url: "pages/tables/import.php", // Ganti dengan path ke file impor.php Anda
        paramName: "file",
        maxFilesize: 100, // Batasan ukuran file (dalam MB)
        addRemoveLinks: true,
        success: function(file, response) {
            // Tampilkan pesan sukses jika diperlukan
            console.log("File berhasil diunggah dan diimpor.");
        },
        error: function(file, errorMessage) {
            // Tampilkan pesan kesalahan jika diperlukan
            console.error("Gagal mengunggah file: " + errorMessage);
        }
    };
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
</body>

</html>
