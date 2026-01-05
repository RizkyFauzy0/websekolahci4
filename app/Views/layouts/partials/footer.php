<footer class="bg-gray-900 text-white mt-12">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- About Section -->
            <div>
                <h3 class="text-xl font-bold mb-4"><?= esc($settings['nama_sekolah'] ?? 'Nama Sekolah') ?></h3>
                <p class="text-gray-400 text-sm mb-4">
                    Sekolah berkualitas yang mengembangkan potensi siswa dengan pendidikan berkarakter dan berprestasi.
                </p>
                <div class="flex space-x-3">
                    <a href="#" class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center hover:bg-blue-700 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-8 h-8 bg-pink-600 rounded-full flex items-center justify-center hover:bg-pink-700 transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-8 h-8 bg-red-600 rounded-full flex items-center justify-center hover:bg-red-700 transition">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h3 class="text-xl font-bold mb-4">Menu Cepat</h3>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li><a href="<?= base_url('profil/visi-misi') ?>" class="hover:text-white transition">Visi & Misi</a></li>
                    <li><a href="<?= base_url('berita') ?>" class="hover:text-white transition">Berita Sekolah</a></li>
                    <li><a href="<?= base_url('galeri/foto') ?>" class="hover:text-white transition">Galeri</a></li>
                    <li><a href="<?= base_url('prestasi/siswa') ?>" class="hover:text-white transition">Prestasi</a></li>
                    <li><a href="<?= base_url('download') ?>" class="hover:text-white transition">Download</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div>
                <h3 class="text-xl font-bold mb-4">Kontak Kami</h3>
                <ul class="space-y-3 text-gray-400 text-sm">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt mt-1 mr-3"></i>
                        <span><?= esc($settings['alamat'] ?? 'Alamat Sekolah') ?></span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone mr-3"></i>
                        <span><?= esc($settings['telepon'] ?? '021-XXXXXX') ?></span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope mr-3"></i>
                        <span><?= esc($settings['email'] ?? 'info@sekolah.com') ?></span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-globe mr-3"></i>
                        <span><?= esc($settings['website'] ?? 'www.sekolah.com') ?></span>
                    </li>
                </ul>
            </div>
            
            <!-- Important Links -->
            <div>
                <h3 class="text-xl font-bold mb-4">Link Penting</h3>
                <ul class="space-y-2 text-gray-400 text-sm">
                    <li><a href="<?= base_url('link-aplikasi') ?>" class="hover:text-white transition">Aplikasi Sekolah</a></li>
                    <li><a href="<?= base_url('kontak') ?>" class="hover:text-white transition">Hubungi Kami</a></li>
                    <li><a href="<?= base_url('admin') ?>" class="hover:text-white transition">Login Admin</a></li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400 text-sm">
            <p>&copy; <?= date('Y') ?> <?= esc($settings['nama_sekolah'] ?? 'Nama Sekolah') ?>. All rights reserved.</p>
            <p class="mt-2">Powered by CodeIgniter 4 & Tailwind CSS</p>
        </div>
    </div>
</footer>
