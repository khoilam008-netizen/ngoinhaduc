@extends('admin.layouts.app')

@section('title', 'Quản lý bài viết & Tin tức')

@section('content')
<div class="space-y-6 w-full">
    <!-- Header bar -->
    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center space-x-4">
            <div class="w-14 h-14 bg-brand-50 text-brand-600 rounded-2xl flex items-center justify-center text-2xl font-bold">
                <i class="fa-solid fa-newspaper"></i>
            </div>
            <div>
                <div class="flex items-center space-x-2">
                    <h3 class="font-extrabold text-xl text-gray-900">Danh sách Bài viết & Tin tức</h3>
                    <span class="bg-brand-100 text-brand-700 font-bold px-3 py-0.5 rounded-full text-xs">Tổng số: {{ $posts->total() }}</span>
                </div>
                <p class="text-xs text-gray-500 mt-0.5">Quản lý nội dung tin tức, sự kiện và thông báo của trung tâm</p>
            </div>
        </div>
        <a href="{{ route('admin.posts.create') }}" class="bg-brand-500 hover:bg-brand-600 text-white font-extrabold px-6 py-3 rounded-2xl text-sm shadow-lg shadow-brand-500/25 transition flex items-center space-x-2">
            <i class="fa-solid fa-plus text-lg"></i>
            <span>Tạo bài viết mới</span>
        </a>
    </div>

    <!-- Posts Table -->
    <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/75 text-gray-500 uppercase text-xs tracking-wider border-b border-gray-100 font-bold">
                        <th class="py-4 px-6 w-20">Ảnh</th>
                        <th class="py-4 px-6">Tiêu đề & Tóm tắt</th>
                        <th class="py-4 px-6">Danh mục</th>
                        <th class="py-4 px-6">Trạng thái</th>
                        <th class="py-4 px-6">Ngày đăng</th>
                        <th class="py-4 px-6 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm text-gray-700 font-medium">
                    @forelse($posts as $post)
                        <tr class="hover:bg-gray-50/50 transition">
                            <td class="py-4 px-6">
                                <img src="{{ $post->thumbnail ?? 'https://via.placeholder.com/150' }}" class="w-14 h-14 rounded-2xl object-cover border border-gray-200 shadow-xs" alt="">
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-bold text-gray-900 text-base mb-1 hover:text-brand-600 transition">
                                    <a href="{{ route('admin.posts.edit', $post->id) }}">{{ $post->title }}</a>
                                </div>
                                <div class="text-xs text-gray-500 line-clamp-1 max-w-xl">{!! strip_tags($post->excerpt ?: strip_tags($post->content)) !!}</div>
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-xl text-xs font-bold bg-gray-100 text-gray-700 border border-gray-200">
                                    {{ $post->category->name ?? 'Không phân loại' }}
                                </span>
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap">
                                @if($post->is_featured)
                                    <span class="bg-amber-100 text-amber-700 px-3 py-1 rounded-xl text-xs font-bold border border-amber-200 inline-flex items-center space-x-1">
                                        <i class="fa-solid fa-star text-amber-500"></i>
                                        <span>Nổi bật</span>
                                    </span>
                                @else
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-xl text-xs font-bold border border-green-200 inline-flex items-center">
                                        {{ $post->is_published ? 'Đã xuất bản' : 'Bản nháp' }}
                                    </span>
                                @endif
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap text-gray-500 text-xs">
                                {{ $post->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="py-4 px-6 whitespace-nowrap text-right space-x-1">
                                <a href="{{ route('admin.posts.edit', $post->id) }}" class="inline-flex items-center justify-center bg-brand-50 hover:bg-brand-500 text-brand-600 hover:text-white font-bold px-3 py-2 rounded-xl text-xs transition shadow-xs">
                                    <i class="fa-solid fa-pen mr-1.5"></i> Sửa
                                </a>
                                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa bài viết này?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center justify-center bg-red-50 hover:bg-red-500 text-red-600 hover:text-white font-bold px-3 py-2 rounded-xl text-xs transition shadow-xs">
                                        <i class="fa-solid fa-trash mr-1.5"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-16 text-gray-500 font-medium">
                                <div class="space-y-3">
                                    <i class="fa-solid fa-folder-open text-4xl text-gray-300"></i>
                                    <p>Chưa có bài viết nào trong hệ thống.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($posts->hasPages())
            <div class="p-6 border-t border-gray-100">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
