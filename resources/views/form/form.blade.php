<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Trial - Techade.id</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --bg-dark: #030a12;
            --accent-teal: #00d2ff;
        }

        body {
            /* Background utama (luar modal) */
            background: #020617;
            background-image: linear-gradient(rgba(2, 6, 23, 0.8), rgba(2, 6, 23, 0.8)), url('/background.png'); 
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            font-family: 'Inter', sans-serif;
            color: white;
        }

        .modal-container {
            width: 100%;
            max-width: 900px;
            display: flex;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0,0,0,0.6);
            min-height: 550px;
            background-color: var(--bg-dark); /* Fallback warna panel */
        }

        /* --- Panel Kiri (Tengah & Font Kecil) --- */
        .left-panel {
            flex: 1;
            /* 1. Gabungkan Gradien Teal dan Gambar Latar */
            background: 
                linear-gradient(135deg, rgba(0, 95, 107, 0.9) 0%, rgba(0, 61, 70, 0.9) 100%),
                url('/background_left.png'); /* Ganti dengan nama file gambar Anda */
            
            /* 2. Pengaturan Gambar agar pas */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;

            padding: 50px;
            color: white;
            display: flex;
            flex-direction: column;
            
            /* --- KUNCI: Membuat Semua Berada di Tengah --- */
            justify-content: center; /* Vertikal Tengah */
            align-items: center;    /* Horizontal Tengah */
            text-align: center;    /* Teks Rata Tengah */
            
            position: relative; 
        }

        /* Logo Area (Tengah) */
        .logo-area { 
            display: flex; 
            align-items: center; 
            margin-bottom: 25px; /* Sedikit lebih rapat */
            position: relative; 
            z-index: 1; 
            width: auto; /* Agar tidak selebar panel */
        }
        .logo-box { background: var(--accent-teal); width: 30px; height: 30px; border-radius: 8px; margin-right: 10px; }
        .logo-area .h4 { font-size: 1.25rem; } /* Font Logo diperkecil (H4 Bootstrap default 1.5rem) */

        /* Feature List (Tengah) */
        .feature-list { 
            list-style: none; 
            padding: 0; 
            margin-top: 15px; /* Sedikit lebih rapat */
            position: relative; 
            z-index: 1; 
            width: 100%; /* Agar full lebar panel tapi isinya di tengah */
            display: flex;
            flex-direction: column;
            align-items: center; /* Agar item list di tengah horizontal */
        }
        .feature-item { 
            display: flex; 
            align-items: flex-start; 
            margin-bottom: 15px; /* Jarak antar poin diperkecil */
            
            /* --- KUNCI: Font Kecil --- */
            font-size: 0.85rem; /* Font List diperkecil (sebelumnya 0.95rem) */
            
            line-height: 1.5; 
            opacity: 0.9; 
            width: 80%; /* Batasi lebar item agar tidak terlalu memanjang */
            text-align: left; /* Teks di dalam poin tetap rata kiri */
        }
        .check-icon { color: var(--accent-teal); margin-right: 12px; font-weight: bold; font-size: 1rem; }
        
        /* Font Judul Kecil */
        .left-panel h4 { 
            position: relative; 
            z-index: 1; 
            
            /* --- KUNCI: Font Judul Kecil --- */
            font-size: 1.15rem; /* Font Judul diperkecil (sebelumnya default H4) */
            line-height: 1.4;
        } 

        /* Panel Kanan (Dark Navy) */
        .right-panel {
            flex: 1;
            background-color: var(--bg-dark);
            padding: 50px;
            color: white;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .close-btn {
            position: absolute;
            top: 25px;
            right: 25px;
            color: white;
            font-size: 28px;
            text-decoration: none;
            opacity: 0.5;
            line-height: 1;
        }
        .close-btn:hover { opacity: 1; }

        .form-label { color: #8a99a8; font-size: 0.85rem; margin-bottom: 8px; }
        .form-control {
            background-color: #0a1929;
            border: 1px solid #1e2d3d;
            color: white;
            padding: 14px;
            border-radius: 8px;
        }
        .form-control:focus {
            background-color: #0a1929;
            border-color: var(--accent-teal);
            box-shadow: 0 0 10px rgba(0, 210, 255, 0.2);
            color: white;
        }

        .btn-wa {
            background: linear-gradient(90deg, #00d2ff 0%, #0099cc 100%);
            border: none;
            color: white;
            padding: 16px;
            border-radius: 8px;
            font-weight: bold;
            width: 100%;
            margin-top: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: 0.3s;
        }
        .btn-wa:hover { 
            transform: translateY(-2px); 
            box-shadow: 0 8px 20px rgba(0,210,255,0.4); 
        }

        /* Responsive Mobile */
        @media (max-width: 768px) {
            body {
                padding: 20px;
            }
            .modal-container { 
                flex-direction: column; 
                margin: 0; 
                min-height: auto;
                background: transparent;
                box-shadow: none;
            }
            .left-panel { display: none; } /* Sembunyikan panel kiri di HP */
            .right-panel { 
                padding: 40px 20px; 
                background-color: rgba(3, 10, 18, 0.95); /* Sedikit lebih gelap agar form menonjol */
                border-radius: 20px;
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
        }
    </style>
</head>
<body>

<div class="modal-container">
    <div class="left-panel">
        <div class="logo-area">
            <div class="logo-box"></div>
            <span class="h4 fw-bold m-0">Techade.id</span>
        </div>
        <h4 class="fw-bold mb-4">Kelola operasional bisnis dengan lebih mudah dan terstruktur.</h4>
        
        <div class="feature-list">
            <div class="feature-item">
                <span class="check-icon">✓</span>
                <span>Daftar tanpa kartu kredit dan biaya tersembunyi selama masa uji coba.</span>
            </div>
            <div class="feature-item">
                <span class="check-icon">✓</span>
                <span>Data bisnis Anda disimpan dan dilindungi dengan sistem keamanan andal.</span>
            </div>
            <div class="feature-item">
                <span class="check-icon">✓</span>
                <span>Semua fitur penting dapat langsung digunakan selama free trial.</span>
            </div>
            <div class="feature-item">
                <span class="check-icon">✓</span>
                <span>Tim support kami siap membantu jika Anda membutuhkan bantuan teknis.</span>
            </div>
        </div>
    </div>

    <div class="right-panel">
        <a href="{{ route('home') }}" class="close-btn">&times;</a>
        
        <div class="text-center mb-5">
            <h5 class="fw-bold mb-2">Mulai Uji Coba Rapiin POS Gratis 14 Hari</h5>
            <p style="color: #8a99a8; font-size: 0.9rem;">
                Admin kami akan membuatkan akun dan mengirimkan detail login Anda via WhatsApp.
            </p>
        </div>

        <form action="{{ route('freetrial.send') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">Nama Bisnis / Toko</label>
                <input type="text" name="nama_toko" class="form-control" placeholder="Masukkan nama toko Anda" required>
            </div>
            
            <div class="mb-4">
                <label class="form-label">Alamat Email Aktif</label>
                <input type="email" name="email" class="form-control" placeholder="contoh@email.com" required>
            </div>

            <button type="submit" class="btn btn-wa">
                Mulai Uji Coba Gratis
            </button>
        </form>
    </div>
</div>

</body>
</html>