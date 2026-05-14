@extends('admin.layout')

@section('title', 'Products Management')
@section('page-title', 'Mahsulotlar Ombori')

@section('content')
<div class="space-y-8">

    <!-- Header Actions Section -->
    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
        <form id="filterForm" method="GET" class="flex flex-wrap lg:flex-nowrap gap-3 flex-1 w-full">
            <div class="relative flex-1 min-w-[240px]">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>
                <input name="q" value="{{ request('q') }}" type="text" placeholder="Mahsulotlarni qidirish..."
                    class="w-full pl-11 pr-4 py-2.5 bg-white border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 transition-all text-sm">
            </div>

            <div class="relative">
                <select name="category" class="appearance-none pl-4 pr-10 py-2.5 bg-white border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 text-sm cursor-pointer">
                    <option value="">Barcha kategoriyalar</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" @if(request('category') == $cat) selected @endif>{{ $cat }}</option>
                    @endforeach
                </select>
                <i class="fas fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-[10px] pointer-events-none"></i>
            </div>

            <button type="submit" class="px-6 py-2.5 bg-slate-900 text-white rounded-2xl hover:bg-slate-800 transition shadow-lg shadow-slate-200 font-medium text-sm flex items-center gap-2">
                <i class="fas fa-filter text-xs"></i> Saralash
            </button>
        </form>

        <div class="flex items-center gap-3 w-full lg:w-auto">
            <div class="relative flex-1 lg:flex-none">
                <select id="sortSelect" name="sort" form="filterForm" class="appearance-none pl-4 pr-10 py-2.5 bg-white border border-slate-200 rounded-2xl focus:outline-none text-sm cursor-pointer w-full">
                    <option value="latest" @if(request('sort','latest')=='latest') selected @endif>Eng yangilari</option>
                    <option value="price_asc" @if(request('sort')=='price_asc') selected @endif>Narx: Arzon → Qimmat</option>
                    <option value="price_desc" @if(request('sort')=='price_desc') selected @endif>Narx: Qimmat → Arzon</option>
                </select>
                <i class="fas fa-sort-amount-down absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 text-[10px] pointer-events-none"></i>
            </div>

            <button id="openAddModal" class="bg-gradient-to-r from-pink-500 to-rose-500 text-white font-bold py-2.5 px-6 rounded-2xl hover:shadow-xl hover:shadow-pink-500/20 transition-all active:scale-95 flex items-center gap-2 whitespace-nowrap">
                <i class="fas fa-plus-circle"></i> Yangi Mahsulot
            </button>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
        @php
            $stats = [
                ['label' => 'Jami', 'value' => \App\Models\Product::count(), 'icon' => 'fa-boxes', 'color' => 'blue'],
                ['label' => 'Aktiv', 'value' => \App\Models\Product::where('status','active')->count(), 'icon' => 'fa-check-circle', 'color' => 'emerald'],
                ['label' => 'Tugagan', 'value' => \App\Models\Product::where('stock',0)->count(), 'icon' => 'fa-exclamation-triangle', 'color' => 'rose'],
                ['label' => 'Top Model', 'value' => \App\Models\Product::orderBy('sold_count','desc')->first()?->name ?? '—', 'icon' => 'fa-crown', 'color' => 'amber'],
                ['label' => 'Umumiy Qiymat', 'value' => '$' . number_format(\App\Models\Product::sum('final_price'), 0), 'icon' => 'fa-wallet', 'color' => 'purple'],
            ];
        @endphp

        @foreach($stats as $stat)
        <div class="bg-white p-5 rounded-[2rem] border border-slate-100 shadow-sm group hover:border-{{$stat['color']}}-200 transition-all duration-300">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl bg-{{$stat['color']}}-50 text-{{$stat['color']}}-500 flex items-center justify-center text-sm transition-transform group-hover:scale-110">
                    <i class="fas {{$stat['icon']}}"></i>
                </div>
            </div>
            <p class="text-[11px] font-bold text-slate-400 uppercase tracking-widest">{{ $stat['label'] }}</p>
            <h4 class="text-xl font-extrabold text-slate-800 truncate">{{ $stat['value'] }}</h4>
        </div>
        @endforeach
    </div>

    <!-- Main Data Table -->
    <div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50/50 border-b border-slate-100">
                    <tr>
                        <th class="px-6 py-5 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-center w-24">Rasm</th>
                        <th class="px-4 py-5 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Mahsulot</th>
                        <th class="px-4 py-5 text-[10px] font-bold text-slate-400 uppercase tracking-widest">Kategoriya</th>
                        <th class="px-4 py-5 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-right">Narx</th>
                        <th class="px-4 py-5 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-right">Zaxira</th>
                        <th class="px-4 py-5 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-center">Status</th>
                        <th class="px-6 py-5 text-[10px] font-bold text-slate-400 uppercase tracking-widest text-center w-32">Amallar</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @foreach($products as $product)
                    <tr class="group hover:bg-slate-50/80 transition-all">
                        <td class="px-6 py-4">
                            <div class="w-16 h-16 rounded-2xl overflow-hidden bg-slate-100 border border-slate-200">
                                @if($product->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($product->image))
                                    <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" alt="{{ $product->name }}">
                                @else
                                    <img src="{{ asset('images/product-placeholder.svg') }}" class="w-full h-full object-cover" alt="No image">
                                @endif
                            </div>
                        </td>
                        <td class="px-4 py-4">
                            <div class="font-bold text-slate-800 text-sm group-hover:text-pink-600 transition-colors">{{ $product->name }}</div>
                            <div class="text-[11px] text-slate-400 font-medium">SKU: {{ $product->sku ?? 'Noma’lum' }}</div>
                        </td>
                        <td class="px-4 py-4">
                            <span class="px-3 py-1 rounded-lg bg-slate-100 text-slate-600 text-[11px] font-bold">{{ $product->category ?? '—' }}</span>
                        </td>
                        <td class="px-4 py-4 text-right">
                            <div class="text-sm font-extrabold text-slate-900">${{ number_format($product->final_price, 2) }}</div>
                            @if($product->discount_percentage)
                                <div class="text-[10px] text-rose-500 font-bold uppercase tracking-tighter">-{{ $product->discount_percentage }}% chegirma</div>
                            @endif
                        </td>
                        <td class="px-4 py-4 text-right">
                            <div class="text-sm font-bold @if($product->stock <= 5) text-rose-500 @else text-slate-700 @endif">
                                {{ $product->stock }} <span class="text-[10px] font-medium text-slate-400">dona</span>
                            </div>
                        </td>
                        <td class="px-4 py-4 text-center">
                            @php
                                $statusStyles = [
                                    'active' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                    'hidden' => 'bg-slate-100 text-slate-500 border-slate-200',
                                    'out_of_stock' => 'bg-rose-50 text-rose-600 border-rose-100'
                                ];
                                $currentStatus = $product->stock <= 0 ? 'out_of_stock' : $product->status;
                            @endphp
                            <span class="px-3 py-1 rounded-full border {{ $statusStyles[$currentStatus] }} text-[10px] font-bold uppercase tracking-wider">
                                {{ str_replace('_', ' ', $currentStatus) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="w-8 h-8 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition-all shadow-sm">
                                    <i class="fas fa-edit text-xs"></i>
                                </a>
                                <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}" onsubmit="return confirm('O‘chirilsinmi?');" class="inline">
                                    @csrf @method('DELETE')
                                    <button class="w-8 h-8 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center hover:bg-rose-600 hover:text-white transition-all shadow-sm">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-6 flex justify-center">
        {{ $products->withQueryString()->links() }}
    </div>
</div>

<!-- Add Product Modal: Glassmorphism Design -->
<div id="addModal" class="fixed inset-0 bg-slate-900/40 backdrop-blur-sm z-[100] hidden items-center justify-center p-4 transition-all duration-300">
    <div class="bg-white rounded-[2.5rem] w-full max-w-5xl shadow-2xl overflow-hidden flex flex-col max-h-[90vh]">

        <!-- Modal Header -->
        <div class="px-8 py-6 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
            <div>
                <h3 class="text-xl font-extrabold text-slate-800">Yangi mahsulot qo'shish</h3>
                <p class="text-xs text-slate-400 font-medium">Katalogingizga yangi element qo'shing</p>
            </div>
            <button id="closeAddModal" class="w-10 h-10 rounded-2xl bg-white border border-slate-200 text-slate-400 hover:text-rose-500 hover:border-rose-100 transition-all flex items-center justify-center">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Modal Body -->
        <form id="addProductForm" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="flex-1 overflow-y-auto">
            @csrf
            <div class="p-8 grid grid-cols-1 lg:grid-cols-12 gap-8">

                <!-- Left Column: Info -->
                <div class="lg:col-span-7 space-y-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Mahsulot nomi</label>
                        <input name="name" required placeholder="Masalan: Dior Sauvage Eau de Parfum"
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 transition-all font-medium">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Tavsif (Qisqacha)</label>
                        <textarea name="description" rows="3" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none focus:ring-4 focus:ring-pink-500/10 focus:border-pink-500 transition-all text-sm"></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">SKU</label>
                            <input name="sku" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none text-sm">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-2">Kategoriya</label>
                            <select name="category" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:outline-none text-sm">
                                <option value="">Tanlang...</option>
                                @foreach($categories as $cat) <option value="{{ $cat }}">{{ $cat }}</option> @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="bg-pink-50/30 p-6 rounded-[2rem] border border-pink-100/50 space-y-4">
                        <h4 class="text-sm font-bold text-pink-600 flex items-center gap-2">
                            <i class="fas fa-tag"></i> Narx va Chegirmalar
                        </h4>
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label class="block text-[10px] font-bold text-pink-400 uppercase mb-1">Asosiy Narx</label>
                                <input name="price" type="number" id="priceInput" class="w-full px-3 py-2.5 bg-white border border-pink-100 rounded-xl focus:outline-none focus:border-pink-400 font-bold">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-pink-400 uppercase mb-1">Chegirma (%)</label>
                                <input name="discount_percentage" type="number" id="discountInput" class="w-full px-3 py-2.5 bg-white border border-pink-100 rounded-xl focus:outline-none focus:border-pink-400 font-bold">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-pink-400 uppercase mb-1">Yakuniy Narx</label>
                                <input name="final_price" id="finalPriceInput" readonly class="w-full px-3 py-2.5 bg-pink-100/50 border border-transparent rounded-xl font-extrabold text-pink-700">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Media & Telegram -->
                <div class="lg:col-span-5 space-y-6">
                    <div>
                        <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest mb-3">Mahsulot Rasmi</label>
                        <div class="relative group cursor-pointer">
                            <input type="file" id="mainImageInput" name="main_image" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer z-10">
                            <div id="mainImagePreview" class="w-full h-56 bg-slate-50 border-2 border-dashed border-slate-200 rounded-[2rem] flex flex-col items-center justify-center transition-all group-hover:border-pink-300 group-hover:bg-pink-50/30 overflow-hidden">
                                <i class="fas fa-cloud-upload-alt text-3xl text-slate-300 group-hover:text-pink-400 mb-2"></i>
                                <span class="text-xs font-bold text-slate-400 group-hover:text-pink-500 uppercase tracking-tighter">Rasm yuklash</span>
                            </div>
                        </div>
                    </div>

                    <!-- Telegram Auto-Publish -->
                    <div class="bg-[#229ED9]/5 border border-[#229ED9]/20 p-6 rounded-[2rem] space-y-4">
                        <div class="flex items-center justify-between">
                            <label class="text-sm font-bold text-[#229ED9] flex items-center gap-2">
                                <i class="fab fa-telegram text-lg"></i> Telegram Preview
                            </label>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="telegramPublish" name="telegram_publish" class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#229ED9]"></div>
                            </label>
                        </div>

                        <div id="telegramPreview" class="bg-white rounded-2xl p-4 shadow-sm border border-slate-100 hidden opacity-0 transition-all duration-300 scale-95">
                            <div class="w-full h-32 bg-slate-100 rounded-xl mb-3 flex items-center justify-center overflow-hidden" id="tgPreviewImage">
                                <i class="fas fa-image text-slate-300 text-2xl"></i>
                            </div>
                            <div class="space-y-1">
                                <div class="font-bold text-[13px] text-slate-800" id="tgPreviewName">Mahsulot nomi</div>
                                <div class="text-sm font-extrabold text-[#229ED9]" id="tgPreviewPrice">$0.00</div>
                                <div class="text-[10px] text-slate-400 italic">@AuraWomenuzBot orqali xarid qiling</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Footer -->
            <div class="px-8 py-6 border-t border-slate-100 bg-slate-50/50 flex justify-end gap-3">
                <button type="button" id="cancelAddBtn" class="px-8 py-2.5 rounded-2xl border border-slate-200 text-slate-600 font-bold text-sm hover:bg-white transition-all">Bekor qilish</button>
                <button type="submit" class="px-8 py-2.5 rounded-2xl bg-slate-900 text-white font-bold text-sm hover:shadow-lg transition-all active:scale-95">Saqlash</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const openAdd = document.getElementById('openAddModal');
    const addModal = document.getElementById('addModal');
    const closeAdd = document.getElementById('closeAddModal');
    const cancelAdd = document.getElementById('cancelAddBtn');

    function openModal() {
        if (!addModal) return;
        addModal.classList.remove('hidden');
        addModal.classList.add('flex');
    }

    function closeModal() {
        if (!addModal) return;
        addModal.classList.add('hidden');
        addModal.classList.remove('flex');
    }

    openAdd?.addEventListener('click', function (e) {
        e.preventDefault();
        openModal();
    });

    closeAdd?.addEventListener('click', closeModal);
    cancelAdd?.addEventListener('click', closeModal);

    addModal?.addEventListener('click', function (e) {
        if (e.target === addModal) {
            closeModal();
        }
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });

    const mainImageInput = document.getElementById('mainImageInput');
    const mainImagePreview = document.getElementById('mainImagePreview');
    const tgPreviewImage = document.getElementById('tgPreviewImage');
    const tgPreviewName = document.getElementById('tgPreviewName');
    const tgPreviewPrice = document.getElementById('tgPreviewPrice');
    const nameInput = document.querySelector('input[name="name"]');

    mainImageInput?.addEventListener('change', function (e) {
        const file = e.target.files?.[0];
        if (!file) return;

        const url = URL.createObjectURL(file);
        if (mainImagePreview) {
            mainImagePreview.innerHTML = '<img src="' + url + '" class="w-full h-full object-cover" alt="Preview">';
        }
        if (tgPreviewImage) {
            tgPreviewImage.innerHTML = '<img src="' + url + '" class="w-full h-full object-cover" alt="Telegram preview">';
        }
    });

    nameInput?.addEventListener('input', function () {
        if (tgPreviewName) {
            tgPreviewName.textContent = nameInput.value || 'Mahsulot nomi';
        }
    });

    const priceInput = document.getElementById('priceInput');
    const discountInput = document.getElementById('discountInput');
    const finalInput = document.getElementById('finalPriceInput');

    function recalcFinalPrice() {
        const price = parseFloat(priceInput?.value || 0);
        const discount = parseFloat(discountInput?.value || 0);
        let final = price;

        if (discount > 0) {
            final = +(price * (1 - discount / 100)).toFixed(2);
        }

        if (finalInput) {
            finalInput.value = final.toFixed(2);
        }

        if (tgPreviewPrice) {
            tgPreviewPrice.textContent = '$' + final.toFixed(2);
        }
    }

    priceInput?.addEventListener('input', recalcFinalPrice);
    discountInput?.addEventListener('input', recalcFinalPrice);

    const tgCheckbox = document.getElementById('telegramPublish');
    const tgPreview = document.getElementById('telegramPreview');
    tgCheckbox?.addEventListener('change', function (e) {
        if (!tgPreview) return;

        if (e.target.checked) {
            tgPreview.classList.remove('hidden', 'opacity-0', 'scale-95');
        } else {
            tgPreview.classList.add('opacity-0', 'scale-95');
            setTimeout(function () {
                if (!tgCheckbox.checked) {
                    tgPreview.classList.add('hidden');
                }
            }, 250);
        }
    });

    const sortSelect = document.getElementById('sortSelect');
    const filterForm = document.getElementById('filterForm');
    sortSelect?.addEventListener('change', function () {
        filterForm?.submit();
    });
});
</script>
@endpush
