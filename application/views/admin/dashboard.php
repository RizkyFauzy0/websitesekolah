<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Dashboard</h1>
    <p class="text-gray-600 mt-1">Selamat datang, <?= $user['nama_lengkap'] ?>!</p>
</div>

<?php if($this->session->flashdata('success')): ?>
    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg alert-dismissible">
        <?= $this->session->flashdata('success') ?>
    </div>
<?php endif; ?>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Slider Card -->
    <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-blue-100 text-sm uppercase mb-1">Total Slider</p>
                <h3 class="text-3xl font-bold"><?= $total_slider ?></h3>
            </div>
            <div class="bg-white bg-opacity-30 rounded-full p-4">
                <i class="fas fa-images text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- Berita Card -->
    <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-green-100 text-sm uppercase mb-1">Total Berita</p>
                <h3 class="text-3xl font-bold"><?= $total_berita ?></h3>
            </div>
            <div class="bg-white bg-opacity-30 rounded-full p-4">
                <i class="fas fa-newspaper text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- Guru Card -->
    <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-purple-100 text-sm uppercase mb-1">Total Guru</p>
                <h3 class="text-3xl font-bold"><?= $total_guru ?></h3>
            </div>
            <div class="bg-white bg-opacity-30 rounded-full p-4">
                <i class="fas fa-chalkboard-teacher text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- Siswa Card -->
    <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-orange-100 text-sm uppercase mb-1">Total Siswa</p>
                <h3 class="text-3xl font-bold"><?= $total_siswa ?></h3>
            </div>
            <div class="bg-white bg-opacity-30 rounded-full p-4">
                <i class="fas fa-users text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- Galeri Foto Card -->
    <div class="bg-gradient-to-br from-pink-500 to-pink-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-pink-100 text-sm uppercase mb-1">Galeri Foto</p>
                <h3 class="text-3xl font-bold"><?= $total_galeri_foto ?></h3>
            </div>
            <div class="bg-white bg-opacity-30 rounded-full p-4">
                <i class="fas fa-camera text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- Galeri Video Card -->
    <div class="bg-gradient-to-br from-red-500 to-red-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-red-100 text-sm uppercase mb-1">Galeri Video</p>
                <h3 class="text-3xl font-bold"><?= $total_galeri_video ?></h3>
            </div>
            <div class="bg-white bg-opacity-30 rounded-full p-4">
                <i class="fas fa-video text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- Prestasi Card -->
    <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-yellow-100 text-sm uppercase mb-1">Total Prestasi</p>
                <h3 class="text-3xl font-bold"><?= $total_prestasi ?></h3>
            </div>
            <div class="bg-white bg-opacity-30 rounded-full p-4">
                <i class="fas fa-trophy text-3xl"></i>
            </div>
        </div>
    </div>

    <!-- Downloads Card -->
    <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-lg shadow-lg p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-indigo-100 text-sm uppercase mb-1">File Download</p>
                <h3 class="text-3xl font-bold"><?= $total_downloads ?></h3>
            </div>
            <div class="bg-white bg-opacity-30 rounded-full p-4">
                <i class="fas fa-download text-3xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="bg-white rounded-lg shadow-lg p-6">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Quick Actions</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="<?= base_url('admin/berita/tambah') ?>" class="bg-blue-50 hover:bg-blue-100 border-2 border-blue-200 rounded-lg p-4 text-center transition">
            <i class="fas fa-plus-circle text-3xl text-blue-600 mb-2"></i>
            <p class="text-sm font-semibold text-gray-700">Tambah Berita</p>
        </a>
        <a href="<?= base_url('admin/slider/tambah') ?>" class="bg-green-50 hover:bg-green-100 border-2 border-green-200 rounded-lg p-4 text-center transition">
            <i class="fas fa-image text-3xl text-green-600 mb-2"></i>
            <p class="text-sm font-semibold text-gray-700">Tambah Slider</p>
        </a>
        <a href="<?= base_url('admin/guru/tambah') ?>" class="bg-purple-50 hover:bg-purple-100 border-2 border-purple-200 rounded-lg p-4 text-center transition">
            <i class="fas fa-user-plus text-3xl text-purple-600 mb-2"></i>
            <p class="text-sm font-semibold text-gray-700">Tambah Guru</p>
        </a>
        <a href="<?= base_url('admin/prestasi/tambah') ?>" class="bg-yellow-50 hover:bg-yellow-100 border-2 border-yellow-200 rounded-lg p-4 text-center transition">
            <i class="fas fa-trophy text-3xl text-yellow-600 mb-2"></i>
            <p class="text-sm font-semibold text-gray-700">Tambah Prestasi</p>
        </a>
    </div>
</div>
