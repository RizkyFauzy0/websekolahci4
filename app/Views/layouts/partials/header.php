<header class="bg-white shadow-md sticky top-0 z-50" x-data="{ mobileMenuOpen: false }">
    <div class="container mx-auto px-4">
        <!-- Top Bar -->
        <div class="py-2 border-b border-gray-200 hidden md:block">
            <div class="flex justify-between items-center text-sm text-gray-600">
                <div class="flex space-x-4">
                    <span><i class="fas fa-phone"></i> <?= esc($settings['telepon'] ?? '021-XXXXXX') ?></span>
                    <span><i class="fas fa-envelope"></i> <?= esc($settings['email'] ?? 'info@sekolah.com') ?></span>
                </div>
                <div class="flex space-x-3">
                    <a href="#" class="hover:text-blue-600"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="hover:text-blue-600"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="hover:text-blue-600"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        
        <!-- Main Navigation -->
        <nav class="py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="<?= base_url('/') ?>" class="flex items-center space-x-3">
                    <?php if (!empty($settings['logo'])): ?>
                        <img src="<?= base_url('uploads/settings/' . $settings['logo']) ?>" alt="Logo" class="h-12 w-12 object-contain">
                    <?php else: ?>
                        <div class="h-12 w-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold text-xl">
                            <?= substr($settings['nama_sekolah'] ?? 'S', 0, 1) ?>
                        </div>
                    <?php endif; ?>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800"><?= esc($settings['nama_sekolah'] ?? 'Nama Sekolah') ?></h1>
                        <p class="text-xs text-gray-600">Cerdas, Berkarakter, Berprestasi</p>
                    </div>
                </a>
                
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex space-x-1">
                    <a href="<?= base_url('/') ?>" class="px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 transition <?= uri_string() == '' ? 'text-blue-600 bg-blue-50' : 'text-gray-700' ?>">
                        Dashboard
                    </a>
                    
                    <!-- Profil Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 transition text-gray-700 flex items-center">
                            Profil <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div x-show="open" @click.away="open = false" x-cloak
                             class="absolute top-full left-0 mt-1 w-48 bg-white shadow-lg rounded-lg py-2">
                            <a href="<?= base_url('profil/visi-misi') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-700">Visi Misi</a>
                            <a href="<?= base_url('profil/sejarah') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-700">Sejarah Singkat</a>
                            <a href="<?= base_url('profil/struktur-organisasi') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-700">Struktur Organisasi</a>
                            <a href="<?= base_url('profil/keunggulan') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-700">Keunggulan</a>
                        </div>
                    </div>
                    
                    <a href="<?= base_url('berita') ?>" class="px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 transition text-gray-700">
                        Berita
                    </a>
                    
                    <!-- Galeri Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 transition text-gray-700 flex items-center">
                            Galeri <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div x-show="open" @click.away="open = false" x-cloak
                             class="absolute top-full left-0 mt-1 w-48 bg-white shadow-lg rounded-lg py-2">
                            <a href="<?= base_url('galeri/foto') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-700">Foto</a>
                            <a href="<?= base_url('galeri/video') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-700">Video</a>
                        </div>
                    </div>
                    
                    <!-- Prestasi Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 transition text-gray-700 flex items-center">
                            Prestasi <i class="fas fa-chevron-down ml-1 text-xs"></i>
                        </button>
                        <div x-show="open" @click.away="open = false" x-cloak
                             class="absolute top-full left-0 mt-1 w-48 bg-white shadow-lg rounded-lg py-2">
                            <a href="<?= base_url('prestasi/siswa') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-700">Prestasi Siswa</a>
                            <a href="<?= base_url('prestasi/guru') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-700">Prestasi Guru</a>
                            <a href="<?= base_url('prestasi/sekolah') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-700">Prestasi Sekolah</a>
                        </div>
                    </div>
                    
                    <a href="<?= base_url('download') ?>" class="px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 transition text-gray-700">
                        Download
                    </a>
                    
                    <a href="<?= base_url('link-aplikasi') ?>" class="px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 transition text-gray-700">
                        Link Aplikasi
                    </a>
                    
                    <a href="<?= base_url('kontak') ?>" class="px-4 py-2 rounded hover:bg-blue-50 hover:text-blue-600 transition text-gray-700">
                        Kontak
                    </a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden text-gray-700 focus:outline-none">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
            </div>
            
            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" x-cloak class="lg:hidden mt-4 pb-4 border-t border-gray-200 pt-4">
                <a href="<?= base_url('/') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-700">Dashboard</a>
                
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full text-left px-4 py-2 hover:bg-blue-50 text-gray-700 flex justify-between items-center">
                        Profil <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div x-show="open" x-cloak class="pl-4">
                        <a href="<?= base_url('profil/visi-misi') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-600">Visi Misi</a>
                        <a href="<?= base_url('profil/sejarah') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-600">Sejarah Singkat</a>
                        <a href="<?= base_url('profil/struktur-organisasi') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-600">Struktur Organisasi</a>
                        <a href="<?= base_url('profil/keunggulan') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-600">Keunggulan</a>
                    </div>
                </div>
                
                <a href="<?= base_url('berita') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-700">Berita</a>
                
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full text-left px-4 py-2 hover:bg-blue-50 text-gray-700 flex justify-between items-center">
                        Galeri <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div x-show="open" x-cloak class="pl-4">
                        <a href="<?= base_url('galeri/foto') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-600">Foto</a>
                        <a href="<?= base_url('galeri/video') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-600">Video</a>
                    </div>
                </div>
                
                <div x-data="{ open: false }">
                    <button @click="open = !open" class="w-full text-left px-4 py-2 hover:bg-blue-50 text-gray-700 flex justify-between items-center">
                        Prestasi <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div x-show="open" x-cloak class="pl-4">
                        <a href="<?= base_url('prestasi/siswa') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-600">Prestasi Siswa</a>
                        <a href="<?= base_url('prestasi/guru') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-600">Prestasi Guru</a>
                        <a href="<?= base_url('prestasi/sekolah') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-600">Prestasi Sekolah</a>
                    </div>
                </div>
                
                <a href="<?= base_url('download') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-700">Download</a>
                <a href="<?= base_url('link-aplikasi') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-700">Link Aplikasi</a>
                <a href="<?= base_url('kontak') ?>" class="block px-4 py-2 hover:bg-blue-50 text-gray-700">Kontak</a>
            </div>
        </nav>
    </div>
</header>
