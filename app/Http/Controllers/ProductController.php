<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products = [
        ['id' => 1, 'name' => 'Product A', 'price' => 100],
        ['id' => 2, 'name' => 'Product B', 'price' => 150],
        ['id' => 3, 'name' => 'Product C', 'price' => 200],
    ];

    public function index()
    {
        return view('products', ['products' => $this->products]);
    }
}
