<?php
include_once '../../koneksi.php';
// if(isset($_POST['kode_obat'])) {
//     $kode_obat_array = $_POST['kode_obat'];
//     $jmlh_obat_string = $_POST['jmlh_obat'];

//     $jmlh_obat_array = explode(', ', $jmlh_obat_string);

//     // Menghapus spasi dari setiap elemen jumlah obat
//     $jmlh_obat_array = array_map('trim', $jmlh_obat_array);

//     $kode_obat_string = implode(", ", $kode_obat_array);
//     // $jmlh_obat_string = implode(", ", $jmlh_obat_array);
//     echo "Kode Obat Dipilih: " . $kode_obat_string;
//     echo "Jumlah obat Dipilih: " . $jmlh_obat_string;

// }


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Riwayat Obat Binamedika</title>
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
                    <li >
                        <a href="#" class="menu-toggle">
                            <i class="material-icons">assignment</i>
                            <span>OBAT</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
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
                    <li class="active">
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
                            Riwayat Obat Pasien Bina Medika
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
                            <h2 class="card-inside-title">Tambah Data Baru Pasien Obat</h2>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <form action="riwayat_act.php" method="post" enctype="multipart/form-data"  onsubmit="return validateDate();">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>ID Pasien</label>
                                                <input type="text" class="form-control" name="kode_pasien" placeholder="masukan kode pasien" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label> Jenis Pasien</label>
                                                <select type="text" class="form-control" name="jenis_pasien">
                                                <option disable selected></option>
                                                <option value="bpjs">BPJS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Kode Dokter</label>
                                                <select type="text" class="form-control" name="kode_dokter" required>
                                                <option disable selected></option>
                                                <option value="IIN0012">IIN0012</option>
                                                <option value="RIN0013">RIN0013</option>
                                                <option value="IQB0021">IQB0021</option>
                                                </select>
                                                <!-- <input type="text" class="form-control" name="kode_dokter" placeholder="Masukan kode dokter" required> -->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Diagnosa Pasien</label>
                                                <input type="text" class="form-control" name="diagnosa" placeholder="Contoh: demam, alergi, flu">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Kode Obat</label>
                                                <select type="text" class="form-control" name="kode_obat[]" multiple required id="kode_obat">
                                                <option disable selected ></option>
                                                <option value="ABO0282">ABO0282</option>
                                                <option value="ABO0283">ABO0283</option>
                                                <option value="ACE0265">ACE0265</option>
                                                <option value="ACE0314">ACE0314</option>
                                                <option value="ACI0338">ACI0338</option>
                                                <option value="ACI0337">ACI0337</option>
                                                <option value="ACI0341">ACI0341</option>
                                                <option value="ANT0401">ANT0401</option>
                                                <option value="APT0510">APT0510</option>
                                                <option value="AQU0622">AQU0622</option>
                                                <option value="ARC0670">ARC0670</option>
                                                <option value="ATO683">ATO683</option>
                                                <option value="AZI0703">AZI0703</option>
                                                <option value="BAL0650">BAL0650</option>
                                                <option value="BED0623">BED0623</option>
                                                <option value="BED0524">BED0524</option>
                                                <option value="BRO0423">BRO0423</option>
                                                <option value="BUF0320">BUF0320</option>
                                                <option value="BUF0319">BUF0319</option>
                                                <option value="BUF0333">BUF0333</option>
                                                <option value="BUF0341">BUF0341</option>
                                                <option value="BUF0339">BUF0339</option>
                                                <option value="BUF0344">BUF0344</option>
                                                <option value="CAL0124">CAL0124</option>
                                                <option value="CAL0232">CAL0232</option>
                                                <option value="CAL0233">CAL0233</option>
                                                <option value="CAN0287">CAN0287</option>
                                                <option value="CAN0288">CAN0288</option>
                                                <option value="CAP0250">CAP0250</option>
                                                <option value="CAT0160">CAT0160</option>
                                                <option value="CAV0222">CAV0222</option>
                                                <option value="CAV0225">CAV0225</option>
                                                <option value="CAV0226">CAV0226</option>
                                                <option value="CAZ0400">CAZ0400</option>
                                                <option value="CEF0382">CEF0382</option>
                                                <option value="CEF0381">CEF0381</option>
                                                <option value="DIA0101">DIA0101</option>
                                                <option value="DIO0292">DIO0292</option>
                                                <option value="DIO0293">DIO0293</option>
                                                <option value="DOB0316">DOB0316</option>
                                                <option value="DOH0327">DOH0327</option>
                                                <option value="DUL0459">DUL0459</option>
                                                <option value="DUL0460">DUL0460</option>
                                                <option value="EFL0223">EFL0223</option>
                                                <option value="ENF0198">ENF0198</option>
                                                <option value="ERL0207">ERL0207</option>
                                                <option value="ERL0209">ERL0209</option>
                                                <option value="ERL0218">ERL0218</option>
                                                <option value="ERM0410">ERM0410</option>
                                                <option value="GAS0787">GAS0787</option>
                                                <option value="GAS0785">GAS0785</option>
                                                <option value="GAS0783">GAS0783</option>
                                                <option value="GAV0752">GAV0752</option>
                                                <option value="GAV0753">GAV0753</option>
                                                <option value="GEM0453">GEM0453</option>
                                                <option value="GEN0472">GEN0472</option>
                                                <option value="GEN0475">GEN0475</option>
                                                <option value="INX0098">INX0098</option>
                                                <option value="ITR0645">ITR0645</option>
                                                <option value="JAR0335">JAR0335</option>
                                                <option value="KAD0264">KAD0264</option>
                                                <option value="KAN0251">KAN0251</option>
                                                <option value="MOL0482">MOL0482</option>
                                                <option value="MUC0766">MUC0766</option>
                                                <option value="MUC0767">MUC0767</option>
                                                <option value="NAC0298">NAC0298</option>
                                                <option value="NEE0095">NEE0095</option>
                                                <option value="NEO0093">NEO0093</option>
                                                <option value="NEO0090">NEO0090</option>
                                                <option value="NEP0211">NEP0211</option>
                                                <option value="NEU0771">NEU0771</option>
                                                <option value="NEU0770">NEU0770</option>
                                                <option value="NEW0439">NEW0439</option>
                                                <option value="NEX0420">NEX0420</option>
                                                <option value="NIS0202">NIS0202</option>
                                                <option value="NOS0346">NOS0346</option>
                                                <option value="NUF0444">NUF0444</option>
                                                <option value="NUT0366">NUT0366</option>
                                                <option value="OBH0790">OBH0790</option>
                                                <option value="ODA0757">ODA0757</option>
                                                <option value="ZEN0556">ZEN0556</option>
                                                <option value="ZEN0557">ZEN0557</option>
                                                <option value="ZEN0558">ZEN0558</option>
                                                <option value="ZEN0555">ZEN0555</option>
                                                <option value="ZEN0560">ZEN0560</option>
                                                <option value="ZID0321">ZID0321</option>
                                                <option value="ZUL0239">ZUL0239</option>
                                                <option value="ZUL0240">ZUL0240</option>
                                                </select>
                                                <div id="selected_kode_obat"></div>
                                                <!-- <input type="text" class="form-control" name="kode_obat" placeholder="Contoh: OB001, OB002, OB003" required> -->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Jumlah Obat</label>
                                                <input type="text" class="form-control" multiple name="jmlh_obat[]" placeholder="Contoh: 3, 1, 2  /Satuan"required >
                                            </div>
                                        </div>                                        
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Aturan Pakai</label>
                                                <select type="text" class="form-control" name="aturan_pakai">
                                                <option disable selected></option>
                                                <option value="ResepDokter">Sesuai anjuran resep dokter</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Tanggal periksa</label>
                                                <input type="date" class="form-control" name="tgl_periksa" id="tgl_periksa" max="<?php echo date('Y-m-d'); ?>"oninput="validateForm()">
                                                <span id="error_message" class="error-message"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Total Obat dijual/dikeluarkan</label>
                                                <input type="text" class="form-control" name="tot_harga_jual" id="hargaJualInput" placeholder="Contoh: 10000">
                                            </div>
                                        </div>                                        
                                        <div class="form-group">
                                            <a href="riwayatobat.php" type="button" class="btn bg-grey waves-effect">Kembali</a>
                                            <button id="submitBtn" class="btn bg-red waves-effect" type="submit">Simpan</button>
                                        </div>
                                    </form>
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
document.addEventListener("DOMContentLoaded", function() {
    const kodeObatSelect = document.getElementById("kode_obat");
    const selectedKodeObatDiv = document.getElementById("selected_kode_obat");

    kodeObatSelect.addEventListener("change", function() {
        const selectedOptions = Array.from(kodeObatSelect.selectedOptions).map(option => option.value);
        const selectedKodeObatString = selectedOptions.join(", ");
        selectedKodeObatDiv.textContent = "Kode Obat Dipilih: " + selectedKodeObatString;
    });
});
                document.getElementById('submitBtn').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah formulir dikirim secara normal
        
            // Get the form element
            var form = document.querySelector('form');
        
            // Get the value of the kode_pasien field
            var kodePasienInput = form.querySelector('input[name="kode_pasien"]');
            var tglPeriksaInput = form.querySelector('input[name="tgl_periksa"]');
            var kodePasienValue = kodePasienInput.value;
            var tglPeriksaValue = tglPeriksaInput.value;
        
            // Create an AJAX request
            var request = new XMLHttpRequest();
        
            // Set the action to be taken when the response is received from the server
            request.onload = function() {
                if (request.status === 200) {
                    if (request.responseText === 'duplicate') {
                        // Show notification if kode pasien is already available
                        showNotification('Data dengan kode pasien dan tanggal yang sama sudah ada.', 'danger');
                    } else if (request.responseText === 'success') {
                        // Show success notification if data is successfully added to the database
                        showNotification('Data berhasil ditambahkan.', 'success');
                        // Redirect to another page after 3 seconds
                        setTimeout(function() {
                            window.location.href = 'riwayatobat.php';
                        }, 3000);
                    } else {
                        // Show error notification if an error occurs
                        showNotification('Terjadi kesalahan saat menambahkan data.', 'warning');
                    }
                }
            };
        
            // Send a POST request to the server
            request.open('POST', 'riwayat_act.php');
            request.send(new URLSearchParams('kode_pasien=' + kodePasienValue + '&tgl_periksa=' + tglPeriksaValue));
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
                } else {
                    // Form is not valid, show notification to fill in required fields
                    showNotification('Mohon lengkapi semua field yang harus diisi.', 'danger');
                }

    function validateForm() {
    // ... (kode validasi lainnya)

    var tglPeriksaInput = document.getElementById("tgl_periksa");
    var errorMessage = document.getElementById("error_message");

    if (tgl_periksa < today) {
        tglPeriksaInput.classList.add("error-border");
        errorMessage.innerText = "Tanggal periksa tidak boleh melebihi hari ini.";
        return false;
    } else {
        tglPeriksaInput.classList.remove("error-border");
        errorMessage.innerText = "";
    }

    // ... (kode validasi lainnya)
}
window.onload = function() {
    var tglPeriksaInput = document.getElementById("tgl_periksa");
    var errorMessage = document.getElementById("error_message");

    tglPeriksaInput.addEventListener("input", function() {
        var selectedDate = new Date(tglPeriksaInput.value);
        var today = new Date();

        if (selectedDate > today) {
            tglPeriksaInput.classList.add("error-border");
            errorMessage.innerText = "Tanggal periksa tidak boleh lebih dari hari ini.";
        } else {
            tglPeriksaInput.classList.remove("error-border");
            errorMessage.innerText = "";
        }
    });
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
//   function formatCurrency(amount) {
//     return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(amount);
// }

// const inputElement = document.getElementById('hargaJualInput');
// inputElement.addEventListener('input', function() {
//     const formattedValue = formatCurrency(inputElement.value);
//     inputElement.value = formattedValue;
// });

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
    .error-message {
    color: red;
    font-size: 14px;
    margin-top: 5px;
}
.error {
    border-color: red;
}
.error-border {
    border-color: red;
}


</style>
</body>
</html>
