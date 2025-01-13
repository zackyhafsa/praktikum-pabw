      <!-- form -->
      <form class="w-75 mx-auto mt-3 mb-5 border px-5 py-3 rounded" id="formPemesanan" method="post" action="lib/proses-pemesanan.php">
        <h2>Form Pemesanan Tiket Wisata</h2>

        <div class="mb-3">
          <label for="nama" class="form-label">Nama Lengkap:</label>
          <input type="text" class="form-control" id="nama" name="nama" required />
        </div>

        <div class="mb-3">
          <label for="noId" class="form-label">Nomor Identitas:</label>
          <input type="number" class="form-control" id="noId" name="noId" required />
        </div>

        <div class="mb-3">
          <label for="noHp" class="form-label">Nomor HP:</label>
          <input type="number" class="form-control" id="noHp" name="noHp" required />
        </div>

        <div class="mb-3">
          <label for="wisata" class="form-label">Tempat Wisata:</label>
          <select class="form-control" id="wisata" name="wisata" onchange="setHargaPaket()">
            <option value="paralayang" data-harga="50000">Paralayang - Rp. 50.000</option>
            <option value="kebun teh" data-harga="60000">Kebun Teh - Rp. 60.000</option>
            <option value="panyaweuyan" data-harga="70000">Panyaweuyan - Rp. 70.000</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="tgl" class="form-label">Tanggal Kunjungan:</label>
          <input type="date" class="form-control" id="tgl" name="tgl" required />
        </div>

        <div class="mb-3">
          <label for="dewasa" class="form-label">Pengunjung Dewasa:</label>
          <input type="number" class="form-control" id="dewasa" name="dewasa" required />
        </div>

        <div class="mb-3">
          <label for="anak" class="form-label">Pengunjung Anak-Anak:<br><span>Usia di bawah 12 tahun</span></label>
          <input type="number" class="form-control" id="anak" name="anak" required />
        </div>

        <div class="mb-3">
          <label for="hargaPaket" class="form-label">Harga Tiket (Rp):</label>
          <input type="text" class="form-control" id="hargaPaket" name="hargaPaket" readonly />
        </div>

        <div class="mb-3">
          <label for="totalBayar" class="form-label">Total Bayar (Rp):</label>
          <input type="text" class="form-control" id="totalBayar" placeholder="Rp. " name="totalBayar" readonly />
        </div>


        <button type="submit" class="btn btn-primary" name="submit">Kirim</button>
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