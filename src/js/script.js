const dataWisata = [
  {
    nama: "Paralayang",
    gambar: "src/paralayang.png",
    deskripsi:
      "Nikmati keindahan alam Kabupaten Majalengka yang belum banyak terjamah. Dari pesona Gunung Ciremai hingga keindahan Terasering Panyaweuyan.",
  },
  {
    nama: "Kebun Teh",
    gambar: "src/6.jpg",
    deskripsi:
      "Rasakan kesejukan dan ketenangan dengan mengunjungi Kebun Teh indah yang tersembunyi di Majalengka.",
  },
  {
    nama: "Panyaweuyan",
    gambar: "src/4.jpg",
    deskripsi:
      "Liburan seru bersama keluarga di Majalengka! Kunjungi taman rekreasi, kebun buah, dan danau cantik yang siap memanjakan seluruh anggota keluarga",
  },
  {
    nama: "Cipanten",
    gambar: "src/cipanten.png",
    deskripsi:
      "Situ Cipanten adalah sebuah danau yang terletak di Desa Gunung Kuning, Kecamatan Sindang, Kabupaten Majalengka.",
  },
  {
    nama: "Jembar",
    gambar: "src/jembar.png",
    deskripsi:
      "Jembar Waterpark memiliki berbagai wahana permainan air yang menarik, mulai dari seluncuran berkelok-kelok yang memicu adrenalin.",
  },
  {
    nama: "Sayang Kaak",
    gambar: "src/sayangkaak.png",
    deskripsi:
      "Destinasi wisata Majalengka ini terletak di ketinggian sekitar 1.200 meter di atas permukaan laut. Dari atas puncak bukit ini, Anda bisa melihat pemandangan Gunung Ciremai yang menjulang tinggi di kejauhan.",
  },
];

function cardWisata(wisata) {
  const card = document.createElement("div");
  card.classList.add("col-md-4");

  card.innerHTML = `
  <div class="card mb-4" style="width: 18rem">
    <div class="overflow-hidden" style="height: 250px">
        <img src="${wisata.gambar}" class="card-img-top" alt="${wisata.nama}" />
    </div>
    <div class="card-body">
        <p class="card-text fw-bold fs-5">${wisata.nama}</p>
        <p class="fs-6">${wisata.deskripsi}</p>
        <a href="index.php?route=pemesanan" class="btn btn-success w-100">Daftar Paket</a>
    </div>
    </div>
    `;

  return card;
}

function showWisata() {
  const container = document.getElementById("wisataContainer");
  container.innerHTML = "";
  dataWisata.forEach((wisata) => {
    const showCard = cardWisata(wisata);
    container.appendChild(showCard);
  });
}

document.addEventListener("DOMContentLoaded", showWisata);
