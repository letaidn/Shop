<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Size;


class CategoryController extends Controller
{
    //
    public function getList()
    {
    	$category = Category::simplePaginate(5);
    	return view('admin.Category.list',['category'=>$category]);
    }

    public function getAdd()
    {
    	return view('admin.Category.add');
    }

    public function postAdd(Request $request)
    {
    	$this->validate($request,
    		['Name' => 'required|min:3|unique:categories,Name'],
    		[
    			'Name.required' => 'Bạn chưa nhập tên thể loại',
    			'Name.unique' => 'Tên thể loại đã có',
    			'Name.min' => 'Tên thể loại phải nhiều hơn 3 ký tự'
    		]);
    	$category = new Category;
		$category->Name = $request->Name;
    	$category->save();
    	return redirect('admin/Category/add')->with('thongbao','Thêm thành công');
    	
    }
    public function getUpdate($id)
    {
    	$category = Category::find($id);
    	return view('admin.Category.update',['category' => $category]);
    }

    public function postUpdate(Request $request,$id)
    {
    	$this->validate($request,
    		['Name' => 'required|min:3|unique:categories,Name'],
    		[
    			'Name.required' => 'Bạn chưa nhập tên thể loại',
    			'Name.unique' => 'Tên thể loại đã có',
    			'Name.min' => 'Tên thể loại phải nhiều hơn 3 ký tự'
    		]);
    	Category::where('ID',$id)->update(['Name' => $request->Name]);
    	return redirect('admin/Category/update/'.$id)->with('thongbao','Sửa thành công');
    	
    }
    public function getDelete($id)
    {
    	Category::where('ID',$id)->delete();
    	return redirect('admin/Category/list')->with('thongbao','Xoá thành công');
    } 

}
