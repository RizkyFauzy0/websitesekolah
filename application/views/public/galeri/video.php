<div class="bg-blue-900 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center"><?= $title ?></h1>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <?php if(!empty($galeri)): ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach($galeri as $item): ?>
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition">
            <div class="aspect-video bg-gray-200">
                <iframe 
                    width="100%" 
                    height="100%" 
                    src="https://www.youtube.com/embed/<?= $item->youtube_id ?>" 
                    title="<?= $item->judul ?>"
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    allowfullscreen>
                </iframe>
            </div>
            <div class="p-6">
                <h3 class="font-bold text-gray-900 mb-2"><?= $item->judul ?></h3>
                <?php if($item->deskripsi): ?>
                <p class="text-gray-600 text-sm mb-3"><?= character_limiter($item->deskripsi, 100) ?></p>
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
        <i class="fas fa-video text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-500 text-lg">Belum ada video</p>
    </div>
    <?php endif; ?>
</div>
