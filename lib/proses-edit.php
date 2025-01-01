<?php
include "connection.php";

if (isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $no_identitas = mysqli_real_escape_string($conn, $_POST['noId']);
    $no_hp = mysqli_real_escape_string($conn, $_POST['noHp']);
    $tempat_wisata = mysqli_real_escape_string($conn, $_POST['wisata']);
    $tanggal_kunjungan = mysqli_real_escape_string($conn, $_POST['tgl']);
    $pengunjung_dewasa = mysqli_real_escape_string($conn, $_POST['dewasa']);
    $pengunjung_anak = mysqli_real_escape_string($conn, $_POST['anak']);
    $harga_paket = mysqli_real_escape_string($conn, $_POST['hargaPaket']);
    $total_bayar = mysqli_real_escape_string($conn, $_POST['totalBayar']);

    // Query untuk mengupdate data
    $sql = "UPDATE pemesanan_tiket SET 
            nama='$nama', 
            no_identitas='$no_identitas', 
            no_hp='$no_hp', 
            tempat_wisata='$tempat_wisata', 
            tanggal_kunjungan='$tanggal_kunjungan', 
            pengunjung_dewasa='$pengunjung_dewasa', 
            pengunjung_anak='$pengunjung_anak', 
            harga_paket='$harga_paket', 
            total_bayar='$total_bayar' 
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        // Redirect ke halaman daftar pemesanan setelah sukses mengupdate
        header("Location: ../index.php?route=daftar-pemesan");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Invalid request!";
}

// Tutup koneksi
mysqli_close($conn);
