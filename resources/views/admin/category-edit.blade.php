@extends('admin.layout')

@section('title', 'Edit Category')
@section('page-title', 'Edit Category')

@section('content')
    <div class="max-w-2xl">
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label class="block text-sm text-gray-600">Name</label>
            <input name="name" value="{{ old('name',$category->name) }}" required class="w-full px-3 py-2 border rounded mt-1">

            <label class="block text-sm text-gray-600 mt-3">Description</label>
            <textarea name="description" class="w-full px-3 py-2 border rounded mt-1">{{ old('description',$category->description) }}</textarea>

            <label class="block text-sm text-gray-600 mt-3">Status</label>
            <select name="status" class="w-full px-3 py-2 border rounded mt-1">
                <option value="active" @if($category->status=='active') selected @endif>Active</option>
                <option value="hidden" @if($category->status=='hidden') selected @endif>Hidden</option>
            </select>

            <div class="mt-4 flex gap-2">
                <a href="{{ route('admin.categories.index') }}" class="px-4 py-2 border rounded">Back</a>
                <button type="submit" class="px-4 py-2 bg-pink-500 text-white rounded">Update Category</button>
            </div>
        </form>
    </div>
@endsection
