@extends('admin.layouts.app')

@section('title', 'Quản lý Danh mục Bài viết')

@section('content')
<div class="space-y-6 w-full">
    <!-- Header bar -->
    <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center space-x-4">
            <div class="w-14 h-14 bg-brand-50 text-brand-600 rounded-2xl flex items-center justify-center text-2xl font-bold">
                <i class="fa-solid fa-folder-tree"></i>
            </div>
            <div>
                <h3 class="font-extrabold text-xl text-gray-900">Danh mục Bài viết & Tin tức</h3>
                <p class="text-xs text-gray-500 mt-0.5">Phân loại các tin tức, hoạt động, thông báo của trung tâm</p>
            </div>
        </div>
        @if(isset($category))
            <a href="{{ route('admin.categories') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold px-4 py-2.5 rounded-xl text-xs transition flex items-center space-x-2">
                <i class="fa-solid fa-plus"></i>
                <span>Chuyển sang Thêm mới</span>
            </a>
        @endif
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
        <!-- Form: Create or Edit -->
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 lg:col-span-1">
            <h4 class="font-extrabold text-base text-gray-900 mb-6 flex items-center space-x-2 border-b border-gray-100 pb-4">
                <i class="fa-solid {{ isset($category) ? 'fa-pen text-amber-500' : 'fa-plus text-brand-600' }}"></i>
                <span>{{ isset($category) ? 'Chỉnh sửa: ' . $category->name : 'Thêm danh mục mới' }}</span>
            </h4>

            <form action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}" method="POST" class="space-y-5">
                @csrf
                @if(isset($category))
                    @method('PUT')
                @endif

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Tên danh mục <span class="text-red-500">*</span></label>
                    <input type="text" name="name" required value="{{ old('name', $category->name ?? '') }}" class="w-full text-sm rounded-xl border border-gray-300 p-3 bg-white text-gray-900 font-bold focus:ring-brand-500 focus:border-brand-500 shadow-xs placeholder:font-normal placeholder:text-gray-400" placeholder="Ví dụ: Tin tức sự kiện" />
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Đường dẫn tĩnh (Slug)</label>
                    <input type="text" name="slug" value="{{ old('slug', $category->slug ?? '') }}" class="w-full text-xs font-mono rounded-xl border border-gray-300 p-3 bg-gray-50 text-gray-600 focus:ring-brand-500 focus:border-brand-500 shadow-xs" placeholder="tin-tuc-su-kien (Tự động nếu để trống)" />
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Mô tả danh mục</label>
                    <textarea name="description" rows="3" class="w-full text-xs rounded-xl border border-gray-300 p-3 bg-white text-gray-700 focus:ring-brand-500 focus:border-brand-500 shadow-xs leading-relaxed" placeholder="Mô tả tóm tắt...">{{ old('description', $category->description ?? '') }}</textarea>
                </div>

                <div class="pt-2">
                    <button type="submit" class="w-full {{ isset($category) ? 'bg-amber-500 hover:bg-amber-600 shadow-amber-500/30' : 'bg-brand-500 hover:bg-brand-600 shadow-brand-500/30' }} text-white font-extrabold p-3.5 rounded-xl text-sm shadow-lg transition transform hover:-translate-y-0.5 flex items-center justify-center space-x-2">
                        <i class="fa-solid fa-floppy-disk text-base"></i>
                        <span>{{ isset($category) ? 'Lưu thay đổi' : 'Tạo danh mục' }}</span>
                    </button>
                    @if(isset($category))
                        <a href="{{ route('admin.categories') }}" class="block text-center mt-3 text-xs text-gray-500 hover:text-gray-700 font-semibold underline">Hủy chỉnh sửa</a>
                    @endif
                </div>
            </form>
        </div>

        <!-- Categories List Table -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden lg:col-span-2">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <h4 class="font-extrabold text-base text-gray-900">Danh sách các danh mục hiện có</h4>
                <span class="bg-brand-50 text-brand-700 font-bold px-3 py-1 rounded-full text-xs">{{ $categories->count() }} danh mục</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/75 text-gray-500 uppercase text-[11px] tracking-wider border-b border-gray-100 font-bold">
                            <th class="py-3.5 px-6">Tên & Mô tả</th>
                            <th class="py-3.5 px-6">Đường dẫn tĩnh (Slug)</th>
                            <th class="py-3.5 px-6 text-center">Số bài viết</th>
                            <th class="py-3.5 px-6 text-right">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-sm text-gray-700 font-medium">
                        @forelse($categories as $item)
                            <tr class="hover:bg-gray-50/50 transition {{ (isset($category) && $category->id == $item->id) ? 'bg-amber-50/50' : '' }}">
                                <td class="py-4 px-6">
                                    <div class="font-bold text-gray-900 text-base mb-0.5">{{ $item->name }}</div>
                                    @if($item->description)
                                        <div class="text-xs text-gray-500 line-clamp-1 max-w-sm">{{ $item->description }}</div>
                                    @endif
                                </td>
                                <td class="py-4 px-6 font-mono text-xs text-brand-600">
                                    {{ $item->slug }}
                                </td>
                                <td class="py-4 px-6 text-center font-bold">
                                    <span class="bg-gray-100 px-2.5 py-1 rounded-lg text-xs">{{ $item->posts_count ?? 0 }}</span>
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap text-right space-x-1">
                                    <a href="{{ route('admin.categories.edit', $item->id) }}" class="inline-flex items-center justify-center bg-brand-50 hover:bg-brand-500 text-brand-600 hover:text-white font-bold px-2.5 py-1.5 rounded-xl text-xs transition shadow-xs">
                                        <i class="fa-solid fa-pen mr-1"></i> Sửa
                                    </a>
                                    <form action="{{ route('admin.categories.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center justify-center bg-red-50 hover:bg-red-500 text-red-600 hover:text-white font-bold px-2.5 py-1.5 rounded-xl text-xs transition shadow-xs">
                                            <i class="fa-solid fa-trash mr-1"></i> Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-12 text-gray-500 font-medium text-xs">
                                    Chưa có danh mục nào ngoài danh mục hệ thống.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
