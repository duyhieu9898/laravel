<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('hello/{name?}', function ($name = "computer") {
    echo "hello laravel <br />";
    echo "i am " . $name;
});
/*-------------------------middleware----------------------*/
/**
 * pram 'middleware'=>key: value
 */
route::get('Role', [

    'middleware' => 'Role: editor hihi',

    'uses' => 'TestController@index',

]);
/*-------------------------ROUTE----------------------*/
/*identification route*/
route::get('identification', ['as' => "my-route", function () {
    echo "identification route";
}]);
//call route throught indectification name
route::get('call-identification', function () {
    return redirect()->route('my-route');
});
//transmission param as arument
Route::get('user/{id}/profile', function ($id) {
})->name('profile');

// $url = route('profile', ['id' => 1]);
/*group*/
//domain/myGroup/user[1-2-3]
route::group(['prefix' => "myGroup"], function () {
    route::get('/', function () {
        echo "prefix group";
    });
    route::get('child4', function () {
        echo "This is element 1";
    });
    route::get('child2', function () {
        echo "This is element 2";
    });
    route::get('child3', function () {
        echo "This is element 3";
    });
});
/*---------------------CONTROLER------------------------*/
//send data with get
route::get("test-controller/{name?}", 'TestController@index');
//send data with post
route::get("get-form", function () {
    return view("post-request");
});
route::post('postForm', [
    'as' => 'postForm',
    'uses' => 'TestController@postForm',
]);
/*---------------------COOKIE--------------------------*/
//->cookie($name, $value, $minutes, $path, $domain, $secure, $httpOnly)
route::get('set-cookie', 'TestController@setCookie');
route::get('get-cookie', 'TestController@getCookie');
/*---------------------SESSION--------------------------*/
Route::get('home', function (Request $request) {
    // Store a piece of data in the session...
    session(['key' => 'value']);
    // Retrieve a piece of data from the session...
    echo $value = session('key');
});
route::get("set-session", 'TestController@setSession');
route::get("get-session", 'TestController@getSession');
/*---------------------UP LOADFILE-----------------------*/
route::get("get-file", function () {
    return view("postFile");
});
route::post('post-file', [
    'as' => 'post-file',
    'uses' => 'TestController@postFile',
]);
/*---------------------JSON------------------------------*/
route::get('set-json', 'TestController@setJson');
/*---------------------REDIRECT--------------------------*/
//url /here redirect to /there , 301 <=> riderect
Route::redirect('here', 'there', 301);
/*---------------------VIEW------------------------------*/
//route view
Route::view('welcome', 'postFile');

//share param to views
View::share('level', 1);
//transmission parameters to view
use Illuminate\Http\Request;

