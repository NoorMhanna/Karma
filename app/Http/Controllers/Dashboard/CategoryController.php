<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::whereNull('parent_id')->with('childrens')->get();
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $parents = Category::whereNull('parent_id')->get();
        return view('dashboard.categories.create', compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {


        // $request->validate([
        //     'name' => 'required',
        //     'status' => ['boolean', 'required'],
        //     'parent_id' => ['nullable', 'exists:categories,id'],
        // ]);

        $data = $request->except('_token');
        // dd($data);
        Category::create($data);
        return redirect()->route('dashboard.categies.index')->with('success', 'Category created successfully');
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
    public function edit(string $id)
    {
        //
        $category = Category::findOrFail($id);
        $parents = Category::whereNull('parent_id')->get();
        return view('dashboard.categories.edit', compact('parents', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->except('_token');
        // dd($request);
        $category = Category::findOrFail($id);
        $category->update($data);
        return redirect()->route('dashboard.categies.index')->with('success', 'Category Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category = Category::findOrFail($id);
        $childCount=$category->childrens->count();
        $productCount= $category->products->count();
        if ( $childCount> 0)
            return redirect()->back()->with('error', 'can not delete Category that have childs');

        if ( $productCount> 0)
            return redirect()->back()->with('error', "There is ($productCount) product related to this category,  can not delete it");


        // Category::destroy($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
