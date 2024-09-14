<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardConroller extends Controller
{
    //

    public function index() {
        $categories = Category::whereNull('parent_id')->with('childrens')->get();
        return view('dashboard.categories.index', compact('categories'));
    }


    public function product() {
        return view('dashboard.product');
    }
}
