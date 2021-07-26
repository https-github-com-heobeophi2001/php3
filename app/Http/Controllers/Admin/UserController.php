<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Http\Requests\Admin\User\UserRequests;

class UserController extends Controller
{
    public function index(){
    // Lấy ra toàn bộ các bản ghi trong bảng users
    //$listUser = DB::table('users')->get();
    $listUser = User::latest()->paginate(10);;

    $listUser->load(['invoice']);
    //$user = $listUser->first();
    //dd($user->invoices()->count());
    return view('admin/users/index', [
        'data' => $listUser,
    ]);
    }
    public function show(User $user){
        $user = User::find($id);
        return view('admin/users/show',[
            'user' => $user,
        ]);
    }
    public function create(){
        return view('admin/users/create');
    }
    public function store(UserRequests $request){
        
    //lấy toàn bộ dữ liệu gửi lên
    $data = $request->except('_token');
        $result = User::create($data);
        return redirect()->route('admin.users.index', compact('result'));
    }
    public function edit(Request $request,$id){
        $data = DB::table('users')->find($id);
        $data = User::find($id);
        
        return view('admin/users/edit', [
            'data' => $data,
        ]);
    }
    public function update(Request $request,$id){
        // nhận dữ liệu gửi lên & lưu vào db
    $data = request()->except('_token');
    $user = User::find($id);
    $user->update($data);
    //$user->name = $data['name'];
    //$user->name = $data['email'];
    //$user->name = $data['password'];
    //$user->name = $data['gender'];
    //$user->name = $data['address'];

    //$user->save();


    return redirect()->route('admin.users.index');
    }
    public function delete(User $user){
    $user = User::find($id);
    $user->delete();

    return redirect()->route('admin.users.index');
    }
}
