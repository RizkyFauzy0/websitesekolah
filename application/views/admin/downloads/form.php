<div class="mb-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800"><?= $title ?></h1>
        <a href="<?= base_url('admin/downloads') ?>" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>
</div>

<div class="bg-white rounded-lg shadow-lg p-8">
    <?= form_open_multipart(current_url()) ?>
        
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="judul">
                Judul File <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   name="judul" 
                   id="judul" 
                   value="<?= isset($download) ? $download->judul : set_value('judul') ?>"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Masukkan judul file"
                   required>
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
                      placeholder="Masukkan deskripsi file"><?= isset($download) ? $download->deskripsi : set_value('deskripsi') ?></textarea>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="file">
                File <?= isset($download) ? '(Biarkan kosong jika tidak ingin mengubah)' : '<span class="text-red-500">*</span>' ?>
            </label>
            <input type="file" 
                   name="file" 
                   id="file" 
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   <?= !isset($download) ? 'required' : '' ?>>
            <p class="text-gray-500 text-xs mt-1">Format: PDF, DOC, DOCX, XLS, XLSX, PPT, PPTX, ZIP, RAR. Maksimal 10MB</p>
            
            <?php if(isset($download)): ?>
                <div class="mt-4">
                    <p class="text-sm text-gray-600 mb-2">File saat ini: <strong><?= $download->file ?></strong> (<?= $download->ukuran ?>)</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="kategori">
                Kategori
            </label>
            <input type="text" 
                   name="kategori" 
                   id="kategori" 
                   value="<?= isset($download) ? $download->kategori : set_value('kategori') ?>"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Contoh: Formulir, Dokumen, Panduan">
        </div>

        <div class="flex space-x-4">
            <button type="submit" 
                    class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-save mr-2"></i>Simpan
            </button>
            <a href="<?= base_url('admin/downloads') ?>" 
               class="bg-gray-300 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-400 transition">
                <i class="fas fa-times mr-2"></i>Batal
            </a>
        </div>

    <?= form_close() ?>
</div>
