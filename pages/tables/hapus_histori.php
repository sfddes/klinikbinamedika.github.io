<?php
require __DIR__ . '/../../vendor/autoload.php';

class HistoriKoneksi
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

    public function removeHistoriData()
    {
        $sql = "DELETE FROM progress";
        $result = mysqli_query($this->conn, $sql);
        if (!$result) {
            die("Gagal menghapus riwayat histori: " . mysqli_error($this->conn));
        }

        echo "Riwayat histori berhasil dihapus!";
    }
}

$koneksi = new HistoriKoneksi();
$koneksi->removeHistoriData();
?>
