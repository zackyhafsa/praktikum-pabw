<?php
// Memasukkan file koneksi database
include 'connection.php';

// Cek apakah terdapat 'id' yang dikirim melalui URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan id
    $sql = "DELETE FROM pemesanan_tiket WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        // Redirect ke halaman daftar pemesanan setelah sukses menghapus
        header("Location: ../index.php?route=daftar-pemesan");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan!";
}

// Tutup koneksi
mysqli_close($conn);
