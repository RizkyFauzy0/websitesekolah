<div class="bg-blue-900 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center"><?= $title ?></h1>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <?php if($profil): ?>
    <div class="bg-white rounded-lg shadow-lg p-8 md:p-12">
        <?php if($profil->gambar): ?>
        <div class="mb-8">
            <img src="<?= base_url('assets/uploads/profil/' . $profil->gambar) ?>" 
                 alt="<?= $profil->judul ?>" 
                 class="w-full max-w-2xl mx-auto rounded-lg shadow-lg">
        </div>
        <?php endif; ?>

        <div class="prose max-w-none">
            <?= $profil->konten ?>
        </div>
    </div>
    <?php else: ?>
    <div class="text-center py-12">
        <p class="text-gray-500 text-lg">Konten belum tersedia</p>
    </div>
    <?php endif; ?>
</div>
