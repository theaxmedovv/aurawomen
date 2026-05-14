@extends('admin.layout')

@section('title', 'Categories')
@section('page-title', 'Categories Management')

@section('content')
    <div class="mb-6 flex justify-between items-center">
        <h3 class="text-lg font-semibold text-gray-700">All Categories</h3>
        <button id="openAddCategory" class="bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold py-2 px-6 rounded-lg hover:shadow-lg transition">
            <i class="fas fa-plus mr-2"></i>Add Category
        </button>
    </div>

    <div class="dashboard-card">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200">
                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Category Name</th>
                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Products</th>
                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Status</th>
                    <th class="px-6 py-4 text-left text-sm font-bold text-gray-800">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr class="border-b border-gray-100 hover:bg-pink-50">
                    <td class="px-6 py-4 font-semibold text-gray-800">{{ $category->name }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $category->products_count ?? 0 }}</td>
                    <td class="px-6 py-4">
                        @if($category->status == 'active')
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold">Active</span>
                        @else
                            <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-xs font-bold">Hidden</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 flex gap-2">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-blue-500 hover:text-blue-700"><i class="fas fa-edit"></i></a>
                        <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}" onsubmit="return confirm('Delete this category?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-6 text-center text-gray-500">No categories yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Add Category Modal -->
    <div id="addCategoryModal" class="fixed inset-0 bg-black bg-opacity-40 z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-lg w-full max-w-md shadow-xl overflow-hidden">
            <div class="flex items-center justify-between p-4 border-b">
                <h3 class="text-lg font-bold">Add Category</h3>
                <button id="closeAddCategory" class="text-gray-500 hover:text-gray-700">✕</button>
            </div>
            <form action="{{ route('admin.categories.store') }}" method="POST" class="p-4">
                @csrf
                <label class="block text-sm text-gray-600">Name</label>
                <input name="name" required class="w-full px-3 py-2 border rounded mt-1">
                <label class="block text-sm text-gray-600 mt-3">Description</label>
                <textarea name="description" class="w-full px-3 py-2 border rounded mt-1"></textarea>
                <div class="mt-4 flex justify-end gap-2">
                    <button type="button" id="cancelAddCategory" class="px-4 py-2 border rounded">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-pink-500 text-white rounded">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
const openAdd = document.getElementById('openAddCategory');
const addModal = document.getElementById('addCategoryModal');
const closeAdd = document.getElementById('closeAddCategory');
const cancelAdd = document.getElementById('cancelAddCategory');
openAdd?.addEventListener('click', ()=>{ addModal.style.display='flex'; addModal.classList.remove('hidden'); });
closeAdd?.addEventListener('click', ()=>{ addModal.style.display='none'; addModal.classList.add('hidden'); });
cancelAdd?.addEventListener('click', ()=>{ addModal.style.display='none'; addModal.classList.add('hidden'); });
</script>
@endpush
