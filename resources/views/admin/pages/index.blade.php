@extends('admin.layouts.app')

@section('title', 'Quản lý Nội dung cố định (Giới thiệu)')

@section('content')
<div class="space-y-6 w-full">
    <!-- Header bar -->
    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center space-x-4">
            <div class="w-14 h-14 bg-brand-50 text-brand-600 rounded-2xl flex items-center justify-center text-2xl font-bold">
                <i class="fa-solid fa-file-lines"></i>
            </div>
            <div>
                <div class="flex items-center space-x-2">
                    <h3 class="font-extrabold text-xl text-gray-900">Quản lý nội dung 7 Trang cố định (Mục Giới thiệu)</h3>
                    <span class="bg-brand-100 text-brand-700 font-bold px-3 py-0.5 rounded-full text-xs">Cố định: 7 trang</span>
                </div>
                <p class="text-xs text-gray-500 mt-0.5">Quản lý và chỉnh sửa nội dung cố định cho 7 menu con thuộc chuyên mục Giới thiệu ngoài trang web</p>
            </div>
        </div>
    </div>

    <!-- Pages Table -->
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/75 text-gray-500 uppercase text-xs tracking-wider border-b border-gray-100 font-bold">
                        {{-- <th class="py-4 px-6 w-20">Ảnh bìa</th> --}}
                        <th class="py-4 px-6">Tên trang & URL tĩnh</th>
                        <th class="py-4 px-6">Trạng thái</th>
                        <th class="py-4 px-6">Lần cập nhật cuối</th>
                        <th class="py-4 px-6 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm text-gray-700 font-medium">
                    @forelse($pages as $page)
                        <tr class="hover:bg-gray-50/50 transition">
                            {{-- 
                            <td class="py-4 px-6">
                                <img src="{{ $page->thumbnail ?? 'https://via.placeholder.com/150' }}" class="w-14 h-14 rounded-2xl object-cover border border-gray-200 shadow-xs" alt="">
                            </td>
                            --}}
                            <td class="py-4 px-6">
                                <div class="font-bold text-gray-900 text-base mb-1 hover:text-brand-600 transition">
                                    <a href="{{ route('admin.pages.edit', $page->id) }}">{{ $page->title }}</a>
                                </div>
                                <div class="text-xs text-brand-600 font-mono flex items-center space-x-1">
                                    <i class="fa-solid fa-globe text-[10px]"></i>
                                    <a href="{{ url('/gioi-thieu/' . $page->slug) }}" target="_blank" class="hover:underline">/gioi-thieu/{{ $page->slug }}</a>
                                </div>
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap">
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-xl text-xs font-bold border border-green-200 inline-flex items-center">
                                    {{ $page->is_published ? 'Đã xuất bản' : 'Tạm ẩn' }}
                                </span>
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap text-gray-500 text-xs font-mono">
                                {{ $page->updated_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap text-right space-x-2">
                                <a href="{{ url('/gioi-thieu/' . $page->slug) }}" target="_blank" class="inline-flex items-center justify-center bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold px-3 py-2 rounded-xl text-xs transition shadow-xs" title="Xem trước trang ngoài web">
                                    <i class="fa-solid fa-eye mr-1.5"></i> Xem
                                </a>
                                <a href="{{ route('admin.pages.edit', $page->id) }}" class="inline-flex items-center justify-center bg-brand-50 hover:bg-brand-500 text-brand-600 hover:text-white font-bold px-3.5 py-2 rounded-xl text-xs transition shadow-xs">
                                    <i class="fa-solid fa-pen mr-1.5"></i> Sửa nội dung
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-16 text-gray-500 font-medium">
                                <div class="space-y-3">
                                    <i class="fa-solid fa-folder-open text-4xl text-gray-300"></i>
                                    <p>Chưa có trang tĩnh nào thuộc mục Giới thiệu.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
