# Website Sekolah - CodeIgniter 4 + Tailwind CSS

Aplikasi Website Sekolah Modern dan Responsive menggunakan Framework CodeIgniter 4 dan CSS Tailwind.

## 🚀 Fitur Utama

### Halaman Depan (Frontend)
1. **Dashboard/Homepage**
   - Hero Slider dengan carousel otomatis
   - Statistik jumlah siswa, guru, dan prestasi (dengan counter animation)
   - Berita terbaru (6 item)
   - Profil guru (8 item)
   - Kontak dan Google Maps

2. **Menu Navigasi**
   - Dashboard
   - Profil (Visi Misi, Sejarah, Struktur Organisasi, Keunggulan)
   - Berita Sekolah
   - Galeri (Foto & Video)
   - Prestasi (Siswa, Guru, Sekolah)
   - Download
   - Link Aplikasi
   - Kontak

### Halaman Admin (Backend)
- Dashboard dengan statistik
- CRUD lengkap untuk semua modul menggunakan modal popup
- Upload gambar/file
- Responsive admin panel

## 📋 Teknologi yang Digunakan

- **Backend:** CodeIgniter 4 (PHP 7.4+)
- **Frontend:** Tailwind CSS (via CDN)
- **Database:** MySQL
- **JavaScript:** Alpine.js untuk interaktivitas
- **Icons:** Font Awesome 6

## 🔧 Instalasi & Setup

### 1. Clone Repository
```bash
git clone https://github.com/RizkyFauzy0/websekolahci4.git
cd websekolahci4
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Konfigurasi Environment
```bash
cp env .env
```

Edit file `.env` dan sesuaikan konfigurasi database:
```ini
database.default.hostname = localhost
database.default.database = websekolah_db
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
```

### 4. Buat Database
```sql
CREATE DATABASE websekolah_db;
```

### 5. Jalankan Migrasi
```bash
php spark migrate
```

### 6. Jalankan Seeder (Data Awal)
```bash
php spark db:seed InitialDataSeeder
```

Data default yang akan dibuat:
- **Admin User:** username: `admin`, password: `admin123`
- **Settings:** Data default sekolah
- **Profil:** Visi Misi default
- **Slider:** 1 slider default

### 7. Set Permission untuk Upload
```bash
chmod -R 777 public/uploads
chmod -R 777 writable
```

### 8. Jalankan Development Server
```bash
php spark serve
```

Akses aplikasi:
- **Frontend:** http://localhost:8080
- **Admin Login:** http://localhost:8080/admin/login
- **Admin Dashboard:** http://localhost:8080/admin/dashboard

## 📁 Struktur Database

### Tabel yang Dibuat
1. `users` - Data admin/login
2. `settings` - Pengaturan sekolah
3. `sliders` - Foto slideshow
4. `berita` - Berita sekolah
5. `guru` - Data guru
6. `siswa` - Data siswa
7. `profil` - Visi misi, sejarah, struktur, keunggulan
8. `galeri_foto` - Galeri foto
9. `galeri_video` - Galeri video
10. `prestasi` - Prestasi (siswa/guru/sekolah)
11. `download` - File download
12. `link_aplikasi` - Link aplikasi eksternal

## 🎯 Status Implementasi

### ✅ Sudah Selesai
- [x] Setup CodeIgniter 4
- [x] Database migrations & models (12 tables)
- [x] Frontend layout (header, footer, homepage)
- [x] Authentication system (login/logout)
- [x] Admin dashboard layout
- [x] Homepage dengan slider, berita, guru, maps
- [x] Responsive design (mobile-friendly)

### 🔨 Perlu Dikembangkan (Template Sudah Tersedia)
Berikut modul yang perlu dikembangkan menggunakan pola yang sama:

#### Admin CRUD Modules
1. **Settings Management** - Manage school info, logo, maps
2. **Slider Management** - CRUD dengan modal popup
3. **News Management** - CRUD berita dengan editor
4. **Student Management** - CRUD data siswa
5. **Teacher Management** - CRUD data guru
6. **Profile Management** - CRUD profil sekolah
7. **Photo Gallery** - CRUD galeri foto
8. **Video Gallery** - CRUD galeri video
9. **Prestasi Management** - CRUD prestasi
10. **Download Management** - CRUD file download
11. **Link Aplikasi** - CRUD link eksternal

#### Frontend Pages
1. Profil pages (Visi Misi, Sejarah, Struktur, Keunggulan)
2. News listing & detail page
3. Gallery pages (Photo & Video)
4. Prestasi pages (Student, Teacher, School)
5. Download page
6. Link Application page
7. Contact page

## 📝 Template Kode untuk Implementasi CRUD

### Contoh Controller Admin (Settings)

```php
<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;

class Settings extends BaseController
{
    protected $settingModel;
    protected $session;
    
    public function __construct()
    {
        $this->settingModel = new SettingModel();
        $this->session = \Config\Services::session();
        
        if (!$this->session->get('logged_in')) {
            header('Location: ' . base_url('admin/login'));
            exit;
        }
    }
    
