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
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Success!',
                    text: 'Data berhasil dihapus.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '../index.php?route=daftar-pemesan';
                    }
                });
            });
        </script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan!";
}

// Tutup koneksi
mysqli_close($conn);
