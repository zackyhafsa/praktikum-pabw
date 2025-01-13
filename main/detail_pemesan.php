<?php
include "lib/connection.php";

// Check if ID is set
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch order details
    $sql = "SELECT * FROM pemesanan_tiket WHERE id = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Output data of each row
        while ($row = $result->fetch_assoc()) { ?>
            <div class="container my-5">
                <div class="card">
                    <div class="card-header">
                        <h2>Detail Pesanan</h2>
                    </div>
                    <div class="card-body">
                        <p><strong>ID: </strong><?= $row['id'] ?></p>
                        <p><strong>Nama Pemesan: </strong><?= $row['nama'] ?></p>
                        <p><strong>No. Identitas: </strong><?= $row['no_identitas'] ?></p>
                        <p><strong>No. Handphone: </strong><?= $row['no_hp'] ?></p>
                        <p><strong>Tempat Wisata: </strong><?= $row['tempat_wisata'] ?></p>
                        <p><strong>Tanggal Pesan: </strong> <?= $row['tanggal_kunjungan'] ?></p>
                        <p><strong>Pengunjung Dewasa: </strong> <?= $row['pengunjung_dewasa'] ?></p>
                        <p><strong>Pengunjung Anak: </strong> <?= $row['pengunjung_anak'] ?></p>
                        <p><strong>Total Harga: </strong><?= number_format($row['total_bayar'], 0, ',', '.') ?></p>
                    </div>
                    <div class="card-footer text-right  no-print">
                        <button class="btn btn-primary" onclick="window.print()">Cetak</button>
                    </div>
                </div>
            </div>
        <?php }
    } else { ?>
        <div class="container mt-5">
            <div class="alert alert-warning" role="alert">
                Data Kosong
            </div>
        </div>
    <?php }

    $stmt->close();
    $conn->close();
} else { ?>
    <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
            ID tidak ditemukan.
        </div>
    </div>
<?php } ?>