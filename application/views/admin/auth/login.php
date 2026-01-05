<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Website Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-500 to-indigo-600 min-h-screen flex items-center justify-center px-4">
    <div class="max-w-md w-full">
        <div class="bg-white rounded-lg shadow-2xl overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-6 text-center">
                <h2 class="text-3xl font-bold text-white mb-2">Admin Panel</h2>
                <p class="text-blue-100">Website Sekolah</p>
            </div>
            
            <div class="p-8">
                <?php if($this->session->flashdata('error')): ?>
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <?= $this->session->flashdata('error') ?>
                    </div>
                <?php endif; ?>
                
                <?php if($this->session->flashdata('success')): ?>
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        <?= $this->session->flashdata('success') ?>
                    </div>
                <?php endif; ?>

                <?= form_open('admin/login', 'id="loginForm"') ?>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="username">
                            Username
                        </label>
                        <input type="text" 
                               name="username" 
                               id="username" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="Masukkan username"
                               required>
                        <?= form_error('username', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-semibold mb-2" for="password">
                            Password
                        </label>
                        <input type="password" 
                               name="password" 
                               id="password" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="Masukkan password"
                               required>
                        <?= form_error('password', '<p class="text-red-500 text-xs mt-1">', '</p>') ?>
                    </div>

                    <button type="submit" 
                            class="w-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold py-3 px-4 rounded-lg hover:from-blue-700 hover:to-indigo-700 transition duration-300 transform hover:scale-[1.02]">
                        Login
                    </button>
                <?= form_close() ?>

                <div class="mt-6 text-center">
                    <a href="<?= base_url() ?>" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                        ← Kembali ke Website
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center mt-6 text-white text-sm">
            <p>Default login: admin / admin123</p>
        </div>
    </div>
</body>
</html>
