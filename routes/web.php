<?php

/*
|--------------------------------------------------------------------------
| back routes
|--------------------------------------------------------------------------
ontains the "web" middleware group. Now create something great!
|
*/
Route::prefix('admin')->middleware('isLogin')->group(function(){
  Route::get('giris','back\authController@login')->name('admin.login');
  Route::post('giris','back\authController@loginPost')->name('admin.login.post');
});

Route::prefix('admin')->middleware('isAdmin')->group(function(){
  Route::get('panel','back\dashboard@index')->name('admin.dashboard');




  //MAKALE ROUTES

  Route::resource('yazilar','back\ArticleController');
  Route::get('/switch','back\ArticleController@switch')->name('switch');
  Route::get('/deletearticle/{id}','back\ArticleController@delete')->name('delete.article');

  //CATEGORY ROUTES
  Route::get('/kategoriler','back\CategoryController@index')->name('category.index');
  Route::post('/kategoriler/create','back\CategoryController@create')->name('category.create');
  Route::post('/kategoriler/update','back\CategoryController@update')->name('category.update');
  Route::post('/kategoriler/delete','back\CategoryController@delete')->name('category.delete');
  Route::get('/kategori/status','back\CategoryController@switch')->name('category.switch');
  Route::get('/kategori/getData','back\CategoryController@getData')->name('category.getdata');


  //PAGE'S ROUTES
  Route::get('/sayfalar','back\PageController@index')->name('page.index');
  Route::get('/sayfa/switch','back\PageController@switch')->name('page.switch');
  Route::get('/sayfalar/olustur','back\PageController@create')->name('page.create');
  Route::post('/sayfalar/olustur','back\PageController@post')->name('page.post');
  Route::get('/sayfalar/guncelle/{id}','back\PageController@edit')->name('page.edit');
  Route::post('/sayfalar/guncelle/{id}','back\PageController@editPost')->name('page.edit.post');
  Route::get('/sayfalar/sil/{id}','back\PageController@delete')->name('page.delete');




  Route::get('cikis','back\authController@logout')->name('admin.logout');

});











/*
|--------------------------------------------------------------------------
| front routes
|--------------------------------------------------------------------------
ontains the "web" middleware group. Now create something great!
|
*/
Route::get('/','front\homepage@index')->name('homepage');
Route::get('yazilar/sayfa','front\homepage@index');
Route::get('/iletisim','front\homepage@contact')->name('contact');
Route::post('/iletisim','front\homepage@contactPost')->name('contact.post');
Route::get('/kategori/{category}','front\homepage@category')->name('category');
Route::get('/{category}/{slug}','front\homepage@single')->name('single');
Route::get('/{sayfa}','front\homepage@page')->name('page');
