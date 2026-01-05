<!-- Hero Slider -->
<?php if(!empty($sliders)): ?>
<div class="relative overflow-hidden bg-gray-900" id="heroSlider">
    <div class="slider-container">
        <?php foreach($sliders as $index => $slider): ?>
        <div class="slide <?= $index === 0 ? 'active' : '' ?>" style="background-image: url('<?= base_url('assets/uploads/slider/' . $slider->gambar) ?>');">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div class="container mx-auto px-4 h-full flex items-center relative z-10">
                <div class="text-white max-w-2xl">
                    <?php if($slider->judul): ?>
                        <h2 class="text-4xl md:text-6xl font-bold mb-4 animate-fade-in-up"><?= $slider->judul ?></h2>
                    <?php endif; ?>
                    <?php if($slider->deskripsi): ?>
                        <p class="text-lg md:text-xl mb-6 animate-fade-in-up animation-delay-200"><?= $slider->deskripsi ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <?php if(count($sliders) > 1): ?>
    <!-- Slider Controls -->
    <button class="slider-control prev" onclick="changeSlide(-1)">
        <i class="fas fa-chevron-left"></i>
    </button>
    <button class="slider-control next" onclick="changeSlide(1)">
        <i class="fas fa-chevron-right"></i>
    </button>
    
    <!-- Slider Indicators -->
    <div class="slider-indicators">
        <?php foreach($sliders as $index => $slider): ?>
        <button class="indicator <?= $index === 0 ? 'active' : '' ?>" onclick="goToSlide(<?= $index ?>)"></button>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<style>
    .slider-container {
        position: relative;
        height: 500px;
    }
    .slide {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 1s ease-in-out;
        background-size: cover;
        background-position: center;
    }
    .slide.active {
        opacity: 1;
    }
    .slider-control {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(255,255,255,0.3);
        color: white;
        padding: 1rem;
        border: none;
        cursor: pointer;
        z-index: 20;
        transition: background 0.3s;
    }
    .slider-control:hover {
        background: rgba(255,255,255,0.5);
    }
    .slider-control.prev {
        left: 1rem;
    }
    .slider-control.next {
        right: 1rem;
    }
    .slider-indicators {
        position: absolute;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 0.5rem;
        z-index: 20;
    }
    .indicator {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255,255,255,0.5);
        border: none;
        cursor: pointer;
        transition: background 0.3s;
    }
    .indicator.active {
        background: white;
    }
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out;
    }
    .animation-delay-200 {
        animation-delay: 0.2s;
        opacity: 0;
        animation-fill-mode: forwards;
    }
</style>

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const indicators = document.querySelectorAll('.indicator');
    const totalSlides = slides.length;

    function showSlide(n) {
        slides.forEach(slide => slide.classList.remove('active'));
        indicators.forEach(ind => ind.classList.remove('active'));
        
        currentSlide = (n + totalSlides) % totalSlides;
        slides[currentSlide].classList.add('active');
        indicators[currentSlide].classList.add('active');
    }

    function changeSlide(direction) {
        showSlide(currentSlide + direction);
    }

    function goToSlide(n) {
        showSlide(n);
    }

    // Auto slide every 5 seconds
    <?php if(count($sliders) > 1): ?>
    setInterval(() => {
        changeSlide(1);
    }, 5000);
    <?php endif; ?>
</script>
<?php endif; ?>

<!-- Statistics Section -->
<div class="bg-gradient-to-r from-blue-600 to-indigo-600 py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-center text-white">
            <div class="transform hover:scale-105 transition">
                <div class="text-5xl font-bold mb-2"><?= $total_siswa ?></div>
                <div class="text-blue-100 uppercase tracking-wide">Total Siswa</div>
            </div>
            <div class="transform hover:scale-105 transition">
                <div class="text-5xl font-bold mb-2"><?= count($guru) ?></div>
                <div class="text-blue-100 uppercase tracking-wide">Tenaga Pengajar</div>
            </div>
            <div class="transform hover:scale-105 transition">
                <div class="text-5xl font-bold mb-2">25+</div>
                <div class="text-blue-100 uppercase tracking-wide">Tahun Berpengalaman</div>
            </div>
            <div class="transform hover:scale-105 transition">
                <div class="text-5xl font-bold mb-2">100+</div>
                <div class="text-blue-100 uppercase tracking-wide">Prestasi</div>
            </div>
        </div>
    </div>
