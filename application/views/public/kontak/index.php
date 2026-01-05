<div class="bg-blue-900 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center"><?= $title ?></h1>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Contact Information -->
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">
                <i class="fas fa-info-circle text-blue-600 mr-2"></i>
                Informasi Kontak
            </h2>
            
            <?php if($kontak_info): ?>
            <div class="space-y-6">
                <?php if($kontak_info->alamat): ?>
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-map-marker-alt text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-1">Alamat</h3>
                        <p class="text-gray-600"><?= $kontak_info->alamat ?></p>
                    </div>
                </div>
                <?php endif; ?>

                <?php if($kontak_info->telepon): ?>
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-phone text-green-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-1">Telepon</h3>
                        <p class="text-gray-600"><?= $kontak_info->telepon ?></p>
                    </div>
                </div>
                <?php endif; ?>

                <?php if($kontak_info->fax): ?>
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-fax text-purple-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-1">Fax</h3>
                        <p class="text-gray-600"><?= $kontak_info->fax ?></p>
                    </div>
                </div>
                <?php endif; ?>

                <?php if($kontak_info->email): ?>
                <div class="flex items-start">
                    <div class="flex-shrink-0 w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mr-4">
                        <i class="fas fa-envelope text-red-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-1">Email</h3>
                        <p class="text-gray-600"><?= $kontak_info->email ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Social Media -->
            <?php if($kontak_info && ($kontak_info->facebook || $kontak_info->instagram || $kontak_info->twitter || $kontak_info->youtube)): ?>
            <div class="mt-8 pt-8 border-t">
                <h3 class="font-semibold text-gray-900 mb-4">Media Sosial</h3>
                <div class="flex space-x-4">
                    <?php if($kontak_info->facebook): ?>
                    <a href="<?= $kontak_info->facebook ?>" 
                       target="_blank"
                       class="w-12 h-12 bg-blue-600 text-white rounded-lg flex items-center justify-center hover:bg-blue-700 transition">
                        <i class="fab fa-facebook text-xl"></i>
                    </a>
                    <?php endif; ?>
                    
                    <?php if($kontak_info->instagram): ?>
                    <a href="<?= $kontak_info->instagram ?>" 
                       target="_blank"
                       class="w-12 h-12 bg-pink-600 text-white rounded-lg flex items-center justify-center hover:bg-pink-700 transition">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <?php endif; ?>
                    
                    <?php if($kontak_info->twitter): ?>
                    <a href="<?= $kontak_info->twitter ?>" 
                       target="_blank"
                       class="w-12 h-12 bg-blue-400 text-white rounded-lg flex items-center justify-center hover:bg-blue-500 transition">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <?php endif; ?>
                    
                    <?php if($kontak_info->youtube): ?>
                    <a href="<?= $kontak_info->youtube ?>" 
                       target="_blank"
                       class="w-12 h-12 bg-red-600 text-white rounded-lg flex items-center justify-center hover:bg-red-700 transition">
                        <i class="fab fa-youtube text-xl"></i>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>
        </div>

        <!-- Map -->
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <h2 class="text-2xl font-bold text-gray-900 p-6 border-b">
                <i class="fas fa-map text-blue-600 mr-2"></i>
                Lokasi Kami
            </h2>
            <?php if($kontak_info && $kontak_info->maps_embed): ?>
            <div class="h-96">
                <?= $kontak_info->maps_embed ?>
            </div>
            <?php else: ?>
            <div class="h-96 bg-gray-200 flex items-center justify-center">
                <p class="text-gray-500">Maps belum tersedia</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
