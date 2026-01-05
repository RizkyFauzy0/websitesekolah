<div class="mb-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800"><?= $title ?></h1>
        <a href="<?= base_url('admin/slider') ?>" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>
</div>

<?php if(isset($error)): ?>
    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
        <?= $error ?>
    </div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow-lg p-8">
    <?= form_open_multipart(current_url()) ?>
        
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="judul">
                Judul Slider
            </label>
            <input type="text" 
                   name="judul" 
                   id="judul" 
                   value="<?= isset($slider) ? $slider->judul : set_value('judul') ?>"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Masukkan judul slider">
            <?= form_error('judul', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="deskripsi">
                Deskripsi
            </label>
            <textarea name="deskripsi" 
                      id="deskripsi" 
                      rows="4"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                      placeholder="Masukkan deskripsi slider"><?= isset($slider) ? $slider->deskripsi : set_value('deskripsi') ?></textarea>
            <?= form_error('deskripsi', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="gambar">
                Gambar Slider <?= isset($slider) ? '(Biarkan kosong jika tidak ingin mengubah)' : '' ?>
            </label>
            <input type="file" 
                   name="gambar" 
                   id="gambar" 
                   accept="image/*"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   onchange="previewImage(this, 'preview')">
            <p class="text-gray-500 text-xs mt-1">Format: JPG, JPEG, PNG, GIF. Maksimal 2MB</p>
            
            <?php if(isset($slider) && $slider->gambar): ?>
                <div class="mt-4">
                    <p class="text-sm text-gray-600 mb-2">Gambar saat ini:</p>
                    <img src="<?= base_url('assets/uploads/slider/' . $slider->gambar) ?>" 
                         alt="Current" 
                         class="h-32 rounded-lg shadow">
                </div>
            <?php endif; ?>
            
            <img id="preview" src="#" alt="Preview" class="hidden mt-4 h-32 rounded-lg shadow">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="urutan">
                    Urutan <span class="text-red-500">*</span>
                </label>
                <input type="number" 
                       name="urutan" 
                       id="urutan" 
                       value="<?= isset($slider) ? $slider->urutan : set_value('urutan', 0) ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
                <?= form_error('urutan', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2">
                    Status
                </label>
                <div class="flex items-center h-full">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" 
                               name="is_active" 
                               value="1" 
                               <?= isset($slider) && $slider->is_active ? 'checked' : '' ?>
                               class="form-checkbox h-5 w-5 text-blue-600">
                        <span class="ml-2 text-gray-700">Aktifkan Slider</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex space-x-4">
            <button type="submit" 
                    class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-save mr-2"></i>Simpan
            </button>
            <a href="<?= base_url('admin/slider') ?>" 
               class="bg-gray-300 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-400 transition">
                <i class="fas fa-times mr-2"></i>Batal
            </a>
        </div>

    <?= form_close() ?>
</div>

<script src="<?= base_url('assets/js/custom.js') ?>"></script>
