<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SimBarang - Sistem Manajemen Inventori Modern</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script>
  tailwind.config = {
    theme: {
      extend: {
        animation: {
          'fade-in': 'fadeIn 0.8s ease-in-out',
          'fade-in-delay': 'fadeIn 1s ease-in-out 0.3s both',
          'slide-up': 'slideUp 0.8s ease-out',
          'slide-up-delay': 'slideUp 0.8s ease-out 0.2s both',
          'slide-left': 'slideLeft 0.8s ease-out',
          'slide-right': 'slideRight 0.8s ease-out',
          'bounce-in': 'bounceIn 0.8s ease-out',
          'pulse-slow': 'pulse 3s infinite',
          'float': 'float 6s ease-in-out infinite',
          'glow': 'glow 2s ease-in-out infinite alternate',
          'wiggle': 'wiggle 1s ease-in-out infinite',
          'scale-hover': 'scaleHover 0.3s ease-in-out',
          'gradient-x': 'gradient-x 15s ease infinite',
          'spin-slow': 'spin 3s linear infinite',
        },
        keyframes: {
          fadeIn: {
            '0%': {
              opacity: '0'
            },
            '100%': {
              opacity: '1'
            }
          },
          slideUp: {
            '0%': {
              transform: 'translateY(30px)',
              opacity: '0'
            },
            '100%': {
              transform: 'translateY(0)',
              opacity: '1'
            }
          },
          slideLeft: {
            '0%': {
              transform: 'translateX(-30px)',
              opacity: '0'
            },
            '100%': {
              transform: 'translateX(0)',
              opacity: '1'
            }
          },
          slideRight: {
            '0%': {
              transform: 'translateX(30px)',
              opacity: '0'
            },
            '100%': {
              transform: 'translateX(0)',
              opacity: '1'
            }
          },
          bounceIn: {
            '0%': {
              transform: 'scale(0.3)',
              opacity: '0'
            },
            '50%': {
              transform: 'scale(1.05)'
            },
            '70%': {
              transform: 'scale(0.9)'
            },
            '100%': {
              transform: 'scale(1)',
              opacity: '1'
            }
          },
          float: {
            '0%, 100%': {
              transform: 'translateY(0px)'
            },
            '50%': {
              transform: 'translateY(-10px)'
            }
          },
          glow: {
            '0%': {
              boxShadow: '0 0 20px rgb(65, 26, 155)'
            },
            '100%': {
              boxShadow: '0 0 30px rgba(37, 39, 160, 0.8)'
            }
          },
          wiggle: {
            '0%, 100%': {
              transform: 'rotate(-3deg)'
            },
            '50%': {
              transform: 'rotate(3deg)'
            }
          },
          'gradient-x': {
            '0%, 100%': {
              'background-size': '200% 200%',
              'background-position': 'left center'
            },
            '50%': {
              'background-size': '200% 200%',
              'background-position': 'right center'
            }
          }
        }
      }
    }
  }
  </script>

  <style>
  @keyframes smooth-float {

    0%,
    100% {
      transform: translateY(0);
    }

    50% {
      transform: translateY(-10px);
    }
  }

  .smooth-float {
    animation: smooth-float 4s ease-in-out infinite;
  }

  .animate-float-slow {
    animation: float 3s ease-in-out infinite;
  }

  @keyframes float-up {

    0%,
    100% {
      transform: translateY(0);
    }

    50% {
      transform: translateY(-10px);
    }
  }

  .float-up {
    animation: float-up 3s ease-in-out infinite;
  }

  .pulse-slow {
    animation: pulse 4s ease-in-out infinite;
  }

  .glow-soft {
    box-shadow: 0 0 8px rgba(147, 51, 234, 0.4);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .glow-soft:hover {
    transform: scale(1.1);
    box-shadow: 0 0 16px rgba(147, 51, 234, 0.6);
  }

  @keyframes float-down {

    0%,
    100% {
      transform: translateY(0);
    }

    50% {
      transform: translateY(10px);
    }
  }

  @keyframes float-up {

    0%,
    100% {
      transform: translateY(0);
    }

    50% {
      transform: translateY(-10px);
    }
  }

  .float-down {
    animation: float-down 3s ease-in-out infinite;
  }

  .float-up {
    animation: float-up 3s ease-in-out infinite;
  }

  .glass {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(15px);
    border: 1px solid rgba(255, 255, 255, 0.2);
  }

  .card-hover {
    transition: all 0.3s ease;
  }

  .card-hover:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
  }

  .text-gradient {
    background: linear-gradient(135deg, #7c3aed, #06b6d4);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .btn-gradient {
    background: linear-gradient(135deg, #7c3aed, #a855f7);
    transition: all 0.3s ease;
  }

  .btn-gradient:hover {
    background: linear-gradient(135deg, #6d28d9, #9333ea);
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(124, 58, 237, 0.4);
  }

  /* Background dengan pola titik halus seperti di gambar */
  .dot-pattern-bg {
    background-color: rgb(44, 23, 128);
    background-image: radial-gradient(circle, rgb(255, 255, 255) 1px, transparent 1px);
    background-size: 20px 20px;
    background-repeat: repeat;
    position: relative;
  }

  .dot-pattern-bg::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(30, 16, 87, 0.8), rgba(68, 49, 153, 0.9));
    pointer-events: none;
  }

  /* Overlay gradient untuk efek lembut */
  .purple-overlay {
    background: linear-gradient(135deg,
        rgba(147, 51, 234, 0.05) 0%,
        rgba(168, 85, 247, 0.08) 25%,
        rgba(196, 181, 253, 0.06) 50%,
        rgba(221, 214, 254, 0.04) 75%,
        rgba(243, 240, 255, 0.02) 100%);
  }

  /* Teks dengan kontras yang baik */
  .text-primary {
    color: #4c1d95;
  }

  .text-secondary {
    color: #6d28d9;
  }

  .text-muted {
    color: #7c3aed;
  }

  body {
    font-family: sans-serif;
    margin: 0;
    background-color: #f4f6f9;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  h1 {
    margin-bottom: 20px;
  }

  #warehouse-map {
    position: relative;
    width: 100%;
    max-width: 850px;
    height: 450px;
    background-color: #fff;
    border: 2px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    overflow: hidden;
  }

  .zone {
    position: absolute;
    border: 2px dashed #bbb;
    padding: 10px;
    box-sizing: border-box;
  }

  .zone-label {
    position: absolute;
    top: -20px;
    left: 5px;
    font-weight: bold;
    font-size: 14px;
    color: #555;
  }

  #zona-a {
    top: 40px;
    left: 40px;
    width: 180px;
    height: 300px;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
  }

  #zona-b {
    top: 40px;
    left: 260px;
    width: 220px;
    height: 300px;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
  }

  #zona-c {
    top: 40px;
    left: 500px;
    width: 300px;
    height: 180px;
    display: flex;
    justify-content: space-around;
    align-items: center;
  }

  #zona-d {
    top: 240px;
    left: 500px;
    width: 300px;
    height: 100px;
    display: flex;
    align-items: center;
    gap: 20px;
  }

  .rack {
    background-color: #d0e0f0;
    border: 1px solid #99b0c8;
    border-radius: 3px;
  }

  .rack-horizontal {
    width: 100%;
    height: 30px;
  }

  .rack-vertical {
    width: 40px;
    height: 90%;
  }

  .rack-box {
    width: 120px;
    height: 80px;
    background-color: #d0e0f0;
    border: 1px solid #99b0c8;
    border-radius: 5px;
  }

  #petugas-dot,
  #agv-dot {
    position: absolute;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    z-index: 10;
  }

  #petugas-dot {
    background-color: #ffc107;
    border: 2px solid #e0a800;
    box-shadow: 0 0 10px rgba(255, 193, 7, 0.8);
  }

  #agv-dot {
    background-color: #2196f3;
    border: 2px solid #1976d2;
    box-shadow: 0 0 10px rgba(33, 150, 243, 0.8);
  }

  .legend {
    margin-top: 20px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    align-items: center;
  }

  .legend-item {
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .legend-color {
    width: 20px;
    height: 20px;
    border: 1px solid #999;
  }

  @media (max-width: 768px) {
    #warehouse-map {
      height: 400px;
    }

    #zona-a {
      top: 40px;
      left: 20px;
      width: 150px;
      height: 250px;
    }

    #zona-b {
      top: 40px;
      left: 190px;
      width: 150px;
      height: 250px;
    }

    #zona-c {
      top: 40px;
      left: 360px;
      width: 150px;
      height: 150px;
    }

    #zona-d {
      top: 210px;
      left: 360px;
      width: 150px;
      height: 80px;
    }

    .rack-horizontal {
      height: 25px;
    }

    .rack-vertical {
      width: 30px;
    }

    .rack-box {
      width: 100px;
      height: 70px;
    }
  }

  @media (max-width: 480px) {
    #warehouse-map {
      height: 350px;
    }

    #zona-a {
      top: 30px;
      left: 10px;
      width: 120px;
      height: 200px;
    }

    #zona-b {
      top: 30px;
      left: 150px;
      width: 120px;
      height: 200px;
    }

    #zona-c {
      top: 30px;
      left: 290px;
      width: 120px;
      height: 120px;
    }

    #zona-d {
      top: 170px;
      left: 290px;
      width: 120px;
      height: 60px;
    }

    .zone-label {
      font-size: 12px;
    }
  }
  </style>
