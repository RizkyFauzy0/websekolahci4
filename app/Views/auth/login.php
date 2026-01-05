<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Website Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-blue-500 to-blue-700 min-h-screen flex items-center justify-center px-4">
    
    <div class="max-w-md w-full">
        <!-- Login Card -->
        <div class="bg-white rounded-lg shadow-2xl overflow-hidden">
            <!-- Header -->
            <div class="bg-blue-600 text-white py-8 px-6 text-center">
                <div class="w-20 h-20 bg-white rounded-full mx-auto mb-4 flex items-center justify-center">
                    <i class="fas fa-user-shield text-blue-600 text-4xl"></i>
                </div>
                <h2 class="text-2xl font-bold">Login Admin</h2>
                <p class="text-blue-100 text-sm mt-2">Website Sekolah</p>
            </div>
            
            <!-- Form -->
            <div class="p-8">
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <i class="fas fa-exclamation-circle mr-2"></i>
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
                
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        <i class="fas fa-check-circle mr-2"></i>
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>
                
                <form action="<?= base_url('admin/login') ?>" method="POST">
                    <?= csrf_field() ?>
                    
                    <!-- Username -->
                    <div class="mb-6">
                        <label for="username" class="block text-gray-700 font-medium mb-2">
                            <i class="fas fa-user mr-2"></i>Username atau Email
                        </label>
                        <input type="text" 
                               id="username" 
                               name="username" 
                               value="<?= old('username') ?>"
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition"
                               placeholder="Masukkan username atau email"
                               required>
                        <?php if (isset($errors['username'])): ?>
                            <p class="text-red-500 text-sm mt-1"><?= $errors['username'] ?></p>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 font-medium mb-2">
                            <i class="fas fa-lock mr-2"></i>Password
                        </label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-blue-500 transition"
                               placeholder="Masukkan password"
                               required>
                        <?php if (isset($errors['password'])): ?>
                            <p class="text-red-500 text-sm mt-1"><?= $errors['password'] ?></p>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Remember Me -->
                    <div class="mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="remember" class="mr-2">
                            <span class="text-gray-700 text-sm">Ingat saya</span>
                        </label>
                    </div>
                    
                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-medium">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </button>
                </form>
                
                <!-- Back to Home -->
                <div class="mt-6 text-center">
                    <a href="<?= base_url('/') ?>" class="text-blue-600 hover:text-blue-800 text-sm">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Info -->
        <div class="text-center mt-6 text-white text-sm">
            <p>Default Login: <strong>admin</strong> / <strong>admin123</strong></p>
        </div>
    </div>
    
</body>
</html>
