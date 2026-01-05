<div class="mb-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800"><?= $title ?></h1>
        <a href="<?= base_url('admin/galeri_video/tambah') ?>" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-2"></i>Tambah Video
        </a>
    </div>
</div>

<?php if($this->session->flashdata('success')): ?>
    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg alert-dismissible">
        <?= $this->session->flashdata('success') ?>
    </div>
<?php endif; ?>

<?php if($this->session->flashdata('error')): ?>
    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg alert-dismissible">
        <?= $this->session->flashdata('error') ?>
    </div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <?php if(!empty($galeri)): ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
        <?php foreach($galeri as $item): ?>
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition">
            <div class="aspect-video bg-gray-200">
                <iframe width="100%" height="100%" 
                        src="https://www.youtube.com/embed/<?= $item->youtube_id ?>" 
                        frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="p-4">
                <h3 class="font-semibold text-gray-900 mb-1"><?= $item->judul ?></h3>
                <p class="text-sm text-gray-600 mb-2"><?= character_limiter($item->deskripsi, 60) ?></p>
                <p class="text-xs text-gray-500 mb-3"><?= date('d/m/Y', strtotime($item->tanggal)) ?></p>
                <div class="flex space-x-2">
                    <a href="<?= base_url('admin/galeri_video/edit/' . $item->id) ?>" 
                       class="flex-1 bg-yellow-500 text-white px-3 py-2 rounded hover:bg-yellow-600 transition text-sm text-center">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="<?= base_url('admin/galeri_video/hapus/' . $item->id) ?>" 
                       onclick="return confirm('Yakin ingin menghapus video ini?')"
                       class="flex-1 bg-red-500 text-white px-3 py-2 rounded hover:bg-red-600 transition text-sm text-center">
                        <i class="fas fa-trash"></i> Hapus
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="text-center py-12">
        <i class="fas fa-video text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-500">Belum ada video</p>
    </div>
    <?php endif; ?>
</div>
