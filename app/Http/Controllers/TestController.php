<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\testModel;
class TestController extends Controller
{
    //
    public function index($name="world"){
    	echo "<br />Test controller ";
    	echo "<br />hello $name";
    }
    public function header()
    {
    	return redirect()->route('my-route');
    }
    public function postForm(Request $request)
    {
    	echo $request->name;
    	echo "<br>";
    	echo $request->path();
    	echo "<br>";
    	echo $request->URL();
    	echo "<br>";
    	if(!$request->has('age'))
    		echo 'khong co age';

    }
    public function setCookie(){
    	$response=new Response;
    	$response->withCookie(
    		'name',
    		'value cookie',
    		1//time unit minutes
    	);
    	return $response;
    }
    public function getCookie(Request $request)
    {
    	return $request->cookie('name'); 
    }
    //session
    public function setSession(Request $request){
    	$request->session()->put('key3','value3');
    }
    public function getSession(Request $request){
    	if ($request->session()->has('key3')) {
    		return $value = session('key3');
		}
    }
    public function getAndDel(Request $request)
    {
    	return $value = $request->session()->pull('key', 'default');
    }
    public function Delete(Request $request){
    	return $request->session()->forget('key');
    }
    public function Deletes(Request $request)
    {
		return $request->session()->flush();
    }
    //file upload
    public function postFile(Request $request)
    {
    	if($request->hasFile('file')){
    	//lưu file
    		$request->file('file')->move(
    			'images',//folder
    			'save.jpg'//name file
    		);
    	}
    	else {
    		echo 'file not exits';
    	}
    }
    //joson
    public function setJson(Request $request){
    	return response()
    	->json(['name'=>"hieu","class"=>"cntt4"])
    	->withCallback($request->input('callback'));
    }
    public function blade($name){
    	return view('pages.home',compact('name'));
    }
  /*CALL MODEL*/

  public function modelSanPham()
  {
  	//https://toidicode.com/eloquent-orm-trong-laravel-13.html
  	return testModel::all();
  }
 
}
