# Website Sekolah - CodeIgniter 4 + Tailwind CSS

> Modern and responsive school website application built with CodeIgniter 4 and Tailwind CSS

[![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4.6-red.svg)](https://codeigniter.com/)
[![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-blue.svg)](https://tailwindcss.com/)
[![PHP](https://img.shields.io/badge/PHP-7.4+-purple.svg)](https://www.php.net/)

## 🎯 Features

### Frontend (Public Website)
- ✅ Responsive homepage with hero slider
- ✅ Latest news section
- ✅ Student & teacher statistics with animation
- ✅ Teacher profiles showcase
- ✅ Contact information with Google Maps
- ✅ Responsive navigation with dropdown menus
- ✅ Mobile-friendly design

### Admin Panel
- ✅ Secure authentication system
- ✅ Dashboard with statistics
- ✅ Responsive admin layout with sidebar
- ✅ User session management
- 📋 CRUD operations for all modules (ready to implement)
- 📋 Modal-based forms (ready to implement)
- 📋 File upload management (ready to implement)

### Database Structure
12 tables fully configured:
- `users` - Admin authentication
- `settings` - School information
- `sliders` - Homepage slideshow
- `berita` - News/articles
- `guru` - Teachers data
- `siswa` - Students data
- `profil` - School profile (vision, mission, history, etc.)
- `galeri_foto` - Photo gallery
- `galeri_video` - Video gallery
- `prestasi` - Achievements
- `download` - Downloadable files
- `link_aplikasi` - External application links

## 🚀 Quick Start

### Prerequisites
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Composer

### Installation

1. **Clone the repository**
```bash
git clone https://github.com/RizkyFauzy0/websekolahci4.git
cd websekolahci4
```

2. **Install dependencies**
```bash
composer install
```

3. **Setup environment**
```bash
cp env .env
```
Edit `.env` and configure your database settings.

4. **Create database**
```sql
CREATE DATABASE websekolah_db;
```

5. **Run migrations**
```bash
php spark migrate
```

6. **Seed initial data**
```bash
php spark db:seed InitialDataSeeder
```

7. **Set permissions**
```bash
chmod -R 777 public/uploads writable
```

8. **Start development server**
```bash
php spark serve
```

9. **Access the application**
- **Frontend:** http://localhost:8080
- **Admin Login:** http://localhost:8080/admin/login
  - Username: `admin`
  - Password: `admin123`

## 📖 Documentation

- **[QUICKSTART.md](QUICKSTART.md)** - Step-by-step setup guide
- **[README_IMPLEMENTATION.md](README_IMPLEMENTATION.md)** - Complete implementation guide with code templates

## 🎨 Technology Stack

- **Backend:** CodeIgniter 4.6.4
- **Frontend:** Tailwind CSS 3.x (CDN)
- **JavaScript:** Alpine.js 3.x
- **Icons:** Font Awesome 6
- **Database:** MySQL

## 📱 Responsive Design

The website is fully responsive and works perfectly on:
- 📱 Mobile devices
- 📱 Tablets
- 💻 Desktop computers

## 🔐 Security Features

- Password hashing with bcrypt
- CSRF protection
- XSS protection
- Authentication filter for admin routes
- Input validation

## 📂 Project Structure

```
websekolahci4/
├── app/
│   ├── Controllers/      # All controllers
│   ├── Models/          # Database models
│   ├── Views/           # View templates
│   ├── Filters/         # Auth filters
│   └── Database/
│       ├── Migrations/  # Database migrations
│       └── Seeds/       # Data seeders
├── public/
│   └── uploads/         # Upload directories
└── writable/            # Cache, logs, sessions
```

## 🎯 Current Status

### ✅ Completed
- CodeIgniter 4 setup
- Database structure (12 tables)
- All models created
- Frontend layout & homepage
- Authentication system
- Admin dashboard layout
- Routes configuration
- Responsive design

### 📋 Ready to Implement
See `README_IMPLEMENTATION.md` for templates:
- Settings management
- Slider CRUD
- News CRUD
- Teacher CRUD
- Student CRUD
- Gallery CRUD
- And more...

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📄 License

This project is open-source and available under the MIT License.

## 👨‍💻 Author

**RizkyFauzy0**

## 🙏 Acknowledgments

- CodeIgniter 4 Team
- Tailwind CSS Team
- Font Awesome

---

For detailed setup and implementation instructions, see [QUICKSTART.md](QUICKSTART.md) and [README_IMPLEMENTATION.md](README_IMPLEMENTATION.md)
