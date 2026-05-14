<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Search
        if ($request->filled('q')) {
            $q = $request->input('q');
            $query->where(function($qbuilder) use ($q) {
                $qbuilder->where('name', 'like', "%{$q}%")
                    ->orWhere('description', 'like', "%{$q}%")
                    ->orWhere('sku', 'like', "%{$q}%");
            });
        }

        // Category filter
        if ($request->filled('category')) {
            $query->where('category', $request->input('category'));
        }

        // Sort
        $sort = $request->input('sort', 'latest');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('final_price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('final_price', 'desc');
                break;
            case 'popularity':
                $query->orderBy('sold_count', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        // Pagination
        $products = $query->paginate(15)->withQueryString();

        // Categories for filter and add dropdown: prefer managed categories, but include any product categories
        $managed = Category::orderBy('name')->pluck('name');
        $fromProducts = Product::select('category')->distinct()->whereNotNull('category')->pluck('category');
        $categories = $managed->merge($fromProducts)->unique()->filter()->sort()->values();

        return view('admin.products', compact('products','categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'stock' => 'nullable|integer',
            'category' => 'nullable|string',
            'sku' => 'nullable|string',
            'brand' => 'nullable|string',
            'size' => 'nullable|string',
            'gender' => 'nullable|string',
            'discount_percentage' => 'nullable|integer',
            'sale_start' => 'nullable|date',
            'sale_end' => 'nullable|date',
            'main_image' => 'nullable|image|max:4096',
        ]);

        if($request->hasFile('main_image')){
            $path = $request->file('main_image')->store('products','public');
            $data['image'] = $path;
        }

        $data['slug'] = Str::slug($data['name']) . '-' . rand(100,999);
        $data['final_price'] = isset($data['discount_percentage']) && $data['discount_percentage'] > 0 ? round($data['price'] * (1 - $data['discount_percentage']/100),2) : ($data['sale_price'] ?? $data['price']);

        $product = Product::create($data);

        return redirect()->route('admin.products.index')->with('success','Product created');
    }

    public function edit(Product $product)
    {
        return view('admin.product-edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'stock' => 'nullable|integer',
            'category' => 'nullable|string',
            'sku' => 'nullable|string',
            'brand' => 'nullable|string',
            'size' => 'nullable|string',
            'gender' => 'nullable|string',
            'discount_percentage' => 'nullable|integer',
            'sale_start' => 'nullable|date',
            'sale_end' => 'nullable|date',
            'main_image' => 'nullable|image|max:4096',
        ]);

        if($request->hasFile('main_image')){
            if($product->image) { try { Storage::disk('public')->delete($product->image); } catch (\Exception $e) {} }
            $path = $request->file('main_image')->store('products','public');
            $data['image'] = $path;
        }

        $data['final_price'] = isset($data['discount_percentage']) && $data['discount_percentage'] > 0 ? round($data['price'] * (1 - $data['discount_percentage']/100),2) : ($data['sale_price'] ?? $data['price']);

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success','Product updated');
    }

    public function destroy(Product $product)
    {
        try { if($product->image) Storage::disk('public')->delete($product->image); } catch (\Exception $e) {}
        $product->delete();
        return redirect()->route('admin.products.index')->with('success','Product deleted');
    }

    public function duplicate(Product $product)
    {
        $new = $product->replicate();
        $new->name = $product->name . ' (Copy)';
        $new->slug = Str::slug($new->name) . '-' . rand(100,999);
        $new->push();
        return redirect()->route('admin.products.index')->with('success','Product duplicated');
    }
}
