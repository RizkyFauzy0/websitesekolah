<div class="mb-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800"><?= $title ?></h1>
        <a href="<?= base_url('admin/berita/tambah') ?>" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-2"></i>Tambah Berita
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
    <?php if(!empty($berita)): ?>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Gambar</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Judul</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Tanggal</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Views</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php foreach($berita as $news): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <?php if($news->gambar): ?>
                        <img src="<?= base_url('assets/uploads/berita/' . $news->gambar) ?>" 
                             alt="<?= $news->judul ?>" 
                             class="h-16 w-24 object-cover rounded">
                        <?php else: ?>
                        <div class="h-16 w-24 bg-gray-200 rounded flex items-center justify-center">
                            <i class="fas fa-image text-gray-400"></i>
                        </div>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4">
                        <div>
                            <div class="font-semibold text-gray-900"><?= $news->judul ?></div>
                            <div class="text-sm text-gray-600"><?= character_limiter(strip_tags($news->konten), 80) ?></div>
                            <?php if($news->penulis): ?>
                            <div class="text-xs text-gray-500 mt-1">Oleh: <?= $news->penulis ?></div>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center text-sm text-gray-600">
                        <?= date('d/m/Y', strtotime($news->tanggal)) ?>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">
                            <i class="far fa-eye mr-1"></i><?= $news->views ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <?php if($news->is_published): ?>
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">Published</span>
                        <?php else: ?>
                            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-semibold">Draft</span>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="<?= base_url('berita/' . $news->slug) ?>" 
                               target="_blank"
                               class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition text-sm"
                               title="Lihat">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?= base_url('admin/berita/edit/' . $news->id) ?>" 
                               class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition text-sm"
                               title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('admin/berita/hapus/' . $news->id) ?>" 
                               onclick="return confirm('Yakin ingin menghapus berita ini?')"
                               class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition text-sm"
                               title="Hapus">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
    <div class="text-center py-12">
        <i class="fas fa-newspaper text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-500">Belum ada berita</p>
    </div>
    <?php endif; ?>
</div>
