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
 Route::get('admin/login','UserController@getLoginAdmin');
 Route::post('admin/login','UserController@postLoginAdmin');
 Route::get('admin/logout','UserController@getLogoutAdmin');
Route::group(['prefix' => 'admin','middleware'=>'adminLogin'], function() {

    Route::group(['prefix' => 'post-category'], function() {

        Route::get('list','PostCategoryController@getList');


        Route::get('edit/{id}','PostCategoryController@getEdit');
        Route::post('edit/{id}','PostCategoryController@postEdit');
 

        Route::get('add','PostCategoryController@getAdd');
        Route::post('add','PostCategoryController@postAdd');

        Route::get('delete/{id}','PostCategoryController@getDelete');

    });
     Route::group(['prefix' => 'post'], function() {

        Route::get('list','PostController@getList');


        Route::get('edit/{id}','PostController@getEdit');
        Route::post('edit/{id}','PostController@postEdit');
 

        Route::get('add','PostController@getAdd');
        Route::post('add','PostController@postAdd');

        Route::get('delete/{id}','PostController@getDelete');

    });



    Route::group(['prefix' => 'contact'], function() {

        Route::get('list','ContactController@getList');
        Route::get('list_finish','ContactController@getListFinish');
        Route::get('edit/{id}','ContactController@getEdit');
        Route::get('restore/{id}','ContactController@getRestore');
        Route::get('delete/{id}','ContactController@getDelete');
    });

    Route::group(['prefix' => 'user'], function() {

        Route::get('list','UserController@getList');


        Route::get('edit/{id}','UserController@getEdit');
        Route::post('edit/{id}','UserController@postEdit');
 

        Route::get('add','UserController@getAdd');
        Route::post('add','UserController@postAdd');

        Route::get('delete/{id}','UserController@getDelete');

    });


});


Route::get('/','PagesController@getHome');
Route::get('trangchu','PagesController@getHome');
Route::get('dangnhap','PagesController@getLogin')->name('form.login');
Route::post('dangnhap','PagesController@postLogin');
Route::get('dangxuat','PagesController@getLogout');

Route::get('dangki','PagesController@getRegister');
Route::post('dangki','PagesController@postRegister');

Route::get('nguoidung','PagesController@getShowUser');
Route::post('nguoidung','PagesController@postShowUser');

Route::post('comment/{id}','CommentController@postComment');

Route::get('muc-bai-viet/{id}/{TenDeKhongDau}.html','PagesController@getPostCate');
Route::get('chi-tiet/{id}/{TenDeKhongDau}.html','PagesController@getShowPost');
Route::get('bai-viet-hay','PagesController@getPostViews');
Route::post('timkiem','PagesController@postLooking');

Route::get('quen-mat-khau','ForgetPasswordController@getFormResetPassword')->name('get.form.reset.password');
Route::post('quen-mat-khau','ForgetPasswordController@postFormResetPassword');

Route::get('password/reset','ForgetPasswordController@getResetPassword')->name('get.reset.password');
Route::post('password/reset','ForgetPasswordController@postSaveResetPassword');

Route::get('test/searchform','testAjaxSearchController@getFormSearch');
Route::get('/test/searchform/action', 'testAjaxSearchController@action')->name('live_search.action');



Route::get('/email_available', 'AjaxCheckMailAvailableController@index');

Route::post('/email_available/check', 'AjaxCheckMailAvailableController@check')->name('email_available.check');

Route::get('/ajax_area', 'Ajax_Area_Controller@index');

Route::post('/email_available/check', 'Ajax_Area_Controller@fetchArea')->name('ajax_area');

Route::get('comment_ajax', 'Comment_Ajax_Controller@index');

Route::post('comment_ajax/send', 'Comment_Ajax_Controller@postComment')->name('comment_ajax.actionAdd');
Route::get('comment_ajax/load_comment', 'Comment_Ajax_Controller@loadComment')->name('comment_ajax.loadComment');