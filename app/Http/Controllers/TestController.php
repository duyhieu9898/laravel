<?php

namespace App\Http\Controllers;

use App\testModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestController extends Controller {
	//
	public function index($name = 'world') {
		echo '<br />Test controller ';
		echo '<br />hello $name';
	}
	public function header() {
		return redirect()->route('my-route');
	}
	public function postForm(Request $request) {
		echo $request->name;
		echo '<br>';
		echo $request->path();
		echo '<br>';
		echo $request->URL();
		echo '<br>';
		if (!$request->has('age')) {
			echo 'khong co age';
		}

	}
	public function setCookie() {
		$response = new Response;
		$response->withCookie(
			'name',
			'value cookie',
			1//time unit minutes
		);
		return $response;
	}
	public function getCookie(Request $request) {
		return $request->cookie('name');
	}
	//SESSION
	public function setSession(Request $request) {
		$request->session()->put('key3', 'value3');
	}
	public function getSession(Request $request) {
		if ($request->session()->has('key3')) {
			return $value = session('key3');
		}
	}
	public function getAndDel(Request $request) {
		return $value = $request->session()->pull('key', 'default');
	}
	public function Delete(Request $request) {
		return $request->session()->forget('key');
	}
	public function Deletes(Request $request) {
		return $request->session()->flush();
	}
	//file upload
	public function postFile(Request $request) {
		if ($request->hasFile('file')) {
			//lưu file
			$request->file('file')->move(
				'images', //folder
				'save.jpg' //name file
			);
		} else {
			echo 'file not exits';
		}
	}
	//json
	public function setJson(Request $request) {
		return response()
			->json(['name' => 'hieu', 'class' => 'cntt4'])
			->withCallback($request->input('callback'));
	}
	public function blade($name) {
		return view('pages.home', compact('name'));
	}
	/*----------------CALL MODEL----------------------*/
/**
 * [modelSanPham get table SanPham ]
 * @return [type] [array json]
 */
	public function modelSanPham() {
		//https://toidicode.com/eloquent-orm-trong-laravel-13.html
		return testModel::all();
	}
	public function jsonModelSanPham() {
		return testModel::all()->tojson();
	}
	public function withQueryBuidler() {
		return testModel::where('id', 1)->get();
	}
	// Link
	/*public function nameLink() {
			return $this->hasMany(‘TenModel’, ‘KhoaPhu’, ‘KhoaChinh’);
		}*/
	// use
	/*nameModel::nameLink()*/
/**
 * [middlewareForm midleware-point and vadidate data with vadidate]
 * @param  Request $request [description]
 * @return [bool]           [description]
 *
 */
	public function middlewareForm(Request $request) {
		echo 'complete';
		/**
		 * $this->validate($request,$pattern,$messenger,$customName);
		 * $request: Là biến tham chiếu đối tượng Request mà các bạn khai báo ở đầu hàm.
		 * $pattern: Là mảng định nghĩa dữ liệu đầu vào của các trường trong form.
		 * $messenger: Là mảng chứa nội dung báo lỗi (Nếu muốn thay đổi).
		 * $customName: Là mảng chứa các tên cho các trường trong form.
		 */
		$this->validate($request,
			[
				'point' => 'required|min:6|integer',
				'name' => 'required|min:5|max:255',
			],

			[
				'required' => ':attribute Không được để trống',
				'min' => ':attribute Không được nhỏ hơn :min',
				'max' => ':attribute Không được lớn hơn :max',
				'integer' => ':attribute Chỉ được nhập số',
			],

			[
				'point' => 'điểm',
				'name' => 'tên',
			]
		);

	}
	//AUTH
	public function testAuth(Request $request) {
		if ($request->has('name') && $request->input('name') != '') {
			echo 'ten ' . $request->input('name');
		} else {
			return redirect()->route('login-auth')->withErrors(['error' => 'login again']);
		}
	}

}