<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        $products = product::where('status', 1)->get();
        return view('front.index',compact('products'));
    }

    public function category(Request $request)
    {
        $queryParams = $request->query();
        $categories = Category::with('childrens')->whereNull('parent_id')->where('status', 1)->get();

        $products = product::query();

        if (isset($queryParams['category'])) {
            $products = product::where('category_id', $queryParams['category']);
        }

        // $products = product::where('status', true)->paginate (isset($queryParams['select']) ? $queryParams['select'] : 4 );
        $products = product::where('status', true)->get();

        return view('front.category', compact('categories', 'products'));
    }

    public function signin()
    {
        return view('front.auth.signin');
    }

    public function signup()
    {
        return view('front.auth.signup');
    }

    public function products($id)
    {
        $product = product::findOrFail($id);
        return view('front.single_product',compact('product'));
    }
}
