<div class="mb-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800"><?= $title ?></h1>
        <a href="<?= base_url('admin/link_aplikasi/tambah') ?>" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-2"></i>Tambah Link
        </a>
    </div>
</div>

<?php if($this->session->flashdata('success')): ?>
    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg alert-dismissible">
        <?= $this->session->flashdata('success') ?>
    </div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <?php if(!empty($links)): ?>
    <table class="w-full">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Icon</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Nama</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">URL</th>
                <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Urutan</th>
                <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Status</th>
                <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <?php foreach($links as $link): ?>
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <?php if($link->icon): ?>
                    <img src="<?= base_url('assets/uploads/link_aplikasi/' . $link->icon) ?>" 
                         alt="<?= $link->nama ?>" 
                         class="h-12 w-12 object-cover rounded">
                    <?php else: ?>
                    <div class="h-12 w-12 bg-gray-200 rounded flex items-center justify-center">
                        <i class="fas fa-link text-gray-400"></i>
                    </div>
                    <?php endif; ?>
                </td>
                <td class="px-6 py-4">
                    <div class="font-semibold text-gray-900"><?= $link->nama ?></div>
                    <div class="text-sm text-gray-600"><?= character_limiter($link->deskripsi, 60) ?></div>
                </td>
                <td class="px-6 py-4">
                    <a href="<?= $link->url ?>" target="_blank" class="text-blue-600 hover:underline text-sm">
                        <?= character_limiter($link->url, 40) ?> <i class="fas fa-external-link-alt text-xs"></i>
                    </a>
                </td>
                <td class="px-6 py-4 text-center">
                    <span class="bg-gray-200 px-3 py-1 rounded-full text-sm"><?= $link->urutan ?></span>
                </td>
                <td class="px-6 py-4 text-center">
                    <?php if($link->is_active): ?>
                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">Aktif</span>
                    <?php else: ?>
                        <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-semibold">Nonaktif</span>
                    <?php endif; ?>
                </td>
                <td class="px-6 py-4 text-center">
                    <div class="flex justify-center space-x-2">
                        <a href="<?= base_url('admin/link_aplikasi/edit/' . $link->id) ?>" 
                           class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition text-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?= base_url('admin/link_aplikasi/hapus/' . $link->id) ?>" 
                           onclick="return confirm('Yakin ingin menghapus link ini?')"
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
        <i class="fas fa-link text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-500">Belum ada link aplikasi</p>
    </div>
    <?php endif; ?>
</div>