</head>

<body class="dot-pattern-bg text-primary scroll-smooth overflow-x-hidden min-h-screen">
  <div class="white-overlay min-h-screen">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 glass animate-slide-up">
      <div class="max-w-full mx-auto px-4">
        <div class="flex justify-between items-center py-4">
          <div class="flex items-center space-x-3 animate-fade-in">
            <div
              class="w-10 h-10 bg-gradient-to-br from-purple-500 to-purple-700 rounded-xl flex items-center justify-center animate-float">
              <i class="fas fa-boxes text-white text-lg"></i>
            </div>
            <div>
              <div class="text-xl font-bold text-white">SimBarang</div>
              <div class="text-xs text-white/80">Management System</div>
            </div>
          </div>

          <ul class="hidden md:flex items-center space-x-8 animate-fade-in-delay">
            <li><a href="#home" class="hover:text-white transition-colors duration-300 relative group text-white">
                Home
                <span
                  class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
              </a></li>
            <li><a href="#features" class="hover:text-white transition-colors duration-300 relative group text-white">
                Fitur
                <span
                  class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
              </a></li>
            <li><a href="#about" class="hover:text-white transition-colors duration-300 relative group text-white">
                Tentang
                <span
                  class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
              </a></li>
            <li><a href="#contact" class="hover:text-white transition-colors duration-300 relative group text-white">
                Kontak
                <span
                  class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white transition-all duration-300 group-hover:w-full"></span>
              </a></li>
            <li><a href="<?= site_url('barang'); ?>"
                class="btn-gradient px-6 py-2 rounded-full text-white font-medium flex items-center space-x-2">
                <i class="fas fa-tachometer-alt"></i>
                <span>Gudang</span>
              </a></li>
          </ul>

          <button class="md:hidden text-2xl animate-bounce-in text-white" onclick="toggleMobileMenu()">
            <i class="fas fa-bars"></i>
          </button>
        </div>
      </div>

      <!-- Mobile Menu -->
      <div id="mobileMenu" class="md:hidden glass border-t border-white/20 hidden">
        <div class="max-w-full mx-auto px-4 py-4 space-y-4">
          <a href="#home" class="block py-2 hover:text-white transition-colors text-white">Home</a>
          <a href="#features" class="block py-2 hover:text-white transition-colors text-white">Fitur</a>
          <a href="#about" class="block py-2 hover:text-white transition-colors text-white">Tentang</a>
          <a href="#contact" class="block py-2 hover:text-white transition-colors text-white">Kontak</a>
          <a href="<?= site_url('barang/index'); ?>"
            class="btn-gradient px-4 py-2 rounded-lg text-white font-medium inline-flex items-center space-x-2">
            <span>Gudang</span>
          </a>
        </div>
      </div>
    </nav>
    <!-- SECTION Fullscreen -->
    <section id="home" class="w-full h-screen flex items-center relative overflow-hidden pt-20">
      <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-10 items-center w-full">

        <!-- Kiri: Teks -->
        <div class="animate-slide-left">
          <span class="inline-block px-4 py1 bg-purple-200 text-purple-800 rounded-full text-sm font-semibold mb-4">
            ✨ Solusi Gudang Modern
          </span>
          <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold leading-tight mb-6 text-white drop-shadow-lg">
            Kelola Gudang Anda <span class="text-gradient">dengan Lebih Efisien</span>
          </h1>
          <p class="text-xl text-white mb-6 max-w-md">
            Simbarang menyediakan sistem manajemen gudang yang terintegrasi untuk memudahkan bisnis Anda mengelola
            inventaris dengan lebih baik.
          </p>
          <span
            class="inline-block px-5 py-3 bg-yellow-400 text-black font-bold rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
            100% Aman & Efisien
          </span>
        </div>
        <!-- Kanan: Gudang & Ikon -->
        <div class="relative flex justify-center items-center w-full h-full animate-slide-right">
          <!-- Gudang -->
          <div class="float-down w-[420px] md:w-[550px]">
            <!-- SVG Gudang -->
            <svg viewBox="0 0 300 220" class="w-full h-auto drop-shadow-lg" xmlns="http://www.w3.org/2000/svg">
              <!-- Atap -->
              <polygon points="50,100 150,30 250,100" fill="none" stroke="#7c3aed" stroke-width="4" />
              <!-- Bangunan -->
              <rect x="60" y="100" width="180" height="100" fill="white" stroke="#7c3aed" stroke-width="4" rx="5" />
              <!-- Label SIMBARANG -->
              <rect x="115" y="80" width="70" height="25" rx="6" fill="#7c3aed" />
              <text x="123" y="97" font-size="9" font-weight="bold" fill="white"
                font-family="sans-serif">SIMBARANG</text>
              <!-- Jendela kiri -->
              <rect x="75" y="115" width="35" height="35" fill="none" stroke="#7c3aed" stroke-width="2" rx="3" />
              <line x1="75" y1="132.5" x2="110" y2="132.5" stroke="#7c3aed" stroke-width="1" />
              <line x1="92.5" y1="115" x2="92.5" y2="150" stroke="#7c3aed" stroke-width="1" />
              <!-- Jendela kanan -->
              <rect x="190" y="115" width="35" height="35" fill="none" stroke="#7c3aed" stroke-width="2" rx="3" />
              <line x1="190" y1="132.5" x2="225" y2="132.5" stroke="#7c3aed" stroke-width="1" />
              <line x1="207.5" y1="115" x2="207.5" y2="150" stroke="#7c3aed" stroke-width="1" />
              <!-- Barang kiri -->
              <rect x="70" y="160" width="25" height="15" fill="#ddd6fe" rx="2" />
              <!-- Barang kanan -->
              <rect x="205" y="160" width="25" height="15" fill="#ddd6fe" rx="2" />
              <!-- Pintu tengah -->
              <rect x="135" y="150" width="30" height="50" fill="none" stroke="#7c3aed" stroke-width="2" rx="3" />
              <circle cx="148" cy="175" r="3" fill="#7c3aed" />
            </svg>
          </div>
          <!-- Floating Icons -->
          <div class="absolute top-[17%] right-[16%]"
            style="animation: float 4s ease-in-out infinite; animation-delay: 2s;">
            <div
              class="bg-white/20 backdrop-blur-sm shadow-xl p-4 rounded-full text-yellow-300 text-2xl border-2 border-white/30">
              📋
            </div>
          </div>

          <div class="absolute bottom-[3%] left-[11%] animate-float-slow">
            <div
              class="bg-white/20 backdrop-blur-sm shadow-xl p-4 rounded-full text-blue-300 text-2xl border-2 border-white/30">
              📊
            </div>
          </div>

          <div class="absolute top-[30%] left-[-5%] animate-float">
            <div
              class="bg-white/20 backdrop-blur-sm shadow-xl p-3 rounded-full text-green-300 text-xl border-2 border-white/30">
              📦
            </div>
          </div>
        </div>
      </div>
  </div>
  </section>
  </div>
  <script>
  function toggleMobileMenu() {
    const menu = document.getElementById('mobileMenu');
    menu.classList.toggle('hidden');
  }
  // Smooth scroll for navigation links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });
  </script>
