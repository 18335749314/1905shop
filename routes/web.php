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

Route::get('/', function () {
    return view('welcome');

});
// Route::get('/hoell',function(){
//     echo 1111;
// });
Route::view('/hoell','hh');
// Route::post('/dofrom',function(){
//     $post = request()->post();
//     dd($post);
// });
// Route::get('/index','regcontroller@index');
// Route::get('/show/{id}',function($id){
//     echo $id;
// });

Route::get('/show/{id?}/{name?}',function($id='0',$username='隔壁老王'){
    echo $id;
    echo $username;
});

//    Route::view('brand','brand/brand');
//    //登录
//    Route::get('login/login','Admin\LoginController@create');
//    Route::post('login/store','Admin\LoginController@store');
//    Route::get('login/del','Admin\LoginController@del');
//    //品牌
//    Route::prefix('/brand')->group(function () {
//        Route::get('create','Admin\BrandController@create');
//        Route::post('store','Admin\BrandController@store');
//        Route::get('index','Admin\BrandController@index');
//        Route::get('delete/{id}','Admin\BrandController@destroy');
//        Route::get('edit/{id}','Admin\BrandController@edit');
//        Route::post('update/{id}','Admin\BrandController@update');
//    });
//    //管理员
//    Route::prefix('/admin')->middleware('CheckLogin')->group(function () {
//        Route::get('create/','Admin\AdminController@create');
//        Route::post('store','Admin\AdminController@store');
//        Route::get('index','Admin\AdminController@index');
//        Route::get('delete/{id}','Admin\AdminController@destroy');
//        Route::get('edit/{id}','Admin\AdminController@edit');
//        Route::post('update/{id}','Admin\AdminController@update');
//    });
//    //分类
//    Route::prefix('/category')->middleware('CheckLogin')->group(function () {
//        Route::get('create/','Admin\CategoryController@create');
//        Route::post('store','Admin\CategoryController@store');
//        Route::get('index','Admin\CategoryController@index');
//        Route::get('delete/{id}','Admin\CategoryController@destroy');
//        Route::get('edit/{id}','Admin\CategoryController@edit');
//        Route::post('update/{id}','Admin\CategoryController@update');
//    });
//    //商品
//    Route::prefix('/goods')->group(function () {
//        Route::get('create/','Admin\GoodsController@create');
//        Route::post('store','Admin\GoodsController@store');
//        Route::get('index','Admin\GoodsController@index');
//        Route::get('delete/{id}','Admin\GoodsController@destroy');
//        Route::get('edit/{id}','Admin\GoodsController@edit');
//        Route::post('update/{id}','Admin\GoodsController@update');
//    });
//
//    Route::get('class/index','Admin\ClassController@index');
//
//    Auth::routes();
//
//    Route::get('/home', 'HomeController@index')->name('home');
//
//    Route::any('pu/index','Admin\PuController@index');
//    Route::any('pu/stile','Admin\PuController@stile');
//    Route::any('pu/login','Admin\PuController@login');
//    Route::any('pu/ci','Admin\PuController@ci');
//
//    Route::any('new/index','Admin\NewController@index');
//
//    Route::prefix('/text')->middleware('CheckLogin')->group(function () {
//        Route::get('create','TextController@create');
//        Route::post('store','TextController@store');
//        Route::post('show','TextController@show');
//        Route::get('index','TextController@index');
//        Route::get('delete/{id}','TextController@destroy');
//        Route::get('edit/{id}','TextController@edit');
//        Route::post('update/{id}','TextController@update');
//    });
//
//
//
//
//
//
//Route::get('/','Index\IndexController@index');
//Route::view('/login','Index.login.login');
//Route::view('/reg','Index.login.reg');
//
//Route::post('/send','Index\LoginController@send');
//Route::any('/register','Index\LoginController@register');
//Route::any('/logindo','Index\LoginController@logindo');
//Route::any('/detail/{goods_id}','Index\IndexController@detail');
//
//
//Route::prefix('/cart')->middleware('CheckLogin')->group(function (){
//    Route::any('/addCart','Index\CartController@addCart');
//    Route::any('/index','Index\CartController@index');
//    Route::any('/changeNum','Index\CartController@changeNum');
//    Route::any('/getCount','Index\CartController@getCount');
//    Route::any('/getTotal','Index\CartController@getTotal');
//    Route::any('/cartDel','Index\CartController@cartDel');
//});
//Route::prefix('/order')->middleware('CheckLogin')->group(function (){
//    Route::any('/confirmOrder','Index\OrderController@confirmOrder');
//    Route::any('/submitOrder','Index\OrderController@submitOrder');
//    Route::any('/pay','Index\OrderController@pay');
//});
//
////没鸡儿用的
//Route::prefix('/deng')->group(function (){
//    Route::any('/index','Index\DengController@index');
//    Route::any('/create','Index\DengController@create');
//
//});
//Route::prefix('/zhu')->group(function (){
//    Route::any('/index','Index\ZhuController@index');
//    Route::any('/create','Index\ZhuController@create');
//
//});
//
//Route::get('/exam','exam\IndexController@index');
//Route::get('/exam/admin/create','exam\IndexController@create');
//Route::post('/exam/admin/store','exam\IndexController@store');




Route::any('login/login','Yuekao\LoginController@login');
Route::any('login/loginDo','Yuekao\LoginController@loginDo');

Route::any('index/index','Yuekao\IndexController@index')->middleware('CheckLogin');
Route::any('index/add','Yuekao\IndexController@add')->middleware('CheckLogin');
Route::any('index/list','Yuekao\IndexController@list')->middleware('CheckLogin');
Route::any('index/edit','Yuekao\IndexController@edit')->middleware('CheckLogin');














































