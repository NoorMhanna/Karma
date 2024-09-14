<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    //
    public function index($id){
        $order= Order::findOrFail($id);
        return view('front.checkout',compact('order'));
    }
}
