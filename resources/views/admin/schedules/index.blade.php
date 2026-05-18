@extends('admin.layouts.app')

@section('title', 'Quản lý lịch học & thi')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Course Schedules -->
    <div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <h3 class="font-bold text-lg text-gray-800">Lịch học các khóa</h3>
                <span class="bg-brand-50 text-brand-600 font-semibold px-3 py-1 rounded-full text-xs">{{ count($courseSchedules) }} khóa</span>
            </div>

            <div x-data="{ openAdd: false }" class="border-b border-gray-100 bg-gray-50/50">
                <div class="p-4 flex items-center justify-between cursor-pointer hover:bg-gray-100 transition" @click="openAdd = !openAdd">
                    <h4 class="text-sm font-bold text-brand-700 flex items-center space-x-2">
                        <i class="fa-solid fa-circle-plus"></i>
                        <span>Thêm khóa học mới vào lịch</span>
                    </h4>
                    <span class="text-xs text-gray-500 font-semibold" x-text="openAdd ? 'Ẩn biểu mẫu [-]' : 'Mở biểu mẫu [+]'"></span>
                </div>

                <div x-show="openAdd" x-transition x-cloak class="p-6 pt-2 border-t border-gray-200/60">
                    <form action="{{ route('admin.courses.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Ca học</label>
                                <select name="session_type" class="w-full text-sm rounded-lg border border-gray-300 p-2.5 bg-white shadow-sm">
                                    <option value="Sáng">Sáng</option>
                                    <option value="Tối">Tối</option>
                                    <option value="Luyện thi">Luyện thi</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Cấp độ</label>
                                <input type="text" name="level" required placeholder="Ví dụ: A1" class="w-full text-sm rounded-lg border border-gray-300 p-2.5 shadow-sm" />
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Thời gian học (Số tuần)</label>
                                <input type="text" name="duration" required placeholder="Ví dụ: 8 tuần" class="w-full text-sm rounded-lg border border-gray-300 p-2.5 shadow-sm" />
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Thứ tự hiển thị</label>
                                <input type="number" name="order" required value="0" class="w-full text-sm rounded-lg border border-gray-300 p-2.5 shadow-sm" />
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Lịch học chi tiết (Giờ học)</label>
                            <textarea name="schedule_time" rows="2" required placeholder="Thứ 2,3,4,5,6 8.00 - 11.30" class="w-full text-sm rounded-lg border border-gray-300 p-2.5 shadow-sm"></textarea>
                        </div>

                        <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-white font-semibold px-4 py-2.5 rounded-lg text-sm shadow-md transition">
                            <i class="fa-solid fa-plus mr-2"></i> Thêm vào lịch học
                        </button>
                    </form>
                </div>
            </div>

            <div class="divide-y divide-gray-100">
                @forelse($courseSchedules as $item)
                    <div x-data="{ editing: false }" class="transition">
                        <!-- Normal View -->
                        <div x-show="!editing" class="p-4 flex items-center justify-between hover:bg-gray-50/75 transition">
                            <div>
                                <div class="flex items-center space-x-2">
                                    <span class="font-bold text-gray-900">{{ $item->level }}</span>
                                    <span class="text-xs font-semibold bg-gray-100 text-gray-600 px-2 py-0.5 rounded">{{ $item->session_type }}</span>
                                    <span class="text-xs text-gray-400">Thứ tự: {{ $item->order }}</span>
                                </div>
                                <p class="text-xs text-gray-500 mt-1 font-medium">{!! nl2br(e($item->schedule_time)) !!} (Thời lượng: {{ $item->duration }})</p>
                            </div>
                            <div class="flex items-center space-x-1 shrink-0">
                                <button @click="editing = true" type="button" class="text-amber-500 p-2 hover:bg-amber-50 rounded-lg transition" title="Chỉnh sửa">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <form action="{{ route('admin.courses.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Xóa khóa này khỏi lịch?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 p-2 hover:bg-red-50 rounded-lg transition" title="Xóa">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Edit Form View -->
                        <div x-show="editing" x-transition x-cloak class="p-6 bg-amber-50/60 border-y border-amber-100 shadow-inner">
                            <div class="flex items-center justify-between mb-4">
                                <h5 class="text-xs font-bold text-amber-800 uppercase tracking-wider flex items-center space-x-2">
                                    <i class="fa-solid fa-pen text-amber-600"></i>
                                    <span>Chỉnh sửa khóa học #{{ $item->id }}</span>
                                </h5>
                                <button @click="editing = false" type="button" class="text-xs font-bold text-gray-500 hover:text-gray-800 bg-white border border-gray-200 px-2 py-1 rounded">Đóng [X]</button>
                            </div>
                            <form action="{{ route('admin.courses.update', $item->id) }}" method="POST" class="space-y-4">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Ca học</label>
                                        <select name="session_type" class="w-full text-sm rounded-lg border border-gray-300 p-2 bg-white">
                                            <option value="Sáng" {{ $item->session_type == 'Sáng' ? 'selected' : '' }}>Sáng</option>
                                            <option value="Tối" {{ $item->session_type == 'Tối' ? 'selected' : '' }}>Tối</option>
                                            <option value="Luyện thi" {{ $item->session_type == 'Luyện thi' ? 'selected' : '' }}>Luyện thi</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Cấp độ</label>
                                        <input type="text" name="level" required value="{{ $item->level }}" class="w-full text-sm rounded-lg border border-gray-300 p-2 bg-white shadow-sm" />
                                    </div>
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Thời gian học (Số tuần)</label>
                                        <input type="text" name="duration" required value="{{ $item->duration }}" class="w-full text-sm rounded-lg border border-gray-300 p-2 bg-white shadow-sm" />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Thứ tự hiển thị</label>
                                        <input type="number" name="order" required value="{{ $item->order }}" class="w-full text-sm rounded-lg border border-gray-300 p-2 bg-white shadow-sm" />
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Lịch học chi tiết (Giờ học)</label>
                                    <textarea name="schedule_time" rows="2" required class="w-full text-sm rounded-lg border border-gray-300 p-2 bg-white shadow-sm">{{ $item->schedule_time }}</textarea>
                                </div>

                                <div class="flex space-x-3 pt-2">
                                    <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-white font-bold px-5 py-2.5 rounded-lg text-xs shadow-md transition">
                                        <i class="fa-solid fa-check mr-1.5"></i> Lưu cập nhật
                                    </button>
                                    <button @click="editing = false" type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold px-5 py-2.5 rounded-lg text-xs transition">
                                        Hủy bỏ
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-8">Chưa có khóa học nào.</p>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Exam Schedules -->
    <div>
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <h3 class="font-bold text-lg text-gray-800">Lịch thi các tháng</h3>
                <span class="bg-blue-50 text-blue-600 font-semibold px-3 py-1 rounded-full text-xs">{{ count($examSchedules) }} kỳ thi</span>
            </div>

            <div x-data="{ openAddExam: false }" class="border-b border-gray-100 bg-gray-50/50">
                <div class="p-4 flex items-center justify-between cursor-pointer hover:bg-gray-100 transition" @click="openAddExam = !openAddExam">
                    <h4 class="text-sm font-bold text-blue-700 flex items-center space-x-2">
                        <i class="fa-solid fa-circle-plus"></i>
                        <span>Thêm lịch thi mới</span>
                    </h4>
                    <span class="text-xs text-gray-500 font-semibold" x-text="openAddExam ? 'Ẩn biểu mẫu [-]' : 'Mở biểu mẫu [+]'"></span>
                </div>

                <div x-show="openAddExam" x-transition x-cloak class="p-6 pt-2 border-t border-gray-200/60">
                    <form action="{{ route('admin.exams.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Tháng thi</label>
                                <input type="text" name="month" required placeholder="Ví dụ: THÁNG 5/2026" class="w-full text-sm rounded-lg border border-gray-300 p-2.5 shadow-sm" />
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Thứ tự hiển thị</label>
                                <input type="number" name="display_order" required value="0" class="w-full text-sm rounded-lg border border-gray-300 p-2.5 shadow-sm" />
                            </div>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Thông tin ngày đăng ký</label>
                            <input type="text" name="registration_date_info" required placeholder="Ví dụ: Đăng ký bắt đầu từ 8h ngày 05.05.2026" class="w-full text-sm rounded-lg border border-gray-300 p-2.5 shadow-sm" />
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Ngày thi chính thức</label>
                            <input type="text" name="exam_date_info" required placeholder="Ví dụ: 25.05 - 28.05.2026" class="w-full text-sm rounded-lg border border-gray-300 p-2.5 shadow-sm" />
                        </div>

                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2.5 rounded-lg text-sm shadow-md transition">
                            <i class="fa-solid fa-plus mr-2"></i> Thêm vào lịch thi
                        </button>
                    </form>
                </div>
            </div>

            <div class="divide-y divide-gray-100">
                @forelse($examSchedules as $item)
                    <div x-data="{ editingExam: false }" class="transition">
                        <!-- Normal View -->
                        <div x-show="!editingExam" class="p-4 flex items-center justify-between hover:bg-gray-50/75 transition">
                            <div>
                                <div class="flex items-center space-x-2">
                                    <span class="font-bold text-gray-900">{{ $item->month }}</span>
                                    <span class="text-xs text-gray-400">Thứ tự: {{ $item->display_order }}</span>
                                </div>
                                <p class="text-xs text-gray-600 mt-1 font-medium">Đăng ký: {{ $item->registration_date_info }}</p>
                                <p class="text-xs text-blue-600 font-bold mt-0.5">Ngày thi: {{ $item->exam_date_info }}</p>
                            </div>
                            <div class="flex items-center space-x-1 shrink-0">
                                <button @click="editingExam = true" type="button" class="text-amber-500 p-2 hover:bg-amber-50 rounded-lg transition" title="Chỉnh sửa">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <form action="{{ route('admin.exams.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Xóa lịch thi này?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 p-2 hover:bg-red-50 rounded-lg transition" title="Xóa">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Edit Form View -->
                        <div x-show="editingExam" x-transition x-cloak class="p-6 bg-blue-50/60 border-y border-blue-100 shadow-inner">
                            <div class="flex items-center justify-between mb-4">
                                <h5 class="text-xs font-bold text-blue-800 uppercase tracking-wider flex items-center space-x-2">
                                    <i class="fa-solid fa-pen text-blue-600"></i>
                                    <span>Chỉnh sửa lịch thi #{{ $item->id }}</span>
                                </h5>
                                <button @click="editingExam = false" type="button" class="text-xs font-bold text-gray-500 hover:text-gray-800 bg-white border border-gray-200 px-2 py-1 rounded">Đóng [X]</button>
                            </div>
                            <form action="{{ route('admin.exams.update', $item->id) }}" method="POST" class="space-y-4">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Tháng thi</label>
                                        <input type="text" name="month" required value="{{ $item->month }}" class="w-full text-sm rounded-lg border border-gray-300 p-2 bg-white shadow-sm" />
                                    </div>
                                    <div>
                                        <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Thứ tự hiển thị</label>
                                        <input type="number" name="display_order" required value="{{ $item->display_order }}" class="w-full text-sm rounded-lg border border-gray-300 p-2 bg-white shadow-sm" />
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Thông tin ngày đăng ký</label>
                                    <input type="text" name="registration_date_info" required value="{{ $item->registration_date_info }}" class="w-full text-sm rounded-lg border border-gray-300 p-2 bg-white shadow-sm" />
                                </div>

                                <div>
                                    <label class="block text-xs font-semibold text-gray-600 uppercase mb-1">Ngày thi chính thức</label>
                                    <input type="text" name="exam_date_info" required value="{{ $item->exam_date_info }}" class="w-full text-sm rounded-lg border border-gray-300 p-2 bg-white shadow-sm" />
                                </div>

                                <div class="flex space-x-3 pt-2">
                                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-5 py-2.5 rounded-lg text-xs shadow-md transition">
                                        <i class="fa-solid fa-check mr-1.5"></i> Lưu cập nhật
                                    </button>
                                    <button @click="editingExam = false" type="button" class="bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold px-5 py-2.5 rounded-lg text-xs transition">
                                        Hủy bỏ
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500 text-center py-8">Chưa có lịch thi nào.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
