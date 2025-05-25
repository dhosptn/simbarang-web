<!DOCTYPE html>
<html lang="en">

<head>
  <title>Barang Masuk | Inventory System</title>
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
            50: '#f0f9ff',
            100: '#e0f2fe',
            200: '#bae6fd',
            300: '#7dd3fc',
            400: '#38bdf8',
            500: '#0ea5e9',
            600: '#0284c7',
            700: '#0369a1',
          },
          success: {
            50: '#f0fdf4',
            100: '#dcfce7',
            200: '#bbf7d0',
            300: '#86efac',
            400: '#4ade80',
            500: '#22c55e',
            600: '#16a34a',
            700: '#15803d',
          },
          gray: {
            50: '#f9fafb',
            100: '#f3f4f6',
            200: '#e5e7eb',
            300: '#d1d5db',
            400: '#9ca3af',
            500: '#6b7280',
            600: '#4b5563',
            700: '#374151',
          }
        },
        fontFamily: {
          sans: ['Inter', 'sans-serif'],
        },
      }
    }
  }
  </script>
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

  body {
    font-family: 'Inter', sans-serif;
    background-color: #f3f4f6;
  }

  .animate-pulse-slow {
    animation: pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite;
  }

  @keyframes pulse {

    0%,
    100% {
      opacity: 1;
    }

    50% {
      opacity: 0.8;
    }
  }
  </style>
</head>

<body class="min-h-screen">
  <div class="container mx-auto px-4 py-8 max-w-4xl">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
      <div>
        <h1 class="text-3xl font-bold text-gray-800 flex items-center">
          <i class="fas fa-arrow-down-to-bracket text-primary-600 mr-3"></i>
          Barang Masuk
        </h1>
        <p class="text-gray-600 mt-2">Kelola stok barang masuk ke inventory</p>
      </div>
      <a href="/barang"
        class="mt-4 md:mt-0 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
      </a>
    </div>

    <!-- Form Section -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-10 border border-gray-200">
      <div class="bg-gradient-to-r from-primary-500 to-primary-600 px-6 py-4">
        <h2 class="text-xl font-semibold text-white flex items-center">
          <i class="fas fa-plus-circle mr-2"></i>
          Form Input Barang Masuk
        </h2>
      </div>

      <div class="p-6">
        <form action="/barang/masuk/proses" method="post" class="space-y-5">
          <div>
            <label for="id_barang" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
              <i class="fas fa-boxes text-primary-600 mr-2"></i>
              Pilih Barang
              <span class="text-red-500 ml-1">*</span>
            </label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
              </div>
              <select name="id_barang" id="id_barang" required
                class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500 bg-white">
                <?php foreach ($barang as $b): ?>
                <option value="<?= $b['id'] ?>"><?= $b['nama_barang'] ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div>
            <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
              <i class="fas fa-layer-group text-primary-600 mr-2"></i>
              Jumlah Masuk
              <span class="text-red-500 ml-1">*</span>
            </label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-hashtag text-gray-400"></i>
              </div>
              <input type="number" name="jumlah" id="jumlah" min="1" required
                class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-primary-500 focus:border-primary-500"
                placeholder="Masukkan jumlah">
            </div>
          </div>

          <div class="pt-2">
            <button type="submit"
              class="w-full md:w-auto flex justify-center items-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-white bg-gradient-to-r from-success-500 to-success-600 hover:from-success-600 hover:to-success-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-success-500 font-medium transition duration-150 ease-in-out">
              <i class="fas fa-save mr-2"></i> Simpan Barang Masuk
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- History Section -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
      <div class="bg-gradient-to-r from-gray-700 to-gray-800 px-6 py-4">
        <h3 class="text-xl font-semibold text-white flex items-center">
          <i class="fas fa-clock-rotate-left mr-2"></i>
          Riwayat Barang Masuk
        </h3>
      </div>

      <div class="p-4 md:p-6">
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  <div class="flex items-center">
                    <i class="fas fa-box mr-2"></i> Nama Barang
                  </div>
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  <div class="flex items-center">
                    <i class="fas fa-layer-group mr-2"></i> Jumlah
                  </div>
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  <div class="flex items-center">
                    <i class="fas fa-calendar-day mr-2"></i> Tanggal
                  </div>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <?php if (!empty($masuk)): ?>
              <?php foreach ($masuk as $m): ?>
              <tr class="hover:bg-gray-50 transition duration-150">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div class="flex-shrink-0 h-10 w-10 bg-primary-100 rounded-full flex items-center justify-center">
                      <i class="fas fa-box text-primary-600"></i>
                    </div>
                    <div class="ml-4">
                      <div class="text-sm font-medium text-gray-900"><?= esc($m['nama_barang']) ?></div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span
                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    +<?= esc($m['jumlah']) ?>
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <?= date('d M Y H:i', strtotime($m['tanggal'])) ?>
                </td>
              </tr>
              <?php endforeach; ?>
              <?php else: ?>
              <tr>
                <td colspan="3" class="px-6 py-4 text-center text-gray-500">
                  <div class="flex flex-col items-center justify-center py-8">
                    <i class="fas fa-inbox text-gray-300 text-4xl mb-3"></i>
                    <p class="text-gray-500">Belum ada data barang masuk</p>
                  </div>
                </td>
              </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Floating Action Button -->
  <div class="fixed bottom-6 right-6">
    <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
      class="p-4 bg-primary-600 text-white rounded-full shadow-lg hover:bg-primary-700 transition duration-300 transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
      <i class="fas fa-arrow-up"></i>
    </button>
  </div>
</body>

</html>