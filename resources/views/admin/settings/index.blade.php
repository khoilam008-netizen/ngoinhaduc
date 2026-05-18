@extends('admin.layouts.app')

@section('title', 'Cài đặt chung')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden max-w-4xl mb-8">
    <div class="p-6 border-b border-gray-100">
        <h3 class="font-bold text-lg text-gray-800">Thông tin & Cấu hình hệ thống</h3>
        <p class="text-xs text-gray-500 mt-1">Các thông tin dưới đây sẽ hiển thị trực tiếp trên Header, Footer và các trang Liên hệ.</p>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4 bg-gray-50/50 rounded-2xl border border-gray-100">
            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase mb-2">Logo trang web (Tải file lên)</label>
                <div class="flex items-center space-x-3 mb-2">
                    @if($settings->where('key', 'site_logo')->first()?->value)
                        <img src="{{ $settings->where('key', 'site_logo')->first()->value }}" class="h-10 object-contain bg-gray-800 p-1 rounded" alt="Logo">
                    @endif
                    <input type="file" name="site_logo_file" accept="image/*" class="w-full text-xs rounded-xl border border-gray-300 p-2 bg-white file:mr-2 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:font-bold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100" />
                </div>
                <input type="text" name="site_logo" value="{{ $settings->where('key', 'site_logo')->first()->value ?? '' }}" placeholder="Hoặc nhập URL logo..." class="w-full text-xs font-mono rounded-lg border border-gray-300 p-2 bg-white" />
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-700 uppercase mb-2">Ảnh tĩnh bên Sidebar (Tải file lên)</label>
                <div class="flex items-center space-x-3 mb-2">
                    @if($settings->where('key', 'sidebar_image')->first()?->value)
                        <img src="{{ $settings->where('key', 'sidebar_image')->first()->value }}" class="h-10 w-16 object-cover rounded shadow-sm" alt="Sidebar Image">
                    @endif
                    <input type="file" name="sidebar_image_file" accept="image/*" class="w-full text-xs rounded-xl border border-gray-300 p-2 bg-white file:mr-2 file:py-1 file:px-3 file:rounded file:border-0 file:text-xs file:font-bold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100" />
                </div>
                <input type="text" name="sidebar_image" value="{{ $settings->where('key', 'sidebar_image')->first()->value ?? '' }}" placeholder="Hoặc nhập URL ảnh sidebar..." class="w-full text-xs font-mono rounded-lg border border-gray-300 p-2 bg-white" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-2">Tên trang web / Trung tâm</label>
                <input type="text" name="site_name" value="{{ $settings->where('key', 'site_name')->first()->value ?? '' }}" class="w-full text-sm rounded-xl border border-gray-300 p-3" />
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-2">Địa chỉ trụ sở</label>
                <input type="text" name="address" value="{{ $settings->where('key', 'address')->first()->value ?? '' }}" class="w-full text-sm rounded-xl border border-gray-300 p-3" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-2">Số điện thoại hiển thị</label>
                <input type="text" name="phone" value="{{ $settings->where('key', 'phone')->first()->value ?? '' }}" class="w-full text-sm rounded-xl border border-gray-300 p-3" />
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-2">Link số điện thoại (tel)</label>
                <input type="text" name="phone_link" value="{{ $settings->where('key', 'phone_link')->first()->value ?? '' }}" class="w-full text-sm rounded-xl border border-gray-300 p-3" />
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-2">Email đăng ký học</label>
                <input type="email" name="email_hoc" value="{{ $settings->where('key', 'email_hoc')->first()->value ?? '' }}" class="w-full text-sm rounded-xl border border-gray-300 p-3" />
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-600 uppercase mb-2">Email đăng ký thi</label>
                <input type="email" name="email_thi" value="{{ $settings->where('key', 'email_thi')->first()->value ?? '' }}" class="w-full text-sm rounded-xl border border-gray-300 p-3" />
            </div>
        </div>

        <div>
            <label class="block text-xs font-semibold text-gray-600 uppercase mb-2">Thông báo cảnh báo lừa đảo (HTML)</label>
            <textarea name="warning_notice" rows="5" class="w-full text-sm rounded-xl border border-gray-300 p-3 font-mono text-xs">{{ $settings->where('key', 'warning_notice')->first()->value ?? '' }}</textarea>
            <p class="text-xs text-gray-400 mt-1">Đoạn HTML trên hiển thị cảnh báo duy nhất 1 trụ sở trên trang chủ và trang đăng ký.</p>
        </div>

        <div class="pt-6 border-t border-gray-100 flex justify-end">
            <button type="submit" class="bg-brand-500 hover:bg-brand-600 text-white font-bold px-6 py-3 rounded-xl text-sm shadow-lg shadow-brand-500/25 transition">
                <i class="fa-solid fa-floppy-disk mr-2"></i> Lưu cấu hình
            </button>
        </div>
    </form>
</div>
@endsection