</body>

</html>

</html>

<!-- Features Section -->
<section id="features" class="py-20 bg-indigo-950/50 relative scroll-mt-20">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <h2 class="text-3xl md:text-4xl font-bold mb-6 text-gradient animate-slide-up">
        Fitur Unggulan
      </h2>
      <p class="text-xl text-gray-300 max-w-2xl mx-auto animate-slide-up-delay">
        Sistem manajemen inventori dengan fitur lengkap dan teknologi terdepan
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- Feature 1 -->
      <div class="glass rounded-3xl p-8 card-hover animate-slide-left">
        <div
          class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center mb-6 animate-float">
          <i class="fas fa-chart-bar text-white text-2xl"></i>
        </div>
        <h3 class="text-2xl font-bold mb-4 text-blue-300">Gudang Real-time</h3>
        <p class="text-gray-300 mb-6">
          Monitor stok dan pergerakan barang secara real-time dengan visualisasi data yang menarik dan informatif.
        </p>
        <div class="flex items-center text-blue-300 font-semibold">
          <span>Pelajari lebih lanjut</span>
          <i class="fas fa-arrow-right ml-2"></i>
        </div>
      </div>

      <!-- Feature 2 -->
      <div class="glass rounded-3xl p-8 card-hover animate-slide-up">
        <div
          class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-6 animate-float"
          style="animation-delay: 0.5s;">
          <i class="fas fa-qrcode text-white text-2xl"></i>
        </div>
        <h3 class="text-2xl font-bold mb-4 text-green-300">Barcode Scanner</h3>
        <p class="text-gray-300 mb-6">
          Scan barcode untuk input data yang cepat dan akurat. Kurangi kesalahan manual dengan teknologi scanner modern.
        </p>
        <div class="flex items-center text-green-300 font-semibold">
          <span>Pelajari lebih lanjut</span>
          <i class="fas fa-arrow-right ml-2"></i>
        </div>
      </div>

      <!-- Feature 3 -->
      <div class="glass rounded-3xl p-8 card-hover animate-slide-right">
        <div
          class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-6 animate-float"
          style="animation-delay: 1s;">
          <i class="fas fa-bell text-white text-2xl"></i>
        </div>
        <h3 class="text-2xl font-bold mb-4 text-purple-300">Alert System</h3>
        <p class="text-gray-300 mb-6">
          Dapatkan notifikasi otomatis untuk stok menipis, barang expired, dan update inventory penting lainnya.
        </p>
        <div class="flex items-center text-purple-300 font-semibold">
          <span>Pelajari lebih lanjut</span>
          <i class="fas fa-arrow-right ml-2"></i>
        </div>
      </div>

      <!-- Feature 4 -->
      <div class="glass rounded-3xl p-8 card-hover animate-slide-left">
        <div
          class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-500 rounded-2xl flex items-center justify-center mb-6 animate-float"
          style="animation-delay: 1.5s;">
          <i class="fas fa-file-export text-white text-2xl"></i>
        </div>
        <h3 class="text-2xl font-bold mb-4 text-orange-300">Export Reports</h3>
        <p class="text-gray-300 mb-6">
          Generate laporan dalam berbagai format (PDF, Excel, CSV) untuk analisis dan dokumentasi yang komprehensif.
        </p>
        <div class="flex items-center text-orange-300 font-semibold">
          <span>Pelajari lebih lanjut</span>
          <i class="fas fa-arrow-right ml-2"></i>
        </div>
      </div>

      <!-- Feature 5 -->
      <div class="glass rounded-3xl p-8 card-hover animate-slide-up">
        <div
          class="w-16 h-16 bg-gradient-to-br from-teal-500 to-blue-500 rounded-2xl flex items-center justify-center mb-6 animate-float"
          style="animation-delay: 2s;">
          <i class="fas fa-users text-white text-2xl"></i>
        </div>
        <h3 class="text-2xl font-bold mb-4 text-teal-300">Multi User Access</h3>
        <p class="text-gray-300 mb-6">
          Kontrol akses berbasis role untuk tim yang bekerja sama dengan permission yang dapat dikustomisasi.
        </p>
        <div class="flex items-center text-teal-300 font-semibold">
          <span>Pelajari lebih lanjut</span>
          <i class="fas fa-arrow-right ml-2"></i>
        </div>
      </div>

      <!-- Feature 6 -->
      <div class="glass rounded-3xl p-8 card-hover animate-slide-right">
        <div
          class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-purple-500 rounded-2xl flex items-center justify-center mb-6 animate-float"
          style="animation-delay: 2.5s;">
          <i class="fas fa-mobile-alt text-white text-2xl"></i>
        </div>
        <h3 class="text-2xl font-bold mb-4 text-indigo-300">Mobile Friendly</h3>
        <p class="text-gray-300 mb-6">
          Akses sistem dari perangkat apapun. Interface responsive yang optimal untuk desktop, tablet, dan mobile.
        </p>
        <div class="flex items-center text-indigo-300 font-semibold">
          <span>Pelajari lebih lanjut</span>
          <i class="fas fa-arrow-right ml-2"></i>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- About Section -->
