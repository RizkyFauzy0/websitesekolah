<div class="mb-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800"><?= $title ?></h1>
        <a href="<?= base_url('admin/downloads/tambah') ?>" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-2"></i>Tambah File
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
    <?php if(!empty($downloads)): ?>
    <table class="w-full">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Judul</th>
                <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Kategori</th>
                <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Ukuran</th>
                <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Downloads</th>
                <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <?php foreach($downloads as $item): ?>
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <div class="font-semibold text-gray-900"><?= $item->judul ?></div>
                    <div class="text-sm text-gray-600"><?= $item->file ?></div>
                </td>
                <td class="px-6 py-4 text-center">
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">
                        <?= $item->kategori ?>
                    </span>
                </td>
                <td class="px-6 py-4 text-center text-sm text-gray-600"><?= $item->ukuran ?></td>
                <td class="px-6 py-4 text-center">
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">
                        <i class="fas fa-download mr-1"></i><?= $item->downloads_count ?>
                    </span>
                </td>
                <td class="px-6 py-4 text-center">
                    <div class="flex justify-center space-x-2">
                        <a href="<?= base_url('admin/downloads/edit/' . $item->id) ?>" 
                           class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition text-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?= base_url('admin/downloads/hapus/' . $item->id) ?>" 
                           onclick="return confirm('Yakin ingin menghapus file ini?')"
                           class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition text-sm">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <div class="text-center py-12">
        <i class="fas fa-download text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-500">Belum ada file</p>
    </div>
    <?php endif; ?>
</div>
