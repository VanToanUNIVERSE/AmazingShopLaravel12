<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Quản trị')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow">
        <div class="max-w-6xl mx-auto p-6 flex justify-between items-center">
            <h1 class="text-xl font-bold">Admin Panel</h1>
            <nav>
                <a href="{{ route('admin.categories.index') }}" class="text-gray-700 hover:text-gray-900 mr-4">Danh mục</a>
                <a href="" class="text-gray-700 hover:text-gray-900">Sản phẩm</a>
            </nav>
        </div>
    </header>
    <main class="mx-auto p-6">
        @yield('content')
    </main>
    <footer class="bg-white shadow mt-6">
        <div class="max-w-6xl mx-auto p-6 text-center text-gray-600">
            &copy; {{ date('Y') }} Amazing Shop. All rights reserved.
        </div>
    </footer>
</body>
</html>