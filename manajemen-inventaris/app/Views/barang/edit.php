<!DOCTYPE html>
<html lang="en">

<head>
  <title>Edit Barang</title>
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
              600: '#2563eb',
              700: '#1d4ed8',
            }
          }
        }
      }
    }
  </script>
</head>

<body class="bg-gray-50 min-h-screen">
  <div class="container mx-auto px-4 py-8 max-w-2xl">
    <!-- Back Button -->
    <div class="mb-6">
      <a href="/barang" class="inline-flex items-center text-gray-600 hover:text-gray-900 transition duration-200">
        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar Barang
      </a>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
      <!-- Card Header -->
      <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-6 py-4">
        <h1 class="text-2xl font-bold text-white">
          <i class="fas fa-edit mr-2"></i> Edit Barang
        </h1>
        <p class="text-primary-100 mt-1">ID: <?= $barang['id'] ?></p>
      </div>

      <!-- Card Body -->
      <div class="p-6">
        <!-- Success Message -->
        <?php if (session()->getFlashdata('success')): ?>
          <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
            <div class="flex items-center">
              <i class="fas fa-check-circle mr-2"></i>
              <p><?= session()->getFlashdata('success') ?></p>
            </div>
          </div>
        <?php endif; ?>

        <!-- Error Messages -->
        <?php if (isset($errors)): ?>
          <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
            <div class="flex items-center">
              <i class="fas fa-exclamation-circle mr-2"></i>
              <h3 class="font-bold">Terdapat kesalahan dalam pengisian form:</h3>
            </div>
            <ul class="mt-2 ml-6 list-disc">
              <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <!-- Form -->
        <form action="/barang/update/<?= $barang['id'] ?>" method="post" class="space-y-6">
          <!-- Nama Barang -->
          <div>
            <label for="nama_barang" class="block text-sm font-medium text-gray-700 mb-1">Nama Barang <span
                class="text-red-500">*</span></label>
            <div class="mt-1 relative rounded-md shadow-sm">
              <input type="text" name="nama_barang" id="nama_barang" value="<?= $barang['nama_barang'] ?>" required
                class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500"
                placeholder="Masukkan nama barang">
            </div>
          </div>

          <!-- Kategori -->
          <div>
            <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori <span
                class="text-red-500">*</span></label>
            <div class="mt-1 relative rounded-md shadow-sm">
              <select name="kategori_id" id="kategori_id" required
                class="block w-full px-4 py-2 border border-gray-300 rounded-md bg-white focus:ring-primary-500 focus:border-primary-500">
                <option value="">-- Pilih Kategori --</option>
                <?php foreach ($kategori as $k): ?>
                  <option value="<?= $k['id'] ?>" <?= old('kategori_id', $barang['kategori_id']) == $k['id'] ? 'selected' : '' ?>>
                    <?= esc($k['nama_kategori']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <!-- Stok -->
          <div>
            <label for="stok" class="block text-sm font-medium text-gray-700 mb-1">Stok <span
                class="text-red-500">*</span></label>
            <div class="mt-1 relative rounded-md shadow-sm">
              <input type="number" name="stok" id="stok" value="<?= $barang['stok'] ?>" required min="0"
                class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500"
                placeholder="Masukkan jumlah stok">
            </div>
          </div>

          <!-- Satuan -->
          <div>
            <label for="satuan" class="block text-sm font-medium text-gray-700 mb-1">Satuan <span
                class="text-red-500">*</span></label>
            <div class="mt-1 relative rounded-md shadow-sm">
              <input type="text" name="satuan" id="satuan" value="<?= $barang['satuan'] ?>" required
                class="block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary-500 focus:border-primary-500"
                placeholder="Masukkan satuan (pcs, kg, etc)">
            </div>
          </div>

          <!-- Lokasi -->
          <div>
            <label for="lokasi_id" class="block text-sm font-medium text-gray-700 mb-1">Lokasi <span
                class="text-red-500">*</span></label>
            <div class="mt-1 relative rounded-md shadow-sm">
              <select name="lokasi_id" id="lokasi_id" required
                class="block w-full px-4 py-2 border border-gray-300 rounded-md bg-white focus:ring-primary-500 focus:border-primary-500">
                <option value="">-- Pilih Lokasi --</option>
                <?php foreach ($lokasi as $l): ?>
                  <option value="<?= $l['id'] ?>" <?= old('lokasi_id', $barang['lokasi_id']) == $l['id'] ? 'selected' : '' ?>>
                    <?= esc($l['nama_lokasi']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>

          <!-- Form Actions -->
          <div class="flex justify-between items-center pt-6 border-t border-gray-200">
            <div class="text-sm text-gray-500">
              Terakhir diupdate: <?= date('d/m/Y H:i') ?>
            </div>
            <div class="flex space-x-3">
              <a href="/barang"
                class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                Batal
              </a>
              <button type="submit"
                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                <i class="fas fa-save mr-2"></i> Update Barang
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>