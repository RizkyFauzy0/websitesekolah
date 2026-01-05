<div class="mb-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800"><?= $title ?></h1>
        <a href="<?= base_url('admin/prestasi') ?>" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>
</div>

<div class="bg-white rounded-lg shadow-lg p-8">
    <?= form_open_multipart(current_url()) ?>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="jenis">
                    Jenis Prestasi <span class="text-red-500">*</span>
                </label>
                <select name="jenis" 
                        id="jenis" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        required>
                    <option value="">Pilih Jenis</option>
                    <option value="siswa" <?= isset($prestasi) && $prestasi->jenis == 'siswa' ? 'selected' : '' ?>>Prestasi Siswa</option>
                    <option value="guru" <?= isset($prestasi) && $prestasi->jenis == 'guru' ? 'selected' : '' ?>>Prestasi Guru</option>
                    <option value="sekolah" <?= isset($prestasi) && $prestasi->jenis == 'sekolah' ? 'selected' : '' ?>>Prestasi Sekolah</option>
                </select>
                <?= form_error('jenis', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="tingkat">
                    Tingkat
                </label>
                <select name="tingkat" 
                        id="tingkat" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih Tingkat</option>
                    <option value="kecamatan" <?= isset($prestasi) && $prestasi->tingkat == 'kecamatan' ? 'selected' : '' ?>>Kecamatan</option>
                    <option value="kabupaten" <?= isset($prestasi) && $prestasi->tingkat == 'kabupaten' ? 'selected' : '' ?>>Kabupaten/Kota</option>
                    <option value="provinsi" <?= isset($prestasi) && $prestasi->tingkat == 'provinsi' ? 'selected' : '' ?>>Provinsi</option>
                    <option value="nasional" <?= isset($prestasi) && $prestasi->tingkat == 'nasional' ? 'selected' : '' ?>>Nasional</option>
                    <option value="internasional" <?= isset($prestasi) && $prestasi->tingkat == 'internasional' ? 'selected' : '' ?>>Internasional</option>
                </select>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="judul">
                Judul Prestasi <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   name="judul" 
                   id="judul" 
                   value="<?= isset($prestasi) ? $prestasi->judul : set_value('judul') ?>"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Masukkan judul prestasi"
                   required>
            <?= form_error('judul', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="deskripsi">
                Deskripsi
            </label>
            <textarea name="deskripsi" 
                      id="deskripsi" 
                      rows="6"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                      placeholder="Masukkan deskripsi prestasi"><?= isset($prestasi) ? $prestasi->deskripsi : set_value('deskripsi') ?></textarea>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="gambar">
                Gambar <?= isset($prestasi) ? '(Biarkan kosong jika tidak ingin mengubah)' : '' ?>
            </label>
            <input type="file" 
                   name="gambar" 
                   id="gambar" 
                   accept="image/*"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   onchange="previewImage(this, 'preview')">
            <p class="text-gray-500 text-xs mt-1">Format: JPG, JPEG, PNG, GIF. Maksimal 2MB</p>
            
            <?php if(isset($prestasi) && $prestasi->gambar): ?>
                <div class="mt-4">
                    <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                    <img src="<?= base_url('assets/uploads/prestasi/' . $prestasi->gambar) ?>" 
                         alt="Current" 
                         class="h-32 rounded-lg shadow">
                </div>
            <?php endif; ?>
            
            <img id="preview" src="#" alt="Preview" class="hidden mt-4 h-32 rounded-lg shadow">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="peringkat">
                    Peringkat/Juara
                </label>
                <input type="text" 
                       name="peringkat" 
                       id="peringkat" 
                       value="<?= isset($prestasi) ? $prestasi->peringkat : set_value('peringkat') ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Contoh: Juara 1, Medali Emas">
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="tanggal">
                    Tanggal <span class="text-red-500">*</span>
                </label>
                <input type="date" 
                       name="tanggal" 
                       id="tanggal" 
                       value="<?= isset($prestasi) ? $prestasi->tanggal : set_value('tanggal', date('Y-m-d')) ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
                <?= form_error('tanggal', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
            </div>
        </div>

        <div class="flex space-x-4">
            <button type="submit" 
                    class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-save mr-2"></i>Simpan
            </button>
            <a href="<?= base_url('admin/prestasi') ?>" 
               class="bg-gray-300 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-400 transition">
                <i class="fas fa-times mr-2"></i>Batal
            </a>
        </div>

    <?= form_close() ?>
</div>

<script src="<?= base_url('assets/js/custom.js') ?>"></script>
