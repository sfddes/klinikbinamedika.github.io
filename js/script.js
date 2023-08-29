document.addEventListener("DOMContentLoaded", function () {
    // Fungsi untuk mengambil data dari get_data.php
    function getData() {
      fetch("get_data.php")
        .then((response) => response.json())
        .then((data) => {
          // Isi jumlah pasien ke dalam widget pasien
          document.querySelector(".info-box.bg-pink .number").setAttribute("data-to", data.jumlahPasien);
          // Isi jumlah dokter ke dalam widget dokter
          document.querySelector(".info-box.bg-cyan .number").setAttribute("data-to", data.jumlahDokter);
          // Isi jumlah obat ke dalam widget obat
          document.querySelector(".info-box.bg-light-green .number").setAttribute("data-to", data.jumlahObat);
          // Isi jumlah riwayat obat ke dalam widget riwayat obat
          document.querySelector(".info-box.bg-orange .number").setAttribute("data-to", data.jumlahRiwayatObat);
  
          // Animasikan semua widget
          document.querySelectorAll(".number.count-to").forEach((element) => {
            const speed = parseInt(element.getAttribute("data-speed"));
            const targetValue = parseInt(element.getAttribute("data-to"));
  
            let currentValue = 0;
            const updateInterval = speed / targetValue;
  
            const counter = setInterval(() => {
              currentValue += updateInterval;
              if (currentValue >= targetValue) {
                currentValue = targetValue;
                clearInterval(counter);
              }
              element.textContent = Math.ceil(currentValue);
            }, 1);
          });
        })
        .catch((error) => {
          console.log("Gagal mengambil data.", error);
        });
    }
  
    // Panggil fungsi getData() untuk mengisi data pada halaman
    getData();
  });
  