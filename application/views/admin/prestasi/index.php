<div class="mb-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800"><?= $title ?></h1>
        <a href="<?= base_url('admin/prestasi/tambah') ?>" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-2"></i>Tambah Prestasi
        </a>
    </div>
</div>

<?php if($this->session->flashdata('success')): ?>
    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg alert-dismissible">
        <?= $this->session->flashdata('success') ?>
    </div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <?php if(!empty($prestasi)): ?>
    <table class="w-full">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Gambar</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Judul</th>
                <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Jenis</th>
                <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Tingkat</th>
                <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Tanggal</th>
                <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <?php foreach($prestasi as $item): ?>
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <?php if($item->gambar): ?>
                    <img src="<?= base_url('assets/uploads/prestasi/' . $item->gambar) ?>" 
                         alt="<?= $item->judul ?>" 
                         class="h-16 w-24 object-cover rounded">
                    <?php else: ?>
                    <div class="h-16 w-24 bg-gray-200 rounded flex items-center justify-center">
                        <i class="fas fa-trophy text-gray-400"></i>
                    </div>
                    <?php endif; ?>
                </td>
                <td class="px-6 py-4">
                    <div class="font-semibold text-gray-900"><?= $item->judul ?></div>
                    <?php if($item->peringkat): ?>
                    <div class="text-sm text-gray-600">Peringkat: <?= $item->peringkat ?></div>
                    <?php endif; ?>
                </td>
                <td class="px-6 py-4 text-center">
                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">
                        <?= ucfirst($item->jenis) ?>
                    </span>
                </td>
                <td class="px-6 py-4 text-center text-sm text-gray-600">
                    <?= ucfirst($item->tingkat) ?>
                </td>
                <td class="px-6 py-4 text-center text-sm text-gray-600">
                    <?= date('d/m/Y', strtotime($item->tanggal)) ?>
                </td>
                <td class="px-6 py-4 text-center">
                    <div class="flex justify-center space-x-2">
                        <a href="<?= base_url('admin/prestasi/edit/' . $item->id) ?>" 
                           class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition text-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?= base_url('admin/prestasi/hapus/' . $item->id) ?>" 
                           onclick="return confirm('Yakin ingin menghapus prestasi ini?')"
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
        <i class="fas fa-trophy text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-500">Belum ada data prestasi</p>
    </div>
    <?php endif; ?>
</div>
