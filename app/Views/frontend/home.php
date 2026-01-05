<?= $this->extend('layouts/frontend') ?>

<?= $this->section('content') ?>

<!-- Hero Slider -->
<section class="relative">
    <div class="slider-container" x-data="{ currentSlide: 0, autoplay: true }" x-init="
        setInterval(() => { 
            if (autoplay) {
                currentSlide = (currentSlide + 1) % <?= count($sliders) ?>;
            }
        }, 5000)
    ">
        <?php if (!empty($sliders)): ?>
            <?php foreach ($sliders as $index => $slider): ?>
                <div x-show="currentSlide === <?= $index ?>" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-x-full"
                     x-transition:enter-end="opacity-100 transform translate-x-0"
                     class="relative h-96 md:h-[500px] bg-gradient-to-r from-blue-600 to-blue-800">
                    <?php if (!empty($slider['gambar'])): ?>
                        <img src="<?= base_url('uploads/sliders/' . $slider['gambar']) ?>" 
                             alt="<?= esc($slider['judul']) ?>" 
                             class="w-full h-full object-cover absolute inset-0 opacity-50">
                    <?php endif; ?>
                    <div class="absolute inset-0 flex items-center justify-center text-center text-white px-4">
                        <div class="max-w-4xl">
                            <h2 class="text-3xl md:text-5xl font-bold mb-4"><?= esc($slider['judul']) ?></h2>
                            <?php if (!empty($slider['deskripsi'])): ?>
                                <p class="text-lg md:text-xl mb-6"><?= esc($slider['deskripsi']) ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            
            <!-- Slider Controls -->
            <div class="absolute bottom-4 left-0 right-0 flex justify-center space-x-2">
                <?php foreach ($sliders as $index => $slider): ?>
                    <button @click="currentSlide = <?= $index ?>" 
                            :class="currentSlide === <?= $index ?> ? 'bg-white' : 'bg-white bg-opacity-50'"
                            class="w-3 h-3 rounded-full transition"></button>
                <?php endforeach; ?>
            </div>
            
            <!-- Navigation Arrows -->
            <button @click="currentSlide = (currentSlide - 1 + <?= count($sliders) ?>) % <?= count($sliders) ?>" 
                    class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-30 hover:bg-opacity-50 text-white p-3 rounded-full transition">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button @click="currentSlide = (currentSlide + 1) % <?= count($sliders) ?>" 
                    class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-30 hover:bg-opacity-50 text-white p-3 rounded-full transition">
                <i class="fas fa-chevron-right"></i>
            </button>
        <?php else: ?>
            <div class="h-96 md:h-[500px] bg-gradient-to-r from-blue-600 to-blue-800 flex items-center justify-center text-white">
                <div class="text-center px-4">
                    <h2 class="text-3xl md:text-5xl font-bold mb-4">Selamat Datang</h2>
                    <p class="text-lg md:text-xl">Website Resmi <?= esc($settings['nama_sekolah'] ?? 'Sekolah') ?></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Statistics Section -->
<section class="bg-blue-600 py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">
            <div class="stat-item" x-data="{ count: 0 }" x-init="setInterval(() => { if (count < <?= $total_siswa ?>) count++; }, 20)">
                <div class="text-4xl md:text-5xl font-bold mb-2">
                    <span x-text="count"></span>+
                </div>
                <div class="text-sm md:text-base">Siswa Aktif</div>
            </div>
            <div class="stat-item" x-data="{ count: 0 }" x-init="setInterval(() => { if (count < <?= $total_guru ?>) count++; }, 50)">
                <div class="text-4xl md:text-5xl font-bold mb-2">
                    <span x-text="count"></span>+
                </div>
                <div class="text-sm md:text-base">Guru & Staff</div>
            </div>
            <div class="stat-item" x-data="{ count: 0 }" x-init="setInterval(() => { if (count < <?= $total_prestasi ?>) count++; }, 100)">
                <div class="text-4xl md:text-5xl font-bold mb-2">
                    <span x-text="count"></span>+
                </div>
                <div class="text-sm md:text-base">Prestasi</div>
            </div>
            <div class="stat-item">
                <div class="text-4xl md:text-5xl font-bold mb-2">A</div>
                <div class="text-sm md:text-base">Akreditasi</div>
            </div>
        </div>
    </div>
</section>

