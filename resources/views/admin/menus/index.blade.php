@extends('admin.layouts.app')

@section('title', 'Quản lý Menu điều hướng')

@section('content')
<div x-data="{ 
    editModal: false, 
    editItem: { id: '', title: '', url: '', parent_id: '', order: 0, is_active: 1 },
    openEdit(item) {
        this.editItem = { 
            id: item.id, 
            title: item.title, 
            url: item.url || '', 
            parent_id: item.parent_id || '', 
            order: item.order, 
            is_active: item.is_active 
        };
        this.editModal = true;
    }
}">

    <!-- Menu Selector & Header -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 mb-8 flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="flex items-center space-x-3">
            <div class="w-12 h-12 bg-brand-50 text-brand-600 rounded-xl flex items-center justify-center text-xl font-bold">
                <i class="fa-solid fa-sitemap"></i>
            </div>
            <div>
                <h3 class="font-bold text-lg text-gray-800">Chọn menu cần quản lý</h3>
                <p class="text-xs text-gray-500">Cấu hình thanh điều hướng chính hoặc chân trang</p>
            </div>
        </div>

        <div class="flex items-center space-x-3 w-full sm:w-auto">
            <form action="{{ route('admin.menus') }}" method="GET" class="flex items-center space-x-2 w-full sm:w-auto">
                <select name="menu_id" onchange="this.form.submit()" class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-xl focus:ring-brand-500 focus:border-brand-500 block p-2.5 font-semibold shadow-sm">
                    @foreach($menus as $menu)
                        <option value="{{ $menu->id }}" {{ ($currentMenu && $currentMenu->id == $menu->id) ? 'selected' : '' }}>
                            {{ $menu->name }} (Vị trí: {{ $menu->location }})
                        </option>
                    @endforeach
                </select>
            </form>
        </div> 
    </div>

    @if($currentMenu)
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Left Column: Add New Menu Item Form -->
            <div class="lg:col-span-4">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 sticky top-8">
                    <div class="flex items-center space-x-2 pb-4 mb-4 border-b border-gray-100 text-brand-700">
                        <i class="fa-solid fa-plus-circle text-lg"></i>
                        <h4 class="font-bold text-base text-gray-800">Thêm liên kết mới</h4>
                    </div>

                    <form action="{{ route('admin.menu_items.store', $currentMenu->id) }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Tên liên kết (Tiêu đề) <span class="text-red-500">*</span></label>
                            <input type="text" name="title" required placeholder="Ví dụ: Giới thiệu" class="w-full text-sm rounded-xl border border-gray-300 p-2.5 bg-white shadow-sm focus:ring-brand-500" />
                        </div>

                        <div>
                            <label class="text-xs font-semibold text-gray-600 uppercase mb-1">Đường dẫn (URL)</label>
                            <input type="text" name="url" placeholder="https://... hoặc /lich-hoc hoặc #" class="w-full text-sm rounded-xl border border-gray-300 p-2.5 bg-white shadow-sm font-mono text-xs focus:ring-brand-500" />
                            <span class="text-[11px] text-gray-400 mt-1 block">Dùng # nếu đây là mục cha chứa danh sách thả xuống.</span>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Mục cha (Cấp trên)</label>
                            <select name="parent_id" class="w-full text-sm rounded-xl border border-gray-300 p-2.5 bg-white shadow-sm focus:ring-brand-500">
                                <option value="">--- Không có (Mục gốc) ---</option>
                                @foreach($parentCandidates as $parentCandidate)
                                    <option value="{{ $parentCandidate->id }}">{{ $parentCandidate->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Thứ tự hiển thị</label>
                            <input type="number" name="order" required value="0" class="w-full text-sm rounded-xl border border-gray-300 p-2.5 bg-white shadow-sm focus:ring-brand-500" />
                            <span class="text-[11px] text-gray-400 mt-1 block">Số càng nhỏ hiển thị càng về phía bên trái/trên cùng.</span>
                        </div>

                        <div class="flex items-center space-x-2 pt-2 pb-1">
                            <input type="checkbox" name="is_active" value="1" id="is_active_new_menu" checked class="w-4 h-4 text-brand-600 rounded border-gray-300 focus:ring-brand-500">
                            <label for="is_active_new_menu" class="text-sm font-semibold text-gray-700 cursor-pointer">Hiển thị liên kết này</label>
                        </div>

                        <button type="submit" class="w-full bg-brand-500 hover:bg-brand-600 text-white font-bold py-3 px-4 rounded-xl text-sm shadow-md transition flex items-center justify-center space-x-2">
                            <i class="fa-solid fa-floppy-disk"></i>
                            <span>Lưu vào menu</span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Column: Menu Items Structure / List -->
            <div class="lg:col-span-8">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
                        <h4 class="font-bold text-base text-gray-800">Cấu trúc menu: <span class="text-brand-600 font-extrabold">{{ $currentMenu->name }}</span></h4>
                        <span class="text-xs bg-white py-1 px-3 rounded-full border border-gray-200 text-gray-600 font-semibold shadow-xs">
                            Tổng: {{ $currentMenu->items->count() }} mục gốc
                        </span>
                    </div>

                    <div class="p-6 space-y-4">
                        @forelse($currentMenu->items as $parentItem)
                            <!-- Top level item card -->
                            <div class="border border-gray-200 rounded-2xl overflow-hidden shadow-xs bg-white transition hover:border-gray-300">
                                <div class="p-4 flex items-center justify-between bg-gray-50/80">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 rounded-lg bg-gray-900 text-white flex items-center justify-center text-xs font-bold">
                                            {{ $parentItem->order }}
                                        </div>
                                        <div>
                                            <div class="flex items-center space-x-2">
                                                <h5 class="font-bold text-gray-900 text-base">{{ $parentItem->title }}</h5>
                                                @if(!$parentItem->is_active)
                                                    <span class="bg-gray-200 text-gray-600 text-[10px] px-2 py-0.5 rounded-full font-bold">Đã ẩn</span>
                                                @endif
                                            </div>
                                            <div class="text-xs text-gray-500 font-mono flex items-center space-x-1 mt-0.5">
                                                <i class="fa-solid fa-link text-[10px]"></i>
                                                <span>{{ $parentItem->url ?: '#' }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex items-center space-x-2">
                                        <button @click="openEdit({{ json_encode($parentItem) }})" class="bg-amber-50 text-amber-700 hover:bg-amber-100 px-3 py-1.5 rounded-lg text-xs font-bold transition flex items-center space-x-1">
                                            <i class="fa-solid fa-pen"></i>
                                            <span class="hidden sm:inline">Sửa</span>
                                        </button>

                                        <form action="{{ route('admin.menu_items.destroy', $parentItem->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa mục này? Nếu có mục con, các mục con cũng sẽ bị xóa!');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-50 text-red-600 hover:bg-red-100 px-3 py-1.5 rounded-lg text-xs font-bold transition flex items-center space-x-1">
                                                <i class="fa-solid fa-trash"></i>
                                                <span class="hidden sm:inline">Xóa</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Sub-items (if any) -->
                                @if($parentItem->children->isNotEmpty())
                                    <div class="p-4 pl-10 border-t border-gray-100 space-y-2 bg-white">
                                        <div class="text-[11px] font-bold uppercase text-gray-400 mb-2 tracking-wider">Các mục con trực thuộc:</div>
                                        @foreach($parentItem->children as $childItem)
                                            <div class="flex items-center justify-between p-3 rounded-xl border border-dashed border-gray-200 bg-gray-50/50 hover:bg-gray-50 transition">
                                                <div class="flex items-center space-x-3">
                                                    <i class="fa-solid fa-turn-up rotate-90 text-gray-400 text-xs"></i>
                                                    <span class="w-6 h-6 rounded bg-gray-200 text-gray-700 text-xs font-bold flex items-center justify-center">{{ $childItem->order }}</span>
                                                    <div>
                                                        <div class="flex items-center space-x-2">
                                                            <strong class="text-sm text-gray-800 font-semibold">{{ $childItem->title }}</strong>
                                                            @if(!$childItem->is_active)
                                                                <span class="bg-gray-200 text-gray-600 text-[10px] px-1.5 py-0.5 rounded font-bold">Ẩn</span>
                                                            @endif
                                                        </div>
                                                        <span class="text-xs text-gray-400 font-mono block">{{ $childItem->url ?: '#' }}</span>
                                                    </div>
                                                </div>

                                                <div class="flex items-center space-x-1.5">
                                                    <button @click="openEdit({{ json_encode($childItem) }})" class="text-amber-600 hover:text-amber-800 p-1.5 transition text-xs font-bold">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </button>
                                                    <form action="{{ route('admin.menu_items.destroy', $childItem->id) }}" method="POST" onsubmit="return confirm('Xóa mục con này?');" class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:text-red-700 p-1.5 transition text-xs font-bold">
                                                            <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        @empty
                            <div class="p-12 text-center text-gray-500 border border-dashed border-gray-200 rounded-2xl bg-gray-50">
                                Menu này chưa có liên kết nào. Vui lòng sử dụng biểu mẫu bên trái để thêm liên kết đầu tiên.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

        </div>

        <!-- Edit Modal using Alpine.js -->
        <div x-show="editModal" x-transition x-cloak class="fixed inset-0 z-50 overflow-y-auto bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
            <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full overflow-hidden border border-gray-100" @click.away="editModal = false">
                <div class="p-6 bg-gray-900 text-white flex items-center justify-between">
                    <h4 class="font-bold text-lg">Chỉnh sửa mục menu</h4>
                    <button @click="editModal = false" class="text-gray-400 hover:text-white text-xl font-bold">&times;</button>
                </div>

                <form :action="'{{ url('admin/menu-items') }}/' + editItem.id" method="POST" class="p-6 space-y-4">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Tên liên kết <span class="text-red-500">*</span></label>
                        <input type="text" name="title" x-model="editItem.title" required class="w-full text-sm rounded-xl border border-gray-300 p-2.5 bg-white shadow-sm" />
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Đường dẫn (URL)</label>
                        <input type="text" name="url" x-model="editItem.url" class="w-full text-sm rounded-xl border border-gray-300 p-2.5 bg-white text-gray-800 focus:ring-brand-500 focus:border-brand-500 shadow-sm font-mono text-xs" />
                        <span class="text-[11px] text-gray-400 mt-1 block">Dùng # nếu đây là mục cha chứa danh sách thả xuống.</span>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Mục cha (Cấp trên)</label>
                        <select name="parent_id" x-model="editItem.parent_id" class="w-full text-sm rounded-xl border border-gray-300 p-2.5 bg-white shadow-sm">
                            <option value="">--- Không có (Mục gốc) ---</option>
                            @foreach($parentCandidates as $parentCandidate)
                                <template x-if="editItem.id != {{ $parentCandidate->id }}">
                                    <option value="{{ $parentCandidate->id }}" :selected="editItem.parent_id == {{ $parentCandidate->id }}">{{ $parentCandidate->title }}</option>
                                </template>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Thứ tự hiển thị</label>
                        <input type="number" name="order" x-model="editItem.order" required class="w-full text-sm rounded-xl border border-gray-300 p-2.5 bg-white shadow-sm" />
                    </div>

                    <div class="flex items-center space-x-2 pt-2 pb-2">
                        <input type="checkbox" name="is_active" value="1" :checked="editItem.is_active == 1" id="is_active_edit" class="w-4 h-4 text-brand-600 rounded border-gray-300 focus:ring-brand-500">
                        <label for="is_active_edit" class="text-sm font-semibold text-gray-700 cursor-pointer">Hiển thị liên kết này</label>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex justify-end space-x-3">
                        <button type="button" @click="editModal = false" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold px-5 py-2.5 rounded-xl text-sm transition">Hủy bỏ</button>
                        <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-white font-bold px-6 py-2.5 rounded-xl text-sm shadow-md transition">Lưu thay đổi</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
@endsection
