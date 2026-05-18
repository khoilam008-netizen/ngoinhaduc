@extends('admin.layouts.app')

@section('title', 'Quản lý bài viết & Tin tức')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
        <h3 class="font-bold text-lg text-gray-800">Danh sách bài viết</h3>
        <span class="bg-purple-50 text-purple-600 font-semibold px-3 py-1 rounded-full text-xs">Tổng số: {{ $posts->total() }}</span>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/75 text-gray-500 uppercase text-xs tracking-wider border-b border-gray-100 font-semibold">
                    <th class="py-4 px-6 w-16">Ảnh</th>
                    <th class="py-4 px-6">Tiêu đề</th>
                    <th class="py-4 px-6">Danh mục</th>
                    <th class="py-4 px-6">Trạng thái</th>
                    <th class="py-4 px-6">Ngày đăng</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                @forelse($posts as $post)
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="py-4 px-6">
                            <img src="{{ $post->thumbnail ?? 'https://via.placeholder.com/150' }}" class="w-12 h-12 rounded-lg object-cover border border-gray-200 shadow-sm" alt="">
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-bold text-gray-900 text-base mb-1">{{ $post->title }}</div>
                            <div class="text-xs text-gray-500 line-clamp-1">{!! strip_tags($post->excerpt) !!}</div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-gray-100 text-gray-700 border border-gray-200">
                                {{ $post->category->name ?? 'Không phân loại' }}
                            </span>
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap">
                            @if($post->is_featured)
                                <span class="bg-amber-100 text-amber-700 px-2.5 py-1 rounded-lg text-xs font-semibold border border-amber-200">
                                    <i class="fa-solid fa-star text-amber-500 mr-1"></i> Nổi bật
                                </span>
                            @else
                                <span class="bg-green-100 text-green-700 px-2.5 py-1 rounded-lg text-xs font-semibold border border-green-200">
                                    Đã xuất bản
                                </span>
                            @endif
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap text-gray-500 text-xs">
                            {{ $post->created_at->format('d/m/Y') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-12 text-gray-500">
                            Không có bài viết nào.
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
@endsection
