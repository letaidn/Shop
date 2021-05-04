<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Session;

class LoginController extends Controller
{
    //
    public function login(Request $request){
    	$this->validate($request,
            [
                'Email' => 'required',
                'Password' =>'required|min:4|max:32',
            ],
            [
                'Email.required' => 'Bạn chưa nhập email',
                'Password.required' =>'Bạn chưa nhập mật khẩu',
                'Password.min' =>'Mật khẩu phải ít nhất 4 kí tự',
                'Password.max' =>'Mật khẩu phải tối đa 32 kí tự'
            ]);
        $user = User::select('ID','FirstName','LastName','Address','email','Phone','RoleID')->where('email',$request->Email)->where('password',md5($request->Password))->first();
        if($user->RoleID != 1 ){
            Session::put('customer',$user);
            return redirect('home');
        }else{
            return redirect('login')->with('thongbao','Đăng nhập thất bại. Mời bạn nhập lại');
        }
    }

    public function logout(){
        Session::forget('customer');
        return redirect('home');
    }

    public function Register(Request $request){
    	$this->validate($request,
            [
                'Password' =>'required|min:4|max:32',
                'Email' => 'required|email|unique:users,Email',
                'ConfirmPassword' => 'required|same:Password',
                'LastName' => 'required',
                'FirstName' => 'required'
            ],
            [
                'Name.unique' => 'Tên tài khoản đã có',
                'Name.min' => 'Tên tài khoản phải ít nhất 3 ký tự',
                'Password.required' =>'Bạn chưa nhập mật khẩu',
                'Password.min' =>'Mật khẩu phải ít nhất 4 kí tự',
                'Password.max' =>'Mật khẩu phải tối đa 32 kí tự',
                'Email.required' => 'Bạn chưa nhập email' ,
                'Email.email' => 'Bạn nhập chưa đúng định dạng email' ,
                'Email.unique' => 'Tên email đã có',
                'ConfirmPassword.required' => 'Bạn chưa nhập xác nhận mật khẩu',
                'ConfirmPassword.same' =>'Mật khẩu xác nhận không trùng khớp',
                'LastName.required' => 'Bạn chưa nhập tên' ,
                'FirstName.required' => 'Bạn chưa nhập họ' ,
            ]);
        $user = new User;
        $user->Email = $request->Email;
        $user->Password = md5($request->Password);
        $user->RoleID = Role::where('Name','Khách hàng')->first()->ID;
        $user->LastName = $request->LastName;
        $user->FirstName = $request->FirstName;
        $user->save();
        return redirect('login')->with('thongbao','Thêm thành công');
    }
}
