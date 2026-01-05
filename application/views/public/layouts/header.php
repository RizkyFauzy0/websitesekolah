<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' - ' : '' ?><?= isset($settings) ? $settings->nama_sekolah : 'Website Sekolah' ?></title>
    <meta name="description" content="<?= isset($settings) && $settings->meta_description ? $settings->meta_description : 'Website Resmi Sekolah' ?>">
    <meta name="keywords" content="<?= isset($settings) && $settings->meta_keywords ? $settings->meta_keywords : 'sekolah, pendidikan' ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Top Bar -->
    <div class="bg-blue-900 text-white py-2 hidden md:block">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center text-sm">
                <div class="flex items-center space-x-4">
                    <?php if(isset($kontak) && $kontak->email): ?>
                        <span><i class="fas fa-envelope mr-2"></i><?= $kontak->email ?></span>
                    <?php endif; ?>
                    <?php if(isset($kontak) && $kontak->telepon): ?>
                        <span><i class="fas fa-phone mr-2"></i><?= $kontak->telepon ?></span>
                    <?php endif; ?>
                </div>
                <div class="flex items-center space-x-3">
                    <?php if(isset($kontak) && $kontak->facebook): ?>
                        <a href="<?= $kontak->facebook ?>" target="_blank" class="hover:text-blue-300"><i class="fab fa-facebook"></i></a>
                    <?php endif; ?>
                    <?php if(isset($kontak) && $kontak->instagram): ?>
                        <a href="<?= $kontak->instagram ?>" target="_blank" class="hover:text-blue-300"><i class="fab fa-instagram"></i></a>
                    <?php endif; ?>
                    <?php if(isset($kontak) && $kontak->twitter): ?>
                        <a href="<?= $kontak->twitter ?>" target="_blank" class="hover:text-blue-300"><i class="fab fa-twitter"></i></a>
                    <?php endif; ?>
                    <?php if(isset($kontak) && $kontak->youtube): ?>
                        <a href="<?= $kontak->youtube ?>" target="_blank" class="hover:text-blue-300"><i class="fab fa-youtube"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <?php if(isset($settings) && $settings->logo): ?>
                        <img src="<?= base_url('assets/uploads/' . $settings->logo) ?>" alt="Logo" class="h-12">
                    <?php endif; ?>
                    <div>
                        <h1 class="text-xl font-bold text-blue-900"><?= isset($settings) ? $settings->nama_sekolah : 'Sekolah' ?></h1>
                        <?php if(isset($settings) && $settings->tagline): ?>
                            <p class="text-xs text-gray-600"><?= $settings->tagline ?></p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden lg:flex items-center space-x-1">
                    <a href="<?= base_url() ?>" class="px-4 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Dashboard</a>
                    
                    <!-- Profil Dropdown -->
                    <div class="relative group">
                        <button class="px-4 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition flex items-center">
                            Profil <i class="fas fa-chevron-down ml-2 text-xs"></i>
                        </button>
                        <div class="hidden group-hover:block absolute left-0 mt-1 w-56 bg-white rounded-lg shadow-xl py-2">
                            <a href="<?= base_url('profil/visi_misi') ?>" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">Visi Misi</a>
                            <a href="<?= base_url('profil/sejarah') ?>" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">Sejarah Singkat</a>
                            <a href="<?= base_url('profil/struktur_organisasi') ?>" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">Struktur Organisasi</a>
                            <a href="<?= base_url('profil/keunggulan') ?>" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">Keunggulan</a>
                        </div>
                    </div>

                    <a href="<?= base_url('berita') ?>" class="px-4 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Berita</a>
                    
                    <!-- Galeri Dropdown -->
                    <div class="relative group">
                        <button class="px-4 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition flex items-center">
                            Galeri <i class="fas fa-chevron-down ml-2 text-xs"></i>
                        </button>
                        <div class="hidden group-hover:block absolute left-0 mt-1 w-40 bg-white rounded-lg shadow-xl py-2">
                            <a href="<?= base_url('galeri/foto') ?>" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">Foto</a>
                            <a href="<?= base_url('galeri/video') ?>" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">Video</a>
                        </div>
                    </div>

                    <!-- Prestasi Dropdown -->
                    <div class="relative group">
                        <button class="px-4 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition flex items-center">
                            Prestasi <i class="fas fa-chevron-down ml-2 text-xs"></i>
                        </button>
                        <div class="hidden group-hover:block absolute left-0 mt-1 w-56 bg-white rounded-lg shadow-xl py-2">
                            <a href="<?= base_url('prestasi/siswa') ?>" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">Prestasi Siswa</a>
                            <a href="<?= base_url('prestasi/guru') ?>" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">Prestasi Guru</a>
                            <a href="<?= base_url('prestasi/sekolah') ?>" class="block px-4 py-2 text-gray-700 hover:bg-blue-50">Prestasi Sekolah</a>
                        </div>
                    </div>

                    <a href="<?= base_url('download') ?>" class="px-4 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Download</a>
                    <a href="<?= base_url('link-aplikasi') ?>" class="px-4 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Link Aplikasi</a>
                    <a href="<?= base_url('kontak') ?>" class="px-4 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">Kontak</a>
                </div>

                <!-- Mobile Menu Button -->
                <button id="mobileMenuToggle" class="lg:hidden text-gray-700 hover:text-blue-600">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="lg:hidden hidden pb-4">
                <div class="space-y-2">
                    <a href="<?= base_url() ?>" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded">Dashboard</a>
                    
                    <div>
                        <button class="w-full text-left px-4 py-2 text-gray-700 hover:bg-blue-50 rounded flex justify-between items-center" onclick="toggleMobileSubmenu('profilMenu')">
                            Profil <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div id="profilMenu" class="hidden pl-4 space-y-1 mt-1">
                            <a href="<?= base_url('profil/visi_misi') ?>" class="block px-4 py-2 text-gray-600 hover:bg-blue-50 rounded text-sm">Visi Misi</a>
                            <a href="<?= base_url('profil/sejarah') ?>" class="block px-4 py-2 text-gray-600 hover:bg-blue-50 rounded text-sm">Sejarah Singkat</a>
                            <a href="<?= base_url('profil/struktur_organisasi') ?>" class="block px-4 py-2 text-gray-600 hover:bg-blue-50 rounded text-sm">Struktur Organisasi</a>
                            <a href="<?= base_url('profil/keunggulan') ?>" class="block px-4 py-2 text-gray-600 hover:bg-blue-50 rounded text-sm">Keunggulan</a>
                        </div>
                    </div>

                    <a href="<?= base_url('berita') ?>" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded">Berita</a>
                    
                    <div>
                        <button class="w-full text-left px-4 py-2 text-gray-700 hover:bg-blue-50 rounded flex justify-between items-center" onclick="toggleMobileSubmenu('galeriMenu')">
                            Galeri <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div id="galeriMenu" class="hidden pl-4 space-y-1 mt-1">
                            <a href="<?= base_url('galeri/foto') ?>" class="block px-4 py-2 text-gray-600 hover:bg-blue-50 rounded text-sm">Foto</a>
                            <a href="<?= base_url('galeri/video') ?>" class="block px-4 py-2 text-gray-600 hover:bg-blue-50 rounded text-sm">Video</a>
                        </div>
                    </div>

                    <div>
                        <button class="w-full text-left px-4 py-2 text-gray-700 hover:bg-blue-50 rounded flex justify-between items-center" onclick="toggleMobileSubmenu('prestasiMenu')">
                            Prestasi <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div id="prestasiMenu" class="hidden pl-4 space-y-1 mt-1">
                            <a href="<?= base_url('prestasi/siswa') ?>" class="block px-4 py-2 text-gray-600 hover:bg-blue-50 rounded text-sm">Prestasi Siswa</a>
                            <a href="<?= base_url('prestasi/guru') ?>" class="block px-4 py-2 text-gray-600 hover:bg-blue-50 rounded text-sm">Prestasi Guru</a>
                            <a href="<?= base_url('prestasi/sekolah') ?>" class="block px-4 py-2 text-gray-600 hover:bg-blue-50 rounded text-sm">Prestasi Sekolah</a>
                        </div>
                    </div>

                    <a href="<?= base_url('download') ?>" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded">Download</a>
                    <a href="<?= base_url('link-aplikasi') ?>" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded">Link Aplikasi</a>
                    <a href="<?= base_url('kontak') ?>" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 rounded">Kontak</a>
                </div>
            </div>
        </div>
    </nav>
