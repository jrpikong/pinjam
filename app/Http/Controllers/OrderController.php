<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order (Request $request)
    {
        return view('welcome');
    }
}
