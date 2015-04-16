<?php

// =============================================
// HOME PAGE ===================================
// =============================================
Route::get('/', function()
{
	return View::make('index');
});
Route::get('/about', function()
{
	return View::make('about');
});
// =============================================
// API ROUTES ==================================
// =============================================
Route::group(array('prefix' => 'api'), function() {

	// since we will be using this just for CRUD, we won't need create and edit
	// Angular will handle both of those forms
	// this ensures that a user can't access api/create or api/edit when there's nothing there
	Route::resource('comments', 'CommentController', 
		array('except' => array('create', 'edit', 'update')));
});
//Article//
Route::resource('articles', 'ArticleController');
//Login/Logout
Route::get('login', array('uses' => 'HomeController@showLogin'));
// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));

Route::get('logout', array('uses' => 'HomeController@doLogout'));


Route::group(array('prefix' => 'admin','before' => 'auth'), function()
{

    Route::get('/', function()
    {
        return View::make('admin.dashboard');
    });
    Route::get('/edit', function()
    {
        echo 'edit';
    });


});

// Route::get('admin', array('before' => 'auth', function()
// {
//     return View::make('admin.dashboard');
// }));
// =============================================
// CATCH ALL ROUTE =============================
// =============================================
// all routes that are not home or api will be redirected to the frontend
// this allows angular to route them
App::missing(function($exception)
{
	return View::make('index');
});