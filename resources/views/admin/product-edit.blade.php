@extends('admin.layout')

@section('title', 'Tahrirlash: ' . $product->name)
@section('page-title', 'Mahsulotni Tahrirlash')

@section('content')
<div class="max-w-5xl mx-auto">
    <!-- Orqaga qaytish tugmasi -->
    <div class="mb-6">
        <a href="{{ route('admin.products.index') }}" class="inline-flex items-center gap-2 text-slate-500 hover:text-pink-600 transition-colors font-bold text-sm group">
            <i class="fas fa-arrow-left transition-transform group-hover:-translate-x-1"></i>
            Ro'yxatga qaytish
        </a>
    </div>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

            <!-- Chap ustun: Asosiy ma'lumotlar -->
            <div class="lg:col-span-7 space-y-6">
                <div class="bg-white rounded-[2.5rem] p-8 border border-slate-100 shadow-sm space-y-5">
                    <h3 class="text-lg font-extrabold text-slate-800 mb-4 flex items-center gap-2">
                        <i class="fas fa-info-circle text-pink-500"></i> Umumiy ma'lumotlar
                    </h3>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Mahsulot nomi</label>
                        <input name="name" value="{{ old('name', $product->name) }}" required
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 transition-all font-medium text-slate-700">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Qisqacha tavsif</label>
                        <textarea name="description" rows="3"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 transition-all text-sm text-slate-600">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">SKU</label>
                            <input name="sku" value="{{ old('sku', $product->sku) }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Shtrix-kod</label>
                            <input name="barcode" value="{{ old('barcode', $product->barcode) }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none text-sm">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Brend</label>
                            <input name="brand" value="{{ old('brand', $product->brand) }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Kategoriya</label>
                            <select name="category" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none text-sm appearance-none cursor-pointer">
                                @foreach(['Perfumes', 'Cosmetics', 'Skincare', 'Accessories', 'New Products'] as $cat)
                                    <option value="{{ $cat }}" {{ $product->category == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Inventar bo'limi -->
                <div class="bg-white rounded-[2.5rem] p-8 border border-slate-100 shadow-sm">
                    <h3 class="text-lg font-extrabold text-slate-800 mb-6 flex items-center gap-2">
                        <i class="fas fa-warehouse text-amber-500"></i> Inventar va Holat
                    </h3>
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Ombordagi miqdor</label>
                            <div class="relative">
                                <input name="stock" type="number" value="{{ old('stock', $product->stock) }}"
                                    class="w-full pl-4 pr-12 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none text-sm font-bold">
                                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-[10px] font-bold text-slate-400">DONA</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Minimal limit</label>
                            <input name="min_stock" type="number" value="{{ old('min_stock', $product->min_stock) }}"
                                class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none text-sm font-bold text-rose-500">
                        </div>
                    </div>

                    <div class="mt-6 p-4 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-xl bg-white border border-slate-200 flex items-center justify-center text-emerald-500">
                                <i class="fas fa-toggle-on"></i>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-slate-700">Sotuvda mavjud</p>
                                <p class="text-[10px] text-slate-400">Mijozlar ushbu mahsulotni ko'ra oladilar</p>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="availability" value="1" class="sr-only peer" {{ $product->availability ? 'checked' : '' }}>
                            <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-pink-500"></div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- O'ng ustun: Narx va Rasm -->
            <div class="lg:col-span-5 space-y-6">

                <!-- Rasm yuklash -->
                <div class="bg-white rounded-[2.5rem] p-8 border border-slate-100 shadow-sm">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-4">Mahsulot tasviri</label>
                    <div class="relative group">
                        <input type="file" id="mainImageInputEdit" name="main_image" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10">
                        <div id="mainImagePreviewEdit" class="w-full h-64 bg-slate-50 border-2 border-dashed border-slate-200 rounded-[2rem] flex flex-col items-center justify-center transition-all group-hover:border-pink-300 group-hover:bg-pink-50/30 overflow-hidden relative">
                            @if($product->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($product->image))
                                <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <span class="text-white text-xs font-bold uppercase tracking-widest bg-white/20 backdrop-blur-md px-4 py-2 rounded-xl">Rasmni almashtirish</span>
                                </div>
                            @else
                                <i class="fas fa-image text-4xl text-slate-200 mb-3"></i>
                                <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Rasm tanlang</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Narxlar -->
                <div class="bg-gradient-to-br from-slate-800 to-slate-900 rounded-[2.5rem] p-8 text-white shadow-xl shadow-slate-200">
                    <h3 class="text-lg font-extrabold mb-6 flex items-center gap-2">
                        <i class="fas fa-coins text-pink-400"></i> Narxlarni boshqarish
                    </h3>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Asosiy narx ($)</label>
                            <input name="price" type="number" step="0.01" id="priceInputEdit" value="{{ old('price', $product->price) }}"
                                class="w-full px-4 py-3 bg-white/10 border border-white/10 rounded-2xl focus:outline-none focus:border-pink-500 transition-all font-bold text-white text-lg">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Chegirma (%)</label>
                                <input name="discount_percentage" type="number" id="discountInputEdit" value="{{ old('discount_percentage', $product->discount_percentage) }}"
                                    class="w-full px-4 py-3 bg-white/10 border border-white/10 rounded-2xl focus:outline-none focus:border-pink-500 font-bold text-pink-400">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Aksiya narxi ($)</label>
                                <input name="sale_price" type="number" step="0.01" id="saleInputEdit" value="{{ old('sale_price', $product->sale_price) }}"
                                    class="w-full px-4 py-3 bg-white/10 border border-white/10 rounded-2xl focus:outline-none focus:border-pink-500 font-bold text-white">
                            </div>
                        </div>

                        <div class="pt-4 border-t border-white/10">
                            <label class="block text-[10px] font-bold text-pink-400 uppercase tracking-widest mb-1">Yakuniy sotuv narxi</label>
                            <input name="final_price" id="finalPriceInputEdit" value="{{ old('final_price', $product->final_price) }}" readonly
                                class="w-full px-4 py-4 bg-pink-500 text-white rounded-2xl font-black text-2xl shadow-lg shadow-pink-500/20">
                        </div>
                    </div>
                </div>

                <!-- Aksiya muddatlari -->
                <div class="bg-white rounded-[2.5rem] p-8 border border-slate-100 shadow-sm">
                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-4">Aksiya muddatlari</label>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="flex items-center gap-3">
                            <i class="fas fa-calendar-alt text-slate-300"></i>
                            <input name="sale_start" type="date" value="{{ old('sale_start', $product->sale_start) }}"
                                class="flex-1 px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold">
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fas fa-clock text-slate-300"></i>
                            <input name="sale_end" type="date" value="{{ old('sale_end', $product->sale_end) }}"
                                class="flex-1 px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pastki harakatlar paneli -->
        <div class="sticky bottom-8 bg-white/80 backdrop-blur-xl border border-white p-4 rounded-[2rem] shadow-2xl flex justify-between items-center z-50">
            <button type="button" onclick="window.history.back()" class="px-8 py-3 rounded-2xl text-slate-500 font-bold hover:bg-slate-100 transition-all">Bekor qilish</button>
            <button type="submit" class="px-12 py-3 bg-slate-900 text-white rounded-2xl font-bold hover:bg-slate-800 hover:shadow-xl transition-all active:scale-95">
                O'zgarishlarni saqlash
            </button>
        </div>
    </form>
</div>
@endsection
