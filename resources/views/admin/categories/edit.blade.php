@extends('layouts.admin')

@section('title', 'Sửa danh mục')

@section('content')
    @session('success')
        <p class="text-green-500 text-sm mt-1">{{ session('success') }}</p>
    @endsession
    <a href="{{ route('admin.categories.index') }}" class="inline-block mp-b p-3 rounded bg-blue-500 text-white cursor-pointer hover:bg-blue-700">Trở về</a>
    <h2 class="text-2xl font-bold mb-4">Sửa danh mục</h2>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="p-4">
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Tên danh mục</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="active" class="block text-sm font-medium text-gray-700">Trạng thái</label>
                    <select name="active" id="active"
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        <option value="1" {{ old('active', $category->active) == 1 ? 'selected' : '' }}>Hiện</option>
                        <option value="0" {{ old('active', $category->active) == 0 ? 'selected' : '' }}>Ẩn</option>
                    </select>
                    @error('active')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Cập nhật</button>
        </form>
@endsection