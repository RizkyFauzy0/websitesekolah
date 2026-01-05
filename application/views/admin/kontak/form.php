<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-800"><?= $title ?></h1>
</div>

<?php if($this->session->flashdata('success')): ?>
    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg alert-dismissible">
        <?= $this->session->flashdata('success') ?>
    </div>
<?php endif; ?>

<div class="bg-white rounded-lg shadow-lg p-8">
    <?= form_open(current_url()) ?>
        
        <h3 class="text-xl font-bold text-gray-900 mb-4 border-b pb-2">Informasi Kontak</h3>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="alamat">
                Alamat <span class="text-red-500">*</span>
            </label>
            <textarea name="alamat" 
                      id="alamat" 
                      rows="3"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                      placeholder="Masukkan alamat lengkap sekolah"
                      required><?= $kontak ? $kontak->alamat : '' ?></textarea>
            <?= form_error('alamat', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="telepon">
                    Telepon
                </label>
                <input type="text" 
                       name="telepon" 
                       id="telepon" 
                       value="<?= $kontak ? $kontak->telepon : '' ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="(021) 12345678">
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="fax">
                    Fax
                </label>
                <input type="text" 
                       name="fax" 
                       id="fax" 
                       value="<?= $kontak ? $kontak->fax : '' ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="(021) 12345678">
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="email">
                    Email <span class="text-red-500">*</span>
                </label>
                <input type="email" 
                       name="email" 
                       id="email" 
                       value="<?= $kontak ? $kontak->email : '' ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="info@sekolah.com"
                       required>
                <?= form_error('email', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-semibold mb-2" for="maps_embed">
                Embed Google Maps
            </label>
            <textarea name="maps_embed" 
                      id="maps_embed" 
                      rows="4"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 font-mono text-sm"
                      placeholder='<iframe src="https://www.google.com/maps/embed?pb=..." ></iframe>'><?= $kontak ? $kontak->maps_embed : '' ?></textarea>
            <p class="text-gray-500 text-xs mt-1">Dapatkan kode embed dari Google Maps</p>
        </div>

        <h3 class="text-xl font-bold text-gray-900 mb-4 mt-8 border-b pb-2">Media Sosial</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="facebook">
                    Facebook
                </label>
                <input type="url" 
                       name="facebook" 
                       id="facebook" 
                       value="<?= $kontak ? $kontak->facebook : '' ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="https://facebook.com/...">
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="instagram">
                    Instagram
                </label>
                <input type="url" 
                       name="instagram" 
                       id="instagram" 
                       value="<?= $kontak ? $kontak->instagram : '' ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="https://instagram.com/...">
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="twitter">
                    Twitter
                </label>
                <input type="url" 
                       name="twitter" 
                       id="twitter" 
                       value="<?= $kontak ? $kontak->twitter : '' ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="https://twitter.com/...">
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="youtube">
                    YouTube
                </label>
                <input type="url" 
                       name="youtube" 
                       id="youtube" 
                       value="<?= $kontak ? $kontak->youtube : '' ?>"
                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="https://youtube.com/...">
            </div>
        </div>

        <div class="flex space-x-4">
            <button type="submit" 
                    class="bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition">
                <i class="fas fa-save mr-2"></i>Simpan Perubahan
            </button>
        </div>

    <?= form_close() ?>
</div>
