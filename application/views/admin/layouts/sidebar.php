        <!-- Sidebar -->
        <aside id="sidebar" class="bg-gray-800 text-white w-64 fixed left-0 top-16 bottom-0 overflow-y-auto transition-transform duration-300 transform lg:translate-x-0 -translate-x-full z-40">
            <nav class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="<?= base_url('admin/dashboard') ?>" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    
                    <li class="pt-4 pb-2 px-4 text-gray-400 text-xs uppercase font-semibold">
                        Konten Website
                    </li>
                    
                    <li>
                        <a href="<?= base_url('admin/slider') ?>" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition">
                            <i class="fas fa-images"></i>
                            <span>Slider</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?= base_url('admin/berita') ?>" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition">
                            <i class="fas fa-newspaper"></i>
                            <span>Berita</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?= base_url('admin/guru') ?>" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span>Data Guru</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?= base_url('admin/siswa_stats') ?>" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition">
                            <i class="fas fa-users"></i>
                            <span>Statistik Siswa</span>
                        </a>
                    </li>
                    
                    <li class="pt-4 pb-2 px-4 text-gray-400 text-xs uppercase font-semibold">
                        Profil Sekolah
                    </li>
                    
                    <li>
                        <a href="<?= base_url('admin/profil/visi_misi') ?>" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition">
                            <i class="fas fa-bullseye"></i>
                            <span>Visi Misi</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?= base_url('admin/profil/sejarah') ?>" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition">
                            <i class="fas fa-history"></i>
                            <span>Sejarah</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?= base_url('admin/profil/struktur_organisasi') ?>" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition">
                            <i class="fas fa-sitemap"></i>
                            <span>Struktur Organisasi</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?= base_url('admin/profil/keunggulan') ?>" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition">
                            <i class="fas fa-star"></i>
                            <span>Keunggulan</span>
                        </a>
                    </li>
                    
                    <li class="pt-4 pb-2 px-4 text-gray-400 text-xs uppercase font-semibold">
                        Galeri & Prestasi
                    </li>
                    
                    <li>
                        <a href="<?= base_url('admin/galeri_foto') ?>" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition">
                            <i class="fas fa-camera"></i>
                            <span>Galeri Foto</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?= base_url('admin/galeri_video') ?>" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition">
                            <i class="fas fa-video"></i>
                            <span>Galeri Video</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?= base_url('admin/prestasi') ?>" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition">
                            <i class="fas fa-trophy"></i>
                            <span>Prestasi</span>
                        </a>
                    </li>
                    
                    <li class="pt-4 pb-2 px-4 text-gray-400 text-xs uppercase font-semibold">
                        Lainnya
                    </li>
                    
                    <li>
                        <a href="<?= base_url('admin/downloads') ?>" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition">
                            <i class="fas fa-download"></i>
                            <span>Download</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?= base_url('admin/link_aplikasi') ?>" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition">
                            <i class="fas fa-link"></i>
                            <span>Link Aplikasi</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?= base_url('admin/kontak') ?>" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition">
                            <i class="fas fa-address-book"></i>
                            <span>Kontak</span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?= base_url('admin/settings') ?>" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-gray-700 transition">
                            <i class="fas fa-cog"></i>
                            <span>Pengaturan</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 lg:ml-64 p-6">
