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

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');
Route::get('/help', 'PagesController@help');
Route::get('/contact', 'PagesController@contact');

Route::get('/upload', 'UploadController@uploadForm');
Route::post('/upload', 'UploadController@uploadSubmit');

Route::get('/project', 'ProjectsController@new');
Route::get('/project/{project_id}', 'ProjectsController@load');
Route::post('/project', 'ProjectsController@save');
Route::post('/project/{project_id}', 'ProjectsController@save');
Route::delete('/project/{project_id}', 'ProjectsController@delete');


Auth::routes();
Route::get('/dashboard', 'DashboardController@index');
