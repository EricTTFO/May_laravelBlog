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

// Route::get('/', function () {
//     return view('hello');
// });
Route::match(['get', 'post', 'put'], '/', function () {
    $url = route('hello');
    // return view('welcome')->with('msg', $url);
    return redirect()->route('hello');
});
// Route::get('/', function () {
//     return view('welcome');
// });
// Route::post('/', function () {
//     return view('welcome')->with('msg', '199');
// });
// Route::get('/hello',['as' => 'hello', function(){
//     return view('hello');
// }]);
// Route::any('/hello/{id}/comments/{comment?}', function ($id, $commentId = 'aaa') {
//     return view('welcome')->with('msg', '账号:' . $id . '密码:' . $commentId);
// })->where(['id' => '[0-9]+', 'comment' => '[a-zA-Z]+']);
Route::group(['prefix' => 'admin', 'domain' => 'www.laraverblog.com'], function () {
    Route::get('user/{id}', function ($id) {
        return view('welcome')->with('msg', $id);
    });
    Route::group(['prefix' => 'detail'], function () {
        Route::get('hello/{id}', function ($id) {
            return view('welcome')->with('msg', $id);
        });
    });
});
