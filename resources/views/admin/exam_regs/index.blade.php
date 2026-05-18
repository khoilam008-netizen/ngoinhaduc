@extends('admin.layouts.app')

@section('title', 'Đơn đăng ký dự thi')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
        <h3 class="font-bold text-lg text-gray-800">Danh sách đăng ký dự thi</h3>
        <span class="bg-blue-50 text-blue-600 font-semibold px-3 py-1 rounded-full text-xs">Tổng số: {{ $registrations->total() }}</span>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50/75 text-gray-500 uppercase text-xs tracking-wider border-b border-gray-100 font-semibold">
                    <th class="py-4 px-6">ID</th>
                    <th class="py-4 px-6">Thí sinh</th>
                    <th class="py-4 px-6">Cấp độ thi / Tháng thi</th>
                    <th class="py-4 px-6">Điện thoại / Email</th>
                    <th class="py-4 px-6">Ngày gửi</th>
                    <th class="py-4 px-6 text-right">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                @forelse($registrations as $item)
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="py-4 px-6 font-semibold text-gray-500">#{{ $item->id }}</td>
                        <td class="py-4 px-6">
                            <div class="font-bold text-gray-900">{{ $item->full_name }}</div>
                            <div class="text-xs text-gray-500">{{ $item->birth_date }} - Nơi sinh: {{ $item->birth_place }}</div>
                            <div class="text-xs text-gray-500">CCCD/HC: {{ $item->passport_number }} ({{ $item->gender }})</div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-2">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold bg-blue-50 text-blue-700 border border-blue-200">
                                    {{ $item->exam_level }}
                                </span>
                                <span class="text-xs font-semibold bg-gray-100 px-2 py-1 rounded-lg text-gray-600">
                                    {{ $item->exam_month }}
                                </span>
                            </div>
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
                            <form action="{{ route('admin.exam_regs.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa đơn này?');" class="inline">
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
                            Không có đơn đăng ký thi nào.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($registrations->hasPages())
        <div class="p-6 border-t border-gray-100">
            {{ $registrations->links() }}
        </div>
    @endif
</div>
@endsection