<section id="about" class="py-20 bg-indigo-900/50 relative">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
      <div class="animate-slide-left">
        <h2 class="text-4xl md:text-4xl font-bold mb-6 text-gradient">
          Tentang SimBarang
        </h2>
        <p class="text-xl text-gray-300 mb-6">
          SimBarang adalah solusi manajemen inventori yang dirancang khusus untuk memenuhi kebutuhan bisnis modern.
          Dari UMKM hingga perusahaan besar, kami menyediakan tools yang powerful namun mudah digunakan.
        </p>
        <p class="text-gray-400 mb-8">
          Dengan teknologi terdepan dan interface yang intuitif, SimBarang membantu bisnis Anda tumbuh dengan
          manajemen stok yang efisien dan akurat.
        </p>

        <div class="space-y-4">
          <div class="flex items-center space-x-4">
            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
              <i class="fas fa-check text-white text-sm"></i>
            </div>
            <span class="text-gray-300">Interface yang user-friendly dan intuitif</span>
          </div>
          <div class="flex items-center space-x-4">
            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
              <i class="fas fa-check text-white text-sm"></i>
            </div>
            <span class="text-gray-300">Real-time monitoring dan analytics</span>
          </div>
          <div class="flex items-center space-x-4">
            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
              <i class="fas fa-check text-white text-sm"></i>
            </div>
            <span class="text-gray-300">Keamanan data tingkat enterprise</span>
          </div>
          <div class="flex items-center space-x-4">
            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
              <i class="fas fa-check text-white text-sm"></i>
            </div>
            <span class="text-gray-300">Support 24/7 dan training lengkap</span>
          </div>
        </div>
      </div>

      <div class="animate-slide-right">
        <div class="glass rounded-3xl p-8 relative">
          <div
            class="absolute -top-4 -right-4 w-16 h-16 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center animate-spin-slow">
            <i class="fas fa-star text-white text-xl"></i>
          </div>

          <h3 class="text-2xl font-bold mb-6 text-center text-purple-300">
            Mengapa Memilih SimBarang?
          </h3>

          <div class="grid grid-cols-2 gap-6">
            <div class="text-center">
              <div class="text-3xl font-bold text-blue-300 mb-2">99.9%</div>
              <div class="text-sm text-gray-300">Uptime Guarantee</div>
            </div>
            <div class="text-center">
              <div class="text-3xl font-bold text-green-300 mb-2">500+</div>
              <div class="text-sm text-gray-300">Happy Clients</div>
            </div>
            <div class="text-center">
              <div class="text-3xl font-bold text-purple-300 mb-2">24/7</div>
              <div class="text-sm text-gray-300">Customer Support</div>
            </div>
            <div class="text-center">
              <div class="text-3xl font-bold text-orange-300 mb-2">5★</div>
              <div class="text-sm text-gray-300">User Rating</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Peta gudang -->
