@extends('admin.layouts.app')

@section('title', 'Tổng quan')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">Đơn nhập học</p>
            <h3 class="text-3xl font-bold text-gray-800">{{ number_format($stats['enrollments']) }}</h3>
        </div>
        <div class="w-14 h-14 bg-brand-50 text-brand-500 rounded-2xl flex items-center justify-center text-2xl shadow-sm">
            <i class="fa-solid fa-graduation-cap"></i>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">Đơn dự thi</p>
            <h3 class="text-3xl font-bold text-gray-800">{{ number_format($stats['exam_registrations']) }}</h3>
        </div>
        <div class="w-14 h-14 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center text-2xl shadow-sm">
            <i class="fa-solid fa-file-signature"></i>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">Khóa học trong lịch</p>
            <h3 class="text-3xl font-bold text-gray-800">{{ number_format($stats['courses']) }}</h3>
        </div>
        <div class="w-14 h-14 bg-amber-50 text-amber-500 rounded-2xl flex items-center justify-center text-2xl shadow-sm">
            <i class="fa-solid fa-calendar-check"></i>
        </div>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between">
        <div>
            <p class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">Bài viết & Tin tức</p>
            <h3 class="text-3xl font-bold text-gray-800">{{ number_format($stats['posts']) }}</h3>
        </div>
        <div class="w-14 h-14 bg-purple-50 text-purple-500 rounded-2xl flex items-center justify-center text-2xl shadow-sm">
            <i class="fa-solid fa-newspaper"></i>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
    <!-- Recent Enrollments -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="font-bold text-lg text-gray-800 flex items-center space-x-2">
                <i class="fa-solid fa-clock-rotate-left text-brand-500"></i>
                <span>Đơn đăng ký học mới nhất</span>
            </h3>
            <a href="{{ route('admin.enrollments') }}" class="text-sm text-brand-500 hover:text-brand-600 font-semibold">Xem tất cả &rarr;</a>
        </div>

        @if($recentEnrollments->isNotEmpty())
            <div class="space-y-4">
                @foreach($recentEnrollments as $item)
                    <div class="p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition border border-gray-100 flex items-center justify-between">
                        <div>
                            <h4 class="font-bold text-gray-800">{{ $item->full_name }}</h4>
                            <p class="text-sm text-gray-600">Khóa: <span class="font-semibold text-brand-600">{{ $item->course_name }}</span></p>
                            <span class="text-xs text-gray-400">{{ $item->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="text-right">
                            <span class="text-sm font-medium bg-white px-3 py-1.5 rounded-lg border border-gray-200 text-gray-600">{{ $item->phone }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-center py-8">Chưa có đơn đăng ký học nào.</p>
        @endif
    </div>

    <!-- Recent Exam Regs -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="font-bold text-lg text-gray-800 flex items-center space-x-2">
                <i class="fa-solid fa-clock-rotate-left text-blue-500"></i>
                <span>Đơn đăng ký thi mới nhất</span>
            </h3>
            <a href="{{ route('admin.exam_regs') }}" class="text-sm text-blue-500 hover:text-blue-600 font-semibold">Xem tất cả &rarr;</a>
        </div>

        @if($recentExamRegs->isNotEmpty())
            <div class="space-y-4">
                @foreach($recentExamRegs as $item)
                    <div class="p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition border border-gray-100 flex items-center justify-between">
                        <div>
                            <h4 class="font-bold text-gray-800">{{ $item->full_name }}</h4>
                            <p class="text-sm text-gray-600">Cấp độ: <span class="font-semibold text-blue-600">{{ $item->exam_level }}</span></p>
                            <span class="text-xs text-gray-400">{{ $item->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="text-right">
                            <span class="text-sm font-medium bg-white px-3 py-1.5 rounded-lg border border-gray-200 text-gray-600">{{ $item->phone }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-center py-8">Chưa có đơn đăng ký thi nào.</p>
        @endif
    </div>
</div>
@endsection
