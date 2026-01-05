<div class="bg-blue-900 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center"><?= $title ?></h1>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <?php if(!empty($berita)): ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach($berita as $news): ?>
        <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-2">
            <?php if($news->gambar): ?>
            <div class="h-48 bg-gray-200 overflow-hidden">
                <img src="<?= base_url('assets/uploads/berita/' . $news->gambar) ?>" 
                     alt="<?= $news->judul ?>" 
                     class="w-full h-full object-cover">
            </div>
            <?php endif; ?>
            <div class="p-6">
                <div class="flex items-center text-sm text-gray-500 mb-3">
                    <i class="far fa-calendar mr-2"></i>
                    <span><?= date('d M Y', strtotime($news->tanggal)) ?></span>
                    <span class="mx-2">•</span>
                    <i class="far fa-eye mr-2"></i>
                    <span><?= $news->views ?> views</span>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-blue-600 transition">
                    <a href="<?= base_url('berita/' . $news->slug) ?>"><?= $news->judul ?></a>
                </h3>
                <p class="text-gray-600 mb-4"><?= character_limiter(strip_tags($news->konten), 120) ?></p>
                <a href="<?= base_url('berita/' . $news->slug) ?>" 
                   class="inline-block text-blue-600 hover:text-blue-800 font-semibold">
                    Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </article>
        <?php endforeach; ?>
    </div>

    <?php if($pagination): ?>
    <div class="mt-12 flex justify-center">
        <?= $pagination ?>
    </div>
    <?php endif; ?>
    
    <?php else: ?>
    <div class="text-center py-12">
        <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-500 text-lg">Belum ada berita</p>
    </div>
    <?php endif; ?>
</div>
