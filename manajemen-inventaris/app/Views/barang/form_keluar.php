<!DOCTYPE html>
<html lang="en">

<head>
  <title>Barang Keluar | Inventory System</title>
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
          danger: {
            50: '#fef2f2',
            100: '#fee2e2',
            200: '#fecaca',
            300: '#fca5a5',
            400: '#f87171',
            500: '#ef4444',
            600: '#dc2626',
            700: '#b91c1c',
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

  .animate-bounce-slow {
    animation: bounce 3s infinite;
  }

  @keyframes bounce {

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
  <div class="container mx-auto px-4 py-8 max-w-4xl">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
      <div>
        <h1 class="text-3xl font-bold text-gray-800 flex items-center">
          <i class="fas fa-arrow-up-from-bracket text-danger-600 mr-3 animate-bounce-slow"></i>
          Barang Keluar
        </h1>
        <p class="text-gray-600 mt-2">Keluar stok barang dari inventory</p>
      </div>
      <a href="/barang"
        class="mt-4 md:mt-0 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
        <i class="fas fa-arrow-left mr-2"></i> Kembali
      </a>
    </div>

    <!-- Success Message -->
    <?php if(session()->getFlashdata('success')): ?>
    <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg flex items-start">
      <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
      <div>
        <p class="font-medium"><?= session()->getFlashdata('success') ?></p>
      </div>
    </div>
    <?php endif; ?>

    <!-- Form Section -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-10 border border-gray-200">
      <div class="bg-gradient-to-r from-danger-500 to-danger-600 px-6 py-4">
        <h2 class="text-xl font-semibold text-white flex items-center">
          <i class="fas fa-minus-circle mr-2"></i>
          Form Barang Keluar
        </h2>
      </div>

      <div class="p-6">
        <form action="<?= base_url('barang/proses_keluar') ?>" method="post" class="space-y-5">
          <div>
            <label for="id_barang" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
              <i class="fas fa-boxes text-danger-600 mr-2"></i>
              Pilih Barang
              <span class="text-red-500 ml-1">*</span>
            </label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
              </div>
              <select name="id_barang" id="id_barang" required
                class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-danger-500 focus:border-danger-500 bg-white">
                <?php foreach($barang as $b): ?>
                <option value="<?= $b['id'] ?>"><?= $b['nama_barang'] ?> (Stok: <?= $b['stok'] ?>)</option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div>
            <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-2 flex items-center">
              <i class="fas fa-layer-group text-danger-600 mr-2"></i>
              Jumlah Keluar
              <span class="text-red-500 ml-1">*</span>
            </label>
            <div class="relative">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-hashtag text-gray-400"></i>
              </div>
              <input type="number" name="jumlah" id="jumlah" min="1" required
                class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-danger-500 focus:border-danger-500"
                placeholder="Masukkan jumlah">
            </div>
          </div>

          <div class="pt-2">
            <button type="submit"
              class="w-full md:w-auto flex justify-center items-center px-6 py-3 border border-transparent rounded-lg shadow-sm text-white bg-gradient-to-r from-danger-500 to-danger-600 hover:from-danger-600 hover:to-danger-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-danger-500 font-medium transition duration-150 ease-in-out">
              <i class="fas fa-truck-arrow-right mr-2"></i> Proses Barang Keluar
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
          Riwayat Barang Keluar
        </h3>
      </div>

      <div class="p-4 md:p-6">
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  <div class="flex items-center">
                    <i class="fas fa-barcode mr-2"></i> ID Barang
                  </div>
                </th>
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
              <?php foreach($keluar as $k): ?>
              <tr class="hover:bg-gray-50 transition duration-150">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <?= $k['id_barang'] ?>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="text-sm font-medium text-gray-900"><?= $k['nama_barang'] ?></div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  <span
                    class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    -<?= $k['jumlah'] ?>
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  <?= date('d M Y H:i', strtotime($k['tanggal'])) ?>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Floating Action Button -->
  <div class="fixed bottom-6 right-6">
    <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
      class="p-4 bg-danger-600 text-white rounded-full shadow-lg hover:bg-danger-700 transition duration-300 transform hover:scale-110 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-danger-500">
      <i class="fas fa-arrow-up"></i>
    </button>
  </div>
</body>

</html>