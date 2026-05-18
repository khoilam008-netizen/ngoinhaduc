<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bảng điều khiển quản trị') – Ngôi nhà Đức</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f5f9eb',
                            100: '#e8f2d3',
                            500: '#8ab828',
                            600: '#759d20',
                            700: '#5c7b18',
                        }
                    }
                }
            }
        }
    </script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @stack('styles')
    <style>
        body { font-family: 'Inter', sans-serif; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-100 text-gray-800 antialiased flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white flex flex-col shrink-0">
        <div class="p-5 border-b border-gray-800 flex items-center space-x-3">
            <div class="w-10 h-10 bg-brand-500 rounded-lg flex items-center justify-center font-bold text-xl shadow-lg">
                N
            </div>
            <div>
                <h1 class="font-bold text-lg leading-tight">Ngôi Nhà Đức</h1>
                <p class="text-xs text-brand-500 font-medium">Hệ thống quản trị</p>
            </div>
        </div>

        <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg transition font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-brand-500 text-white shadow-md shadow-brand-500/30' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <i class="fa-solid fa-gauge w-5 text-center"></i>
                <span>Tổng quan</span>
            </a>

            <div class="pt-4 pb-2 px-3 text-xs font-semibold uppercase text-gray-500">Tuyển sinh & Thi</div>

            <a href="{{ route('admin.enrollments') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg transition font-medium {{ request()->routeIs('admin.enrollments') ? 'bg-brand-500 text-white shadow-md shadow-brand-500/30' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <i class="fa-solid fa-graduation-cap w-5 text-center"></i>
                <span>Đơn nhập học</span>
            </a>

            <a href="{{ route('admin.exam_regs') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg transition font-medium {{ request()->routeIs('admin.exam_regs') ? 'bg-brand-500 text-white shadow-md shadow-brand-500/30' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <i class="fa-solid fa-file-signature w-5 text-center"></i>
                <span>Đơn dự thi</span>
            </a>

            <div class="pt-4 pb-2 px-3 text-xs font-semibold uppercase text-gray-500">Nội dung</div>

            <a href="{{ route('admin.schedules') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg transition font-medium {{ request()->routeIs('admin.schedules') ? 'bg-brand-500 text-white shadow-md shadow-brand-500/30' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <i class="fa-solid fa-calendar-days w-5 text-center"></i>
                <span>Lịch học & thi</span>
            </a>

            <a href="{{ route('admin.galleries') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg transition font-medium {{ request()->routeIs('admin.galleries') ? 'bg-brand-500 text-white shadow-md shadow-brand-500/30' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <i class="fa-solid fa-images w-5 text-center"></i>
                <span>Thư viện ảnh</span>
            </a>

            <div x-data="{ openPosts: {{ (request()->routeIs('admin.posts*') || request()->routeIs('admin.categories*')) ? 'true' : 'false' }} }" class="space-y-1">
                <button @click="openPosts = !openPosts" type="button" class="w-full flex items-center justify-between px-4 py-3 rounded-lg transition font-medium text-gray-400 hover:bg-gray-800 hover:text-white cursor-pointer">
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-newspaper w-5 text-center"></i>
                        <span>Bài viết & Tin</span>
                    </div>
                    <i class="fa-solid text-xs transition-transform duration-200" :class="openPosts ? 'fa-chevron-down' : 'fa-chevron-right'"></i>
                </button>
                <div x-show="openPosts" x-transition class="pl-8 space-y-1 pt-1">
                    <a href="{{ route('admin.categories') }}" class="flex items-center px-3 py-2.5 rounded-lg text-xs transition {{ request()->routeIs('admin.categories*') ? 'bg-brand-500 text-white font-bold shadow-sm shadow-brand-500/30' : 'text-gray-400 hover:text-white hover:bg-gray-800/50 font-medium' }}">
                        <i class="fa-solid fa-folder w-4 mr-2"></i> Danh mục
                    </a>
                    <a href="{{ route('admin.posts') }}" class="flex items-center px-3 py-2.5 rounded-lg text-xs transition {{ request()->routeIs('admin.posts*') ? 'bg-brand-500 text-white font-bold shadow-sm shadow-brand-500/30' : 'text-gray-400 hover:text-white hover:bg-gray-800/50 font-medium' }}">
                        <i class="fa-solid fa-file-pen w-4 mr-2"></i> Tất cả bài viết
                    </a>
                </div>
            </div>

            <a href="{{ route('admin.pages') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg transition font-medium {{ request()->routeIs('admin.pages*') ? 'bg-brand-500 text-white shadow-md shadow-brand-500/30' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <i class="fa-solid fa-file-lines w-5 text-center"></i>
                <span>Trang (Giới thiệu)</span>
            </a>

            <a href="{{ route('admin.menus') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg transition font-medium {{ request()->routeIs('admin.menus') ? 'bg-brand-500 text-white shadow-md shadow-brand-500/30' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <i class="fa-solid fa-list-ul w-5 text-center"></i>
                <span>Quản lý Menu</span>
            </a>

            <a href="{{ route('admin.sliders') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg transition font-medium {{ request()->routeIs('admin.sliders') ? 'bg-brand-500 text-white shadow-md shadow-brand-500/30' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <i class="fa-solid fa-rectangle-ad w-5 text-center"></i>
                <span>Banner & Slider</span>
            </a>

            <div class="pt-4 pb-2 px-3 text-xs font-semibold uppercase text-gray-500">Hệ thống</div>

            <a href="{{ route('admin.settings') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg transition font-medium {{ request()->routeIs('admin.settings') ? 'bg-brand-500 text-white shadow-md shadow-brand-500/30' : 'text-gray-400 hover:bg-gray-800 hover:text-white' }}">
                <i class="fa-solid fa-gear w-5 text-center"></i>
                <span>Cài đặt chung</span>
            </a>
        </nav>

        <div class="p-4 border-t border-gray-800 text-center">
            <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center justify-center space-x-2 text-sm text-gray-400 hover:text-white transition bg-gray-800 hover:bg-gray-700 px-4 py-2.5 rounded-lg w-full">
                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                <span>Đến trang web</span>
            </a>
        </div>
    </aside>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col min-w-0">
        <!-- Header -->
        <header class="bg-white border-b border-gray-200 h-16 flex items-center justify-between px-8 shadow-sm shrink-0">
            <div class="flex items-center space-x-4">
                <h2 class="text-xl font-bold text-gray-800">@yield('title')</h2>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-sm font-medium text-gray-600 bg-gray-100 py-1.5 px-3 rounded-full flex items-center space-x-2">
                    <span class="w-2.5 h-2.5 bg-green-500 rounded-full animate-pulse"></span>
                    <span>Admin Active</span>
                </span>
            </div>
        </header>

        <!-- Main Body -->
        <main class="flex-1 p-8 overflow-y-auto">
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl flex items-center space-x-3 shadow-sm">
                    <i class="fa-solid fa-circle-check text-green-500 text-xl"></i>
                    <span class="font-medium">{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl space-y-2 shadow-sm">
                    <div class="flex items-center space-x-3 font-semibold">
                        <i class="fa-solid fa-circle-exclamation text-red-500 text-xl"></i>
                        <span>Vui lòng kiểm tra lại các lỗi sau:</span>
                    </div>
                    <ul class="list-disc list-inside text-sm pl-6 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