    public function index()
    {
        $data = [
            'title' => 'Settings',
            'settings' => $this->settingModel->first() ?? [],
        ];
        
        return view('admin/settings/index', $data);
    }
    
    public function update()
    {
        $rules = [
            'nama_sekolah' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required|valid_email',
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $data = [
            'nama_sekolah' => $this->request->getPost('nama_sekolah'),
            'alamat' => $this->request->getPost('alamat'),
            'telepon' => $this->request->getPost('telepon'),
            'email' => $this->request->getPost('email'),
            'website' => $this->request->getPost('website'),
            'maps_embed' => $this->request->getPost('maps_embed'),
        ];
        
        // Handle logo upload
        $logo = $this->request->getFile('logo');
        if ($logo && $logo->isValid() && !$logo->hasMoved()) {
            $newName = $logo->getRandomName();
            $logo->move('uploads/settings', $newName);
            $data['logo'] = $newName;
        }
        
        $setting = $this->settingModel->first();
        if ($setting) {
            $this->settingModel->update($setting['id'], $data);
        } else {
            $this->settingModel->insert($data);
        }
        
        return redirect()->to('admin/settings')->with('success', 'Settings berhasil diupdate');
    }
}
```

### Contoh View Admin dengan Modal CRUD

```php
<?= $this->extend('layouts/admin') ?>

<?= $this->section('content') ?>

<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Manage Items</h2>
        <button onclick="openModal('add')" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            <i class="fas fa-plus mr-2"></i>Add New
        </button>
    </div>
    
    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $index => $item): ?>
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3"><?= $index + 1 ?></td>
                    <td class="px-4 py-3"><?= esc($item['name']) ?></td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded <?= $item['status'] == 'aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                            <?= ucfirst($item['status']) ?>
                        </span>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <button onclick="editItem(<?= $item['id'] ?>)" class="text-blue-600 hover:text-blue-800 mr-2">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="deleteItem(<?= $item['id'] ?>)" class="text-red-600 hover:text-red-800">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 w-full max-w-2xl mx-4">
        <h3 class="text-xl font-bold mb-4">Add/Edit Item</h3>
        <form action="<?= base_url('admin/item/save') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="id" id="item_id">
            
            <div class="mb-4">
                <label class="block text-gray-700 mb-2">Name</label>
                <input type="text" name="name" id="item_name" class="w-full px-4 py-2 border rounded" required>
            </div>
            
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
function openModal(mode) {
    document.getElementById('modal').classList.remove('hidden');
    document.getElementById('modal').classList.add('flex');
}

function closeModal() {
    document.getElementById('modal').classList.add('hidden');
    document.getElementById('modal').classList.remove('flex');
}

function editItem(id) {
    // Fetch item data via AJAX and populate form
    fetch(`<?= base_url('admin/item/get/') ?>${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('item_id').value = data.id;
            document.getElementById('item_name').value = data.name;
            openModal('edit');
        });
}

function deleteItem(id) {
    if (confirm('Are you sure you want to delete this item?')) {
        window.location.href = `<?= base_url('admin/item/delete/') ?>${id}`;
    }
}
</script>
<?= $this->endSection() ?>
```

## 🔐 Security

- Passwords di-hash menggunakan `password_hash()`
- CSRF protection enabled
- Auth filter untuk protect admin routes
- Input validation di setiap form
- XSS protection via `esc()` helper

## 📱 Responsive Design

Website ini fully responsive dan mobile-friendly:
- Mobile menu dengan hamburger icon
- Responsive grid layouts
- Touch-friendly buttons
- Optimized images

## 🎨 Customization

### Mengubah Warna Theme
Edit Tailwind classes di view files:
- Primary: `bg-blue-600` → `bg-[color]-600`
- Hover: `hover:bg-blue-700` → `hover:bg-[color]-700`

### Menambah Menu
Edit `app/Views/layouts/partials/header.php`

### Menambah Sidebar Admin
Edit `app/Views/layouts/admin.php`

## 📚 Dokumentasi Tambahan

### Upload File
```php
$file = $this->request->getFile('file');
if ($file && $file->isValid() && !$file->hasMoved()) {
    $newName = $file->getRandomName();
    $file->move('uploads/folder', $newName);
    $data['file'] = $newName;
}
```

### Slug Generation
```php
helper('text');
$slug = url_title($title, '-', true);
```

### Pagination
```php
$data['items'] = $model->paginate(10);
$data['pager'] = $model->pager;
```

## 🐛 Troubleshooting

### Error: "Class 'App\Filters\AuthFilter' not found"
```bash
composer dump-autoload
```

### Error: "CSRF token mismatch"
Pastikan `csrf` filter enabled di `app/Config/Filters.php`

### Upload tidak berfungsi
```bash
chmod -R 777 public/uploads
```

## 👥 Kontribusi

Contributions are welcome! Please feel free to submit a Pull Request.

## 📄 License

This project is open-sourced software licensed under the MIT license.

## 📧 Support

Untuk pertanyaan atau bantuan, silakan buka issue di GitHub repository.

---

**Happy Coding! 🚀**
