<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Size;
use App\Models\ImageProduct;

class ProductController extends Controller
{
    //
    public function getList()
    {
        $product = Product::paginate(10);
        return view('admin.Product.list',['product'=>$product]);
    }
    public function getListImg($id)
    {
        $product = Product::find($id);
        $productImg = ImageProduct::where("ProductID",$id)->get();
        return view('admin.Product.listImg',['productImg'=>$productImg,'product'=>$product]);
    }
    public function postAddImg(Request $request,$id){
        $this->validate($request,
            [
                'Image' =>'required|max:1024'
            ],
            [
                'Image.required' => 'Bạn chưa chọn ảnh',
                'Image.max' => 'file ảnh không được quá 1024KB '
            ]);
            if($request->file('Image')->isValid()){
                $fileExtension = $request->file('Image')->getClientOriginalExtension();

                $fileName = time()."_".rand(0,9999999)."_".md5(rand(0,9999999)).".".$fileExtension;

                $uploadPath = public_path('upload/ProductImg');
                $request->file('Image')->move($uploadPath,$fileName);

                $imageProduct = new ImageProduct;
                $imageProduct->Name = $fileName;
                $imageProduct->ProductID = $id;
                $imageProduct->save();
                return redirect('admin/Product/listImg/'.$id)->with('thongbao','Thêm thành công');
            }else
            {
                return redirect('admin/Product/listImg/'.$id)->with('thongbao','Thêm thất bại');
            }
        
    }



    public function getAdd()
    {
        $category = Category::all();
        return view('admin.Product.add',['category'=>$category]);
    }
    public function getUpdate($id)
    {
        $category = Category::all();
        $product = Product::where('ID',$id)->first();
        return view('admin.Product.update',['category'=>$category,'product' => $product]);
    }

    public function postUpdate(Request $request,$id)
    {
        $this->validate($request,
            [
                'Name' => 'required|min:3',
                'Price' =>'required|min:4',
                'Stock' => 'required|min:1',
                'Description' => 'required'
            ],
            [
                'Name.unique' => 'Tên sản phẩm đã có',
                'Name.min' => 'Tên thể loại phải nhiều hơn 3 ký tự',
                'Price.required' =>'Bạn chưa nhập giá sản phẩm',
                'Price.min' =>'Giá sản phẩm phải lớn hơn 1000 đồng',
                'Description' => 'Bạn chưa nhập mô tả' 
            ]);
        Product::where('ID',$id)->update([
            'Name' => $request->Name,
            'Price' => $request->Price,
            'CategoryID' => $request->Category,
            'Discount' =>$request->Discount,
            'Stock' =>$request->Stock,
            'Description' => $request->Description
        ]);
        return redirect('admin/Product/list')->with('thongbao','Thêm thành công');
        
    }

    public function postAdd(Request $request)
    {
        $this->validate($request,
            [
                'Name' => 'required|min:3|unique:products,Name',
                'Price' =>'required|min:4',
                'Stock' => 'required|min:1',
                'Description' => 'required',
            ],
            [
                'Name.required' => 'Bạn chưa nhập tên sản phẩm',
                'Name.unique' => 'Tên sản phẩm đã có',
                'Name.min' => 'Tên thể loại phải nhiều hơn 3 ký tự',
                'Price.required' =>'Bạn chưa nhập giá sản phẩm',
                'Price.min' =>'Giá sản phẩm phải lớn hơn 1000 đồng',
                'Description' => 'Bạn chưa nhập mô tả' ,
            ]);
        $product = new Product;
        $product->Name = $request->Name;
        $product->Price = $request->Price;
        $product->CategoryID = $request->Category;
        $product->Discount = $request->Discount;
        $product->Stock = $request->Stock;
        $product->Description = $request->Description;
        $product->save();
        return redirect('admin/Product/add')->with('thongbao','Thêm thành công');
        
    }
    public function getDelete($id)
    {
        Product::where('ID',$id)->delete();
        return redirect()->back()->with('thongbao','Xoá thành công');    
    }
    public function getDeleteImg($id)
    {
        ImageProduct::where('ID',$id)->delete();
        return redirect()->back()->with('thongbao','Xoá thành công');	
    }
}
