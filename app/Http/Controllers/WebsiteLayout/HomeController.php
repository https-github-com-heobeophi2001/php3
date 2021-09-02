<?php

namespace App\Http\Controllers\WebsiteLayout;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class HomeController extends Controller
{
    public function index(){
        $hotProducts = Product::orderBy('id', 'desc')->take(8)->get();
        $hotProducts->load('category');
        return view('welcome', compact('hotProducts'));
    }
    public function shop(Request $request){
        $category = Category::all();
        $products = Product::latest()->paginate(6);

        $productQuery = Product::where('price','like',"%".$request->keyword."%");

        if($request->has('price') && $request->price>0){
            if($request->price == 1){
                $productQuery = $productQuery->orderBy('price');
            }else{
                $productQuery = $productQuery->orderByDesc('price');
            }
        }
        return view('webshop.shop', compact('products', 'category'));
    }
   

    public function checkout()
    {
        return view('checkout');
    }

    public function category($id){
        $category = Category::all();
        $products = Product::where('category_id', $id)->latest()->paginate(9);
        $category->load('products');
        return view('webshop.shop', compact('category', 'products'));
    }
}
