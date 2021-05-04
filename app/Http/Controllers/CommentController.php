<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommentProduct;
use Session;
class CommentController extends Controller
{
    //
    public function getList()
    {
    	$comments = CommentProduct::paginate(10);
    	return view('admin.comment.list',['comments'=>$comments]);
    }

    public function getDelete($id)
    {
    	CommentProduct::where('ID',$id)->delete();
    	return redirect('admin/Comment/list')->with('thongbao','Xoá thành công');
    }

    public function postComment(Request $request,$id)
    {
    	$this->validate($request,
    		['Comment' => 'required|min:3'],
    		[
    			'Comment.required' => 'Bạn chưa nhập bình luận',
                'Comment.min'=> 'Bình luận ít nhất 3 ký tự'
    		]);
    	$user = Session::get('customer');
    	$comment = new CommentProduct;
    	$comment->ProductID = $id;
    	$comment->UserID = $user->ID;
		$comment->Comment = $request->Comment;
    	$comment->save();
        echo $comment;
    	return redirect()->back();
    	
    }
}
