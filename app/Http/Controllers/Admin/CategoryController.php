<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Category\CategoryRequest;
class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $listCate = Category::latest()->paginate(10);
        if ($request->has('keyword') == true) { 
            $keyword = $request->get('keyword');
            $listCate = Category::where('name', 'LIKE', "%$keyword%")->paginate(10);
        } else {
            $listCate = Category::latest()->paginate(10);
        }
        $listCate->load(['products']);
        return view('admin/categories/index', [
            'data' => $listCate
        ]);
    }


    public function create()
    {
        return view('admin/categories/add');
    }

    public function store(CategoryRequest $request)
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