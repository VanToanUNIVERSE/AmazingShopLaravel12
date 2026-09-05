<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use DB;



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
    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        return back()->with('success', 'Đã thêm danh mục mới.');
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
    public function update(CategoryRequest $request, Category $category)
    {
        DB::transaction(function () use ($request, $category) {
            $category->update([
                'name' => $request->validated('name'),
                'active' => $request->validated('active')
            ]);
            $subcategoriesData = $request->validated('subcategories', []);
            foreach ($subcategoriesData as $id => $subcategoryData) {
                $category->subcategories()->where('id', $id)->update([
                    'name' => $subcategoryData['name'],
                    'active' => $subcategoryData['active'],
                ]);
            }
        });

        return back()->with('success', 'Đã cập nhật danh mục.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {

        if ($category->subcategories()->exists()) {
            return back()->withErrors(['general' => 'Không thể xóa danh mục này vì nó có danh mục con.']);
        }
        $category->delete();
        return back()->with('success', 'Đã xóa danh mục.');
    }
}
