@extends('admin.layout')

@section('title', 'Edit Product')
@section('page-title', 'Edit Product')

@section('content')
<div class="dashboard-card">
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm text-gray-600">Product name</label>
                <input name="name" value="{{ old('name', $product->name) }}" required class="w-full px-3 py-2 border rounded mt-1">

                <label class="block text-sm text-gray-600 mt-3">Short description</label>
                <input name="description" value="{{ old('description', $product->description) }}" class="w-full px-3 py-2 border rounded mt-1">

                <label class="block text-sm text-gray-600 mt-3">SKU</label>
                <input name="sku" value="{{ old('sku', $product->sku) }}" class="w-full px-3 py-2 border rounded mt-1">

                <label class="block text-sm text-gray-600 mt-3">Barcode</label>
                <input name="barcode" value="{{ old('barcode', $product->barcode) }}" class="w-full px-3 py-2 border rounded mt-1">

                <label class="block text-sm text-gray-600 mt-3">Brand</label>
                <input name="brand" value="{{ old('brand', $product->brand) }}" class="w-full px-3 py-2 border rounded mt-1">

                <label class="block text-sm text-gray-600 mt-3">Category</label>
                <select name="category" class="w-full px-3 py-2 border rounded mt-1">
                    <option {{ $product->category=='Perfumes'?'selected':'' }}>Perfumes</option>
                    <option {{ $product->category=='Cosmetics'?'selected':'' }}>Cosmetics</option>
                    <option {{ $product->category=='Skincare'?'selected':'' }}>Skincare</option>
                    <option {{ $product->category=='Accessories'?'selected':'' }}>Accessories</option>
                    <option {{ $product->category=='New Products'?'selected':'' }}>New Products</option>
                </select>
            </div>
            <div>
                <label class="block text-sm text-gray-600">Main Image</label>
                <input type="file" id="mainImageInputEdit" name="main_image" accept="image/*" class="mt-1">
                <div id="mainImagePreviewEdit" class="mt-3 w-full h-48 bg-gray-50 rounded flex items-center justify-center overflow-hidden">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover">
                    @else
                        <span class="text-gray-400">Preview</span>
                    @endif
                </div>

                <label class="block text-sm text-gray-600 mt-3">Pricing</label>
                <div class="grid grid-cols-2 gap-2">
                    <input name="price" type="number" step="0.01" placeholder="Original price" id="priceInputEdit" value="{{ old('price',$product->price) }}" class="px-3 py-2 border rounded">
                    <input name="sale_price" type="number" step="0.01" placeholder="Sale price (optional)" id="saleInputEdit" value="{{ old('sale_price',$product->sale_price) }}" class="px-3 py-2 border rounded">
                </div>
                <div class="mt-2 grid grid-cols-2 gap-2">
                    <input name="discount_percentage" type="number" placeholder="Discount %" id="discountInputEdit" value="{{ old('discount_percentage',$product->discount_percentage) }}" class="px-3 py-2 border rounded">
                    <input name="final_price" type="number" step="0.01" placeholder="Final price" id="finalPriceInputEdit" value="{{ old('final_price',$product->final_price) }}" class="px-3 py-2 border rounded" readonly>
                </div>

                <label class="block text-sm text-gray-600 mt-3">Sale Dates</label>
                <div class="grid grid-cols-2 gap-2">
                    <input name="sale_start" type="date" value="{{ old('sale_start',$product->sale_start) }}" class="px-3 py-2 border rounded">
                    <input name="sale_end" type="date" value="{{ old('sale_end',$product->sale_end) }}" class="px-3 py-2 border rounded">
                </div>

                <label class="block text-sm text-gray-600 mt-3">Inventory</label>
                <div class="grid grid-cols-2 gap-2">
                    <input name="stock" type="number" placeholder="Stock qty" value="{{ old('stock',$product->stock) }}" class="px-3 py-2 border rounded">
                    <input name="min_stock" type="number" placeholder="Min alert" value="{{ old('min_stock',$product->min_stock) }}" class="px-3 py-2 border rounded">
                </div>
                <div class="flex items-center gap-2 mt-3">
                    <input type="checkbox" name="availability" {{ $product->availability ? 'checked' : '' }}>
                    <label class="text-sm text-gray-600">Available</label>
                </div>

            </div>
        </div>
        <div class="mt-4 flex justify-end gap-2">
            <a href="{{ route('admin.products.index') }}" class="px-4 py-2 border rounded">Back</a>
            <button type="submit" class="px-4 py-2 bg-pink-500 text-white rounded">Update Product</button>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
// Image preview edit
const mainImageInputEdit = document.getElementById('mainImageInputEdit');
const mainImagePreviewEdit = document.getElementById('mainImagePreviewEdit');
mainImageInputEdit?.addEventListener('change',(e)=>{
    const file = e.target.files[0]; if(!file) return;
    const url = URL.createObjectURL(file);
    mainImagePreviewEdit.innerHTML = `<img src="${url}" class="w-full h-full object-cover">`;
});

// Price calc edit
const priceInputEdit = document.getElementById('priceInputEdit');
const discountInputEdit = document.getElementById('discountInputEdit');
const saleInputEdit = document.getElementById('saleInputEdit');
const finalInputEdit = document.getElementById('finalPriceInputEdit');
function recalcEdit(){
    const price = parseFloat(priceInputEdit?.value || 0);
    const discount = parseFloat(discountInputEdit?.value || 0);
    const sale = parseFloat(saleInputEdit?.value || 0);
    let final = price;
    if(discount > 0) final = +(price * (1 - discount/100)).toFixed(2);
    else if(sale > 0) final = sale;
    finalInputEdit.value = final.toFixed(2);
}
priceInputEdit?.addEventListener('input', recalcEdit);
discountInputEdit?.addEventListener('input', recalcEdit);
saleInputEdit?.addEventListener('input', recalcEdit);
</script>
@endpush
