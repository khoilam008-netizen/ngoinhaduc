@extends('admin.layouts.app')

@section('title', 'Tạo bài viết mới')

@push('styles')
<style>
    .ck.ck-editor__main > .ck-editor__editable {
        min-height: 400px;
        border-bottom-left-radius: 1rem !important;
        border-bottom-right-radius: 1rem !important;
        border-color: #e2e8f0 !important;
        padding: 1.5rem 2rem !important;
        font-size: 0.95rem !important;
        line-height: 1.7 !important;
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
</style>
@endpush

@section('content')
<div class="max-w-5xl space-y-6 mb-12">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.posts') }}" class="w-10 h-10 bg-white border border-gray-200 text-gray-600 hover:text-brand-600 hover:border-brand-300 rounded-xl flex items-center justify-center font-bold shadow-xs transition">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div>
                <h3 class="font-extrabold text-2xl text-gray-900">Soạn bài viết / tin tức mới</h3>
                <p class="text-xs text-gray-500">Điền đầy đủ thông tin để đăng tải lên website</p>
            </div>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2">
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Tiêu đề bài viết <span class="text-red-500">*</span></label>
                <input type="text" name="title" required value="{{ old('title') }}" class="w-full text-base font-bold rounded-xl border border-gray-300 p-3.5 focus:ring-brand-500 focus:border-brand-500 shadow-xs text-gray-900 placeholder:font-normal placeholder:text-gray-400" placeholder="Nhập tiêu đề ấn tượng..." />
            </div>

            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Chuyên mục <span class="text-red-500">*</span></label>
                <select name="category_id" required class="w-full text-sm font-bold rounded-xl border border-gray-300 p-3.5 focus:ring-brand-500 focus:border-brand-500 shadow-xs bg-white text-gray-800">
                    <option value="">-- Chọn chuyên mục --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Đường dẫn tĩnh (Slug - Tự động tạo nếu để trống)</label>
            <input type="text" name="slug" value="{{ old('slug') }}" class="w-full font-mono text-xs text-gray-600 rounded-xl border border-gray-300 p-3 focus:ring-brand-500 focus:border-brand-500 shadow-xs bg-gray-50/50" placeholder="vi-du-tieu-de-bai-viet" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-5 bg-gray-50/50 rounded-2xl border border-gray-100">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Ảnh đại diện (Upload file)</label>
                <input type="file" name="thumbnail_file" accept="image/*" class="w-full text-xs rounded-xl border border-gray-300 p-2 bg-white file:mr-2 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 shadow-xs cursor-pointer" />
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Hoặc điền link ảnh đại diện (URL)</label>
                <input type="text" name="thumbnail" value="{{ old('thumbnail') }}" placeholder="https://..." class="w-full font-mono text-xs rounded-xl border border-gray-300 p-3 bg-white shadow-xs focus:ring-brand-500 focus:border-brand-500" />
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Đoạn trích tóm tắt (Mô tả ngắn xuất hiện ở danh sách)</label>
            <textarea name="excerpt" rows="3" class="w-full text-sm rounded-xl border border-gray-300 p-3.5 focus:ring-brand-500 focus:border-brand-500 shadow-xs leading-relaxed text-gray-700" placeholder="Tóm tắt ngắn gọn nội dung chính...">{{ old('excerpt') }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Nội dung chi tiết bài viết <span class="text-red-500">*</span></label>
            <div class="rounded-2xl shadow-sm border border-gray-200">
                <textarea id="post_editor" name="content">{{ old('content') }}</textarea>
            </div>
        </div>

        <div class="pt-4 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center space-x-6">
                <div class="flex items-center space-x-2 cursor-pointer">
                    <input type="checkbox" name="is_published" value="1" id="is_pub" checked class="w-5 h-5 text-brand-600 rounded border-gray-300 focus:ring-brand-500 cursor-pointer">
                    <label for="is_pub" class="text-sm font-bold text-gray-800 cursor-pointer">Xuất bản ngay (Hiển thị công khai)</label>
                </div>
                <div class="flex items-center space-x-2 cursor-pointer">
                    <input type="checkbox" name="is_featured" value="1" id="is_feat" class="w-5 h-5 text-amber-500 rounded border-gray-300 focus:ring-amber-400 cursor-pointer">
                    <label for="is_feat" class="text-sm font-bold text-amber-800 cursor-pointer">Đánh dấu bài Nổi bật</label>
                </div>
            </div>

            <button type="submit" class="w-full sm:w-auto bg-brand-500 hover:bg-brand-600 text-white font-extrabold px-8 py-3.5 rounded-2xl text-sm shadow-xl shadow-brand-500/30 transition transform hover:-translate-y-0.5 flex items-center justify-center space-x-2">
                <i class="fa-solid fa-paper-plane text-base"></i>
                <span>Đăng bài viết</span>
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
            .create(document.querySelector('#post_editor'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'blockQuote', 'insertTable', 'mediaEmbed', '|', 'undo', 'redo']
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endpush
