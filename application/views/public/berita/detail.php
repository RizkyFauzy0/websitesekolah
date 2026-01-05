<div class="bg-blue-900 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold"><?= $berita->judul ?></h1>
        <div class="flex items-center mt-4 text-blue-200">
            <i class="far fa-calendar mr-2"></i>
            <span><?= date('d F Y', strtotime($berita->tanggal)) ?></span>
            <span class="mx-3">•</span>
            <i class="far fa-eye mr-2"></i>
            <span><?= $berita->views ?> views</span>
            <?php if($berita->penulis): ?>
                <span class="mx-3">•</span>
                <i class="far fa-user mr-2"></i>
                <span><?= $berita->penulis ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2">
            <article class="bg-white rounded-lg shadow-lg p-8">
                <?php if($berita->gambar): ?>
                <div class="mb-6">
                    <img src="<?= base_url('assets/uploads/berita/' . $berita->gambar) ?>" 
                         alt="<?= $berita->judul ?>" 
                         class="w-full rounded-lg">
                </div>
                <?php endif; ?>

                <div class="prose max-w-none">
                    <?= $berita->konten ?>
                </div>

                <div class="mt-8 pt-8 border-t">
                    <a href="<?= base_url('berita') ?>" 
                       class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Berita
                    </a>
                </div>
            </article>
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-lg p-6 sticky top-24">
                <h3 class="text-xl font-bold mb-4">Berita Terbaru</h3>
                <div class="space-y-4">
                    <?php if(!empty($recent_news)): ?>
                        <?php foreach($recent_news as $news): ?>
                        <?php if($news->id != $berita->id): ?>
                        <div class="border-b pb-4">
                            <h4 class="font-semibold mb-2 hover:text-blue-600 transition">
                                <a href="<?= base_url('berita/' . $news->slug) ?>">
                                    <?= character_limiter($news->judul, 60) ?>
                                </a>
                            </h4>
                            <div class="text-sm text-gray-500">
                                <i class="far fa-calendar mr-1"></i>
                                <?= date('d M Y', strtotime($news->tanggal)) ?>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
