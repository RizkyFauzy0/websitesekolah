<div class="bg-blue-900 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center"><?= $title ?></h1>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <?php if(!empty($prestasi)): ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach($prestasi as $item): ?>
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-2">
            <?php if($item->gambar): ?>
            <div class="h-48 bg-gray-200 overflow-hidden">
                <img src="<?= base_url('assets/uploads/prestasi/' . $item->gambar) ?>" 
                     alt="<?= $item->judul ?>" 
                     class="w-full h-full object-cover">
            </div>
            <?php endif; ?>
            <div class="p-6">
                <div class="flex items-center justify-between mb-3">
                    <span class="bg-yellow-100 text-yellow-800 text-xs font-semibold px-3 py-1 rounded-full">
                        <i class="fas fa-trophy mr-1"></i>
                        <?= ucfirst($item->tingkat) ?>
                    </span>
                    <?php if($item->peringkat): ?>
                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">
                        <?= $item->peringkat ?>
                    </span>
                    <?php endif; ?>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-2"><?= $item->judul ?></h3>
                <?php if($item->deskripsi): ?>
                <p class="text-gray-600 mb-3"><?= character_limiter($item->deskripsi, 100) ?></p>
                <?php endif; ?>
                <p class="text-sm text-gray-500">
                    <i class="far fa-calendar mr-1"></i>
                    <?= date('d M Y', strtotime($item->tanggal)) ?>
                </p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <?php if($pagination): ?>
    <div class="mt-12 flex justify-center">
        <?= $pagination ?>
    </div>
    <?php endif; ?>
    
    <?php else: ?>
    <div class="text-center py-12">
        <i class="fas fa-trophy text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-500 text-lg">Belum ada prestasi</p>
    </div>
    <?php endif; ?>
</div>
