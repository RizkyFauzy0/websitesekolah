<div class="mb-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800"><?= $title ?></h1>
        <a href="<?= base_url('admin/guru/tambah') ?>" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-2"></i>Tambah Guru
        </a>
    </div>
</div>

<?php if($this->session->flashdata('success')): ?>
    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg alert-dismissible">
        <?= $this->session->flashdata('success') ?>
    </div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <?php if(!empty($guru)): ?>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Foto</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Mata Pelajaran</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Urutan</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php foreach($guru as $teacher): ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <?php if($teacher->foto): ?>
                        <img src="<?= base_url('assets/uploads/guru/' . $teacher->foto) ?>" 
                             alt="<?= $teacher->nama ?>" 
                             class="h-16 w-16 object-cover rounded-full">
                        <?php else: ?>
                        <div class="h-16 w-16 bg-gray-200 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4">
                        <div>
                            <div class="font-semibold text-gray-900"><?= $teacher->nama ?></div>
                            <?php if($teacher->nip): ?>
                            <div class="text-sm text-gray-600">NIP: <?= $teacher->nip ?></div>
                            <?php endif; ?>
                            <?php if($teacher->pendidikan): ?>
                            <div class="text-xs text-gray-500"><?= $teacher->pendidikan ?></div>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-600">
                        <?= $teacher->mata_pelajaran ?>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <span class="bg-gray-200 px-3 py-1 rounded-full text-sm"><?= $teacher->urutan ?></span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <?php if($teacher->is_active): ?>
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">Aktif</span>
                        <?php else: ?>
                            <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-semibold">Nonaktif</span>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="<?= base_url('admin/guru/edit/' . $teacher->id) ?>" 
                               class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition text-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('admin/guru/hapus/' . $teacher->id) ?>" 
                               onclick="return confirm('Yakin ingin menghapus data guru ini?')"
                               class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition text-sm">
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
        <i class="fas fa-chalkboard-teacher text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-500">Belum ada data guru</p>
    </div>
    <?php endif; ?>
</div>
