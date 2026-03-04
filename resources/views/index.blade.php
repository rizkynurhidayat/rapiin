<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POS RAPIIN KELOMPOK 3 | Techade</title>
  <link rel="stylesheet" href="{{asset('rapiin')}}/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,500;1,14..32,500&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
  
<!-- Navbar -->
<section id="Beranda">
<nav class="nav">
  <img src="{{ asset ('rapiin') }}/icon/image 23.png" alt="Techade" class="logo">
  <div>
  <ul class="nav-menu">
    <li><a href="#Beranda" class="active">Beranda</a></li>
    <li><a href="#Fitur">Fitur</a></li>
    <li><a href="#Demo">Demo</a></li>
    <li><a href="#Paket">Paket</a></li>
  </ul>
  </div>
  <button class="btn-nav">Mulai</button>
  <div class="menu">
    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e3e3e3"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
  </div>
</nav>
</section>
<!-- navbar mobile -->
 <section>
 <div class="mob-nav">
 <div class="side-header">
  <img src="{{ asset ('rapiin') }}/icon/image 23.png" class="side-logo">
 </div>
  <ul class="side-menu">
    <li><a href="#Beranda"><img src="{{ asset ('rapiin') }}/icon/lets-icons_home-fill.png"><span>Beranda</span></a></li>
    <li><a href="#Fitur"><img src="{{ asset ('rapiin') }}/icon/mingcute_google-gemini-line.png"><span>Fitur</span></a></li>
    <li><a href="#Demo"><img src="{{ asset ('rapiin') }}/icon/mingcute_video-line.png"><span>Demo</span></a></li>
    <li><a href="#Paket"><img src="{{ asset ('rapiin') }}/icon/ph_money-wavy.png"><span>Paket</span></a></li>
  </ul>
  </div>
</div>
  </section>
<!-- Navbar END -->
<!-- Hero -->
<section class="hero">
  <div class="hero-text">
    <h2 class="poppins-semibold">
      Kasir digital simpel<br>
      buat <span class="highlight">RAPIIN</span> bisnis kamu
    </h2>
    <button class="btn-hero">Uji Coba Gratis 7 Hari →</button>
  </div>

    <img src="{{ asset ('rapiin') }}/foto/Screenshot 2025-12-21 224549.png" alt="Aplikasi POS" class="hero-img">
</section>
<!-- Hero END -->
<!-- Fitur -->
<section id="Fitur" class="fitur" >
  <h1 class="fitur-title">
    Fitur-fitur POS <span class="highlight">RAPIIN</span>
  </h1>

  <div class="card-fitur">
    <div class="card">
      <img src="{{ asset ('rapiin') }}/icon/openmoji_bar-chart.png" alt="Card Laporan Real-Time">
      <h3 class="poppins-semibold">Laporan Real-Time</h3>
      <p class="inter-uniquifier">Pantau penjualan, laba, dan transaksi harian secara langsung.</p>
    </div>

    <div class="card">
      <img src="{{ asset ('rapiin') }}/icon/icon-park_box.png" alt="Card Manajemen Stok ">
      <h3 class="poppins-semibold">Manajemen Stok</h3>
      <p class="inter-uniquifier">Stok otomatis berkurang saat transaksi, minim salah hitung.</p>
    </div>

    <div class="card">
      <img src="{{ asset ('rapiin') }}/icon/emojione_bank.png" alt="Integrasi Bank ">
      <h3 class="poppins-semibold">Integrasi Bank</h3>
      <p class="inter-uniquifier">Pembayaran non-tunai dan mutasi bank tercatat rapi.</p>
    </div>
  </div>
</section>
<!-- Fitur END -->
<!-- Demo -->
<section id="Demo" class="perbandingan">
  <h1 class="judul">Perbandingan Sistem Kasir</h1>
  
  <div class="perbandingan-grid">
    <div class="item-wrapper">
      <img src="{{ asset ('rapiin') }}/foto/image 24.png" class="img-banding">
    </div>
    <div class="item-wrapper">
      <div class="card banding manual">
        <span class="judul-badge putih">Metode Kasir Manual</span>
        <ul class="inter-uniquifier">
          <li>Lama dan Antrian panjang</li>
          <li>Manual & Tidak Akurat</li>
          <li>Rumit & Tertunda</li>
          <li>Terbatas (Di Lokasi Saja)</li>
        </ul>
      </div>
    </div>

    <div class="item-wrapper">
      <div class="card banding digital">
        <span class="judul-badge biru">Sistem POS Digital</span>
        <ul class="inter-uniquifier">
          <li>Cepat & Tanpa Antrian</li>
          <li>Otomatis & Real-Time</li>
          <li>Instan & Komprehensif</li>
          <li>Fleksibel (Dimana Saja)</li>
        </ul>
      </div>
    </div>
    <div class="item-wrapper">
      <img src="{{ asset ('rapiin') }}/foto/image 25.png" class="img-banding">
    </div>
  </div>

  <div class="demo">
    <h1>Bagaimana <span class="highlight">RAPIIN</span> POS Membantu Operasional Bisnis?</h1>
    <video width="900" height="500" controls>
      <source src="{{ asset ('rapiin') }}/foto/Video.mp4" type="video/mp4">
    </video>
  </div>
