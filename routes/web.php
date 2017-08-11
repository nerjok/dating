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


Route::get('', 'ProfileController@index');
/* Article routes */

Route::get('article', 'ArticleController@create');

Route::put('article', 'ArticleController@store');

Route::get('article/all', 'ArticleController@index')->name('home');

//tags
Route::get('tag/create', 'TagsController@create');

Route::put('tag/create', 'TagsController@store');


Route::get('tag/edit', 'TagsController@edit');

Route::get('tag/update/{tag}', 'TagsController@edit');//

Route::put('tag/update/{tag}', 'TagsController@update');//

Route::get('article/tag/{tag}', 'TagsController@index');


Route::get('article/edit/all', 'ArticleController@editAll');

Route::get('article/edit/{article}', 'ArticleController@edit');

Route::put('article/update/{article}', 'ArticleController@update');

Route::get('article/delete/{article}', 'ArticleController@destroy');

Route::get('article/{article}', 'ArticleController@show');

/* Profile controllers*/

Route::put('profile', 'ProfileController@searchProfile');

Route::get('profile', 'ProfileController@index')->name('profiles');

Route::get('profile/photo', 'ProfileController@create');

Route::put('profile/photo/{profile}', 'ProfileController@store');

Route::get('profile/edit', 'ProfileController@edit');

Route::put('profile/edit', 'ProfileController@update');

Route::get('profile/{user}', 'ProfileController@show');//changed from profile

Route::get('photo/{profile}/{photo}', 'ProfileController@photo');

Route::get('delete/{photo}', 'ProfileController@destroy');

Route::get('profile/block/{id}', 'ProfileController@blockUser');

Route::get('profiles/blocked', 'ProfileController@blocked');

Route::get('profiles/unblock/{id}', 'ProfileController@unblock');


/* Sending and getting messages */

Route::get('messages', 'MessageController@messages');

Route::get('messages/{sender}', 'MessageController@showMesagging');

Route::get('message/send/{receiver}', 'MessageController@create');

Route::put('message/send/{user}', 'MessageController@store');

/* login controleer */
Auth::routes();
Route::get('verify/{token}', 'Auth\RegisterController@verify');

Route::get('/home', 'HomeController@index')->name('home');


/*
Route::get('images/{image}', function($image = null)
{
    $path = storage_path().'/imageFolder/' . $image;
    if (file_exists($path)) { 
        return Response::download($path);
    }
});

*/
/*
Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

*/