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
// //Article//
// Route::resource('articles', 'ArticleController');
//Login/Logout
Route::get('login', array('uses' => 'AuthController@showLogin'));
// route to process the form
Route::post('login', array('uses' => 'AuthController@doLogin'));

Route::get('logout', array('uses' => 'AuthController@doLogout'));

// Route::get('travel/package/{id}/{title}', array('uses' => 'ArticleController@show'));

// Route::resource('contacts', 'ContactController');

Route::group(array('before'=>'auth'), function() {   
    Route::resource('admin', 'AdminController');
});

// Route::group(array('games'), function() {
// 	Route::resource('game', 'gameController');
// });

// Route::resource('projects', 'ProjectsController');
// Route::resource('tasks', 'TasksController');
// Route::resource('projects.tasks', 'TasksController');

// Route::bind('tasks', function($value, $route) {
// 	return App\Task::whereSlug($value)->first();
// });
// Route::bind('projects', function($value, $route) {
// 	return App\Project::whereSlug($value)->first();
// });

// Bind route parameters.
//Route::model('game', 'Game');

// Route::get('custom/response', function()
//  {
//  $response = Response::make('Hello world!', 200);
//  $response->headers->set('our key', 'our value');
//  return $response;
//  });


// =============================================
// CATCH ALL ROUTE =============================
// =============================================
// all routes that are not home or api will be redirected to the frontend
// this allows angular to route them
App::missing(function($exception)
{
	return View::make('404/404');
});

// Route::get('/{slug}/{id}',function($slug,$id){
// 	if (Auth::guest()) {
// 		return "you don't have permission to see";
// 	}
	
// 	return "slug is {$slug} and id is {$id}.";
	
	
// });