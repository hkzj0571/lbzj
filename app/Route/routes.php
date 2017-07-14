<?php
Route::group(['namespace' => 'Home'], function () {


//    Route::get('/', function () {
//        return view('home.index.index');
//    });
    //支付宝支付处理路由
    Route::get('/alipay','alipayController@Alipay');  // 发起支付请求
    Route::any('/notify','alipayController@AliPayNotify'); //服务器异步通知页面路径
    Route::any('/return','alipayController@AliPayReturn');  //页面跳转同步通知页面路径

    Route::get('/', 'IndexController@index')->name('home.index.index');

    Route::any('/activity', 'ActivityController@index');

    Route::get('/activity/show/{id}','ActivityController@show')->name('home.activity.show');

    Route::post('/activity/create','ActivityController@createmember')->name('home.activity.createmember');

    Route::any('/news', 'NewsController@index');

});




