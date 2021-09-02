<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function getLoginForm() {
        return view('auth/login');
    }

    public function login(LoginRequest $request) {
        $data = $request->only([
            'email',
            'password',
        ]);

        /*
         * Auth::attempt(['email', 'password'])
         * return false nếu login thất bại
         * return true nếu login thành công
         */
        $result = Auth::attempt($data);

        if ($result === false) {
            session()->flash('error', 'Sai email hoặc mật khẩu');

            return back();
        }

        $user = Auth::user();

        return redirect()->route('admin.users.index');
    }

    public function logout(Request $request) {
        Auth::logout();

        return redirect()->route('auth.getLoginForm');
    }
}