<div class="header mt-24 mb-12 z-20 relative text-center">
  <h1 class="text-3xl font-bold text-white inline-block border-4 border-yellow-400 px-6 py-2 rounded-none">
    Live view
    <p class="text-gray-300">🏬 simbarang warehouse</p>
</div>

<div id="warehouse-map">
  <div id="petugas-dot"></div>
  <div id="agv-dot"></div>

  <div id="zona-a" class="zone">
    <div class="zone-label">GUDANG A</div>
    <div class="rack rack-horizontal"></div>
    <div class="rack rack-horizontal"></div>
    <div class="rack rack-horizontal"></div>
    <div class="rack rack-horizontal"></div>
    <div class="rack rack-horizontal"></div>
  </div>

  <div id="zona-b" class="zone">
    <div class="zone-label">GUDANG B</div>
    <div class="rack rack-horizontal"></div>
    <div class="rack rack-horizontal"></div>
    <div class="rack rack-horizontal"></div>
    <div class="rack rack-horizontal"></div>
  </div>

  <div id="zona-c" class="zone">
    <div class="zone-label">GUDANG C</div>
    <div class="rack rack-vertical"></div>
    <div class="rack rack-vertical"></div>
    <div class="rack rack-vertical"></div>
    <div class="rack rack-vertical"></div>
  </div>

  <div id="zona-d" class="zone">
    <div class="zone-label">GUDANG D</div>
    <div class="rack-box"></div>
    <div class="rack-box"></div>
  </div>
