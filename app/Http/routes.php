<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function (){ return redirect('home.html');});
Route::get('/{name}.html', 'PageController@displayPage');
Route::post('/postMOT', 'MOTController@store');
Route::post('/postFormOne', 'ContactController@FormOne');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['prefix' => 'admin','middleware' => 'web'], function () {
    Route::auth();

//// Pages ////
    Route::get('/', 'HomeController@index');
    Route::get('/newPage', 'PageController@create');
    Route::post('/postPage', 'PageController@postPage');
    Route::post('/postEditPage', 'PageController@postEditPage');
    Route::get('/listPages', 'PageController@listPages');
    Route::get('/editPage/{id}', 'PageController@editPage');
    Route::get('/deletePage/{id}', 'PageController@deletePage');
    Route::get('/undeletePage/{id}', 'PageController@undeletePage');
    Route::get('/deactivatePage/{id}', 'PageController@deactivatePage');
    Route::get('/activatePage/{id}', 'PageController@activatePage');
    Route::get('/hidePage/{id}', 'PageController@hidePage');
    Route::get('/unhidePage/{id}', 'PageController@unhidePage');

//// Images ////
    // Add
    Route::get('/newImage','ImageController@create');
    Route::post('/postImage', 'ImageController@store');

    // Edit
    Route::get('/listImage','ImageController@index');

    // Delete
    Route::get('/deleteImage/{id}', 'ImageController@destroy');

    // Add images to page
    Route::get('/pageImages/{pageId}', 'ImageController@pageImages');
    Route::get('/addImageToPage/{pageId}/{imageId}', 'ImageController@addImageToPage');
    Route::get('/removeImageToPage/{pageId}/{imageId}', 'ImageController@removeImageToPage');

//// Contacts
    // list contacts
    Route::get('/contacts', 'ContactController@index');

    // delete contacts
    Route::get('/deleteContact/{id}', 'ContactController@destroy');

    // view contact
    Route::get('/viewContact/{id}', 'ContactController@show');

//// MOT

    // Display MOT List
    Route::get('/MOTS', 'MOTController@index');

    // Delete MOT
    Route::get('/deleteMOT/{id}', 'MOTController@destroy');
});
