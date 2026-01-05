<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Authentication Routes
$routes->get('admin/login', 'Auth::login');
$routes->post('admin/login', 'Auth::attemptLogin');
$routes->get('admin/logout', 'Auth::logout');

// Admin Routes
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');
    
    // Settings
    $routes->get('settings', 'Admin\Settings::index');
    $routes->post('settings/update', 'Admin\Settings::update');
    
    // Slider
    $routes->get('slider', 'Admin\Slider::index');
    
    // Berita
    $routes->get('berita', 'Admin\Berita::index');
    
    // Guru
    $routes->get('guru', 'Admin\Guru::index');
    
    // Siswa
    $routes->get('siswa', 'Admin\Siswa::index');
    
    // Profil
    $routes->get('profil', 'Admin\Profil::index');
    
    // Galeri
    $routes->get('galeri-foto', 'Admin\GaleriFoto::index');
    $routes->get('galeri-video', 'Admin\GaleriVideo::index');
    
    // Prestasi
    $routes->get('prestasi', 'Admin\Prestasi::index');
    
    // Download
    $routes->get('download', 'Admin\Download::index');
    
    // Link Aplikasi
    $routes->get('link-aplikasi', 'Admin\LinkAplikasi::index');
});

// Frontend Routes
$routes->get('berita', 'Frontend\Berita::index');
$routes->get('berita/(:segment)', 'Frontend\Berita::detail/$1');

$routes->get('profil/(:segment)', 'Frontend\Profil::index/$1');

$routes->get('galeri/foto', 'Frontend\Galeri::foto');
$routes->get('galeri/video', 'Frontend\Galeri::video');

$routes->get('prestasi/(:segment)', 'Frontend\Prestasi::index/$1');

$routes->get('download', 'Frontend\Download::index');
$routes->get('link-aplikasi', 'Frontend\LinkAplikasi::index');
$routes->get('kontak', 'Frontend\Kontak::index');
