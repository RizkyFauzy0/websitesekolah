<div class="mb-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800"><?= $title ?></h1>
        <a href="<?= base_url('admin/link_aplikasi') ?>" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>
</div>

<div class="bg-white rounded-lg shadow-lg p-8">
    <?= form_open_multipart(current_url()) ?>
        
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="nama">
                Nama Aplikasi <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   name="nama" 
                   id="nama" 
                   value="<?= isset($link) ? $link->nama : set_value('nama') ?>"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Masukkan nama aplikasi"
                   required>
            <?= form_error('nama', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="url">
                URL Aplikasi <span class="text-red-500">*</span>
            </label>
            <input type="url" 
                   name="url" 
                   id="url" 
                   value="<?= isset($link) ? $link->url : set_value('url') ?>"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="https://..."
                   required>
            <?= form_error('url', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="deskripsi">
                Deskripsi
            </label>
            <textarea name="deskripsi" 
                      id="deskripsi" 
                      rows="3"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                      placeholder="Masukkan deskripsi singkat"><?= isset($link) ? $link->deskripsi : set_value('deskripsi') ?></textarea>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="icon">
                Icon (Optional)
            </label>
            <input type="file" 
                   name="icon" 
                   id="icon" 
                   accept="image/*"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   onchange="previewImage(this, 'preview')">
            <p class="text-gray-500 text-xs mt-1">Format: JPG, JPEG, PNG, GIF. Maksimal 1MB. Ukuran: 64x64px</p>
            
            <?php if(isset($link) && $link->icon): ?>
                <div class="mt-4">
                    <p class="text-sm text-gray-600 mb-2">Icon saat ini:</p>
                    <img src="<?= base_url('assets/uploads/link_aplikasi/' . $link->icon) ?>" 
                         alt="Current" 
                         class="h-16 w-16 rounded-lg shadow">
                </div>
            <?php endif; ?>
            
            <img id="preview" src="#" alt="Preview" class="hidden mt-4 h-16 w-16 rounded-lg shadow">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="urutan">
                    Urutan Tampilan <span class="text-red-500">*</span>
                </label>
                <input type="number" 
                       name="urutan" 
                       id="urutan" 
                       value="<?= isset($link) ? $link->urutan : set_value('urutan', 0) ?>"
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
                               <?= isset($link) && $link->is_active ? 'checked' : 'checked' ?>
                               class="form-checkbox h-5 w-5 text-blue-600">
                        <span class="ml-2 text-gray-700">Tampilkan di website</span>
                    </label>
                </div>
            </div>
        </div>

        <div class="flex space-x-4">
            <button type="submit" 
                    class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-save mr-2"></i>Simpan
            </button>
            <a href="<?= base_url('admin/link_aplikasi') ?>" 
               class="bg-gray-300 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-400 transition">
                <i class="fas fa-times mr-2"></i>Batal
            </a>
        </div>

    <?= form_close() ?>
</div>

<script src="<?= base_url('assets/js/custom.js') ?>"></script>
