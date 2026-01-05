<div class="mb-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800"><?= $title ?></h1>
        <a href="<?= base_url('admin/siswa_stats/tambah') ?>" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-plus mr-2"></i>Tambah Data
        </a>
    </div>
</div>

<?php if($this->session->flashdata('success')): ?>
    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg alert-dismissible">
        <?= $this->session->flashdata('success') ?>
    </div>
<?php endif; ?>

<div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-lg shadow-lg p-8 mb-6">
    <div class="text-center">
        <div class="text-5xl font-bold mb-2"><?= $total_siswa ?></div>
        <div class="text-xl">Total Siswa</div>
    </div>
</div>

<div class="bg-white rounded-lg shadow-lg overflow-hidden">
    <?php if(!empty($siswa_stats)): ?>
    <table class="w-full">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase">Kelas</th>
                <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Jumlah Siswa</th>
                <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Tahun Ajaran</th>
                <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <?php foreach($siswa_stats as $stats): ?>
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4">
                    <span class="font-semibold text-gray-900"><?= $stats->kelas ?></span>
                </td>
                <td class="px-6 py-4 text-center">
                    <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full text-lg font-bold"><?= $stats->jumlah ?></span>
                </td>
                <td class="px-6 py-4 text-center text-gray-600">
                    <?= $stats->tahun_ajaran ?>
                </td>
                <td class="px-6 py-4 text-center">
                    <div class="flex justify-center space-x-2">
                        <a href="<?= base_url('admin/siswa_stats/edit/' . $stats->id) ?>" 
                           class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition text-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?= base_url('admin/siswa_stats/hapus/' . $stats->id) ?>" 
                           onclick="return confirm('Yakin ingin menghapus data ini?')"
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
        <i class="fas fa-users text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-500">Belum ada data statistik siswa</p>
    </div>
    <?php endif; ?>
</div>
