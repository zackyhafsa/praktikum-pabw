<?php
// Memasukkan file koneksi database
include 'lib/connection.php';

// Cek apakah terdapat 'id' di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan data pemesanan berdasarkan id
    $sql = "SELECT * FROM pemesanan_tiket WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    // Cek apakah data ditemukan
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Data tidak ditemukan!";
        exit();
    }
}
?>
<!-- form -->
<form class="w-75 mx-auto mt-3 mb-5 border px-5 py-3 rounded" id="formPemesanan" method="post" action="lib/proses-edit.php?id=<?= $id ?>">
    <h2>Edit Pemesanan Tiket Wisata</h2>

    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap:</label>
        <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($row['nama']) ?>" required />
    </div>

    <div class="mb-3">
        <label for="noId" class="form-label">Nomor Identitas:</label>
        <input type="number" class="form-control" id="noId" name="noId" value="<?= htmlspecialchars($row['no_identitas']) ?>" required />
    </div>

    <div class="mb-3">
        <label for="noHp" class="form-label">Nomor HP:</label>
        <input type="number" class="form-control" id="noHp" name="noHp" value="<?= htmlspecialchars($row['no_hp']) ?>" required />
    </div>

    <div class="mb-3">
        <label for="wisata" class="form-label">Tempat Wisata:</label>
        <select class="form-control" id="wisata" name="wisata" onchange="setHargaPaket()">
            <option value="paralayang" <?= $row['tempat_wisata'] === 'paralayang' ? 'selected' : '' ?>>Paralayang - Rp. 50.000</option>
            <option value="kebun teh" <?= $row['tempat_wisata'] === 'kebun teh' ? 'selected' : '' ?>>Kebun Teh - Rp. 60.000</option>
            <option value="panyaweuyan" <?= $row['tempat_wisata'] === 'panyaweuyan' ? 'selected' : '' ?>>Panyaweuyan - Rp. 70.000</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="tgl" class="form-label">Tanggal Kunjungan:</label>
        <input type="date" class="form-control" id="tgl" name="tgl" value="<?= htmlspecialchars($row['tanggal_kunjungan']) ?>" required />
    </div>

    <div class="mb-3">
        <label for="dewasa" class="form-label">Pengunjung Dewasa:</label>
        <input type="number" class="form-control" id="dewasa" name="dewasa" value="<?= htmlspecialchars($row['pengunjung_dewasa']) ?>" required />
    </div>

    <div class="mb-3">
        <label for="anak" class="form-label">Pengunjung Anak-Anak:</label>
        <input type="number" class="form-control" id="anak" name="anak" value="<?= htmlspecialchars($row['pengunjung_anak']) ?>" required />
    </div>

    <div class="mb-3">
        <label for="hargaPaket" class="form-label">Harga Tiket (Rp):</label>
        <input type="text" class="form-control" id="hargaPaket" name="hargaPaket" readonly value="<?= htmlspecialchars($row['harga_paket']) ?>" />
    </div>

    <div class="mb-3">
        <label for="totalBayar" class="form-label">Total Bayar (Rp):</label>
        <input type="text" class="form-control" id="totalBayar" name="totalBayar" readonly value="<?= htmlspecialchars($row['total_bayar']) ?>" />
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    <button type="button" class="btn btn-primary" onclick="hitungHarga()">Hitung</button>
    <button type="reset" class="btn btn-danger">Reset</button>
</form>


</div>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script>
    function hitungHarga() {
        const dewasa = document.getElementById('dewasa').value;
        const anak = document.getElementById('anak').value;
        const wisata = document.getElementById('wisata').value;

        let hargaPaket;

        // Tentukan harga paket berdasarkan pilihan wisata
        if (wisata === 'paralayang') {
            hargaPaket = 50000; // Harga untuk Paket Wisata Alam Majalengka
        } else if (wisata === 'kebun teh') {
            hargaPaket = 60000; // Harga untuk Paket Wisata Air Terjun Majalengka
        } else if (wisata === 'panyaweuyan') {
            hargaPaket = 70000; // Harga untuk Paket Wisata Keluarga di Majalengka
        }

        // Hitung total harga
        const totalDewasa = dewasa * hargaPaket;
        const totalAnak = anak * (hargaPaket * 0.5); // Anak-anak diskon 50%
        const totalBayar = totalDewasa + totalAnak;

        // Tampilkan hasil
        document.getElementById('hargaPaket').value = hargaPaket;
        document.getElementById('totalBayar').value = totalBayar;
    }
</script>