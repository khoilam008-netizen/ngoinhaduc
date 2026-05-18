@extends('admin.layouts.app')

@section('title', 'Đơn đăng ký nhập học')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
        <h3 class="font-bold text-lg text-gray-800">Danh sách đăng ký học</h3>
        <span class="bg-brand-50 text-brand-600 font-semibold px-3 py-1 rounded-full text-xs">Tổng số: {{ $enrollments->total() }}</span>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/75 text-gray-500 uppercase text-xs tracking-wider border-b border-gray-100 font-semibold">
                    <th class="py-4 px-6">ID</th>
                    <th class="py-4 px-6">Học viên</th>
                    <th class="py-4 px-6">Khóa học</th>
                    <th class="py-4 px-6">Điện thoại / Email</th>
                    <th class="py-4 px-6">Ngày gửi</th>
                    <th class="py-4 px-6 text-right">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                @forelse($enrollments as $item)
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="py-4 px-6 font-semibold text-gray-500">#{{ $item->id }}</td>
                        <td class="py-4 px-6">
                            <div class="font-bold text-gray-900">{{ $item->full_name }}</div>
                            <div class="text-xs text-gray-500">{{ $item->birth_date }} - Nơi sinh: {{ $item->birth_place }}</div>
                            <div class="text-xs text-gray-500">CCCD/HC: {{ $item->passport_number }} ({{ $item->gender }})</div>
                        </td>
                        <td class="py-4 px-6">
                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-brand-50 text-brand-700 border border-brand-200">
                                {{ $item->course_name }}
                            </span>
                            @if($item->message)
                                <p class="text-xs text-gray-500 mt-1 italic">"{{ str_limit($item->message, 50) }}"</p>
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            <div class="font-semibold">{{ $item->phone }}</div>
                            <div class="text-xs text-gray-500">{{ $item->email }}</div>
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap text-gray-500 text-xs">
                            {{ $item->created_at->format('d/m/Y H:i') }}
                        </td>
                        <td class="py-4 px-6 text-right whitespace-nowrap">
                            <form action="{{ route('admin.enrollments.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn này?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition" title="Xóa">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-12 text-gray-500">
                            Không có đơn đăng ký học nào.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($enrollments->hasPages())
        <div class="p-6 border-t border-gray-100">
            {{ $enrollments->links() }}
        </div>
    @endif
</div>
@endsection