</div>

<div class="legend mt-2 mb-24 z-60 relative flex flex-wrap gap-20 justify-center text-white text-sm">
  <div class="legend-item flex items-center gap-2">
    <div class="legend-color w-4 h-4 bg-[#d0e0f0] rounded-sm"></div>
    <span>Rak</span>
  </div>
  <div class="legend-item flex items-center gap-2">
    <div class="legend-color w-4 h-4 bg-[#ffc107] rounded-full"></div>
    <span>Petugas GUDANG A/B</span>
  </div>
  <div class="legend-item flex items-center gap-2">
    <div class="legend-color w-4 h-4 bg-[#2196f3] rounded-full"></div>
    <span>AGV GUDANG C/D</span>
  </div>
</div>

<script>
const petugasDot = document.getElementById('petugas-dot');
const agvDot = document.getElementById('agv-dot');

// Rute zona A-B (kuning) - mulai ke kanan
const pathAB = [{
    top: 80,
    left: 70
  },
  {
    top: 80,
    left: 300
  },
  {
    top: 250,
    left: 300
  },
  {
    top: 250,
    left: 70
  }
];

// Rute zona C-D (biru) - mulai ke bawah
const pathCD = [{
    top: 60,
    left: 530
  },
  {
    top: 320,
    left: 530
  },
  {
    top: 320,
    left: 770
  },
  {
    top: 60,
    left: 770
  }
];

function moveTo(dot, top, left) {
  return new Promise(resolve => {
    dot.addEventListener('transitionend', resolve, {
      once: true
    });
    dot.style.top = top + 'px';
    dot.style.left = left + 'px';
  });
}

async function startLoop(dot, path, transitionCSS) {
  dot.style.transition = 'none';
  dot.style.top = path[0].top + 'px';
  dot.style.left = path[0].left + 'px';

  await new Promise(resolve => setTimeout(resolve, 50));
  dot.style.transition = transitionCSS;

  let index = 0;
  while (true) {
    const next = (index + 1) % path.length;
    await moveTo(dot, path[next].top, path[next].left);
    index = next;
  }
}

window.onload = () => {
  startLoop(petugasDot, pathAB, 'top 5s linear, left 6s linear'); // kuning lambat
  startLoop(agvDot, pathCD, 'top 4s linear, left 5s linear'); // biru agak cepat
};
</script>

</body>