<!-- Latest News Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">Berita Terbaru</h2>
            <p class="text-gray-600">Informasi dan kegiatan sekolah terkini</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php if (!empty($latest_berita)): ?>
                <?php foreach ($latest_berita as $berita): ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                        <?php if (!empty($berita['gambar'])): ?>
                            <img src="<?= base_url('uploads/berita/' . $berita['gambar']) ?>" 
                                 alt="<?= esc($berita['judul']) ?>" 
                                 class="w-full h-48 object-cover">
                        <?php else: ?>
                            <div class="w-full h-48 bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center">
                                <i class="fas fa-newspaper text-white text-5xl"></i>
                            </div>
                        <?php endif; ?>
                        <div class="p-6">
                            <div class="text-sm text-gray-500 mb-2">
                                <i class="fas fa-calendar-alt mr-2"></i><?= date('d M Y', strtotime($berita['tanggal_publish'])) ?>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3 hover:text-blue-600 transition">
                                <a href="<?= base_url('berita/' . $berita['slug']) ?>"><?= esc($berita['judul']) ?></a>
                            </h3>
                            <p class="text-gray-600 mb-4 line-clamp-3"><?= esc(strip_tags($berita['konten'])) ?></p>
                            <a href="<?= base_url('berita/' . $berita['slug']) ?>" 
                               class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                                Baca Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-3 text-center py-12 text-gray-500">
                    <i class="fas fa-newspaper text-5xl mb-4"></i>
                    <p>Belum ada berita tersedia</p>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="text-center mt-8">
            <a href="<?= base_url('berita') ?>" 
               class="inline-block bg-blue-600 text-white px-8 py-3 rounded-lg hover:bg-blue-700 transition">
                Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

<!-- Teachers Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">Tenaga Pendidik</h2>
            <p class="text-gray-600">Guru berpengalaman dan berdedikasi tinggi</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php if (!empty($guru)): ?>
                <?php foreach ($guru as $teacher): ?>
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300 text-center">
                        <?php if (!empty($teacher['foto'])): ?>
                            <img src="<?= base_url('uploads/guru/' . $teacher['foto']) ?>" 
                                 alt="<?= esc($teacher['nama']) ?>" 
                                 class="w-full h-48 object-cover">
                        <?php else: ?>
                            <div class="w-full h-48 bg-gradient-to-br from-gray-300 to-gray-400 flex items-center justify-center">
                                <i class="fas fa-user text-white text-6xl"></i>
                            </div>
                        <?php endif; ?>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-800 mb-1"><?= esc($teacher['nama']) ?></h3>
                            <p class="text-sm text-blue-600 mb-2"><?= esc($teacher['mata_pelajaran']) ?></p>
                            <?php if (!empty($teacher['pendidikan'])): ?>
                                <p class="text-xs text-gray-500"><?= esc($teacher['pendidikan']) ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-4 text-center py-12 text-gray-500">
                    <i class="fas fa-chalkboard-teacher text-5xl mb-4"></i>
                    <p>Data guru belum tersedia</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Contact & Map Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">Hubungi Kami</h2>
            <p class="text-gray-600">Lokasi dan kontak informasi sekolah</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Contact Info -->
            <div class="bg-white rounded-lg shadow-md p-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Informasi Kontak</h3>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-map-marker-alt text-blue-600"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800 mb-1">Alamat</h4>
                            <p class="text-gray-600"><?= esc($settings['alamat'] ?? 'Alamat Sekolah') ?></p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-phone text-blue-600"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800 mb-1">Telepon</h4>
                            <p class="text-gray-600"><?= esc($settings['telepon'] ?? '021-XXXXXX') ?></p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-envelope text-blue-600"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800 mb-1">Email</h4>
                            <p class="text-gray-600"><?= esc($settings['email'] ?? 'info@sekolah.com') ?></p>
                        </div>
                    </div>
                    
                    <div class="flex items-start">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                            <i class="fas fa-globe text-blue-600"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-800 mb-1">Website</h4>
                            <p class="text-gray-600"><?= esc($settings['website'] ?? 'www.sekolah.com') ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Google Maps -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <?php if (!empty($settings['maps_embed'])): ?>
                    <div class="w-full h-full min-h-[400px]">
                        <?= $settings['maps_embed'] ?>
                    </div>
                <?php else: ?>
                    <div class="w-full h-full min-h-[400px] bg-gray-200 flex items-center justify-center">
                        <div class="text-center text-gray-500">
                            <i class="fas fa-map-marked-alt text-5xl mb-4"></i>
                            <p>Peta lokasi belum tersedia</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
