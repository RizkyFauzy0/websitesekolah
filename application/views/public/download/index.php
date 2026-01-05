<div class="bg-blue-900 text-white py-16">
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center"><?= $title ?></h1>
    </div>
</div>

<div class="container mx-auto px-4 py-12">
    <?php if(!empty($downloads)): ?>
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <table class="w-full">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-6 py-4 text-left">Nama File</th>
                    <th class="px-6 py-4 text-left hidden md:table-cell">Kategori</th>
                    <th class="px-6 py-4 text-left hidden md:table-cell">Ukuran</th>
                    <th class="px-6 py-4 text-center hidden md:table-cell">Downloads</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php foreach($downloads as $item): ?>
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        <div>
                            <h3 class="font-semibold text-gray-900"><?= $item->judul ?></h3>
                            <?php if($item->deskripsi): ?>
                            <p class="text-sm text-gray-600"><?= character_limiter($item->deskripsi, 80) ?></p>
                            <?php endif; ?>
                            <!-- Mobile info -->
                            <div class="md:hidden text-xs text-gray-500 mt-2">
                                <?= $item->kategori ?> • <?= $item->ukuran ?> • <?= $item->downloads_count ?> downloads
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 hidden md:table-cell">
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">
                            <?= $item->kategori ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 text-gray-600 hidden md:table-cell"><?= $item->ukuran ?></td>
                    <td class="px-6 py-4 text-center text-gray-600 hidden md:table-cell">
                        <i class="fas fa-download mr-1"></i><?= $item->downloads_count ?>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <a href="<?= base_url('download/file/' . $item->id) ?>" 
                           class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition text-sm">
                            <i class="fas fa-download mr-2"></i>Download
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php if($pagination): ?>
    <div class="mt-8 flex justify-center">
        <?= $pagination ?>
    </div>
    <?php endif; ?>
    
    <?php else: ?>
    <div class="text-center py-12">
        <i class="fas fa-download text-6xl text-gray-300 mb-4"></i>
        <p class="text-gray-500 text-lg">Belum ada file untuk didownload</p>
    </div>
    <?php endif; ?>
</div>