</html>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-indigo-950/50 relative">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <h2 class="text-4xl md:text-4xl font-bold mb-6 text-gradient animate-slide-up">
        Hubungi Kami
      </h2>
      <p class="text-xl text-white max-w-2xl mx-auto animate-slide-up-delay">
        Siap memulai perjalanan digitalisasi inventori Anda? Tim kami siap membantu!
      </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
      <!-- Contact Info -->
      <div class="animate-slide-left px-4 md:px-6 lg:pl-12">
        <div class="space-y-8">
          <div class="flex items-start space-x-4">
            <div
              class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
              <i class="fas fa-map-marker-alt text-white"></i>
            </div>
            <div>
              <h3 class="text-xl font-semibold mb-2 text-blue-300">Alamat</h3>
              <p class="text-gray-300">Jl. Teknologi No. 123<br>Jakarta Selatan, DKI Jakarta 12345</p>
            </div>
          </div>

          <div class="flex items-start space-x-4">
            <div
              class="w-12 h-12 bg-gradient-to-br from-green-500 to-teal-600 rounded-xl flex items-center justify-center">
              <i class="fas fa-phone text-white"></i>
            </div>
            <div>
              <h3 class="text-xl font-semibold mb-2 text-green-300">Telepon</h3>
              <p class="text-gray-300">+62 21 1234 5678<br>+62 812 3456 7890</p>
            </div>
          </div>

          <div class="flex items-start space-x-4">
            <div
              class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center">
              <i class="fas fa-envelope text-white"></i>
            </div>
            <div>
              <h3 class="text-xl font-semibold mb-2 text-purple-300">Email</h3>
              <p class="text-gray-300">info@simbarang.com<br>support@simbarang.com</p>
            </div>
          </div>

          <div class="flex items-start space-x-4">
            <div
              class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
              <i class="fas fa-clock text-white"></i>
            </div>
            <div>
              <h3 class="text-xl font-semibold mb-2 text-orange-300">Jam Operasional</h3>
              <p class="text-gray-300">Senin - Jumat: 08:00 - 17:00<br>Sabtu: 08:00 - 12:00</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="animate-slide-right px-4 md:px-6">
        <div class="glass rounded-3xl p-8">
          <h3 class="text-2xl font-bold mb-6 text-center text-purple-300">
            Kirim Pesan
          </h3>

          <form class="space-y-6" onsubmit="handleSubmit(event)">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium mb-2 text-gray-300">Nama Lengkap</label>
                <input type="text"
                  class="w-full p-4 rounded-xl bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all duration-300"
                  placeholder="Masukkan nama Anda" required />
              </div>
              <div>
                <label class="block text-sm font-medium mb-2 text-gray-300">Email</label>
                <input type="email"
                  class="w-full p-4 rounded-xl bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all duration-300"
                  placeholder="nama@email.com" required />
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium mb-2 text-gray-300">Subjek</label>
              <input type="text"
                class="w-full p-4 rounded-xl bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all duration-300"
                placeholder="Subjek pesan" required />
            </div>

            <div>
              <label class="block text-sm font-medium mb-2 text-gray-300">Pesan</label>
              <textarea rows="5"
                class="w-full p-4 rounded-xl bg-white/10 border border-white/20 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 transition-all duration-300 resize-none"
                placeholder="Tulis pesan Anda di sini..." required></textarea>
            </div>

            <button type="submit"
              class="w-full btn-gradient py-4 rounded-xl text-white font-semibold text-lg flex items-center justify-center space-x-3 group">
              <span>Kirim Pesan</span>
              <i class="fas fa-paper-plane group-hover:animate-wiggle"></i>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-gray-300 py-16 mt-16 relative z-0 w-full">
  <div class="max-w-screen-xl mx-auto px-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
      <!-- Company Info -->
      <div class="animate-slide-up">
        <div class="flex items-center space-x-3 mb-6">
          <div
            class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
            <i class="fas fa-boxes text-white"></i>
          </div>
          <div>
            <div class="text-xl font-bold text-white">SimBarang</div>
            <div class="text-sm text-gray-400">Management System</div>
          </div>
        </div>
        <p class="text-gray-400 mb-6">
          Solusi manajemen inventori terdepan untuk bisnis modern. Kelola stok dengan mudah dan efisien.
        </p>
        <div class="flex space-x-4">
          <a href="#"
            class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
            <i class="fab fa-facebook-f text-white"></i>
          </a>
          <a href="#"
            class="w-10 h-10 bg-blue-400 rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
            <i class="fab fa-twitter text-white"></i>
          </a>
          <a href="#"
            class="w-10 h-10 bg-purple-600 rounded-full flex items-center justify-center hover:bg-purple-700 transition-colors">
            <i class="fab fa-instagram text-white"></i>
          </a>
          <a href="#"
            class="w-10 h-10 bg-blue-800 rounded-full flex items-center justify-center hover:bg-blue-900 transition-colors">
            <i class="fab fa-linkedin-in text-white"></i>
          </a>
        </div>
      </div>

      <!-- Produk -->
      <div class="animate-slide-up delay-200">
        <h3 class="text-lg font-semibold text-white mb-6">Produk</h3>
        <ul class="space-y-3">
          <li><a href="barang/index" class="hover:text-purple-400">Gudang</a></li>
          <li><a href="#" class="hover:text-purple-400">Manajemen Stok</a></li>
          <li><a href="#" class="hover:text-purple-400">Laporan Analytics</a></li>
          <li><a href="#" class="hover:text-purple-400">Barcode Scanner</a></li>
          <li><a href="#" class="hover:text-purple-400">Mobile App</a></li>
        </ul>
      </div>

      <!-- Perusahaan -->
      <div class="animate-slide-up delay-400">
        <h3 class="text-lg font-semibold text-white mb-6">Perusahaan</h3>
        <ul class="space-y-3">
          <li><a href="#" class="hover:text-purple-400">Tentang Kami</a></li>
          <li><a href="#" class="hover:text-purple-400">Karir</a></li>
          <li><a href="#" class="hover:text-purple-400">Blog</a></li>
          <li><a href="#" class="hover:text-purple-400">Press</a></li>
          <li><a href="#" class="hover:text-purple-400">Partnership</a></li>
        </ul>
      </div>

      <!-- Dukungan -->
      <div class="animate-slide-up delay-600">
        <h3 class="text-lg font-semibold text-white mb-6">Dukungan</h3>
        <ul class="space-y-3">
          <li><a href="#" class="hover:text-purple-400">Help Center</a></li>
          <li><a href="#" class="hover:text-purple-400">Dokumentasi</a></li>
          <li><a href="#" class="hover:text-purple-400">API Reference</a></li>
          <li><a href="#" class="hover:text-purple-400">Status</a></li>
          <li><a href="#" class="hover:text-purple-400">Kontak</a></li>
        </ul>
      </div>
    </div>

    <!-- Footer Bottom -->
    <div class="border-t border-gray-800 pt-8">
      <div class="flex flex-col md:flex-row justify-between items-center">
        <p class="text-sm text-gray-400">&copy; 2025 SimBarang. All rights reserved.</p>
        <div class="flex space-x-6 text-sm mt-4 md:mt-0">
          <a href="#" class="hover:text-purple-400">Privacy Policy</a>
          <a href="#" class="hover:text-purple-400">Terms of Service</a>
          <a href="#" class="hover:text-purple-400">Cookie Policy</a>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Back to Top Button -->
