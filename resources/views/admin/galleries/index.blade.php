@extends('admin.layouts.app')

@section('title', 'Quản lý thư viện ảnh')

@section('content')
<!-- Add Album Section -->
<div x-data="{ openAddGallery: false }" class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8">
    <div class="p-6 flex items-center justify-between cursor-pointer hover:bg-gray-50/50 transition border-b border-gray-100" @click="openAddGallery = !openAddGallery">
        <h3 class="font-bold text-lg text-brand-700 flex items-center space-x-2">
            <i class="fa-solid fa-folder-plus"></i>
            <span>Thêm album ảnh mới</span>
        </h3>
        <span class="text-xs text-gray-500 font-semibold" x-text="openAddGallery ? 'Ẩn biểu mẫu [-]' : 'Mở biểu mẫu [+]'"></span>
    </div>

    <div x-show="openAddGallery" x-transition x-cloak class="p-6 bg-gray-50/50">
        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 max-w-4xl">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Tên Album <span class="text-red-500">*</span></label>
                    <input type="text" name="title" required placeholder="Ví dụ: Hoạt động ngoại khóa" class="w-full text-sm rounded-lg border border-gray-300 p-2.5 bg-white shadow-sm" />
                </div>
                <div>
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Đường dẫn (Slug) <span class="text-red-500">*</span></label>
                    <input type="text" name="slug" required placeholder="hoat-dong-ngoi-khoa" class="w-full text-sm rounded-lg border border-gray-300 p-2.5 bg-white shadow-sm font-mono text-xs" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                <div class="md:col-span-5">
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Tải lên ảnh bìa từ máy tính</label>
                    <input type="file" name="cover_image_file" accept="image/*" class="w-full text-xs rounded-lg border border-gray-300 p-2 bg-white shadow-sm file:mr-3 file:py-1 file:px-3 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100" />
                </div>
                <div class="md:col-span-4">
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Hoặc nhập đường dẫn ảnh bìa (URL)</label>
                    <input type="text" name="cover_image" placeholder="https://..." class="w-full text-sm rounded-lg border border-gray-300 p-2.5 bg-white shadow-sm font-mono text-xs" />
                </div>
                <div class="md:col-span-3">
                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Thứ tự hiển thị</label>
                    <input type="number" name="display_order" required value="0" class="w-full text-sm rounded-lg border border-gray-300 p-2.5 bg-white shadow-sm" />
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Mô tả ngắn</label>
                <textarea name="description" rows="2" placeholder="Mô tả về album ảnh..." class="w-full text-sm rounded-lg border border-gray-300 p-2.5 bg-white shadow-sm"></textarea>
            </div>

            <div class="flex items-center space-x-2 pt-2">
                <input type="checkbox" name="is_active" value="1" id="is_active_new" checked class="w-4 h-4 text-brand-600 rounded border-gray-300 focus:ring-brand-500">
                <label for="is_active_new" class="text-sm font-semibold text-gray-700 cursor-pointer">Cho phép hiển thị trên trang Thư viện ảnh</label>
            </div>

            <div class="pt-2">
                <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-white font-bold px-5 py-2.5 rounded-lg text-sm shadow-md transition">
                    <i class="fa-solid fa-plus mr-1.5"></i> Tạo album
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Albums Grid -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-8">
    <div class="flex items-center justify-between mb-6 border-b border-gray-100 pb-4">
        <h3 class="font-bold text-lg text-gray-800">Danh sách các album hiện có</h3>
        <span class="bg-brand-50 text-brand-600 font-semibold px-3 py-1 rounded-full text-xs">Tổng số: {{ count($galleries) }} album</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($galleries as $gallery)
            <div x-data="{ editingAlbum: false, openImagesModal: {{ session('open_gallery_id') == $gallery->id ? 'true' : 'false' }} }" class="border border-gray-200 rounded-2xl overflow-hidden shadow-sm flex flex-col transition hover:shadow-md bg-white">
                
                <!-- Display Card View -->
                <div x-show="!editingAlbum" class="flex-1 flex flex-col justify-between">
                    <div>
                        <div class="relative h-48 bg-gray-100 overflow-hidden group">
                            <img src="{{ $gallery->cover_image ?? 'https://via.placeholder.com/400x300?text=No+Cover' }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/20 to-transparent"></div>
                            <div class="absolute bottom-3 left-3 right-3 text-white">
                                <h4 class="font-bold text-lg leading-tight">{{ $gallery->title }}</h4>
                                <p class="text-xs text-gray-200 line-clamp-1 mt-0.5">{{ $gallery->description }}</p>
                            </div>
                            <div class="absolute top-3 right-3 flex space-x-1.5 bg-black/60 backdrop-blur-md p-1 rounded-lg">
                                <button @click="editingAlbum = true" class="text-white hover:text-amber-400 p-1 px-1.5 transition text-xs font-bold" title="Sửa album">
                                    <i class="fa-solid fa-pen"></i> Sửa
                                </button>
                                <form action="{{ route('admin.galleries.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa toàn bộ album này và tất cả các ảnh bên trong?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white hover:text-red-400 p-1 px-1.5 transition text-xs font-bold" title="Xóa album">
                                        <i class="fa-solid fa-trash"></i> Xóa
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex items-center justify-between mb-3">
                                <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Hình ảnh ({{ $gallery->images->count() }})</span>
                                <button @click="openImagesModal = true" class="text-xs font-bold text-brand-600 hover:text-brand-700 bg-brand-50 px-2.5 py-1 rounded-lg transition flex items-center space-x-1">
                                    <i class="fa-solid fa-images"></i>
                                    <span>Quản lý ảnh &rarr;</span>
                                </button>
                            </div>
                            <div class="flex flex-wrap gap-2 mt-2 min-h-12 items-center bg-gray-50 p-2 rounded-xl">
                                @forelse($gallery->images->take(5) as $img)
                                    <div class="relative group/img">
                                        <img src="{{ $img->image_path }}" class="w-10 h-10 rounded-lg object-cover border border-gray-200 shadow-sm" alt="{{ $img->caption }}">
                                    </div>
                                @empty
                                    <span class="text-xs text-gray-400 italic px-2">Chưa có hình ảnh nào.</span>
                                @endforelse
                                @if($gallery->images->count() > 5)
                                    <div class="w-10 h-10 rounded-lg bg-gray-200 text-gray-700 font-bold text-xs flex items-center justify-center border border-gray-300">
                                        +{{ $gallery->images->count() - 5 }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="p-4 pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500 bg-gray-50/50">
                        <span>Thứ tự: <strong class="text-gray-700">{{ $gallery->display_order }}</strong></span>
                        <span class="px-2 py-1 rounded font-semibold {{ $gallery->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-200 text-gray-600' }}">
                            {{ $gallery->is_active ? 'Hiển thị' : 'Đã ẩn' }}
                        </span>
                    </div>
                </div>
                
                <!-- Editing Album Form View -->
                <div x-show="editingAlbum" x-transition x-cloak class="p-5 bg-amber-50/70 border-y border-amber-200 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4 pb-2 border-b border-amber-200/60">
                            <h5 class="text-xs font-bold text-amber-900 uppercase tracking-wider flex items-center space-x-1.5">
                                <i class="fa-solid fa-pen text-amber-600"></i>
                                <span>Chỉnh sửa album #{{ $gallery->id }}</span>
                            </h5>
                            <button @click="editingAlbum = false" type="button" class="text-xs font-bold text-gray-500 hover:text-gray-800 bg-white border border-gray-200 px-2 py-0.5 rounded shadow-sm">Đóng [X]</button>
                        </div>
                        <form action="{{ route('admin.galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="space-y-3">
                            @csrf
                            @method('PUT')
                            <div>
                                <label class="block text-[11px] font-semibold text-gray-600 uppercase mb-1">Tên album <span class="text-red-500">*</span></label>
                                <input type="text" name="title" required value="{{ $gallery->title }}" class="w-full text-xs rounded-lg border border-gray-300 p-2 bg-white" />
                            </div>

                            <div>
                                <label class="block text-[11px] font-semibold text-gray-600 uppercase mb-1">Đường dẫn (Slug) <span class="text-red-500">*</span></label>
                                <input type="text" name="slug" required value="{{ $gallery->slug }}" class="w-full text-xs rounded-lg border border-gray-300 p-2 bg-white font-mono" />
                            </div>

                            <div>
                                <label class="block text-[11px] font-semibold text-gray-600 uppercase mb-1">Thay ảnh bìa mới (Tải lên từ máy tính)</label>
                                <input type="file" name="cover_image_file" accept="image/*" class="w-full text-xs rounded border border-gray-300 p-1 bg-white file:mr-2 file:py-0.5 file:px-2 file:rounded file:border-0 file:text-xs file:font-bold file:bg-amber-100 file:text-amber-800" />
                            </div>

                            <div>
                                <label class="block text-[11px] font-semibold text-gray-600 uppercase mb-1">Hoặc đường dẫn ảnh bìa (URL)</label>
                                <input type="text" name="cover_image" value="{{ $gallery->cover_image }}" class="w-full text-xs rounded-lg border border-gray-300 p-2 bg-white font-mono" />
                            </div>

                            <div>
                                <label class="block text-[11px] font-semibold text-gray-600 uppercase mb-1">Thứ tự hiển thị</label>
                                <input type="number" name="display_order" required value="{{ $gallery->display_order }}" class="w-full text-xs rounded-lg border border-gray-300 p-2 bg-white" />
                            </div>

                            <div>
                                <label class="block text-[11px] font-semibold text-gray-600 uppercase mb-1">Mô tả</label>
                                <textarea name="description" rows="2" class="w-full text-xs rounded-lg border border-gray-300 p-2 bg-white">{{ $gallery->description }}</textarea>
                            </div>

                            <div class="flex items-center space-x-2 pt-1">
                                <input type="checkbox" name="is_active" value="1" id="active_{{ $gallery->id }}" {{ $gallery->is_active ? 'checked' : '' }} class="w-4 h-4 text-amber-600 rounded border-gray-300">
                                <label for="active_{{ $gallery->id }}" class="text-xs font-semibold text-gray-700 cursor-pointer">Hiển thị album</label>
                            </div>

                            <div class="pt-3 flex space-x-2 border-t border-amber-200/60">
                                <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-white font-bold px-4 py-2 rounded-lg text-xs shadow-md transition">Lưu thay đổi</button>
                                <button @click="editingAlbum = false" type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold px-4 py-2 rounded-lg text-xs transition">Hủy</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Manage Images Modal / Drawer inside Card -->
                <div x-show="openImagesModal" x-transition x-cloak class="fixed inset-0 z-50 overflow-y-auto bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
                    <div class="bg-white rounded-2xl shadow-2xl max-w-5xl w-full max-h-[90vh] flex flex-col overflow-hidden border border-gray-100" @click.away="openImagesModal = false">
                        <div class="p-6 bg-gray-900 text-white flex items-center justify-between shrink-0">
                            <div>
                                <h4 class="font-bold text-xl leading-tight">Quản lý hình ảnh: {{ $gallery->title }}</h4>
                                <p class="text-xs text-gray-400 mt-1">Tổng số: {{ $gallery->images->count() }} hình ảnh trong album này</p>
                            </div>
                            <button @click="openImagesModal = false" class="text-gray-400 hover:text-white p-2 text-xl font-bold transition">&times;</button>
                        </div>

                        <!-- Modal Body: Image Upload / Form + List -->
                        <div class="p-6 overflow-y-auto space-y-8 flex-1 bg-gray-50/50">
                            <!-- Add Image Form -->
                            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
                                <h5 class="text-sm font-bold text-gray-800 mb-3 flex items-center space-x-2">
                                    <i class="fa-solid fa-cloud-arrow-up text-brand-600"></i>
                                    <span>Thêm hình ảnh mới vào album</span>
                                </h5>
                                <form action="{{ route('admin.gallery_images.store', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                                    @csrf
                                    <div class="md:col-span-4">
                                        <label class="block text-[11px] font-semibold text-gray-600 uppercase mb-1">1. Tải file ảnh từ máy tính <span class="text-brand-600">*</span></label>
                                        <input type="file" name="image_file" accept="image/*" class="w-full text-xs rounded-lg border border-gray-300 p-2 bg-white shadow-sm file:mr-2 file:py-1 file:px-2 file:rounded file:border-0 file:text-xs file:font-bold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100" />
                                    </div>
                                    <div class="md:col-span-3">
                                        <label class="block text-[11px] font-semibold text-gray-600 uppercase mb-1">Hoặc đường dẫn (URL)</label>
                                        <input type="text" name="image_path" placeholder="https://..." class="w-full text-xs rounded-lg border border-gray-300 p-2.5 bg-white shadow-sm font-mono" />
                                    </div>
                                    <div class="md:col-span-3">
                                        <label class="block text-[11px] font-semibold text-gray-600 uppercase mb-1">Ghi chú (Caption)</label>
                                        <input type="text" name="caption" placeholder="Mô tả ảnh..." class="w-full text-xs rounded-lg border border-gray-300 p-2.5 bg-white shadow-sm" />
                                    </div>
                                    <div class="md:col-span-1">
                                        <label class="block text-[11px] font-semibold text-gray-600 uppercase mb-1">Thứ tự</label>
                                        <input type="number" name="display_order" required value="{{ $gallery->images->count() + 1 }}" class="w-full text-xs rounded-lg border border-gray-300 p-2.5 bg-white shadow-sm text-center font-bold" />
                                    </div>
                                    <div class="md:col-span-2">
                                        <button type="submit" class="w-full bg-brand-500 hover:bg-brand-600 text-white font-bold py-2.5 px-3 rounded-lg text-xs shadow-md transition flex items-center justify-center space-x-1.5">
                                            <i class="fa-solid fa-plus"></i>
                                            <span>Thêm ảnh</span>
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <!-- Images Grid inside Modal -->
                            <div>
                                <h5 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-4">Danh sách hình ảnh trong album ({{ $gallery->images->count() }})</h5>
                                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                                    @forelse($gallery->images as $img)
                                        <div x-data="{ editingImg: false }" class="bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm group relative flex flex-col transition hover:border-gray-300">
                                            
                                            <!-- Normal View -->
                                            <div x-show="!editingImg" class="flex-1 flex flex-col justify-between">
                                                <div class="relative h-40 bg-gray-100 overflow-hidden">
                                                    <img src="{{ $img->image_path }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300" alt="{{ $img->caption }}">
                                                </div>
                                                <div class="p-3 flex-1 flex flex-col justify-between text-xs">
                                                    <p class="text-gray-800 font-semibold line-clamp-2 mb-3">{{ $img->caption ?: '--- Không có tiêu đề ---' }}</p>
                                                    <div class="flex items-center justify-between pt-2.5 border-t border-gray-100 text-[11px]">
                                                        <span class="text-gray-500 font-medium">Thứ tự: <strong class="text-gray-900">{{ $img->display_order }}</strong></span>
                                                        <div class="flex items-center space-x-2">
                                                            <button @click="editingImg = true" class="text-amber-600 hover:text-amber-800 font-bold px-1.5 py-0.5 rounded hover:bg-amber-50 transition" title="Chỉnh sửa ảnh">
                                                                <i class="fa-solid fa-pen"></i> Sửa
                                                            </button>
                                                            <form action="{{ route('admin.gallery_images.destroy', $img->id) }}" method="POST" onsubmit="return confirm('Xóa bức ảnh này?');" class="inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="text-red-500 hover:text-red-700 font-bold px-1.5 py-0.5 rounded hover:bg-red-50 transition" title="Xóa ảnh">
                                                                    <i class="fa-solid fa-trash-can"></i> Xóa
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Editing Image Form -->
                                            <div x-show="editingImg" x-transition x-cloak class="p-3 bg-amber-50/90 border border-amber-200 rounded-xl flex-1 flex flex-col justify-between space-y-2 text-xs">
                                                <div class="flex items-center justify-between pb-1 border-b border-amber-200 text-amber-900 font-bold">
                                                    <span>Sửa ảnh #{{ $img->id }}</span>
                                                    <button @click="editingImg = false" type="button" class="text-gray-400 hover:text-gray-700 font-bold">&times;</button>
                                                </div>
                                                <form action="{{ route('admin.gallery_images.update', $img->id) }}" method="POST" enctype="multipart/form-data" class="space-y-2 flex-1 flex flex-col justify-between">
                                                    @csrf
                                                    @method('PUT')
                                                    <div>
                                                        <label class="block text-[10px] font-bold text-gray-600 uppercase mb-0.5">Tiêu đề / Ghi chú</label>
                                                        <input type="text" name="caption" value="{{ $img->caption }}" class="w-full p-1.5 rounded border border-gray-300 text-xs bg-white shadow-xs" placeholder="Ghi chú ảnh..." />
                                                    </div>

                                                    <div>
                                                        <label class="block text-[10px] font-bold text-gray-600 uppercase mb-0.5">Thay file ảnh mới</label>
                                                        <input type="file" name="image_file" accept="image/*" class="w-full text-[11px] rounded border border-gray-300 p-1 bg-white file:mr-1 file:py-0.5 file:px-1.5 file:rounded file:border-0 file:text-[10px] file:font-bold file:bg-amber-100 file:text-amber-800" />
                                                    </div>

                                                    <input type="hidden" name="image_path" value="{{ $img->image_path }}" />

                                                    <div>
                                                        <label class="block text-[10px] font-bold text-gray-600 uppercase mb-0.5">Thứ tự</label>
                                                        <input type="number" name="display_order" required value="{{ $img->display_order }}" class="w-full p-1.5 rounded border border-gray-300 text-xs bg-white text-center font-bold shadow-xs" />
                                                    </div>

                                                    <div class="pt-2 flex space-x-1 border-t border-amber-200">
                                                        <button type="submit" class="flex-1 bg-brand-500 hover:bg-brand-600 text-white font-bold py-1.5 px-2 rounded text-xs shadow-sm transition">Lưu</button>
                                                        <button @click="editingImg = false" type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-1.5 px-2 rounded text-xs transition">Hủy</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    @empty
                                        <div class="col-span-full bg-white p-8 rounded-xl border border-gray-200 text-center text-gray-500">
                                            Album này chưa có ảnh nào. Vui lòng thêm ảnh ở biểu mẫu bên trên.
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="p-4 bg-white border-t border-gray-100 flex justify-end shrink-0">
                            <button @click="openImagesModal = false" type="button" class="bg-gray-800 hover:bg-gray-700 text-white font-bold px-6 py-2.5 rounded-xl text-sm transition shadow">
                                Hoàn tất đóng
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        @empty
            <div class="col-span-full p-12 bg-white rounded-2xl border border-gray-100 text-center text-gray-500">
                Chưa có album ảnh nào trong hệ thống.
            </div>
        @endforelse
    </div>
</div>
@endsection
