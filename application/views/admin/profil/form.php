<div class="mb-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800"><?= $title ?></h1>
        <a href="<?= base_url('admin/dashboard') ?>" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali ke Dashboard
        </a>
    </div>
</div>

<?php if($this->session->flashdata('success')): ?>
    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg alert-dismissible">
        <?= $this->session->flashdata('success') ?>
    </div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow-lg p-8">
    <?= form_open_multipart(current_url()) ?>
        
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="judul">
                Judul <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   name="judul" 
                   id="judul" 
                   value="<?= $profil ? $profil->judul : set_value('judul') ?>"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Masukkan judul"
                   required>
            <?= form_error('judul', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="konten">
                Konten <span class="text-red-500">*</span>
            </label>
            <textarea name="konten" 
                      id="konten" 
                      rows="15"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                      placeholder="Masukkan konten (bisa menggunakan HTML)"
                      required><?= $profil ? $profil->konten : set_value('konten') ?></textarea>
            <?= form_error('konten', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
            <p class="text-gray-500 text-xs mt-1">Gunakan HTML untuk formatting (h3, p, ul, li, strong, em, dll)</p>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="gambar">
                Gambar (Optional)
            </label>
            <input type="file" 
                   name="gambar" 
                   id="gambar" 
                   accept="image/*"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   onchange="previewImage(this, 'preview')">
            <p class="text-gray-500 text-xs mt-1">Format: JPG, JPEG, PNG, GIF. Maksimal 2MB</p>
            
            <?php if($profil && $profil->gambar): ?>
                <div class="mt-4">
                    <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                    <img src="<?= base_url('assets/uploads/profil/' . $profil->gambar) ?>" 
                         alt="Current" 
                         class="h-32 rounded-lg shadow">
                </div>
            <?php endif; ?>
            
            <img id="preview" src="#" alt="Preview" class="hidden mt-4 h-32 rounded-lg shadow">
        </div>

        <div class="flex space-x-4">
            <button type="submit" 
                    class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-save mr-2"></i>Simpan
            </button>
        </div>

    <?= form_close() ?>
</div>

<script src="<?= base_url('assets/js/custom.js') ?>"></script>
