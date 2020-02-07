<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\CategoryProduct;

class PagesController extends Controller
{
    //
    public function index()
    {
        $products = Product::where('featured', true)->get();
        $categories = Category::orderBy('id', 'desc')->get();
        $cats = Category::orderByRaw('RAND()')->take(5)->get();
        // $sales = CategoryProduct::where('product_id', 1)->get();

        return view('pages.index', 

        
        ['products' => $products,
         'categories' => $categories,
         'cats' => $cats,
        //  'sales', $sales,
        
        ]
    );
    }
}
