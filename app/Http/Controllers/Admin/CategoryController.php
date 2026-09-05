<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'active' => 'required|boolean',
        ]);

        Category::create([
            'name' => $request->name,
            'active' => $request->active,
        ]);
        return back()->with('success', 'Đã thêm danh mục mới.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'active' => 'required|boolean',
        ]);

        $category->update($request->only('name', 'active'));
        return back()->with('success', 'Đã cập nhật danh mục.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        
        if($category->subcategories()->exists()) {
            return back()->withErrors(['general' => 'Không thể xóa danh mục này vì nó có danh mục con.']);
        }
        $category->delete();
        return back()->with('success', 'Đã xóa danh mục.');
    }
}
