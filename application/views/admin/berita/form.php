<div class="mb-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800"><?= $title ?></h1>
        <a href="<?= base_url('admin/berita') ?>" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>
</div>

<?php if($this->session->flashdata('error')): ?>
    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
        <?= $this->session->flashdata('error') ?>
    </div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow-lg p-8">
    <?= form_open_multipart(current_url()) ?>
        
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="judul">
                Judul Berita <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   name="judul" 
                   id="judul" 
                   value="<?= isset($berita) ? $berita->judul : set_value('judul') ?>"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Masukkan judul berita"
                   required>
            <?= form_error('judul', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
            <p class="text-gray-500 text-xs mt-1">Slug akan dibuat otomatis dari judul</p>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="konten">
                Konten Berita <span class="text-red-500">*</span>
            </label>
            <textarea name="konten" 
                      id="konten" 
                      rows="12"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                      placeholder="Masukkan konten berita..."
                      required><?= isset($berita) ? $berita->konten : set_value('konten') ?></textarea>
            <?= form_error('konten', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
            <p class="text-gray-500 text-xs mt-1">Gunakan HTML untuk formatting (bold, italic, list, dll)</p>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="gambar">
                Gambar Berita <?= isset($berita) ? '(Biarkan kosong jika tidak ingin mengubah)' : '' ?>
            </label>
            <input type="file" 
                   name="gambar" 
                   id="gambar" 
                   accept="image/*"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   onchange="previewImage(this, 'preview')">
            <p class="text-gray-500 text-xs mt-1">Format: JPG, JPEG, PNG, GIF. Maksimal 2MB. Rekomendasi: 1200x630px</p>
            
            <?php if(isset($berita) && $berita->gambar): ?>
                <div class="mt-4">
                    <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                    <img src="<?= base_url('assets/uploads/berita/' . $berita->gambar) ?>" 
                         alt="Current" 
                         class="h-32 rounded-lg shadow">
                </div>
            <?php endif; ?>
            
            <img id="preview" src="#" alt="Preview" class="hidden mt-4 h-32 rounded-lg shadow">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="penulis">
                    Penulis
                </label>
                <input type="text" 
                       name="penulis" 
                       id="penulis" 
                       value="<?= isset($berita) ? $berita->penulis : set_value('penulis', $user['nama_lengkap']) ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Nama penulis">
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="tanggal">
                    Tanggal <span class="text-red-500">*</span>
                </label>
                <input type="date" 
                       name="tanggal" 
                       id="tanggal" 
                       value="<?= isset($berita) ? $berita->tanggal : set_value('tanggal', date('Y-m-d')) ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
                <?= form_error('tanggal', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
            </div>
        </div>

        <div class="mb-6">
            <label class="flex items-center cursor-pointer">
                <input type="checkbox" 
                       name="is_published" 
                       value="1" 
                       <?= isset($berita) && $berita->is_published ? 'checked' : '' ?>
                       class="form-checkbox h-5 w-5 text-blue-600">
                <span class="ml-2 text-gray-700 font-semibold">Publikasikan Berita</span>
            </label>
            <p class="text-gray-500 text-xs mt-1 ml-7">Jika tidak dicentang, berita akan tersimpan sebagai draft</p>
        </div>

        <div class="flex space-x-4">
            <button type="submit" 
                    class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-save mr-2"></i>Simpan Berita
            </button>
            <a href="<?= base_url('admin/berita') ?>" 
               class="bg-gray-300 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-400 transition">
                <i class="fas fa-times mr-2"></i>Batal
            </a>
        </div>

    <?= form_close() ?>
</div>

<script src="<?= base_url('assets/js/custom.js') ?>"></script>