</div>

<!-- Latest News Section -->
<?php if(!empty($latest_news)): ?>
<section class="container mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">Berita Terbaru</h2>
        <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach($latest_news as $news): ?>
        <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition transform hover:-translate-y-2">
            <?php if($news->gambar): ?>
            <div class="h-48 bg-gray-200 overflow-hidden">
                <img src="<?= base_url('assets/uploads/berita/' . $news->gambar) ?>" 
                     alt="<?= $news->judul ?>" 
                     class="w-full h-full object-cover">
            </div>
            <?php endif; ?>
            <div class="p-6">
                <div class="text-sm text-gray-500 mb-2">
                    <i class="far fa-calendar mr-2"></i><?= date('d M Y', strtotime($news->tanggal)) ?>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-blue-600 transition">
                    <a href="<?= base_url('berita/' . $news->slug) ?>"><?= $news->judul ?></a>
                </h3>
                <p class="text-gray-600 mb-4"><?= character_limiter(strip_tags($news->konten), 100) ?></p>
                <a href="<?= base_url('berita/' . $news->slug) ?>" class="text-blue-600 hover:text-blue-800 font-semibold">
                    Baca Selengkapnya <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </article>
        <?php endforeach; ?>
    </div>

    <div class="text-center mt-12">
        <a href="<?= base_url('berita') ?>" class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition transform hover:scale-105">
            Lihat Semua Berita
        </a>
    </div>
</section>
<?php endif; ?>

<!-- Teachers Section -->
<?php if(!empty($guru)): ?>
<section class="bg-gray-100 py-16">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Tenaga Pengajar</h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <?php foreach($guru as $teacher): ?>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden text-center hover:shadow-2xl transition transform hover:-translate-y-2">
                <div class="h-64 bg-gray-200 overflow-hidden">
                    <?php if($teacher->foto): ?>
                        <img src="<?= base_url('assets/uploads/guru/' . $teacher->foto) ?>" 
                             alt="<?= $teacher->nama ?>" 
                             class="w-full h-full object-cover">
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center bg-gray-300">
                            <i class="fas fa-user text-6xl text-gray-400"></i>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-1"><?= $teacher->nama ?></h3>
                    <?php if($teacher->mata_pelajaran): ?>
                        <p class="text-blue-600 text-sm font-semibold"><?= $teacher->mata_pelajaran ?></p>
                    <?php endif; ?>
                    <?php if($teacher->pendidikan): ?>
                        <p class="text-gray-500 text-xs mt-2"><?= $teacher->pendidikan ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Contact & Maps Section -->
<?php if(isset($kontak)): ?>
<section class="container mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-900 mb-4">Kontak & Lokasi</h2>
        <div class="w-24 h-1 bg-blue-600 mx-auto"></div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Informasi Kontak</h3>
            <div class="space-y-4">
                <?php if($kontak->alamat): ?>
                <div class="flex items-start">
                    <i class="fas fa-map-marker-alt text-blue-600 text-xl mt-1 mr-4"></i>
                    <div>
                        <h4 class="font-semibold text-gray-900">Alamat</h4>
                        <p class="text-gray-600"><?= $kontak->alamat ?></p>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if($kontak->telepon): ?>
                <div class="flex items-start">
                    <i class="fas fa-phone text-blue-600 text-xl mt-1 mr-4"></i>
                    <div>
                        <h4 class="font-semibold text-gray-900">Telepon</h4>
                        <p class="text-gray-600"><?= $kontak->telepon ?></p>
                    </div>
                </div>
                <?php endif; ?>
                
                <?php if($kontak->email): ?>
                <div class="flex items-start">
                    <i class="fas fa-envelope text-blue-600 text-xl mt-1 mr-4"></i>
                    <div>
                        <h4 class="font-semibold text-gray-900">Email</h4>
                        <p class="text-gray-600"><?= $kontak->email ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if($kontak->maps_embed): ?>
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <?= $kontak->maps_embed ?>
        </div>
        <?php else: ?>
        <div class="bg-gray-200 rounded-lg shadow-lg h-96 flex items-center justify-center">
            <p class="text-gray-500">Maps belum tersedia</p>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
