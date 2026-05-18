@extends('admin.layouts.app')

@section('title', 'Quản lý Banner & Slider')

@section('content')
<div x-data="{ openAddItem: false }" class="space-y-8 w-full">
    <!-- Slider Selector & Header -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center space-x-3">
            <div class="w-12 h-12 bg-brand-50 text-brand-600 rounded-xl flex items-center justify-center text-xl font-bold">
                <i class="fa-solid fa-images"></i>
            </div>
            <div>
                <h3 class="font-bold text-lg text-gray-800">Chọn vùng Banner / Slider</h3>
                <p class="text-xs text-gray-500">Quản lý hình ảnh động chuyển trang hoặc ảnh quảng cáo sidebar</p>
            </div>
        </div>

        <div class="flex items-center space-x-3 w-full sm:w-auto">
            <form action="{{ route('admin.sliders') }}" method="GET" class="w-full sm:w-auto">
                <select name="slider_id" onchange="this.form.submit()" class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-xl focus:ring-brand-500 focus:border-brand-500 block p-2.5 font-semibold shadow-sm w-full sm:w-auto">
                    @foreach($sliders as $slider)
                        <option value="{{ $slider->id }}" {{ ($currentSlider && $currentSlider->id == $slider->id) ? 'selected' : '' }}>
                            {{ $slider->name }} (Mã vùng: {{ $slider->slug }})
                        </option>
                    @endforeach
                </select>
            </form>
            <button @click="openAddItem = !openAddItem" class="bg-brand-500 hover:bg-brand-600 text-white font-bold px-4 py-2.5 rounded-xl text-sm shadow-md transition whitespace-nowrap flex items-center space-x-2">
                <i class="fa-solid fa-plus"></i>
                <span>Thêm ảnh mới</span>
            </button>
        </div> 
    </div>

    @if($currentSlider)
        <!-- Add Item Form (Drawer/Modal) -->
        <div x-show="openAddItem" x-transition x-cloak class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 bg-gradient-to-br from-brand-50/20 via-white to-white">
            <div class="flex items-center justify-between pb-4 mb-4 border-b border-gray-100">
                <h4 class="font-bold text-gray-800 flex items-center space-x-2">
                    <i class="fa-solid fa-cloud-arrow-up text-brand-600"></i>
                    <span>Thêm ảnh vào banner: {{ $currentSlider->name }}</span>
                </h4>
                <button @click="openAddItem = false" class="text-xs font-bold text-gray-500 hover:text-gray-800 px-2 py-1 rounded bg-gray-100">Đóng [X]</button>
            </div>

            <form action="{{ route('admin.slider_items.store', $currentSlider->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4 max-w-4xl">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 uppercase mb-1">1. Tải file ảnh từ máy tính <span class="text-red-500">*</span></label>
                        <input type="file" name="image_file" accept="image/*" class="w-full text-xs rounded-xl border border-gray-300 p-2 bg-white file:mr-2 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:font-bold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 shadow-sm" />
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-gray-700 uppercase mb-1">Hoặc điền link ảnh (URL)</label>
                        <input type="text" name="image_path" placeholder="https://..." class="w-full text-xs font-mono rounded-lg border border-gray-300 p-2.5 bg-white shadow-sm" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                    <div class="md:col-span-6">
                        <label class="block text-xs font-semibold text-gray-700 uppercase mb-1">Tiêu đề / Chú thích (Không bắt buộc)</label>
                        <input type="text" name="title" placeholder="Ví dụ: Khóa học tiếng Đức A1" class="w-full text-sm rounded-lg border border-gray-300 p-2.5 bg-white shadow-sm" />
                    </div>
                    <div class="md:col-span-4">
                        <label class="block text-xs font-semibold text-gray-700 uppercase mb-1">Link khi bấm vào ảnh (URL)</label>
                        <input type="text" name="link" placeholder="https://..." class="w-full text-sm rounded-lg border border-gray-300 p-2.5 bg-white shadow-sm font-mono text-xs" />
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-xs font-semibold text-gray-700 uppercase mb-1">Thứ tự</label>
                        <input type="number" name="display_order" required value="{{ $currentSlider->items->count() + 1 }}" class="w-full text-sm rounded-lg border border-gray-300 p-2.5 bg-white shadow-sm text-center font-bold" />
                    </div>
                </div>

                <div class="flex items-center space-x-2 pt-2">
                    <input type="checkbox" name="is_active" value="1" id="is_active_slider" checked class="w-4 h-4 text-brand-600 rounded border-gray-300 focus:ring-brand-500">
                    <label for="is_active_slider" class="text-sm font-semibold text-gray-700 cursor-pointer">Cho phép hiển thị trên trang web</label>
                </div>

                <div class="pt-3">
                    <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-white font-bold px-6 py-2.5 rounded-xl text-sm shadow-lg shadow-brand-500/25 transition flex items-center space-x-2">
                        <i class="fa-solid fa-check"></i>
                        <span>Hoàn tất tải lên</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Slider Items Grid -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-100">
                <h4 class="font-bold text-lg text-gray-800">Danh sách hình ảnh trong vùng: {{ $currentSlider->name }}</h4>
                <span class="bg-brand-50 text-brand-600 font-semibold px-3 py-1 rounded-full text-xs">Tổng số: {{ $currentSlider->items->count() }} ảnh</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($currentSlider->items as $item)
                    <div x-data="{ editing: false }" class="border border-gray-200 rounded-2xl overflow-hidden shadow-sm flex flex-col bg-white hover:border-gray-300 transition">
                        
                        <!-- Normal View -->
                        <div x-show="!editing" class="flex-1 flex flex-col justify-between">
                            <div class="relative bg-gray-100 h-48 overflow-hidden group">
                                <img src="{{ $item->image_path }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" alt="{{ $item->title }}">
                                @if($item->link)
                                    <div class="absolute bottom-2 left-2 bg-black/60 backdrop-blur-md text-white text-[10px] px-2 py-1 rounded-lg font-mono line-clamp-1 max-w-[80%]">
                                        🔗 {{ $item->link }}
                                    </div>
                                @endif
                                <div class="absolute top-2 right-2 flex space-x-1 bg-black/60 backdrop-blur-md p-1 rounded-lg">
                                    <button @click="editing = true" class="text-white hover:text-amber-400 font-bold p-1 px-1.5 rounded text-xs transition" title="Sửa banner">
                                        <i class="fa-solid fa-pen"></i> Sửa
                                    </button>
                                    <form action="{{ route('admin.slider_items.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa banner/ảnh này?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white hover:text-red-400 font-bold p-1 px-1.5 rounded text-xs transition" title="Xóa banner">
                                            <i class="fa-solid fa-trash"></i> Xóa
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="p-4 flex-1 flex flex-col justify-between">
                                <h5 class="font-bold text-gray-800 text-sm mb-2 line-clamp-1">{{ $item->title ?: '--- Không có tiêu đề ---' }}</h5>
                                <div class="flex items-center justify-between pt-3 border-t border-gray-100 text-xs text-gray-500 font-medium">
                                    <span>Thứ tự: <strong class="text-gray-900">{{ $item->display_order }}</strong></span>
                                    <span class="px-2 py-0.5 rounded text-[11px] font-semibold {{ $item->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-600' }}">
                                        {{ $item->is_active ? 'Đang hoạt động' : 'Tạm ẩn' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Editing Form View -->
                        <div x-show="editing" x-transition x-cloak class="p-4 bg-amber-50/90 border border-amber-200 rounded-2xl flex-1 flex flex-col justify-between space-y-3">
                            <div class="flex items-center justify-between pb-2 border-b border-amber-200 text-amber-900 font-bold text-xs">
                                <span>Chỉnh sửa banner #{{ $item->id }}</span>
                                <button @click="editing = false" type="button" class="text-gray-400 hover:text-gray-700 font-bold">&times;</button>
                            </div>
                            <form action="{{ route('admin.slider_items.update', $item->id) }}" method="POST" enctype="multipart/form-data" class="space-y-3 text-xs flex-1 flex flex-col justify-between">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label class="block text-[10px] font-bold text-gray-600 uppercase mb-1">Tiêu đề</label>
                                    <input type="text" name="title" value="{{ $item->title }}" class="w-full p-2 rounded-lg border border-gray-300 text-xs bg-white shadow-sm" placeholder="Tiêu đề banner..." />
                                </div>

                                <div>
                                    <label class="block text-[10px] font-bold text-gray-600 uppercase mb-1">Thay file ảnh mới</label>
                                    <input type="file" name="image_file" accept="image/*" class="w-full text-xs rounded-lg border border-gray-300 p-1 bg-white file:mr-2 file:py-0.5 file:px-2 file:rounded file:border-0 file:text-[11px] file:font-bold file:bg-amber-100 file:text-amber-800 shadow-sm" />
                                </div>

                                <input type="hidden" name="image_path" value="{{ $item->image_path }}" />

                                <div class="grid grid-cols-12 gap-2">
                                    <div class="col-span-8">
                                        <label class="block text-[10px] font-bold text-gray-600 uppercase mb-1">Đường dẫn khi click</label>
                                        <input type="text" name="link" value="{{ $item->link }}" class="w-full p-2 rounded-lg border border-gray-300 text-xs font-mono bg-white shadow-sm" placeholder="https://..." />
                                    </div>
                                    <div class="col-span-4">
                                        <label class="block text-[10px] font-bold text-gray-600 uppercase mb-1">Thứ tự</label>
                                        <input type="number" name="display_order" required value="{{ $item->display_order }}" class="w-full p-2 rounded-lg border border-gray-300 text-xs bg-white text-center font-bold shadow-sm" />
                                    </div>
                                </div>

                                <div class="flex items-center space-x-2 pt-1">
                                    <input type="checkbox" name="is_active" value="1" id="active_banner_{{ $item->id }}" {{ $item->is_active ? 'checked' : '' }} class="w-4 h-4 text-amber-600 rounded border-gray-300">
                                    <label for="active_banner_{{ $item->id }}" class="text-xs font-semibold text-gray-700 cursor-pointer">Hiển thị banner</label>
                                </div>

                                <div class="pt-3 flex space-x-2 border-t border-amber-200">
                                    <button type="submit" class="flex-1 bg-brand-500 hover:bg-brand-600 text-white font-bold py-2 px-3 rounded-lg text-xs shadow transition">Lưu thay đổi</button>
                                    <button @click="editing = false" type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-2 px-3 rounded-lg text-xs transition">Hủy</button>
                                </div>
                            </form>
                        </div>

                    </div>
                @empty
                    <div class="col-span-full p-12 bg-gray-50 rounded-2xl border border-dashed border-gray-200 text-center text-gray-500">
                        Chưa có hình ảnh nào trong vùng này. Bấm nút "Thêm ảnh mới" ở trên để tạo banner.
                    </div>
                @endforelse
            </div>
        </div>
    @endif
</div>
@endsection