<button id="backToTop"
  class="fixed bottom-8 right-8 w-12 h-12 bg-purple-600 hover:bg-purple-700 rounded-full flex items-center justify-center text-white shadow-lg transition-all duration-300 opacity-0 pointer-events-none z-50">
  <i class="fas fa-arrow-up"></i>
</button>

<!-- Scripts -->
<script>
// Mobile Menu Toggle
function toggleMobileMenu() {
  const menu = document.getElementById('mobileMenu');
  menu.classList.toggle('hidden');
}

// Form Submission
function handleSubmit(event) {
  event.preventDefault();

  // Show success message
  const button = event.target.querySelector('button[type="submit"]');
  const originalText = button.innerHTML;

  button.innerHTML = '<i class="fas fa-check mr-2"></i>Terkirim!';
  button.classList.add('bg-green-600', 'hover:bg-green-700');
  button.classList.remove('btn-gradient');

  setTimeout(() => {
    button.innerHTML = originalText;
    button.classList.remove('bg-green-600', 'hover:bg-green-700');
    button.classList.add('btn-gradient');
    event.target.reset();
  }, 3000);
}

// Smooth Scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function(e) {
    e.preventDefault();
    const target = document.querySelector(this.getAttribute('href'));
    if (target) {
      target.scrollIntoView({
        behavior: 'smooth',
        block: 'start'
      });
    }
  });
});

// Back to Top Button
document.addEventListener('DOMContentLoaded', () => {
  const backToTop = document.getElementById('backToTop');

  if (!backToTop) {
    console.warn("❌ Tombol backToTop tidak ditemukan di DOM");
    return;
  }

  // Tampilkan tombol saat scroll
  window.addEventListener('scroll', () => {
    if (window.pageYOffset > 300) {
      backToTop.classList.remove('opacity-0', 'pointer-events-none');
      backToTop.classList.add('opacity-100');
    } else {
      backToTop.classList.add('opacity-0', 'pointer-events-none');
      backToTop.classList.remove('opacity-100');
    }
  });

  // Scroll ke atas
  backToTop.addEventListener('click', () => {
    console.log("Tombol Back to Top diklik ✅");
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });
});

// Intersection Observer for Animations
const observerOptions = {
  threshold: 0.1,
  rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('animate-slide-up');
    }
  });
}, observerOptions);

// Observe all sections
document.querySelectorAll('section').forEach(section => {
  observer.observe(section);
});

// Add loading animation
window.addEventListener('load', () => {
  document.body.classList.add('animate-fade-in');
});

// Parallax effect for background icons
// Parallax effect for background icons
window.addEventListener('scroll', () => {
  const scrolled = window.pageYOffset;
  const parallaxElements = document.querySelectorAll(
    '.absolute.top-20, .absolute.top-40, .absolute.bottom-40, .absolute.top-60');

  parallaxElements.forEach((element, index) => {
    const speed = 0.5 + (index * 0.1);
    element.style.transform = `translateY(${scrolled * speed}px)`;
  });
});
</script>

</body>

</html>