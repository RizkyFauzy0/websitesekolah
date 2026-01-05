<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' - ' : '' ?>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <!-- Top Navigation -->
    <nav class="bg-white shadow-lg fixed top-0 left-0 right-0 z-50">
        <div class="flex items-center justify-between px-6 py-4">
            <div class="flex items-center">
                <button id="sidebarToggle" class="text-gray-600 hover:text-gray-800 mr-4 lg:hidden">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h1 class="text-2xl font-bold text-blue-600">Admin Panel</h1>
            </div>
            
            <div class="flex items-center space-x-4">
                <a href="<?= base_url() ?>" target="_blank" class="text-gray-600 hover:text-blue-600">
                    <i class="fas fa-external-link-alt"></i> Lihat Website
                </a>
                <div class="relative group">
                    <button class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                        <i class="fas fa-user-circle text-2xl"></i>
                        <span class="hidden md:block"><?= $user['nama_lengkap'] ?></span>
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div class="hidden group-hover:block absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-2">
                        <a href="<?= base_url('admin/logout') ?>" class="block px-4 py-2 text-gray-800 hover:bg-blue-50">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex pt-16">
