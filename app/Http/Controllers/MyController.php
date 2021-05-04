<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;

use Illuminate\Http\UploadedFile;

use App\Http\Controllers\Controller;

class MyController extends Controller
{
    public function Khoahoc()
    {
    	echo "xin chap cao ca=ban";
    	return redirect()->route('myroute');
    }
    public function GetUrl(Request $request)
    {
    	//return $request->path();
    	if($request->isMethod('post'))
    		echo "post";
    	else
    		echo "get";
    	if($request->is('My*'))
    		echo "yes";
    	else
    		echo "No";
    }
    public function postForm(Request $request)
    {
    	echo "ten ban la ";
    	echo $request->Hoten;
    }

    public function setCookie()
    {
    	$reponse = new Response();
    	$reponse->withCookie('user','laravel',0.1);
    	echo "da set cookie";
    	return $reponse;
    }
    public function getCookie(Request $request)
    {
    	echo "Cookie cua ban la: ";
    	return $request->cookie('user');
    }
    public function postFile(Request $request){
    	if($request->hasFile('myFile')){
    		$file = $request->file('myFile');
    		$file->move('img','myfile.png');
    	}
    	else
    		echo "chua co file";
    }
    public function formRegister()
    {
    	return view('Register');
    }
}
