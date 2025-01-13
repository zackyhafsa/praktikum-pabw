<?php
// Memasukkan file koneksi database
include 'lib/connection.php';

// Query untuk mengambil semua data dari tabel pemesanan_tiket
$sql = "SELECT * FROM pemesanan_tiket";
$result = mysqli_query($conn, $sql);
?>

<div class="hero">
    <div class="container my-5">
        <h2 class="mb-4">Daftar Pemesanan Tiket Wisata</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>No Identitas</th>
                    <th>No HP</th>
                    <th>Tempat Wisata</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Dewasa</th>
                    <th>Anak</th>
                    <th>Harga Paket</th>
                    <th>Total Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Cek apakah ada data di tabel
                if (mysqli_num_rows($result) > 0) {
                    $no = 1;
                    // Mengambil setiap baris data dari hasil query
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nama'] ?></td>
                            <td><?= $row['no_identitas'] ?></td>
                            <td><?= $row['no_hp'] ?></td>
                            <td><?= $row['tempat_wisata'] ?></td>
                            <td><?= $row['tanggal_kunjungan'] ?></td>
                            <td><?= $row['pengunjung_dewasa'] ?></td>
                            <td><?= $row['pengunjung_anak'] ?></td>
                            <td>Rp. <?= number_format($row['harga_paket'], 0, ',', '.') ?></td>
                            <td>Rp. <?= number_format($row['total_bayar'], 0, ',', '.') ?></td>
                            <td>
                                <a href='index.php?route=edit&id=<?= $row['id'] ?>' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='lib/delete.php?id=<?= $row['id'] ?>' class='btn btn-danger btn-sm' onclick='return confirm("Apakah Anda yakin ingin menghapus data ini?")'>Hapus</a>
                                <a href='index.php?route=detail&id=<?= $row['id'] ?>' class='btn btn-primary btn-sm'>Detail</a>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan='10' class='text-center'>Belum ada pemesanan tiket</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>