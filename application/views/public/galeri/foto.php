<div class="bg-blue-900 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center"><?= $title ?></h1>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <?php if(!empty($galeri)): ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php foreach($galeri as $item): ?>
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-2">
            <div class="h-48 bg-gray-200 overflow-hidden">
                <img src="<?= base_url('assets/uploads/galeri_foto/' . $item->foto) ?>" 
                     alt="<?= $item->judul ?>" 
                     class="w-full h-full object-cover cursor-pointer"
                     onclick="openLightbox('<?= base_url('assets/uploads/galeri_foto/' . $item->foto) ?>', '<?= addslashes($item->judul) ?>')">
            </div>
            <div class="p-4">
                <h3 class="font-semibold text-gray-900 mb-1"><?= $item->judul ?></h3>
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
        <i class="fas fa-camera text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-500 text-lg">Belum ada foto</p>
    </div>
    <?php endif; ?>
</div>

<!-- Lightbox Modal -->
<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden flex items-center justify-center p-4" onclick="closeLightbox()">
    <button class="absolute top-4 right-4 text-white text-4xl hover:text-gray-300" onclick="closeLightbox()">
        <i class="fas fa-times"></i>
    </button>
    <div class="max-w-4xl w-full">
        <img id="lightboxImg" src="" alt="" class="w-full rounded-lg">
        <p id="lightboxCaption" class="text-white text-center mt-4 text-lg"></p>
    </div>
</div>

<script>
function openLightbox(imgSrc, caption) {
    document.getElementById('lightbox').classList.remove('hidden');
    document.getElementById('lightboxImg').src = imgSrc;
    document.getElementById('lightboxCaption').textContent = caption;
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    document.getElementById('lightbox').classList.add('hidden');
    document.body.style.overflow = 'auto';
}
</script>
