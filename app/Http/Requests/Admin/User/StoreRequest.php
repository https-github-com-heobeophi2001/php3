<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:100',
            'address' => 'required',
        ];
    }

    public function messages() {
        return [
            'name.max' => 'Họ tên không quá 100 ký tự',
            'password.min' => 'Mật khẩu ít nhất 6 ký tự',
            'password.max' => 'Mật khẩu không quá 50 ký tự',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'role.in' => 'Tài khoản phải được chọn User hoặc Admin',
            'gender.in' => 'Giới tính phải được chọn Nam hoặc Nữ',
            'required' => ':attribute không được để trống',
        ];
    }

    public function attributes() {
        return [
            'name' => 'Họ tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'address' => 'Địa chỉ',
            'role' => 'Tài khoản',
            'gender' => 'Giới tính',
        ];
    }
}