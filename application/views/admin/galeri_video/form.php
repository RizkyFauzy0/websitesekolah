<div class="mb-6">
    <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold text-gray-800"><?= $title ?></h1>
        <a href="<?= base_url('admin/galeri_video') ?>" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
        </a>
    </div>
</div>

<div class="bg-white rounded-lg shadow-lg p-8">
    <?= form_open(current_url()) ?>
        
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="judul">
                Judul Video <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   name="judul" 
                   id="judul" 
                   value="<?= isset($galeri) ? $galeri->judul : set_value('judul') ?>"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Masukkan judul video"
                   required>
            <?= form_error('judul', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="youtube_url">
                URL YouTube <span class="text-red-500">*</span>
            </label>
            <input type="url" 
                   name="youtube_url" 
                   id="youtube_url" 
                   value="<?= isset($galeri) ? $galeri->youtube_url : set_value('youtube_url') ?>"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="https://www.youtube.com/watch?v=xxxxx atau https://youtu.be/xxxxx"
                   required>
            <?= form_error('youtube_url', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
            <p class="text-gray-500 text-xs mt-1">Salin URL video dari YouTube</p>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="deskripsi">
                Deskripsi
            </label>
            <textarea name="deskripsi" 
                      id="deskripsi" 
                      rows="4"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                      placeholder="Masukkan deskripsi video"><?= isset($galeri) ? $galeri->deskripsi : set_value('deskripsi') ?></textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="kategori">
                    Kategori
                </label>
                <input type="text" 
                       name="kategori" 
                       id="kategori" 
                       value="<?= isset($galeri) ? $galeri->kategori : set_value('kategori') ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Contoh: Kegiatan, Tutorial">
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="tanggal">
                    Tanggal <span class="text-red-500">*</span>
                </label>
                <input type="date" 
                       name="tanggal" 
                       id="tanggal" 
                       value="<?= isset($galeri) ? $galeri->tanggal : set_value('tanggal', date('Y-m-d')) ?>"
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
            <a href="<?= base_url('admin/galeri_video') ?>" 
               class="bg-gray-300 text-gray-700 px-8 py-3 rounded-lg hover:bg-gray-400 transition">
                <i class="fas fa-times mr-2"></i>Batal
            </a>
        </div>

    <?= form_close() ?>
</div>
