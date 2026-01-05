<div class="bg-blue-900 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center"><?= $title ?></h1>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <?php if(!empty($links)): ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach($links as $link): ?>
        <a href="<?= $link->url ?>" 
           target="_blank"
           class="bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transition transform hover:-translate-y-2">
            <div class="flex items-center space-x-4">
                <?php if($link->icon): ?>
                <div class="flex-shrink-0">
                    <img src="<?= base_url('assets/uploads/link_aplikasi/' . $link->icon) ?>" 
                         alt="<?= $link->nama ?>" 
                         class="w-16 h-16 rounded-lg object-cover">
                </div>
                <?php else: ?>
                <div class="flex-shrink-0 w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-link text-2xl text-blue-600"></i>
                </div>
                <?php endif; ?>
                <div class="flex-1">
                    <h3 class="font-bold text-gray-900 mb-1"><?= $link->nama ?></h3>
                    <?php if($link->deskripsi): ?>
                    <p class="text-sm text-gray-600"><?= character_limiter($link->deskripsi, 60) ?></p>
                    <?php endif; ?>
                </div>
                <div>
                    <i class="fas fa-external-link-alt text-blue-600"></i>
                </div>
            </div>
        </a>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="text-center py-12">
        <i class="fas fa-link text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-500 text-lg">Belum ada link aplikasi</p>
    </div>
    <?php endif; ?>
</div>
