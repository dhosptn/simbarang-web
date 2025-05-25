<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tambah Barang | Inventory System</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          primary: {
            50: '#eff6ff',
            100: '#dbeafe',
            200: '#bfdbfe',
            300: '#93c5fd',
            400: '#60a5fa',
            500: '#3b82f6',
            600: '#2563eb',
            700: '#1d4ed8',
            800: '#1e40af',
            900: '#1e3a8a',
          },
          secondary: {
            500: '#6b7280',
            600: '#4b5563',
            700: '#374151',
          },
          success: {
            500: '#10b981',
            600: '#059669',
          },
          danger: {
            500: '#ef4444',
            600: '#dc2626',
          }
        },
        fontFamily: {
          sans: ['Inter', 'sans-serif'],
        },
        boxShadow: {
          card: '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
          button: '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
        }
      }
    }
  }
  </script>
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

  body {
    font-family: 'Inter', sans-serif;
    background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
  }

  .animate-float {
    animation: float 3s ease-in-out infinite;
  }

  @keyframes float {

    0%,
    100% {
      transform: translateY(0);
    }

    50% {
      transform: translateY(-5px);
    }
  }
  </style>
</head>

<body class="min-h-screen">
  <div class="container mx-auto px-4 py-8 max-w-3xl">
    <!-- Back Button -->
    <div class="mb-6">
      <a href="/barang"
        class="inline-flex items-center text-secondary-600 hover:text-primary-700 transition duration-300 group">
        <i class="fas fa-arrow-left mr-2 transition-transform group-hover:-translate-x-1"></i>
        <span class="font-medium">Kembali ke Daftar Barang</span>
      </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-card overflow-hidden border border-gray-100">
      <!-- Card Header -->
      <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-5 flex items-center">
        <div class="bg-white/20 p-3 rounded-lg mr-4 animate-float">
          <i class="fas fa-boxes text-white text-xl"></i>
        </div>
        <h1 class="text-2xl font-bold text-white">
          Form Tambah Barang
        </h1>
      </div>

      <!-- Card Body -->
      <div class="p-6 md:p-8">
        <!-- Success Message -->
        <?php if(session()->getFlashdata('success')): ?>
        <div class="bg-green-50 border-l-4 border-success-500 text-success-700 p-4 mb-6 rounded-lg flex items-start">
          <i class="fas fa-check-circle text-success-500 mt-1 mr-3"></i>
          <div>
            <p class="font-medium"><?= session()->getFlashdata('success') ?></p>
          </div>
        </div>
        <?php endif; ?>

        <!-- Error Messages -->
        <?php if(isset($errors)): ?>
        <div class="bg-red-50 border-l-4 border-danger-500 text-danger-700 p-4 mb-6 rounded-lg">
          <div class="flex items-start">
            <i class="fas fa-exclamation-circle mt-1 mr-3"></i>
            <div>
              <h3 class="font-bold text-lg">Terdapat kesalahan</h3>
              <ul class="mt-2 space-y-1">
                <?php foreach($errors as $error): ?>
                <li class="flex items-start">
                  <span class="mr-2">•</span>
                  <span><?= esc($error) ?></span>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
        <?php endif; ?>

        <!-- Form -->
        <form action="/barang/store" method="post" class="space-y-6">
          <!-- Grid Layout for Form Fields -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Nama Barang -->
            <div class="col-span-2">
              <label for="nama_barang" class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                <i class="fas fa-tag text-primary-600 mr-2 text-sm"></i>
                Nama Barang <span class="text-red-500 ml-1">*</span>
              </label>
              <div class="mt-1 relative rounded-lg shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-box-open text-gray-400"></i>
                </div>
                <input type="text" name="nama_barang" id="nama_barang" required
                  class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 placeholder-gray-400 transition duration-300"
                  placeholder="Contoh: Laptop Dell XPS 15">
              </div>
            </div>

            <!-- Kategori -->
            <div>
              <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                <i class="fas fa-layer-group text-primary-600 mr-2 text-sm"></i>
                Kategori
              </label>
              <div class="mt-1 relative rounded-lg shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-folder text-gray-400"></i>
                </div>
                <input type="text" name="kategori" id="kategori"
                  class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 placeholder-gray-400 transition duration-300"
                  placeholder="Contoh: Elektronik">
              </div>
            </div>

            <!-- Stok -->
            <div>
              <label for="stok" class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                <i class="fas fa-boxes text-primary-600 mr-2 text-sm"></i>
                Stok <span class="text-red-500 ml-1">*</span>
              </label>
              <div class="mt-1 relative rounded-lg shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-hashtag text-gray-400"></i>
                </div>
                <input type="number" name="stok" id="stok" value="0" required min="0"
                  class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 placeholder-gray-400 transition duration-300"
                  placeholder="Jumlah stok">
              </div>
            </div>

            <!-- Satuan -->
            <div>
              <label for="satuan" class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                <i class="fas fa-balance-scale text-primary-600 mr-2 text-sm"></i>
                Satuan <span class="text-red-500 ml-1">*</span>
              </label>
              <div class="mt-1 relative rounded-lg shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-ruler text-gray-400"></i>
                </div>
                <input type="text" name="satuan" id="satuan" required
                  class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 placeholder-gray-400 transition duration-300"
                  placeholder="Contoh: pcs, kg, liter">
              </div>
            </div>

            <!-- Lokasi -->
            <div class="col-span-2">
              <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                <i class="fas fa-map-marker-alt text-primary-600 mr-2 text-sm"></i>
                Lokasi Penyimpanan
              </label>
              <div class="mt-1 relative rounded-lg shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                  <i class="fas fa-warehouse text-gray-400"></i>
                </div>
                <input type="text" name="lokasi" id="lokasi"
                  class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500 placeholder-gray-400 transition duration-300"
                  placeholder="Contoh: Rak A, Gudang Utama">
              </div>
            </div>
          </div>

          <!-- Form Actions -->
          <div
            class="flex flex-col-reverse sm:flex-row justify-end space-y-4 space-y-reverse sm:space-y-0 sm:space-x-4 pt-6">
            <a href="/barang"
              class="inline-flex items-center justify-center px-5 py-2.5 border border-gray-300 text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition duration-300 shadow-button">
              <i class="fas fa-times mr-2"></i> Batal
            </a>
            <button type="submit"
              class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-primary-600 to-primary-700 hover:from-primary-700 hover:to-primary-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition duration-300 shadow-button transform hover:-translate-y-0.5">
              <i class="fas fa-save mr-2"></i> Simpan Barang
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Floating Action Button -->
  <div class="fixed bottom-6 right-6">
    <button onclick="window.location.href='/barang'"
      class="p-4 bg-primary-600 text-white rounded-full shadow-lg hover:bg-primary-700 transition duration-300 transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
      <i class="fas fa-list text-xl"></i>
    </button>
  </div>
</body>

</html>