//param with array[]
route::get('paramArr/{name}', function ($name, Request $request) {
    if (view()->exists('paramToView')) {
        return view('paramToview', ['name' => $name, 'url' => $request->URL()]);
    }
});
//param width compact()
Route::get('paramCompact/{n}', function ($user) {
    return view('paramToview', compact('user'));
});
//param width width()
Route::get('paramWidth/{user}', function ($user) {
    return view('paramToview')->with('user', $user);
});
/*------------------BLADE TEMPLATES-----------------*/
route::get('/blade/{name?}', 'testController@blade');
//db
Route::get('/db', function () {
    $data = DB::table('group_user')->select('name')->where('id', 999)->get();
    echo '<pre>';
    print_r($data);
    echo '</pre>';
});
/*------------------SCHEMA-----------------*/
route::get('schema', function () {
    Schema::create('procducts', function ($table) {
        $table->increments('id')->unsigned();
        $table->string('name product', 50)->nullable();
        $table->integer('gia')->unsigned()->default(100)->nullable();
        $table->timestamps();
    });
});
/*------------------QUERY BUILDER ORM-----------------*/
//get all data
route::get('/getTable-sanpham', function () {
    $users = DB::table('sanpham')->get();
    $data = '';
    foreach ($users as $values) {
        foreach ($values as $key => $value) {
            $data .= $key . ':' . $value . '<br />';
        }
    }
    return $data; //array
});
//select
route::get('/getTable-sanpham/col', function () {
    $query = DB::table('sanpham')->select('id', 'ten san pham', 'id_san_pham')->get();
    $data = '';
    foreach ($query as $values) {
        foreach ($values as $key => $value) {
            $data .= $key . ':' . $value . '<br />';
        }
    }
    return $data;
});
//add select
route::get('/getTable-sanpham/col-addSelect', function () {
    $query = DB::table('sanpham')->select('ten san pham', 'id_san_pham');
    $user = $query->addSelect('id')->get();
    $data = '';
    foreach ($user as $values) {
        foreach ($values as $key => $value) {
            $data .= $key . ':' . $value . '<br />';
        }
    }
    return $data;
});
//where
route::get('/getTable-sanpham/col-where', function () {
    $query = DB::table('sanpham')->where('ten san pham', 'giay den')->where('id', '=', '1')->get();
    $data = '';
    foreach ($query as $values) {
        foreach ($values as $key => $value) {
            $data .= $key . ':' . $value . '<br />';
        }
    }
    return $data;
});
//update
route::get('/getTable-sanpham/col-update', function () {
    $query = DB::table('sanpham')->where('ten san pham', 'giay den')->update(['id_san_pham' => 'id sp']);
    $query = DB::table('sanpham')->where('ten san pham', 'giay den')->get();
    $data = '';
    foreach ($user as $values) {
        foreach ($values as $key => $value) {
            $data .= $key . ':' . $value . '<br />';
        }
    }
    return $data;
});
//count
route::get('/getTable-sanpham/count', function () {
    $query = DB::table('sanpham')->count();
    return $query;
});
//max
route::get('/getTable-sanpham/max', function () {
    $query = DB::table('sanpham')->max('id');
    return $query;
});
/*-------------------ELOQUEN_MODEL-----------------*/
route::get('model', 'TestController@modelSanPham');
route::get('json-model', 'TestController@jsonModelSanPham');
//make with query builder
route::get('model-queryBuilder', 'testController@withQueryBuidler');
//MIDDLEWARE and vadidate in controller
route::get("enter-point", function () {
    return view("form-point-middleware");
});
route::post('process-point',
    [
        'as' => 'process-point',
        'middleware' => 'test',
        'uses' => 'TestController@middlewareForm',
    ]
);

route::get('middleware/error', function () {
    echo "ponit <= 5";
})->name('error');
//MAKE VADIDATE
Route::get('login-vadidate', function () {
    return view('form-vadidate');
});
Route::get('vadidate-form', 'vadidate@index')->name('vadidate-form');
//next
Route::get("complete", function () {
    echo 'complete';
})->name("login-complete");
//AUTH
route::get("login-auth", function () {
    return view("form-login-auth");
})->name('login-auth');
route::get('vadidate-auth',
    [
        'as' => 'vadidate-auth',
        'uses' => 'TestController@testAuth',
    ]);
route::get('vuejs', function () {
    return view('vuejs.index');
});
Route::get('auth/facebook', 'Auth\LoginController@redirectToFacebook')->name('auth.facebook');
Route::get('auth/facebook/callback', 'Auth\LoginController@handleFacebookCallback');
Route::get('login', 'LoginController@getLogin');
Route::post('login', 'LoginController@postLogin')->name('login');
Route::post('logout', 'LoginController@postLogout')->name('logout');
//vue
Route::resource('products', 'ProductController');
Route::get('test/product', 'productController@index');

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin-home', function () {
    return view("home");
});
Route::resource('users', 'UserController');

//để lấy thông tin về user hiện tại đang login, mình lấy kèm theo danh sách quyền của user đó
Route::get('/getCurrentUser', function () {
    return Auth::user()->load('roles');
});
//chỉ cần bắt được request với method là get hoặc post thì mình sẽ đều cho user logout ra khỏi app
Route::match(['get', 'post'], '/logout', 'Auth\LoginController@logout')->name('logout');
