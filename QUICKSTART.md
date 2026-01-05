# Quick Start Guide - Website Sekolah

## Setup Database & Run Application

### 1. Create Database
```sql
CREATE DATABASE websekolah_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 2. Configure .env
Update `app/Config/Database.php` or use `.env`:
```ini
database.default.hostname = localhost
database.default.database = websekolah_db
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
```

### 3. Run Migrations
```bash
php spark migrate
```

This will create all 12 tables:
- users
- settings
- sliders
- berita
- guru
- siswa
- profil
- galeri_foto
- galeri_video
- prestasi
- download
- link_aplikasi

### 4. Seed Initial Data
```bash
php spark db:seed InitialDataSeeder
```

This creates:
- Admin user: `admin` / `admin123`
- Default school settings
- Sample slider
- Sample visi misi

### 5. Set Permissions
```bash
chmod -R 777 public/uploads
chmod -R 777 writable
```

### 6. Run Server
```bash
php spark serve
```

### 7. Access Application

**Frontend (Public):**
- Homepage: http://localhost:8080

**Backend (Admin):**
- Login: http://localhost:8080/admin/login
- Username: `admin`
- Password: `admin123`

## Current Features Working

### ✅ Frontend
1. **Homepage** with:
   - Dynamic slider/carousel
   - Latest news section (6 items)
   - Student statistics with counter animation
   - Teacher profiles grid
   - Contact information with Google Maps section
   
2. **Responsive Navigation** with:
   - Logo and school name
   - Dropdown menus (Profil, Galeri, Prestasi)
   - Mobile hamburger menu
   - Social media links

3. **Footer** with:
   - School information
   - Quick links
   - Contact details
   - Social media

### ✅ Authentication
- Login page with modern design
- Session management
- Auth filter for protected routes
- Logout functionality

### ✅ Admin Dashboard
- Statistics cards (Berita, Guru, Siswa, Prestasi)
- Quick action buttons
- Sidebar navigation
- Responsive admin layout
- User profile dropdown

## Next Steps - Complete CRUD Modules

The foundation is complete. Now you need to implement CRUD for each module:

### Priority 1 - Settings (Most Important)
Create: `app/Controllers/Admin/Settings.php`
View: `app/Views/admin/settings/index.php`

### Priority 2 - Slider
Create: `app/Controllers/Admin/Slider.php`
View: `app/Views/admin/slider/index.php`

### Priority 3 - Berita (News)
Create: `app/Controllers/Admin/Berita.php`
View: `app/Views/admin/berita/index.php`

### Priority 4 - Guru (Teachers)
Create: `app/Controllers/Admin/Guru.php`
View: `app/Views/admin/guru/index.php`

### Priority 5 - Siswa (Students)
Create: `app/Controllers/Admin/Siswa.php`
View: `app/Views/admin/siswa/index.php`

See `README_IMPLEMENTATION.md` for complete code templates and examples.

## Folder Structure

```
websekolahci4/
├── app/
│   ├── Controllers/
│   │   ├── Admin/
│   │   │   └── Dashboard.php ✅
│   │   ├── Frontend/
│   │   │   ├── Berita.php
│   │   │   └── Profil.php
│   │   ├── Auth.php ✅
│   │   └── Home.php ✅
│   ├── Models/
│   │   ├── BeritaModel.php ✅
│   │   ├── GuruModel.php ✅
│   │   ├── SiswaModel.php ✅
│   │   └── ... (all models created) ✅
│   ├── Views/
│   │   ├── layouts/
│   │   │   ├── frontend.php ✅
│   │   │   ├── admin.php ✅
│   │   │   └── partials/
│   │   │       ├── header.php ✅
│   │   │       └── footer.php ✅
│   │   ├── frontend/
│   │   │   └── home.php ✅
│   │   ├── admin/
│   │   │   └── dashboard.php ✅
│   │   └── auth/
│   │       └── login.php ✅
│   ├── Database/
│   │   ├── Migrations/ ✅ (12 migrations)
│   │   └── Seeds/
│   │       └── InitialDataSeeder.php ✅
│   └── Filters/
│       └── AuthFilter.php ✅
└── public/
    └── uploads/ ✅ (folders created)
```

## Testing Checklist

After setup, test these features:

### Frontend Tests
- [ ] Homepage loads with layout
- [ ] Navigation menu works
- [ ] Mobile menu toggle works
- [ ] Footer displays correctly
- [ ] Responsive on mobile (check with browser DevTools)

### Authentication Tests
- [ ] Can access login page
- [ ] Login with admin/admin123 works
- [ ] Redirects to dashboard after login
- [ ] Cannot access admin pages without login
- [ ] Logout works

### Admin Dashboard Tests
- [ ] Dashboard displays statistics (will be 0 initially)
- [ ] Sidebar navigation visible
- [ ] Can navigate between menu items
- [ ] Profile dropdown works
- [ ] Mobile sidebar works

## Common Issues & Solutions

### Issue: 404 Page Not Found
**Solution:** Make sure mod_rewrite is enabled and .htaccess files are in place.

### Issue: Database connection failed
**Solution:** Check database credentials in `.env` file.

### Issue: Migrations fail
**Solution:** Drop database and recreate, then run migrations again.

### Issue: Uploads folder permission denied
**Solution:** Run `chmod -R 777 public/uploads writable`

### Issue: Session not working
**Solution:** Check writable/session folder permissions.

## Default Credentials

**Admin Panel:**
- URL: http://localhost:8080/admin/login
- Username: `admin`
- Email: `admin@sekolah.com`
- Password: `admin123`

**Important:** Change default password after first login!

## Development Tips

1. **Always use base_url()** for links
2. **Use esc()** for output to prevent XSS
3. **Validate all inputs** before saving
4. **Use transactions** for complex operations
5. **Test responsive** design on mobile

## Need Help?

Check `README_IMPLEMENTATION.md` for:
- Complete code templates
- CRUD implementation examples
- Modal popup code
- File upload handling
- Security best practices

---

Ready to build? Start with implementing Settings module! 🚀
