@extends('admin.layouts.app')

@section('title', 'Chỉnh sửa Trang tĩnh')

@push('styles')
<style>
    .ck.ck-editor__main > .ck-editor__editable {
        min-height: 450px;
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
            <a href="{{ route('admin.pages') }}" class="w-10 h-10 bg-white border border-gray-200 text-gray-600 hover:text-brand-600 hover:border-brand-300 rounded-xl flex items-center justify-center font-bold shadow-xs transition">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <div>
                <h3 class="font-extrabold text-2xl text-gray-900">Chỉnh sửa: {{ $page->title }}</h3>
                <p class="text-xs text-brand-600 font-mono">URL: {{ url('/gioi-thieu/' . $page->slug) }}</p>
            </div>
        </div>
        <a href="{{ url('/gioi-thieu/' . $page->slug) }}" target="_blank" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold px-4 py-2 rounded-xl text-xs transition flex items-center space-x-1.5">
            <i class="fa-solid fa-arrow-up-right-from-square"></i>
            <span>Xem trang ngoài website</span>
        </a>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.pages.update', $page->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Tên trang (Tiêu đề) <span class="text-red-500">*</span></label>
            <input type="text" name="title" required value="{{ old('title', $page->title) }}" class="w-full text-base font-bold rounded-xl border border-gray-300 p-3.5 focus:ring-brand-500 focus:border-brand-500 shadow-xs text-gray-900 placeholder:font-normal placeholder:text-gray-400" />
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Đường dẫn tĩnh (Slug)</label>
            <input type="text" name="slug" required value="{{ old('slug', $page->slug) }}" class="w-full font-mono text-xs text-gray-600 rounded-xl border border-gray-300 p-3 focus:ring-brand-500 focus:border-brand-500 shadow-xs bg-gray-50/50" />
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-5 bg-gray-50/50 rounded-2xl border border-gray-100 items-center">
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Ảnh bìa (Upload thay thế file mới)</label>
                <div class="flex items-center space-x-4 mb-2">
                    @if($page->thumbnail)
                        <img src="{{ $page->thumbnail }}" class="w-16 h-12 object-cover rounded-xl border border-gray-300 shadow-inner" alt="">
                    @endif
                    <input type="file" name="thumbnail_file" accept="image/*" class="w-full text-xs rounded-xl border border-gray-300 p-2 bg-white file:mr-2 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-brand-50 file:text-brand-700 hover:file:bg-brand-100 shadow-xs cursor-pointer" />
                </div>
            </div>
            <div>
                <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Hoặc điền link ảnh bìa (URL)</label>
                <input type="text" name="thumbnail" value="{{ old('thumbnail', $page->thumbnail) }}" placeholder="https://..." class="w-full font-mono text-xs rounded-xl border border-gray-300 p-3 bg-white shadow-xs focus:ring-brand-500 focus:border-brand-500" />
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Đoạn mô tả ngắn (SEO Excerpt)</label>
            <textarea name="excerpt" rows="2" class="w-full text-sm rounded-xl border border-gray-300 p-3.5 focus:ring-brand-500 focus:border-brand-500 shadow-xs leading-relaxed text-gray-700">{{ old('excerpt', $page->excerpt) }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wide mb-2">Nội dung chi tiết trang <span class="text-red-500">*</span></label>
            <div class="rounded-2xl shadow-sm border border-gray-200">
                <textarea id="page_editor" name="content">{{ old('content', $page->content) }}</textarea>
            </div>
        </div>

        <div class="pt-4 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="flex items-center space-x-2 cursor-pointer">
                <input type="checkbox" name="is_published" value="1" id="is_pub" {{ old('is_published', $page->is_published) ? 'checked' : '' }} class="w-5 h-5 text-brand-600 rounded border-gray-300 focus:ring-brand-500 cursor-pointer">
                <label for="is_pub" class="text-sm font-bold text-gray-800 cursor-pointer">Xuất bản trang (Hiển thị công khai)</label>
            </div>

            <button type="submit" class="w-full sm:w-auto bg-brand-500 hover:bg-brand-600 text-white font-extrabold px-8 py-3.5 rounded-2xl text-sm shadow-xl shadow-brand-500/30 transition transform hover:-translate-y-0.5 flex items-center justify-center space-x-2">
                <i class="fa-solid fa-floppy-disk text-base"></i>
                <span>Lưu thay đổi</span>
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
            .create(document.querySelector('#page_editor'), {
                toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'blockQuote', 'insertTable', 'mediaEmbed', '|', 'undo', 'redo']
            })
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endpush
