<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitialDataSeeder extends Seeder
{
    public function run()
    {
        // Insert default admin user
        $this->db->table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@sekolah.com',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'nama_lengkap' => 'Administrator',
            'role' => 'superadmin',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // Insert default settings
        $this->db->table('settings')->insert([
            'nama_sekolah' => 'SMA Negeri 1 Contoh',
            'alamat' => 'Jalan Pendidikan No. 123, Jakarta',
            'telepon' => '021-1234567',
            'email' => 'info@smansacontoh.sch.id',
            'website' => 'https://smansacontoh.sch.id',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // Insert default profil (Visi Misi)
        $this->db->table('profil')->insert([
            'jenis' => 'visi_misi',
            'judul' => 'Visi dan Misi Sekolah',
            'konten' => '<h3>Visi</h3><p>Menjadi sekolah unggulan yang menghasilkan lulusan berkualitas, berkarakter, dan berwawasan global.</p><h3>Misi</h3><ul><li>Meningkatkan kualitas pembelajaran</li><li>Mengembangkan potensi siswa</li><li>Membangun karakter yang kuat</li></ul>',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        // Insert sample slider
        $this->db->table('sliders')->insert([
            'judul' => 'Selamat Datang di Website Sekolah Kami',
            'deskripsi' => 'Tempat berkembangnya generasi cerdas dan berkarakter',
            'gambar' => 'default-slider.jpg',
            'urutan' => 1,
            'status' => 'aktif',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
