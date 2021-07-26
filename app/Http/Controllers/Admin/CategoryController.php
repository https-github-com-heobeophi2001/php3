<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $listCate = Category::latest()->paginate(10);
        $listCate->load(['products']);
        return view('admin/categories/index', [
            'data' => $listCate
        ]);
    }


    public function create()
    {
        return view('admin/categories/add');
    }

    public function store()
    {
        $data = request()->except('_token');
        $response = Category::create($data);
        
        return redirect()->route('admin.categories.index');
    }


    public function show($id)
    {
    }


    public function edit($id)
    {
        $data = Category::find($id);
        return view('admin/categories/edit', ['data' => $data]);
    }


    public function update($id)
    {
        $data = request()->except('_token');
        $cate = Category::find($id);
        $cate->update($data);

        return redirect()->route('admin.categories.index');
    }


    public function delete($id)
    {
        $cate = Category::find($id);
        $cate->delete();
        return redirect()->route('admin.categories.index');
    }
}