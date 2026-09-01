@extends('layouts.admin')

@section('title', 'Quản lý danh mục')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Quản lý danh mục</h2>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-gray-50 text-sm text-gray-600">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Tên danh mục</th>
                    <th class="px-4 py-3">Trạng thái</th>
                    <th class="px-4 py-3">Hành động</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($categories as $category)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $category->id }}</td>
                        <td class="px-4 py-3">{{ $category->name }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-sm font-semibold {{ $category->active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $category->active ? 'Hiện' : 'Ẩn' }}
                            </span>
                            <select class="border rounded p-2 invisible">
                                <option value="active" {{ $category->active ? 'selected' : '' }}>Hiện</option>
                                <option value="inactive" {{ $category->active ? 'selected' : '' }}>Ẩn</option>
                            </select>
                        </td>
                        <td class="px-4 py-3">
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-3 rounded bg-red-500 text-white cursor-pointer hover:bg-red-700 ml-2" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                            Chưa có danh mục nào.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $categories->links() }}
    </div>
@endsection