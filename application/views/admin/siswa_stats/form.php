<div class="mb-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800"><?= $title ?></h1>
        <a href="<?= base_url('admin/siswa_stats') ?>" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>
</div>

<div class="bg-white rounded-lg shadow-lg p-8">
    <?= form_open(current_url()) ?>
        
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="kelas">
                Kelas <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   name="kelas" 
                   id="kelas" 
                   value="<?= isset($siswa) ? $siswa->kelas : set_value('kelas') ?>"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Contoh: X IPA 1, XI IPS 2"
                   required>
            <?= form_error('kelas', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="jumlah">
                Jumlah Siswa <span class="text-red-500">*</span>
            </label>
            <input type="number" 
                   name="jumlah" 
                   id="jumlah" 
                   value="<?= isset($siswa) ? $siswa->jumlah : set_value('jumlah') ?>"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Masukkan jumlah siswa"
                   required>
            <?= form_error('jumlah', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="tahun_ajaran">
                Tahun Ajaran <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   name="tahun_ajaran" 
                   id="tahun_ajaran" 
                   value="<?= isset($siswa) ? $siswa->tahun_ajaran : set_value('tahun_ajaran', date('Y') . '/' . (date('Y')+1)) ?>"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Contoh: 2025/2026"
                   required>
            <?= form_error('tahun_ajaran', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
        </div>

        <div class="flex space-x-4">
            <button type="submit" 
                    class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-save mr-2"></i>Simpan
            </button>
            <a href="<?= base_url('admin/siswa_stats') ?>" 
               class="bg-gray-300 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-400 transition">
                <i class="fas fa-times mr-2"></i>Batal
            </a>
        </div>

    <?= form_close() ?>
</div>
