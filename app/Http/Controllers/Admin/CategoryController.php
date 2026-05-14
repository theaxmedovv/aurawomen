<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('name')->get();
        // include product counts
        $categories = $categories->map(function($c){
            $c->products_count = Product::where('category', $c->name)->count();
            return $c;
        });
        return view('admin.categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string',
        ]);
        $data['slug'] = Str::slug($data['name']) . '-' . rand(10,99);
        Category::create($data);
        return redirect()->route('admin.categories.index')->with('success','Category created');
    }

    public function edit(Category $category)
    {
        return view('admin.category-edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,'.$category->id,
            'description' => 'nullable|string',
            'status' => 'nullable|string',
        ]);
        $data['slug'] = Str::slug($data['name']);
        $category->update($data);
        return redirect()->route('admin.categories.index')->with('success','Category updated');
    }

    public function destroy(Category $category)
    {
        // Optionally prevent deletion if products exist
        $count = Product::where('category', $category->name)->count();
        if($count > 0) {
            return redirect()->route('admin.categories.index')->with('error','Cannot delete category with products');
        }
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success','Category deleted');
    }
}
