<?php


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

    /** 登录 */
    Route::any('/', 'IndexController@login')->name('admin.login');

    Route::get('/logout', 'IndexController@logout')->name('admin.logout');

    Route::any('/send', 'IndexController@SendSMS');



    Route::group(['middleware' => 'must.admin'], function () {

        /** 首页 */
        Route::get('/index','IndexController@index')->name('admin.index');


        /* --------------- 管理员管理 --------------- */

        /* 管理员管理 */
        Route::get('/admin','AdminController@index')->name('admin.admin.index');

        /** 添加管理员 */
        Route::post('/admin/create','AdminController@create')->name('admin.admin.create');

        /* 编辑管理员 */
        Route::post('/admin/edit/{id}','AdminController@edit')->name('admin.admin.edit');

        /* 删除管理员 */
        Route::get('/admin/destroy/{id}','AdminController@destroy')->name('admin.admin.destroy');

        /* --------------- 权限管理 --------------- */

        /* 权限管理首页 */
        Route::get('/permission','PermissionController@index')->name('admin.permission.index');

        /* 添加权限 */
        Route::post('/permission/create','PermissionController@create')->name('admin.permission.create');

        /* 编辑权限 */
        Route::post('/permission/edit/{id}','PermissionController@edit')->name('admin.permission.edit');

        /* 删除权限 */
        Route::get('/permission/destroy/{id}','PermissionController@destroy')->name('admin.permission.destroy');

        /* --------------- 活动管理 --------------- */

        /* 活动管理首页 */
        Route::get('/activity','ActivityController@index')->name('admin.activity.index');

        /* 添加活动 */
        Route::post('/activity/create','ActivityController@create')->name('admin.activity.create');

        /* 编辑活动 */
        Route::post('/activity/edit/{id}','ActivityController@edit')->name('admin.activity.edit');

        /* 删除活动 */
        Route::get('/activity/destroy/{id}','ActivityController@destroy')->name('admin.activity.destroy');


        /* --------------- 新闻管理 --------------- */

        /* 新闻管理首页 */
        Route::get('/news','NewsController@index')->name('admin.news.index');

        Route::any('/news/createshow','NewsController@createshow')->name('admin.news.createshow');

        /* 新闻活动 */
        Route::any('/news/create','NewsController@create')->name('admin.news.create');

        /* 新闻活动 */
        Route::post('/news/edit/{id}','NewsController@edit')->name('admin.news.edit');

        /* 新闻活动 */
        Route::get('/news/destroy/{id}','NewsController@destroy')->name('admin.news.destroy');

        /* --------------- 新闻管理 --------------- */

        /* 新闻管理首页 */
        Route::get('/members','MemberController@index')->name('admin.member.index');

        /* 新闻活动 */
        Route::post('/members/create','MemberController@create')->name('admin.member.create');

        /* 新闻活动 */
        Route::post('/members/edit/{id}','MemberController@edit')->name('admin.member.edit');

        /* 新闻活动 */
        Route::get('/members/destroy/{id}','MemberController@destroy')->name('admin.member.destroy');



    });


});

