
    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-16">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- About -->
                <div>
                    <h3 class="text-xl font-bold mb-4"><?= isset($settings) ? $settings->nama_sekolah : 'Sekolah' ?></h3>
                    <?php if(isset($settings) && $settings->deskripsi): ?>
                        <p class="text-gray-400 text-sm"><?= character_limiter(strip_tags($settings->deskripsi), 150) ?></p>
                    <?php endif; ?>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Menu Cepat</h3>
                    <ul class="space-y-2 text-gray-400 text-sm">
                        <li><a href="<?= base_url('profil/visi_misi') ?>" class="hover:text-white transition">Visi Misi</a></li>
                        <li><a href="<?= base_url('berita') ?>" class="hover:text-white transition">Berita</a></li>
                        <li><a href="<?= base_url('galeri/foto') ?>" class="hover:text-white transition">Galeri</a></li>
                        <li><a href="<?= base_url('download') ?>" class="hover:text-white transition">Download</a></li>
                        <li><a href="<?= base_url('kontak') ?>" class="hover:text-white transition">Kontak</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-xl font-bold mb-4">Kontak Kami</h3>
                    <ul class="space-y-3 text-gray-400 text-sm">
                        <?php if(isset($kontak) && $kontak->alamat): ?>
                            <li class="flex items-start">
                                <i class="fas fa-map-marker-alt mt-1 mr-3"></i>
                                <span><?= $kontak->alamat ?></span>
                            </li>
                        <?php endif; ?>
                        <?php if(isset($kontak) && $kontak->telepon): ?>
                            <li class="flex items-center">
                                <i class="fas fa-phone mr-3"></i>
                                <span><?= $kontak->telepon ?></span>
                            </li>
                        <?php endif; ?>
                        <?php if(isset($kontak) && $kontak->email): ?>
                            <li class="flex items-center">
                                <i class="fas fa-envelope mr-3"></i>
                                <span><?= $kontak->email ?></span>
                            </li>
                        <?php endif; ?>
                    </ul>
                    
                    <?php if(isset($kontak) && ($kontak->facebook || $kontak->instagram || $kontak->twitter || $kontak->youtube)): ?>
                        <div class="flex space-x-4 mt-4">
                            <?php if($kontak->facebook): ?>
                                <a href="<?= $kontak->facebook ?>" target="_blank" class="text-gray-400 hover:text-white transition">
                                    <i class="fab fa-facebook text-xl"></i>
                                </a>
                            <?php endif; ?>
                            <?php if($kontak->instagram): ?>
                                <a href="<?= $kontak->instagram ?>" target="_blank" class="text-gray-400 hover:text-white transition">
                                    <i class="fab fa-instagram text-xl"></i>
                                </a>
                            <?php endif; ?>
                            <?php if($kontak->twitter): ?>
                                <a href="<?= $kontak->twitter ?>" target="_blank" class="text-gray-400 hover:text-white transition">
                                    <i class="fab fa-twitter text-xl"></i>
                                </a>
                            <?php endif; ?>
                            <?php if($kontak->youtube): ?>
                                <a href="<?= $kontak->youtube ?>" target="_blank" class="text-gray-400 hover:text-white transition">
                                    <i class="fab fa-youtube text-xl"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400 text-sm">
                <p>&copy; <?= date('Y') ?> <?= isset($settings) ? $settings->nama_sekolah : 'Sekolah' ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileMenu = document.getElementById('mobileMenu');

        mobileMenuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Toggle Mobile Submenu
        function toggleMobileSubmenu(id) {
            const submenu = document.getElementById(id);
            submenu.classList.toggle('hidden');
        }
    </script>
</body>
</html>
