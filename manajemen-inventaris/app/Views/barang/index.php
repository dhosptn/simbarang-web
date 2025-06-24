<!DOCTYPE html>
<html lang="en">

<head>
  <title>Data Barang - Inventory Management</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
  /* Smooth transition for row appearance */
  tr {
    transition: all 0.3s ease;
  }

  /* Highlight effect for search matches */
  .highlight {
    background-color: rgba(59, 130, 246, 0.2);
    transition: all 0.3s ease;
  }

  /* Responsive adjustments */
  @media (max-width: 768px) {
    .flex-col {
      flex-direction: column;
    }

    .flex-1 {
      width: 100%;
    }
  }
  </style>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script>
  tailwind.config = {
    theme: {
      extend: {
        animation: {
          'fade-in': 'fadeIn 0.5s ease-in-out',
          'slide-up': 'slideUp 0.3s ease-out',
          'bounce-in': 'bounceIn 0.6s ease-out',
          'pulse-slow': 'pulse 3s infinite',
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
              transform: 'translateY(20px)',
              opacity: '0'
            },
            '100%': {
              transform: 'translateY(0)',
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
          }
        }
      }
    }
  }
  </script>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-900 via-purple-900 to-slate-900">
  <!-- Background Pattern -->
  <div class="absolute inset-0 opacity-10">
    <div class="absolute inset-0"
      style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.15) 1px, transparent 0); background-size: 20px 20px;">
    </div>
  </div>

  <!-- Navbar -->
  <nav class="relative bg-white/10 backdrop-blur-md border-b border-white/20 sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4">
      <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
          <div
            class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center">
            <i class="fas fa-boxes text-white text-lg"></i>
          </div>
          <div>
            <h1 class="text-white text-xl font-bold">SimBarang</h1>
            <p class="text-white/70 text-sm">Management System</p>
          </div>
        </div>
        <div class="hidden md:flex items-center space-x-6">
          <a href="/" class="text-white/80 hover:text-white transition-colors duration-200">
            <i class="fas fa-chart-bar mr-2"></i>Dashboard
          </a>
          <a href="#" class="text-white/80 hover:text-white transition-colors duration-200">
            <i class="fas fa-cog mr-2"></i>Settings
          </a>
          <div
            class="w-8 h-8 bg-gradient-to-r from-green-400 to-blue-500 rounded-full flex items-center justify-center">
            <i class="fas fa-user text-white text-sm"></i>
          </div>
        </div>
        <button class="md:hidden text-white">
          <i class="fas fa-bars text-xl"></i>
        </button>
      </div>
    </div>
  </nav>

  <div class="container mx-auto px-4 py-8 max-w-7xl relative">
    <!-- Header Section -->
    <div class="text-center mb-12 animate-fade-in">
      <div
        class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full mb-6 animate-bounce-in">
        <i class="fas fa-warehouse text-white text-2xl"></i>
      </div>
      <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
        Daftar <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">Barang</span>
      </h1>
      <p class="text-white/70 text-lg max-w-2xl mx-auto">
        Kelola inventori barang Anda dengan mudah dan efisien. Pantau stok, kategori, dan lokasi dalam satu dashboard
        terpadu.
      </p>
    </div>

    <!-- Stats Cards -->
    <?php 
    $total_items = count($barang);
    $low_stock = array_filter($barang, function($item) { return $item['stok'] < 5; });
    $categories = array_unique(array_column($barang, 'kategori'));
    $locations = array_unique(array_column($barang, 'lokasi'));
    ?>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8 animate-slide-up">
      <div
        class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-white/70 text-sm font-medium uppercase tracking-wide">Total Items</p>
            <p class="text-white text-2xl font-bold mt-1"><?= $total_items ?></p>
          </div>
          <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
            <i class="fas fa-cube text-white"></i>
          </div>
        </div>
      </div>

      <div
        class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-white/70 text-sm font-medium uppercase tracking-wide">Low Stock</p>
            <p class="text-white text-2xl font-bold mt-1"><?= count($low_stock) ?></p>
          </div>
          <div class="w-12 h-12 bg-gradient-to-r from-red-500 to-pink-500 rounded-xl flex items-center justify-center">
            <i class="fas fa-exclamation-triangle text-white"></i>
          </div>
        </div>
      </div>

      <div
        class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-white/70 text-sm font-medium uppercase tracking-wide">Categories</p>
            <p class="text-white text-2xl font-bold mt-1"><?= count($categories) ?></p>
          </div>
          <div
            class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-xl flex items-center justify-center">
            <i class="fas fa-tags text-white"></i>
          </div>
        </div>
      </div>

      <div
        class="bg-white/10 backdrop-blur-md rounded-2xl p-6 border border-white/20 hover:bg-white/15 transition-all duration-300 hover:scale-105">
        <div class="flex items-center justify-between">
          <div>
            <p class="text-white/70 text-sm font-medium uppercase tracking-wide">Locations</p>
            <p class="text-white text-2xl font-bold mt-1"><?= count($locations) ?></p>
          </div>
          <div
            class="w-12 h-12 bg-gradient-to-r from-purple-500 to-indigo-500 rounded-xl flex items-center justify-center">
            <i class="fas fa-map-marker-alt text-white"></i>
          </div>
        </div>
      </div>
    </div>

    <!-- Action Buttons -->
    <div class="flex flex-col sm:flex-row gap-4 mb-8 justify-center animate-slide-up">
      <a href="/barang/create"
        class="group inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl shadow-blue-500/25">
        <i class="fas fa-plus mr-3 group-hover:rotate-90 transition-transform duration-300"></i>
        Tambah Barang
      </a>
      <a href="/barang/masuk"
        class="group inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-green-600 to-green-700 hover:from-green-700 hover:to-green-800 text-white font-semibold rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl shadow-green-500/25">
        <i class="fas fa-arrow-down mr-3 group-hover:animate-bounce"></i>
        Barang Masuk
      </a>
      <a href="/barang/keluar"
        class="group inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-orange-600 to-orange-700 hover:from-orange-700 hover:to-orange-800 text-white font-semibold rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl shadow-orange-500/25">
        <i class="fas fa-arrow-up mr-3 group-hover:animate-bounce"></i>
        Barang Keluar
      </a>
    </div>

    <!-- Search and Filter -->
    <!-- Search and Filter Section -->
    <div
      class="mb-6 bg-white/10 backdrop-blur-md rounded-2xl shadow-2xl overflow-hidden border border-white/20 p-6 animate-slide-up">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <!-- Search Input -->
        <div class="relative flex-1">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <i class="fas fa-search text-white/50"></i>
          </div>
          <input type="text" id="searchInput"
            class="block w-full pl-10 pr-3 py-2 bg-white/5 border border-white/20 rounded-lg text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200"
            placeholder="Cari barang..." onkeyup="filterTable()">
        </div>

        <!-- Category Filter -->
        <div class="flex-1">
          <label for="categoryFilter" class="block text-sm font-medium text-white/80 mb-1">Filter Kategori</label>
          <select id="categoryFilter"
            class="block w-full px-3 py-2 bg-white/5 border border-white/20 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition-all duration-200"
            onchange="filterTable()">
            <option value="">Semua Kategori</option>
            <?php 
        $categories = array_unique(array_column($barang, 'kategori'));
        foreach ($categories as $category): ?>
            <option value="<?= esc($category) ?>"><?= ucfirst(esc($category)) ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Stock Sort -->
        <div class="flex-1">
          <label for="stockSort" class="block text-sm font-medium text-white/80 mb-1">Urutkan Stok</label>
          <select id="stockSort"
            class="block w-full px-3 py-2 bg-white/5 border border-white/20 rounded-lg text-black focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200"
            onchange="sortTableByStock()">
            <option value="">Default</option>
            <option value="asc">Terendah ke Tertinggi</option>
            <option value="desc">Tertinggi ke Terendah</option>
          </select>
        </div>

        <!-- Reset Button -->
        <div class="flex items-end">
          <button onclick="resetFilters()"
            class="px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-200 flex items-center">
            <i class="fas fa-sync-alt mr-2"></i> Reset
          </button>
        </div>
      </div>
    </div>

    <script>
    // Filter table based on search input and category
    function filterTable() {
      const searchInput = document.getElementById('searchInput').value.toLowerCase();
      const categoryFilter = document.getElementById('categoryFilter').value.toLowerCase();

      const rows = document.querySelectorAll('tbody tr');

      rows.forEach(row => {
        // Cara yang lebih reliable untuk mendapatkan nama barang
        const namaBarang = row.cells[1].textContent.toLowerCase(); // Kolom kedua (indeks 1) adalah nama barang
        const kategori = row.cells[2].textContent.toLowerCase(); // Kolom ketiga (indeks 2) adalah kategori

        const matchesSearch = namaBarang.includes(searchInput);
        const matchesCategory = categoryFilter === '' || kategori.includes(categoryFilter);

        if (matchesSearch && matchesCategory) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    }

    // Sort table by stock
    function sortTableByStock() {
      const sortDirection = document.getElementById('stockSort').value;
      if (!sortDirection) return;

      const tbody = document.querySelector('tbody');
      const rows = Array.from(tbody.querySelectorAll('tr'));

      rows.sort((a, b) => {
        const stockA = parseInt(a.cells[3].textContent); // Kolom keempat (indeks 3) adalah stok
        const stockB = parseInt(b.cells[3].textContent);

        return sortDirection === 'asc' ? stockA - stockB : stockB - stockA;
      });

      // Remove existing rows
      rows.forEach(row => tbody.removeChild(row));

      // Add sorted rows
      rows.forEach(row => tbody.appendChild(row));
    }

    // Reset all filters
    function resetFilters() {
      document.getElementById('searchInput').value = '';
      document.getElementById('categoryFilter').value = '';
      document.getElementById('stockSort').value = '';

      const rows = document.querySelectorAll('tbody tr');
      rows.forEach(row => row.style.display = '');
    }
    </script>

    <!-- Flash Message -->
    <?php if(session()->getFlashdata('success')): ?>
    <div
      class="bg-gradient-to-r from-green-500 to-emerald-500 text-white p-4 mb-6 rounded-2xl shadow-lg animate-slide-up">
      <div class="flex items-center">
        <i class="fas fa-check-circle mr-3 text-xl"></i>
        <p class="font-medium"><?= session()->getFlashdata('success') ?></p>
        <button class="ml-auto text-white hover:text-gray-200"
          onclick="this.parentElement.parentElement.style.display='none'">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
    <div class="bg-gradient-to-r from-red-500 to-pink-500 text-white p-4 mb-6 rounded-2xl shadow-lg animate-slide-up">
      <div class="flex items-center">
        <i class="fas fa-exclamation-circle mr-3 text-xl"></i>
        <p class="font-medium"><?= session()->getFlashdata('error') ?></p>
        <button class="ml-auto text-white hover:text-gray-200"
          onclick="this.parentElement.parentElement.style.display='none'">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <?php endif; ?>

    <!-- Table Section -->
    <div
      class="bg-white/10 backdrop-blur-md rounded-2xl shadow-2xl overflow-hidden border border-white/20 animate-slide-up">
      <div class="overflow-x-auto">
        <table class="min-w-full">
          <thead class="bg-white/5 border-b border-white/20">
            <tr>
              <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                <div class="flex items-center space-x-2">
                  <i class="fas fa-hashtag text-blue-400"></i>
                  <span>ID</span>
                </div>
              </th>
              <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                <div class="flex items-center space-x-2">
                  <i class="fas fa-box text-green-400"></i>
                  <span>Nama Barang</span>
                </div>
              </th>
              <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                <div class="flex items-center space-x-2">
                  <i class="fas fa-tags text-purple-400"></i>
                  <span>Kategori</span>
                </div>
              </th>
              <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                <div class="flex items-center space-x-2">
                  <i class="fas fa-layer-group text-yellow-400"></i>
                  <span>Stok</span>
                </div>
              </th>
              <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                <div class="flex items-center space-x-2">
                  <i class="fas fa-ruler text-cyan-400"></i>
                  <span>Satuan</span>
                </div>
              </th>
              <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                <div class="flex items-center space-x-2">
                  <i class="fas fa-map-marker-alt text-red-400"></i>
                  <span>Lokasi</span>
                </div>
              </th>
              <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-white uppercase tracking-wider">
                <div class="flex items-center space-x-2">
                  <i class="fas fa-cogs text-orange-400"></i>
                  <span>Aksi</span>
                </div>
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-white/10">
            <?php if(!empty($barang)): ?>
            <?php 
              function getCategoryIcon($kategori) {
                switch(strtolower($kategori)) {
                  case 'elektronik': return 'fas fa-laptop';
                  case 'furniture': return 'fas fa-chair';
                  case 'alat tulis': return 'fas fa-pen';
                  case 'makanan': return 'fas fa-utensils';
                  case 'minuman': return 'fas fa-glass-water';
                  case 'pakaian': return 'fas fa-tshirt';
                  case 'sepatu': return 'fas fa-shoe-prints';
                  case 'buku': return 'fas fa-book';
                  default: return 'fas fa-box';
                }
              }
              
              function getCategoryColor($kategori) {
                switch(strtolower($kategori)) {
                  case 'elektronik': return 'from-blue-500 to-blue-600';
                  case 'furniture': return 'from-green-500 to-green-600';
                  case 'alat tulis': return 'from-purple-500 to-purple-600';
                  case 'makanan': return 'from-orange-500 to-orange-600';
                  case 'minuman': return 'from-cyan-500 to-cyan-600';
                  case 'pakaian': return 'from-pink-500 to-pink-600';
                  case 'sepatu': return 'from-yellow-500 to-yellow-600';
                  case 'buku': return 'from-indigo-500 to-indigo-600';
                  default: return 'from-gray-500 to-gray-600';
                }
              }
              ?>

            <?php foreach ($barang as $b): ?>
            <tr class="hover:bg-white/5 transition-all duration-200 group">
              <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-white"><?= $b['id'] ?></td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <div
                    class="w-10 h-10 bg-gradient-to-r <?= getCategoryColor($b['kategori']) ?> rounded-lg flex items-center justify-center mr-3">
                    <i class="<?= getCategoryIcon($b['kategori']) ?> text-white text-sm"></i>
                  </div>
                  <div>
                    <div class="text-sm font-medium text-white"><?= esc($b['nama_barang']) ?></div>
                    <div class="text-sm text-white/60"><?= ucfirst(esc($b['kategori'])) ?> item</div>
                  </div>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <span
                  class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gradient-to-r <?= getCategoryColor($b['kategori']) ?> text-white">
                  <i class="<?= getCategoryIcon($b['kategori']) ?> mr-1"></i>
                  <?= ucfirst(esc($b['kategori'])) ?>
                </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                  <span
                    class="<?= $b['stok'] < 5 ? 'text-red-400 animate-pulse' : 'text-green-400' ?> font-bold text-lg">
                    <?= $b['stok'] ?>
                  </span>
                  <div class="ml-2 w-16 bg-white/20 rounded-full h-2">
                    <?php 
                      $percentage = min(100, ($b['stok'] / 50) * 100); // Assuming max stock of 50 for percentage
                      $color = $b['stok'] < 5 ? 'from-red-400 to-red-500' : 'from-green-400 to-green-500';
                      ?>
                    <div class="bg-gradient-to-r <?= $color ?> h-2 rounded-full" style="width: <?= $percentage ?>%">
                    </div>
                  </div>
                  <?php if($b['stok'] < 5): ?>
                  <span class="ml-2 text-xs text-red-400 font-medium">LOW</span>
                  <?php endif; ?>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-white/80"><?= esc($b['satuan']) ?></td>
              <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center text-white/80">
                  <i class="fas fa-building mr-2 text-cyan-400"></i>
                  <?= esc($b['lokasi']) ?>
                </div>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                <div class="flex space-x-3">
                  <a href="/barang/edit/<?= $b['id'] ?>"
                    class="text-blue-400 hover:text-blue-300 transform hover:scale-110 transition-all duration-200"
                    title="Edit">
                    <i class="fas fa-edit text-lg"></i>
                  </a>
                  <button
                    class="text-green-400 hover:text-green-300 transform hover:scale-110 transition-all duration-200"
                    title="View">
                    <i class="fas fa-eye text-lg"></i>
                  </button>
                  <a href="/barang/delete/<?= $b['id'] ?>" onclick="return confirm('Yakin ingin menghapus barang ini?')"
                    class="text-red-400 hover:text-red-300 transform hover:scale-110 transition-all duration-200"
                    title="Delete">
                    <i class="fas fa-trash-alt text-lg"></i>
                  </a>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- Pagination -->
    <div class="flex flex-col sm:flex-row justify-between items-center mt-8 animate-slide-up">
      <div class="text-white/70 mb-4 sm:mb-0">
        Menampilkan <span class="font-semibold text-white"><?= count($barang) ?></span> barang
      </div>
    </div>

    <!-- Empty State -->
    <?php if(empty($barang)): ?>
    <div class="text-center py-16 animate-bounce-in">
      <div
        class="w-32 h-32 bg-gradient-to-r from-gray-600 to-gray-700 rounded-full flex items-center justify-center mx-auto mb-8 animate-pulse-slow">
        <i class="fas fa-box-open text-4xl text-white/50"></i>
      </div>
      <h3 class="text-2xl font-bold text-white mb-4">Tidak ada data barang</h3>
      <p class="text-white/70 text-lg mb-8 max-w-md mx-auto">
        Mulai kelola inventori Anda dengan menambahkan barang pertama
      </p>
      <a href="/barang/create"
        class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
        <i class="fas fa-plus mr-3"></i> Tambah Barang Pertama
      </a>
    </div>
    <?php endif; ?>
    <button
      class="px-4 py-2 bg-white/10 text-white rounded-lg border border-white/20 hover:bg-white/20 transition-all duration-200">
      Next<i class="fas fa-chevron-right ml-2"></i>
    </button>
  </div>
  </div>

  <!-- Empty State (hidden by default) -->
  <div id="empty-state" class="hidden text-center py-16 animate-bounce-in">
    <div
      class="w-32 h-32 bg-gradient-to-r from-gray-600 to-gray-700 rounded-full flex items-center justify-center mx-auto mb-8 animate-pulse-slow">
      <i class="fas fa-box-open text-4xl text-white/50"></i>
    </div>
    <h3 class="text-2xl font-bold text-white mb-4">Tidak ada data barang</h3>
    <p class="text-white/70 text-lg mb-8 max-w-md mx-auto">
      Mulai kelola inventori Anda dengan menambahkan barang pertama
    </p>
    <a href="/barang/create"
      class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold rounded-2xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl">
      <i class="fas fa-plus mr-3"></i> Tambah Barang Pertama
    </a>
  </div>
  </div>

  <!-- Footer -->
  <footer class="relative bg-white/5 backdrop-blur-md border-t border-white/20 mt-16">
    <div class="container mx-auto px-4 py-8">
      <div class="flex flex-col md:flex-row justify-between items-center">
        <div class="flex items-center space-x-3 mb-4 md:mb-0">
          <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg flex items-center justify-center">
            <i class="fas fa-boxes text-white text-sm"></i>
          </div>
          <span class="text-white font-semibold">InventoryPro</span>
        </div>
        <div class="text-white/60 text-sm">
          © 2024 InventoryPro. All rights reserved.
        </div>
      </div>
    </div>
  </footer>

  <!-- Delete Confirmation Modal -->
  <!-- Delete Confirmation Modal -->
  <div id="delete-modal"
    class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm flex items-center justify-center z-50">
    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 border border-white/20 max-w-md mx-4 animate-bounce-in">
      <div class="text-center">
        <div
          class="w-16 h-16 bg-gradient-to-r from-red-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4">
          <i class="fas fa-exclamation-triangle text-white text-2xl"></i>
        </div>
        <h3 class="text-xl font-bold text-white mb-4">Konfirmasi Hapus</h3>
        <p class="text-white/70 mb-6">Apakah Anda yakin ingin menghapus barang ini? Tindakan ini tidak dapat dibatalkan.
        </p>
        <div class="flex space-x-4">
          <button onclick="closeDeleteModal()"
            class="flex-1 px-4 py-2 bg-white/10 text-white border border-white/20 rounded-lg hover:bg-white/20 transition duration-200">
            Batal
          </button>
          <button onclick="confirmDelete()"
            class="flex-1 px-4 py-2 bg-gradient-to-r from-red-500 to-pink-500 text-white rounded-lg hover:opacity-90 transition duration-200">
            Hapus
          </button>
        </div>
      </div>
    </div>
  </div>

  <script>
  // Fungsi untuk menampilkan modal
  function showDeleteModal() {
    document.getElementById('delete-modal').classList.remove('hidden');
  }

  // Fungsi untuk menutup modal
  function closeDeleteModal() {
    document.getElementById('delete-modal').classList.add('hidden');
  }

  // Fungsi untuk konfirmasi penghapusan
  function confirmDelete() {
    // Tambahkan logika penghapusan disini
    console.log('Item dihapus');
    // Tutup modal setelah penghapusan
    closeDeleteModal();
    // Tampilkan notifikasi atau lakukan aksi lain
    alert('Item berhasil dihapus');
  }
  </script>