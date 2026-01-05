<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800"><?= $title ?></h1>
</div>

<?php if($this->session->flashdata('success')): ?>
    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg alert-dismissible">
        <?= $this->session->flashdata('success') ?>
    </div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow-lg p-8">
    <?= form_open_multipart(current_url()) ?>
        
        <h3 class="text-xl font-bold text-gray-900 mb-4 border-b pb-2">Informasi Umum</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="nama_sekolah">
                    Nama Sekolah <span class="text-red-500">*</span>
                </label>
                <input type="text" 
                       name="nama_sekolah" 
                       id="nama_sekolah" 
                       value="<?= $settings ? $settings->nama_sekolah : '' ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Masukkan nama sekolah"
                       required>
                <?= form_error('nama_sekolah', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="singkatan">
                    Singkatan
                </label>
                <input type="text" 
                       name="singkatan" 
                       id="singkatan" 
                       value="<?= $settings ? $settings->singkatan : '' ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Contoh: SMA 1">
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="tagline">
                Tagline
            </label>
            <input type="text" 
                   name="tagline" 
                   id="tagline" 
                   value="<?= $settings ? $settings->tagline : '' ?>"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Contoh: Mencetak Generasi Unggul">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="deskripsi">
                Deskripsi Singkat
            </label>
            <textarea name="deskripsi" 
                      id="deskripsi" 
                      rows="4"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                      placeholder="Deskripsi tentang sekolah..."><?= $settings ? $settings->deskripsi : '' ?></textarea>
        </div>

        <h3 class="text-xl font-bold text-gray-900 mb-4 mt-8 border-b pb-2">Logo & Icon</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="logo">
                    Logo Sekolah
                </label>
                <input type="file" 
                       name="logo" 
                       id="logo" 
                       accept="image/*"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       onchange="previewImage(this, 'logoPreview')">
                <p class="text-gray-500 text-xs mt-1">Format: PNG, JPG. Maksimal 1MB. Rekomendasi: 200x200px</p>
                
                <?php if($settings && $settings->logo): ?>
                    <div class="mt-4">
                        <p class="text-sm text-gray-600 mb-2">Logo saat ini:</p>
                        <img src="<?= base_url('assets/uploads/' . $settings->logo) ?>" 
                             alt="Logo" 
                             class="h-24 rounded shadow">
                    </div>
                <?php endif; ?>
                
                <img id="logoPreview" src="#" alt="Preview" class="hidden mt-4 h-24 rounded shadow">
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="favicon">
                    Favicon
                </label>
                <input type="file" 
                       name="favicon" 
                       id="favicon" 
                       accept="image/x-icon,image/png,image/gif"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       onchange="previewImage(this, 'faviconPreview')">
                <p class="text-gray-500 text-xs mt-1">Format: ICO, PNG. Maksimal 100KB. Ukuran: 16x16 atau 32x32px</p>
                
                <?php if($settings && $settings->favicon): ?>
                    <div class="mt-4">
                        <p class="text-sm text-gray-600 mb-2">Favicon saat ini:</p>
                        <img src="<?= base_url('assets/uploads/' . $settings->favicon) ?>" 
                             alt="Favicon" 
                             class="h-8 w-8 rounded shadow">
                    </div>
                <?php endif; ?>
                
                <img id="faviconPreview" src="#" alt="Preview" class="hidden mt-4 h-8 w-8 rounded shadow">
            </div>
        </div>

        <h3 class="text-xl font-bold text-gray-900 mb-4 mt-8 border-b pb-2">SEO</h3>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="meta_keywords">
                Meta Keywords
            </label>
            <input type="text" 
                   name="meta_keywords" 
                   id="meta_keywords" 
                   value="<?= $settings ? $settings->meta_keywords : '' ?>"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="sekolah, pendidikan, SMA, Jakarta">
            <p class="text-gray-500 text-xs mt-1">Pisahkan dengan koma</p>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="meta_description">
                Meta Description
            </label>
            <textarea name="meta_description" 
                      id="meta_description" 
                      rows="3"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                      placeholder="Deskripsi singkat untuk search engine..."><?= $settings ? $settings->meta_description : '' ?></textarea>
            <p class="text-gray-500 text-xs mt-1">Maksimal 160 karakter</p>
        </div>

        <div class="flex space-x-4">
            <button type="submit" 
                    class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-save mr-2"></i>Simpan Perubahan
            </button>
        </div>

    <?= form_close() ?>
</div>

<script src="<?= base_url('assets/js/custom.js') ?>"></script>