</section>
<!-- Demo END -->
<!-- Paket -->
<section  id="Paket" class="pricing-section">
  <div class="header-content">
    <h1>Mulai <span class="cyan">RAPIIN</span> Bisnis Kamu Sekarang</h1>
    <p>Tinggal pilih paketnya, kasir digital langsung siap dipakai.</p>
  </div>

  <div class="flex-wrapper">
    
    <div class="card ">
      <div class="tag-box"><h5>trial</h5></div>
      <p class="card-desc">Coba RAPIIN tanpa biaya dan tanpa kartu kredit. Rasakan kemudahan mengelola transaksi, stok, dan laporan bisnis.</p>
      <h2 class="card-price">Uji Coba <span class="card-unit">/ 7 hari</span></h2>
      <button class="card-button">Mulai Sekarang</button>
      <ul class="card-features">
        <li>Kasir digital.</li>
        <li>Simulasi pencatatan transaksi.</li>
        <li>Contoh data stok.</li>
        <li>Preview laporan penjualan.</li>
      </ul>
    </div>

    <div class="card active">
      <div class="crown">👑</div>
      <div class="best-seller"><h4>Best Seller</h4></div>
      <div class="tag-box"><h5>starter</h5></div>
      <p class="card-desc">Untuk UMKM yang baru mulai digitalisasi kasir. Kelola transaksi harian dengan sistem yang rapi dan mudah.</p>
      <h2 class="card-price">Rp100.000 <span class="card-unit">/ bulan</span></h2>
      <button class="card-button">Mulai Sekarang</button>
      <ul class="card-features">
        <li>Kasir digital.</li>
        <li>Laporan dasar.</li>
        <li>Manajemen produk.</li>
        <li>Support standar.</li>
      </ul>
    </div>

    <div class="card">
      <div class="tag-box"><h5>bundling</h5></div>
      <p class="card-desc">Paket lengkap siap langsung operasional. Solusi kasir digital dengan perangkat pendukung untuk UMKM.</p>
      <h2 class="card-price">Rp400.000 <span class="card-unit">/ bulan</span></h2>
      <button class="card-button3">Mulai Sekarang</button>
      <ul class="card-features">
        <li>Web App RAPIIN.</li>
        <li>POS Printer.</li>
        <li>Siap langsung digunakan.</li>
      </ul>
    </div>

  </div>
</section>
          
            
<!-- Paket END -->
<!-- Footer -->
        <footer id="footer">
  <div class="footer-container">
    <div class="footer-content">
      <div class="footer-col brand-info">
        <img src="{{ asset ('rapiin') }}/icon/image 23.png" alt="logo techade" class="footer-logo">
        <p>Solusi point of sale untuk mengelola operasional bisnis secara lebih mudah dan terstruktur.</p>
        <div class="social-icons">
          <a href="#"><img src="{{ asset ('rapiin') }}/icon/gg_facebook.png" alt="facebook"></a>
          <a href="#"><img src="{{ asset ('rapiin') }}/icon/mdi_instagram.png" alt="instagram"></a>
          <a href="#"><img src="{{ asset ('rapiin') }}/icon/Clip path group.png" alt="x"></a>
          <a href="#"><img src="{{ asset ('rapiin') }}/icon/ic_baseline-whatsapp.png" alt="whatsapp"></a>
        </div>
      </div>

      <div class="footer-col">
        <h3>Navigasi</h3>
        <ul>
          <li>Servis</li>
          <li>Portofolio</li>
          <li>Keunggulan</li>
          <li>FAQ</li>
        </ul>
      </div>

      <div class="footer-col contact-col">
        <h3>Hubungi Kami</h3>
        <ul>
          <li><img src="{{ asset ('rapiin') }}/icon/mingcute_phone-fill.png" class="icon"> contact@techade.id</li>
          <li class="address">
            <img src="{{ asset ('rapiin') }}/icon/mdi_address-marker (1).png" class="icon">
            <span>Palm Asri 2 Blk. G No.16, Pedagangan, Kec. Dukuhwaru, Kab. Tegal, Jawa Tengah, 52451 Indonesia</span>
          </li>
        </ul>
      </div>

      <div class="footer-col">
        <h3>Perusahaan</h3>
        <ul>
          <li>Tentang Kami</li>
          <li>Produk</li>
          <li>Kerjasama</li>
          <li>Karir</li>
        </ul>
      </div>
    </div>
    
    <div class="footer-bottom">
      <hr>
      <p>© 2025 | Techade.id Seluruh Hak Cipta Dilindungi</p>
    </div>
  </div>
</footer>
<!-- Footer END -->     
 <script src="belajar.js"></script>   
</body>
</html>