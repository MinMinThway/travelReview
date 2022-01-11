<?php

use App\Role;
use Faker\Provider\HtmlLorem;
use Illuminate\Support\Facades\Route;

Route::get('/article/{category}','ClientController@category')->name('client.category');
Route::get('/', 'ClientController@index')->name('client')->middleware("islogin");

Route::get('/article', 'ClientController@article')->name('client.articel')->middleware("islogin");
Route::get('/article/detail/{id}', 'ClientController@articleDetail')->name("client.aricleDetail");
Route::get('/search/{key?}', 'ClientController@search')->name("search");
Route::get('/contact', 'ClientController@contact')->name('client.contact');

Route::get("/comment/{id}", 'ClientController@indexComment')->name('comment.index');
Route::post("/comment/store", 'ClientController@storeComment')->name('comment.store');
Route::post("/comment/delete/{id}", 'CategoryController@delete')->name('comment.delete');
Route::get('/likeDislikes/showLike/{id}', 'ClientController@likeShow')->name('showLike');
Route::post('/likeDislikes/add', 'ClientController@likeDislikes')->name('likesystem');


Route::post('/mail', 'ClientController@mail')->name('send.mail');


Route::group(["prefix" => "admin", "namespace" => "Admin", "middleware" => "islogin","middleware" => "isRole"], function () {
    Route::resource('/category', 'CategoryController', array("as" => "admin"));
    Route::resource('/user', 'UserController', array("as" => "admin"));
    Route::resource('/article', 'ArticleController', array("as" => "admin"));
});



Route::get('/login', 'AuthController@index')->name('login');
Route::post('/login', 'AuthController@loginValidate')->name('loginValidate');
Route::get('/register', 'AuthController@register')->name('register');
Route::post('/register', 'AuthController@store')->name('register.store');
Route::get('/logout', 'AuthController@logout')->name('logout');

