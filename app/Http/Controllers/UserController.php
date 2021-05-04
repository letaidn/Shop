<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;
use App\Models\Role;
class UserController extends Controller
{
    //
    public function getList()
    {
        $user = User::paginate(10);

        return view('admin.User.list',['user'=>$user]);
    }
    public function getAdd()
    {
        return view('admin.User.add');
    }
    public function postAdd(Request $request)
    {
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
        $user->RoleID = $request->rdoStatus;
        $user->LastName = $request->LastName;
        $user->FirstName = $request->FirstName;
        $user->save();
        return redirect()->back()->with('thongbao','Thêm thành công');
    }
    public function getDelete($id)
    {
    	User::where('ID',$id)->delete();
        return redirect()->back()->with('thongbao','Xoá thành công'); 
    }

    public function getLoginAdmin()
    {
        return view('admin.login');
    }

    public function postLoginAdmin(Request $request)
    {
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
        $user = User::select('ID','FirstName','LastName','RoleID')->where('email',$request->Email)->where('password',md5($request->Password))->first();
        if($user){
            Session::put('admin',$user);
            return redirect('admin/Product/list');
        }else{
            return redirect()->back()->with('thongbao','Đăng nhập thất bại. Mời bạn nhập lại');
        }
    }

    public function updateInfo(Request $request)
    {
        $this->validate($request,
            [
                'FirstName' => 'required',
                'LastName' => 'required',
                'Phone'=>'required',
                'Address' =>'required'
            ])
            ;
        User::where('ID',$request->ID)->update([
            'LastName'=> $request->LastName,
            'FirstName'=> $request->FirstName,
            'Phone' => $request->Phone,
            'Address'=> $request->Address
        ]);

        $user = User::select('ID','FirstName','LastName','RoleID')->where('ID',$request->ID)->first();
        return redirect()->back()->with('thongbao','Cập nhật thông tin thành công');
    }

    public function logout(){
        Session::forget('admin');
        return redirect('admin/login');
    }
}

