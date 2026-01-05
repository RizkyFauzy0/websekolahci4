<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<!-- Statistics Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Berita Card -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm mb-1">Total Berita</p>
                <h3 class="text-3xl font-bold text-gray-800"><?= $total_berita ?></h3>
            </div>
            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                <i class="fas fa-newspaper text-blue-600 text-2xl"></i>
            </div>
        </div>
        <a href="<?= base_url('admin/berita') ?>" class="text-blue-600 text-sm mt-4 inline-block hover:underline">
            Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
    
    <!-- Guru Card -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm mb-1">Total Guru</p>
                <h3 class="text-3xl font-bold text-gray-800"><?= $total_guru ?></h3>
            </div>
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                <i class="fas fa-chalkboard-teacher text-green-600 text-2xl"></i>
            </div>
        </div>
        <a href="<?= base_url('admin/guru') ?>" class="text-green-600 text-sm mt-4 inline-block hover:underline">
            Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
    
    <!-- Siswa Card -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm mb-1">Total Siswa</p>
                <h3 class="text-3xl font-bold text-gray-800"><?= $total_siswa ?></h3>
            </div>
            <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center">
                <i class="fas fa-user-graduate text-yellow-600 text-2xl"></i>
            </div>
        </div>
        <a href="<?= base_url('admin/siswa') ?>" class="text-yellow-600 text-sm mt-4 inline-block hover:underline">
            Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
    
    <!-- Prestasi Card -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-gray-500 text-sm mb-1">Total Prestasi</p>
                <h3 class="text-3xl font-bold text-gray-800"><?= $total_prestasi ?></h3>
            </div>
            <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center">
                <i class="fas fa-trophy text-purple-600 text-2xl"></i>
            </div>
        </div>
        <a href="<?= base_url('admin/prestasi') ?>" class="text-purple-600 text-sm mt-4 inline-block hover:underline">
            Lihat Detail <i class="fas fa-arrow-right ml-1"></i>
        </a>
    </div>
</div>

<!-- Welcome Section -->
<div class="bg-white rounded-lg shadow-md p-8 mb-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Selamat Datang, <?= session()->get('nama_lengkap') ?>!</h2>
    <p class="text-gray-600 mb-6">
        Anda login sebagai <strong><?= session()->get('role') ?></strong>. 
        Gunakan menu di sebelah kiri untuk mengelola konten website sekolah.
    </p>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <a href="<?= base_url('admin/slider') ?>" 
           class="flex items-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition">
            <i class="fas fa-images text-blue-600 text-3xl mr-4"></i>
            <div>
                <h3 class="font-bold text-gray-800">Kelola Slider</h3>
                <p class="text-sm text-gray-600">Atur slideshow homepage</p>
            </div>
        </a>
        
        <a href="<?= base_url('admin/berita') ?>" 
           class="flex items-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition">
            <i class="fas fa-newspaper text-green-600 text-3xl mr-4"></i>
            <div>
                <h3 class="font-bold text-gray-800">Kelola Berita</h3>
                <p class="text-sm text-gray-600">Publish berita sekolah</p>
            </div>
        </a>
        
        <a href="<?= base_url('admin/settings') ?>" 
           class="flex items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition">
            <i class="fas fa-cog text-purple-600 text-3xl mr-4"></i>
            <div>
                <h3 class="font-bold text-gray-800">Settings</h3>
                <p class="text-sm text-gray-600">Atur informasi sekolah</p>
            </div>
        </a>
    </div>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Recent Activity -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Menu Manajemen</h3>
        <div class="space-y-2">
            <a href="<?= base_url('admin/galeri-foto') ?>" 
               class="flex items-center justify-between p-3 hover:bg-gray-50 rounded transition">
                <span><i class="fas fa-camera text-gray-600 mr-2"></i> Galeri Foto</span>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </a>
            <a href="<?= base_url('admin/galeri-video') ?>" 
               class="flex items-center justify-between p-3 hover:bg-gray-50 rounded transition">
                <span><i class="fas fa-video text-gray-600 mr-2"></i> Galeri Video</span>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </a>
            <a href="<?= base_url('admin/profil') ?>" 
               class="flex items-center justify-between p-3 hover:bg-gray-50 rounded transition">
                <span><i class="fas fa-info-circle text-gray-600 mr-2"></i> Profil Sekolah</span>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </a>
            <a href="<?= base_url('admin/download') ?>" 
               class="flex items-center justify-between p-3 hover:bg-gray-50 rounded transition">
                <span><i class="fas fa-download text-gray-600 mr-2"></i> Download</span>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </a>
            <a href="<?= base_url('admin/link-aplikasi') ?>" 
               class="flex items-center justify-between p-3 hover:bg-gray-50 rounded transition">
                <span><i class="fas fa-link text-gray-600 mr-2"></i> Link Aplikasi</span>
                <i class="fas fa-chevron-right text-gray-400"></i>
            </a>
        </div>
    </div>
    
    <!-- System Info -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <h3 class="text-xl font-bold text-gray-800 mb-4">Informasi Sistem</h3>
        <div class="space-y-4">
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                <span class="text-gray-600">Framework</span>
                <span class="font-bold text-gray-800">CodeIgniter 4</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                <span class="text-gray-600">CSS Framework</span>
                <span class="font-bold text-gray-800">Tailwind CSS</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                <span class="text-gray-600">Database</span>
                <span class="font-bold text-gray-800">MySQL</span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded">
                <span class="text-gray-600">Login Sebagai</span>
                <span class="font-bold text-gray-800 capitalize"><?= session()->get('role') ?></span>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
