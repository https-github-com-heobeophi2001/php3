<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $listProduct = Product::latest()->paginate(10);
        $listProduct->load(['category']);
        // dd($listProduct);
        return view('admin/products/index', [
            'data' => $listProduct,
        ]);
    }
    public function show($id)
    {
    }
    public function create()
    {
        $lstCate = Category::all();
        return view('admin.products.add', ['lstCate' => $lstCate]);
    }
    public function store(Request $request)
    {
        $products = new Product;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('upload'), $filename);
            $products->image = $filename;
        }
        $product =  Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'image' => $filename
        ]);
        return redirect()->route('admin.products.index');
    }
    public function edit($id)
    {
        $data = Product::find($id);
        $lstCate = Category::all();
        return view('admin.products.edit', ['data' => $data, 'lstCate' => $lstCate]);
    }
    public function update(Request $request ,$id)
    {
        $products = new Product;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move(public_path('upload'), $filename);
            $products->image = $filename;
        }
        Product::find($id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'image' => $filename
        ]);

        return redirect()->route('admin.products.index');
    }
    public function delete($id)
    {
        $pro = Product::find($id);
        $pro->delete();

        return redirect()->route('admin.products.index');
    }
}