@include('component.popup', ['pricings' => $pricings])

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
  {{-- <button class="btn-nav">Mulai</button> --}}
  <button class="btn-nav" onclick="openPopup()">Mulai</button>
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
    @if($hero)
      <h2 class="poppins-semibold">
        {{ $hero->judul_awal }} 
        <br>
        <span class="highlight">{{ $hero->highlight_text }}</span> 
        {{ $hero->judul_akhir }}
      </h2>
      
     <button class="btn-hero" onclick="openPopup()">{{ $hero->button }}</button>
    @endif
  </div>
  
  @if($hero && $hero->image)
    <img src="{{ str_contains($hero->image, 'hero/') ? asset('storage/' . $hero->image) : asset($hero->image) }}" class="hero-img">
  @endif
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
<section id="Paket" class="pricing-section">
    
    {{-- 1. HEADER SECTION --}}
    @if($pricings->isNotEmpty())
        <div class="header-content">
            <h1>
                {{ $pricings->first()->section_judul_awal }} 
                <span class="cyan">{{ $pricings->first()->section_highlight_text }}</span> 
                {{ $pricings->first()->section_judul_akhir }}
            </h1>
            <p>{{ $pricings->first()->section_sub_judul }}</p>
        </div>
    @endif

    {{-- 2. WRAPPER UNTUK KARTU --}}
    <div class="flex-wrapper">
        
        @foreach($pricings as $item)
            <div class="card {{ $item->icon ? 'active' : '' }}">
                
                @if($item->icon)
                    <div class="crown">
                        @if(Str::contains($item->icon, ['/', '.']))
                            <img src="{{ asset('storage/' . $item->icon) }}" width="40">
                        @else
                            {{ $item->icon }}
                        @endif
                    </div>
                    <div class="best-seller">
                        <h4>Best Seller</h4>
                    </div>
                @endif

                <div class="tag-box">
                    <h5>{{ strtoupper($item->nama_paket) }}</h5>
                </div>
                
                {{-- HANYA BAGIAN INI YANG DITAMBAHKAN STYLE RATA KIRI --}}
                <p class="card-desc" style="text-align: left; width: 100%;">
                    {{ $item->deskripsi }}
                </p>
                
                <h2 class="card-price">{{ $item->harga_lengkap }}</h2>
                
                <button class="card-button" onclick="openPopup()">{{ $item->teks_button }}</button>
                
                {{-- Bagian fitur kembali normal sesuai CSS aslimu --}}
                <ul class="card-features">
                    @foreach(explode(',', $item->fitur) as $feature)
                        @if(trim($feature) !== "")
                            <li>{{ trim($feature) }}</li>
                        @endif
                    @endforeach
                </ul>
                
            </div>
        @endforeach

    </div>
</section>
          
            
<!-- Paket END -->
<!-- Footer -->
        <footer id="footer">
  <div class="footer-container">
    <div class="footer-content">
      <div class="footer-col brand-info">
        <img src="icon/image 23.png" alt="logo techade" class="footer-logo">
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
        </ul>
      </div>

      <div class="footer-col contact-col">
        <h3>Hubungi Kami</h3>
        <ul>
          <li><img src="{{ asset ('rapiin') }}/icon/mingcute_phone-fill.png" class="icon"> contact@techade.id</li>
          <li>
            <img src="{{ asset('rapiin') }}/icon/mingcute_phone-fill.png" class="icon"> 
            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $footer->kontak ?? '+6287812066967') }}" 
               target="_blank" 
               style="color: inherit; text-decoration: none;">
               {{ $footer->kontak ?? '+6287812066967' }}
            </a>
          </li>
          <li class="address">
            <img src="{{ asset ('rapiin') }}/icon/mdi_address-marker (1).png" class="icon">
            <span>{{ $footer->alamat ?? 'Palm Asri 2 Blk. G No.16, Pedagangan, Kec. Dukuhwaru, Kab. Tegal, Jawa Tengah, 52451 Indonesia' }}</span>
          </li>
        </ul>
      </div>

      <div class="footer-col">
        <h3>Perusahaan</h3>
        <ul>
          <li>Tentang Kami</li>
          <li>Produk</li>
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