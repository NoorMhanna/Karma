<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    //

    public function index()
    {
        $products = product::with('category')->get();// eager lodaing , get all date then send (more performans)
        return view('dashboard.products.index',compact('products'));
    }

    public function create()
    {
        // $parents = Category::whereNull('parent_id')->get();
        $categories = Category::whereNull('parent_id')->where('status', 1)->get();
        if ($categories->count() == 0) {
            return redirect()->route('dashboard.categies.create')->with('error', 'No categories found, please create category to continue!');
        }

        return view('dashboard.products.create', compact('categories'));
    }


    public function store(ProductRequest $request)
    {

        $data = $request->except('image');
        $path = $request->file('image')->store('products');
        $data['image'] = $path;
        product::create($data);
        return redirect()->route('dashboard.products.index')->with('success', 'Product created successfully');
    }


    public function destroy(string $id)
    {
        //
        $product = product::findOrFail($id);
        Storage::delete($product->image);
        $product->delete();
        return redirect()->back()->with('success', 'product deleted successfully');
    }

    public function edit(string $id)
    {
        $product = product::findOrFail($id);
        // dd($product);
        $categories = Category::whereNull('parent_id')->where('status', 1)->get();
        return view('dashboard.products.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, string $id)
    {
        //
        $data = $request->except(['image']);
        $product = product::findOrFail($id);
        $oldImage=$product->image;

        if($request->hasFile('image')){
            $path = $request-> file('image')->store('products');
            Storage::delete($product->image);
        }

        $product['image']= $path ?? $oldImage;
        $product->update($data);

        return redirect()->route('dashboard.products.index')->with('success', 'Product Updated successfully');
    }
}



