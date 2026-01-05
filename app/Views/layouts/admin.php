<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' - ' : '' ?>Admin Dashboard</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
    
    <?= $this->renderSection('styles') ?>
</head>
<body class="bg-gray-100" x-data="{ sidebarOpen: false }">
    
    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 w-64 bg-gray-900 text-white transform transition-transform duration-300 z-50 lg:translate-x-0"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
        <div class="flex items-center justify-between p-4 border-b border-gray-800">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center mr-3">
                    <i class="fas fa-school"></i>
                </div>
                <h2 class="text-lg font-bold">Admin Panel</h2>
            </div>
            <button @click="sidebarOpen = false" class="lg:hidden">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <nav class="p-4 space-y-2">
            <a href="<?= base_url('admin/dashboard') ?>" 
               class="flex items-center px-4 py-3 rounded hover:bg-gray-800 transition <?= uri_string() == 'admin/dashboard' ? 'bg-gray-800' : '' ?>">
                <i class="fas fa-tachometer-alt mr-3"></i> Dashboard
            </a>
            
            <div class="pt-4 pb-2 text-gray-500 text-xs uppercase font-bold">Konten</div>
            
            <a href="<?= base_url('admin/slider') ?>" 
               class="flex items-center px-4 py-3 rounded hover:bg-gray-800 transition">
                <i class="fas fa-images mr-3"></i> Slider
            </a>
            
            <a href="<?= base_url('admin/berita') ?>" 
               class="flex items-center px-4 py-3 rounded hover:bg-gray-800 transition">
                <i class="fas fa-newspaper mr-3"></i> Berita
            </a>
            
            <a href="<?= base_url('admin/profil') ?>" 
               class="flex items-center px-4 py-3 rounded hover:bg-gray-800 transition">
                <i class="fas fa-info-circle mr-3"></i> Profil Sekolah
            </a>
            
            <div class="pt-4 pb-2 text-gray-500 text-xs uppercase font-bold">Data</div>
            
            <a href="<?= base_url('admin/siswa') ?>" 
               class="flex items-center px-4 py-3 rounded hover:bg-gray-800 transition">
                <i class="fas fa-user-graduate mr-3"></i> Siswa
            </a>
            
            <a href="<?= base_url('admin/guru') ?>" 
               class="flex items-center px-4 py-3 rounded hover:bg-gray-800 transition">
                <i class="fas fa-chalkboard-teacher mr-3"></i> Guru
            </a>
            
            <div class="pt-4 pb-2 text-gray-500 text-xs uppercase font-bold">Media</div>
            
            <a href="<?= base_url('admin/galeri-foto') ?>" 
               class="flex items-center px-4 py-3 rounded hover:bg-gray-800 transition">
                <i class="fas fa-camera mr-3"></i> Galeri Foto
            </a>
            
            <a href="<?= base_url('admin/galeri-video') ?>" 
               class="flex items-center px-4 py-3 rounded hover:bg-gray-800 transition">
                <i class="fas fa-video mr-3"></i> Galeri Video
            </a>
            
            <a href="<?= base_url('admin/prestasi') ?>" 
               class="flex items-center px-4 py-3 rounded hover:bg-gray-800 transition">
                <i class="fas fa-trophy mr-3"></i> Prestasi
            </a>
            
            <div class="pt-4 pb-2 text-gray-500 text-xs uppercase font-bold">Lainnya</div>
            
            <a href="<?= base_url('admin/download') ?>" 
               class="flex items-center px-4 py-3 rounded hover:bg-gray-800 transition">
                <i class="fas fa-download mr-3"></i> Download
            </a>
            
            <a href="<?= base_url('admin/link-aplikasi') ?>" 
               class="flex items-center px-4 py-3 rounded hover:bg-gray-800 transition">
                <i class="fas fa-link mr-3"></i> Link Aplikasi
            </a>
            
            <div class="pt-4 pb-2 text-gray-500 text-xs uppercase font-bold">Pengaturan</div>
            
            <a href="<?= base_url('admin/settings') ?>" 
               class="flex items-center px-4 py-3 rounded hover:bg-gray-800 transition">
                <i class="fas fa-cog mr-3"></i> Settings
            </a>
        </nav>
    </aside>
    
    <!-- Main Content -->
    <div class="lg:ml-64">
        <!-- Top Bar -->
        <header class="bg-white shadow-md sticky top-0 z-40">
            <div class="flex items-center justify-between px-4 py-4">
                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-gray-700">
                    <i class="fas fa-bars text-2xl"></i>
                </button>
                
                <div class="flex-1 lg:flex-none">
                    <h1 class="text-xl font-bold text-gray-800 ml-4 lg:ml-0"><?= $title ?? 'Dashboard' ?></h1>
                </div>
                
                <div class="flex items-center space-x-4">
                    <a href="<?= base_url('/') ?>" target="_blank" class="text-gray-700 hover:text-blue-600">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white">
                                <i class="fas fa-user"></i>
                            </div>
                            <span class="hidden md:block"><?= session()->get('nama_lengkap') ?></span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        
                        <div x-show="open" @click.away="open = false" x-cloak
                             class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2">
                            <a href="<?= base_url('admin/profile') ?>" class="block px-4 py-2 hover:bg-gray-100">
                                <i class="fas fa-user mr-2"></i>Profile
                            </a>
                            <a href="<?= base_url('admin/logout') ?>" class="block px-4 py-2 hover:bg-gray-100 text-red-600">
                                <i class="fas fa-sign-out-alt mr-2"></i>Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Page Content -->
        <main class="p-6">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    <i class="fas fa-check-circle mr-2"></i>
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            
            <?php if (session()->getFlashdata('error')): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>
            
            <?= $this->renderSection('content') ?>
        </main>
    </div>
    
    <!-- Sidebar Overlay -->
    <div x-show="sidebarOpen" 
         @click="sidebarOpen = false"
         x-cloak
         class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"></div>
    
    <?= $this->renderSection('scripts') ?>
</body>
</html>
