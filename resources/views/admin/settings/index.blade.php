@extends('admin.layouts.app')

@section('title', 'Cài đặt chung')

@push('styles')
<style>
    /* Premium Styling for CKEditor inside Tailwind container */
    .ck.ck-editor__main > .ck-editor__editable {
        min-height: 240px;
        border-bottom-left-radius: 1rem !important;
        border-bottom-right-radius: 1rem !important;
        border-color: #e2e8f0 !important;
        padding: 1rem 1.5rem !important;
        font-size: 0.875rem !important;
        line-height: 1.6 !important;
        color: #1e293b !important;
    }
    .ck.ck-editor__main > .ck-editor__editable:focus {
        border-color: #8ab828 !important;
        box-shadow: 0 0 0 1px #8ab828 !important;
    }
    .ck.ck-toolbar {
        border-top-left-radius: 1rem !important;
        border-top-right-radius: 1rem !important;
        background: #f8fafc !important;
        border-color: #e2e8f0 !important;
        padding: 0.5rem 1rem !important;
    }
    .ck.ck-button:hover {
        background: #e8f2d3 !important;
        color: #5c7b18 !important;
    }
</style>
@endpush

@section('content')
<div class="max-w-5xl mb-12">
    <!-- Header Banner -->
    <div class="bg-gradient-to-r from-gray-900 to-brand-800 rounded-3xl p-8 text-white shadow-xl mb-8 flex flex-col md:flex-row items-center justify-between gap-6">
        <div class="space-y-2">
            <span class="bg-brand-500 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest">Cấu hình hệ thống</span>
            <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight">Cài đặt Website & Trung Tâm</h2>
            <p class="text-sm text-gray-300 max-w-xl leading-relaxed">Quản lý toàn bộ thông tin hiển thị chung trên Header, Footer, biểu mẫu liên hệ và cảnh báo an toàn trên hệ thống.</p>
        </div>
        <div class="w-16 h-16 rounded-2xl bg-white/10 backdrop-blur-md flex items-center justify-center border border-white/20 shrink-0 text-3xl text-brand-400 shadow-inner">
            <i class="fa-solid fa-sliders"></i>
        </div>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Section 1: Visual Branding -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden transition hover:shadow-md">
            <div class="p-6 bg-gray-50/75 border-b border-gray-100 flex items-center space-x-3 font-bold text-gray-800">
                <i class="fa-solid fa-palette text-brand-600 text-lg"></i>
                <span>Nhận diện thương hiệu & Hình ảnh</span>
            </div>
            <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Logo -->
                <div class="space-y-3 bg-gray-50/50 p-5 rounded-2xl border border-gray-100">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide">Logo trang web</label>
                    <div class="flex items-center space-x-4">
                        <div class="w-20 h-14 bg-gray-900 rounded-xl p-2 flex items-center justify-center shadow-inner shrink-0 border border-gray-800">
                            <img src="{{ $settings->where('key', 'site_logo')->first()->value ?? asset('assets/images/logo.png') }}" class="max-h-full max-w-full object-contain" alt="Logo">
                        </div>
                        <div class="flex-1">
                            <input type="file" name="site_logo_file" accept="image/*" class="w-full text-xs rounded-xl border border-gray-200 p-1.5 bg-white file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 transition shadow-xs cursor-pointer" />
                        </div>
                    </div>
                    <input type="text" name="site_logo" value="{{ $settings->where('key', 'site_logo')->first()->value ?? '' }}" placeholder="Hoặc điền đường dẫn URL logo..." class="w-full text-xs font-mono rounded-xl border border-gray-300 p-3 bg-white shadow-xs focus:ring-brand-500 focus:border-brand-500" />
                </div>

                <!-- Sidebar Static Image -->
                <div class="space-y-3 bg-gray-50/50 p-5 rounded-2xl border border-gray-100">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide">Ảnh tĩnh hiển thị cột Sidebar</label>
                    <div class="flex items-center space-x-4">
                        <div class="w-20 h-14 bg-gray-100 rounded-xl overflow-hidden shadow-inner shrink-0 border border-gray-200 flex items-center justify-center">
                            @if($settings->where('key', 'sidebar_image')->first()?->value)
                                <img src="{{ $settings->where('key', 'sidebar_image')->first()->value }}" class="w-full h-full object-cover" alt="Sidebar">
                            @else
                                <i class="fa-solid fa-image text-gray-400 text-xl"></i>
                            @endif
                        </div>
                        <div class="flex-1">
                            <input type="file" name="sidebar_image_file" accept="image/*" class="w-full text-xs rounded-xl border border-gray-200 p-1.5 bg-white file:mr-2 file:py-1.5 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 transition shadow-xs cursor-pointer" />
                        </div>
                    </div>
                    <input type="text" name="sidebar_image" value="{{ $settings->where('key', 'sidebar_image')->first()->value ?? '' }}" placeholder="Hoặc điền đường dẫn URL ảnh..." class="w-full text-xs font-mono rounded-xl border border-gray-300 p-3 bg-white shadow-xs focus:ring-brand-500 focus:border-brand-500" />
                </div>
            </div>
        </div>

        <!-- Section 2: General & Contact Information -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden transition hover:shadow-md">
            <div class="p-6 bg-gray-50/75 border-b border-gray-100 flex items-center space-x-3 font-bold text-gray-800">
                <i class="fa-solid fa-building text-brand-600 text-lg"></i>
                <span>Thông tin Trụ sở & Liên hệ</span>
            </div>
            <div class="p-8 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Tên trang web / Trung tâm</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400"><i class="fa-solid fa-tag"></i></div>
                            <input type="text" name="site_name" value="{{ $settings->where('key', 'site_name')->first()->value ?? '' }}" class="w-full text-sm rounded-xl border border-gray-300 pl-10 p-3 focus:ring-brand-500 focus:border-brand-500 shadow-xs font-medium text-gray-800" placeholder="Ví dụ: Ngôi Nhà Đức Đà Nẵng" />
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Địa chỉ trụ sở</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400"><i class="fa-solid fa-location-dot"></i></div>
                            <input type="text" name="address" value="{{ $settings->where('key', 'address')->first()->value ?? '' }}" class="w-full text-sm rounded-xl border border-gray-300 pl-10 p-3 focus:ring-brand-500 focus:border-brand-500 shadow-xs font-medium text-gray-800" placeholder="Số nhà, Đường, Phường, Quận..." />
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Số điện thoại hiển thị</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400"><i class="fa-solid fa-phone"></i></div>
                            <input type="text" name="phone" value="{{ $settings->where('key', 'phone')->first()->value ?? '' }}" class="w-full text-sm rounded-xl border border-gray-300 pl-10 p-3 focus:ring-brand-500 focus:border-brand-500 shadow-xs font-medium text-gray-800" placeholder="Ví dụ: 0236 3811 111" />
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Link gọi điện thoại (Cú pháp tel:)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400"><i class="fa-solid fa-link"></i></div>
                            <input type="text" name="phone_link" value="{{ $settings->where('key', 'phone_link')->first()->value ?? '' }}" class="w-full text-sm font-mono rounded-xl border border-gray-300 pl-10 p-3 focus:ring-brand-500 focus:border-brand-500 shadow-xs text-gray-600" placeholder="tel:02363811111" />
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Email nhận thông báo Đăng ký Học</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400"><i class="fa-solid fa-envelope-open-text"></i></div>
                            <input type="email" name="email_hoc" value="{{ $settings->where('key', 'email_hoc')->first()->value ?? '' }}" class="w-full text-sm rounded-xl border border-gray-300 pl-10 p-3 focus:ring-brand-500 focus:border-brand-500 shadow-xs font-medium text-gray-800" placeholder="tuyensinh@ngoinhaduc.com" />
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Email nhận thông báo Đăng ký Thi</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400"><i class="fa-solid fa-graduation-cap"></i></div>
                            <input type="email" name="email_thi" value="{{ $settings->where('key', 'email_thi')->first()->value ?? '' }}" class="w-full text-sm rounded-xl border border-gray-300 pl-10 p-3 focus:ring-brand-500 focus:border-brand-500 shadow-xs font-medium text-gray-800" placeholder="thi@ngoinhaduc.com" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Section 3: Warning & Safety Notice with CKEditor -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden transition hover:shadow-md">
            <div class="p-6 bg-red-50/50 border-b border-red-100 flex items-center justify-between">
                <div class="flex items-center space-x-3 font-bold text-red-700">
                    <i class="fa-solid fa-shield-halved text-red-600 text-lg"></i>
                    <span>Thông báo cảnh báo mạo danh & lừa đảo (Trang chủ & Form)</span>
                </div>
                <span class="bg-red-100 text-red-700 text-xs font-semibold px-3 py-1 rounded-full">CKEditor 5 Classic</span>
            </div>
            <div class="p-8 space-y-3">
                <p class="text-xs text-gray-500 leading-relaxed mb-3">Soạn thảo nội dung thông báo hiển thị trên banner đỏ trang chủ và phía trên các biểu mẫu đăng ký. Hỗ trợ định dạng in đậm, in nghiêng, danh sách và liên kết.</p>
                <div class="rounded-2xl shadow-sm border border-gray-200">
                    <textarea id="warning_editor" name="warning_notice">{{ $settings->where('key', 'warning_notice')->first()->value ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <!-- Save Button Area -->
        <div class="flex justify-end pt-4">
            <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-white font-extrabold px-8 py-4 rounded-2xl text-base shadow-xl shadow-brand-500/30 transition transform hover:-translate-y-0.5 flex items-center space-x-3">
                <i class="fa-solid fa-floppy-disk text-lg"></i>
                <span>Lưu toàn bộ thay đổi</span>
            </button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#warning_editor'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'blockQuote', 'insertTable', '|', 'undo', 'redo']
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endpush
