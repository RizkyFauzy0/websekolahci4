<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' - ' : '' ?><?= esc($settings['nama_sekolah'] ?? 'Website Sekolah') ?></title>
    <meta name="description" content="<?= esc($meta_description ?? 'Website Resmi Sekolah') ?>">
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Alpine.js for interactive components -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
    </style>
    
    <?= $this->renderSection('styles') ?>
</head>
<body class="font-sans antialiased bg-gray-50">
    
    <!-- Header/Navigation -->
    <?= $this->include('layouts/partials/header') ?>
    
    <!-- Main Content -->
    <main>
        <?= $this->renderSection('content') ?>
    </main>
    
    <!-- Footer -->
    <?= $this->include('layouts/partials/footer') ?>
    
    <?= $this->renderSection('scripts') ?>
</body>
</html>
