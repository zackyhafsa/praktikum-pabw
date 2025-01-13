<?php
// Hubungkan ke database
include 'connection.php';

// Cek apakah form sudah disubmit
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $no_identitas = $_POST['noId'];
    $no_hp = $_POST['noHp'];
    $tempat_wisata = $_POST['wisata'];
    $tanggal_kunjungan = $_POST['tgl'];
    $pengunjung_dewasa = $_POST['dewasa'];
    $pengunjung_anak = $_POST['anak'];
    $harga_paket = $_POST['hargaPaket'];
    $total_bayar = $_POST['totalBayar'];


    $sql = "INSERT INTO pemesanan_tiket 
        (nama, no_identitas, no_hp, tempat_wisata, tanggal_kunjungan, pengunjung_dewasa, pengunjung_anak, harga_paket, total_bayar) 
        VALUES ('$nama', '$no_identitas', '$no_hp', '$tempat_wisata', '$tanggal_kunjungan', '$pengunjung_dewasa', '$pengunjung_anak', '$harga_paket', '$total_bayar')";

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Success!',
                    text: 'Data berhasil disimpan.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../index.php';
                    }
                });
            });
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi
    $conn->close();
}
