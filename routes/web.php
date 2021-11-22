<?php

use Illuminate\Support\Facades\Route;

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

//home
Route::get('/','App\Http\Controllers\ClientController@index');
Route::get('/projectbyid/{id}','App\Http\Controllers\ClientController@projectbyid');

//admin
Route::get('/dashboard','App\Http\Controllers\AdminController@index');

Route::get('/slider','App\Http\Controllers\AdminController@slider');
//slider

Route::get('/
','App\Http\Controllers\SliderController@index');
Route::post('/newslider','App\Http\Controllers\SliderController@newslider');
Route::get('/addslider','App\Http\Controllers\SliderController@addslider');

Route::get('/editslider/{id}','App\Http\Controllers\SliderController@editslider');
Route::post('/updateslider/{id}','App\Http\Controllers\SliderController@updateslider');
Route::get('/deleteslider/{id}','App\Http\Controllers\SliderController@deleteslider');

//project
Route::get('/project','App\Http\Controllers\PortfolioController@index');

Route::get('/addproject','App\Http\Controllers\PortfolioController@addproject');
Route::post('/newproject','App\Http\Controllers\PortfolioController@newproject');
Route::get('/editproject/{id}','App\Http\Controllers\PortfolioController@editproject');
Route::post('/updateproject/{id}','App\Http\Controllers\PortfolioController@updateproject');
Route::get('/deleteproject/{id}','App\Http\Controllers\PortfolioController@deleteproject');
//service
Route::get('/service','App\Http\Controllers\ServiceController@index');
Route::post('/newservice','App\Http\Controllers\ServiceController@newservice');
Route::get('/addservice','App\Http\Controllers\ServiceController@addservice');
Route::get('/editservice/{id}','App\Http\Controllers\ServiceController@editservice');
Route::post('/updateservice/{id}','App\Http\Controllers\ServiceController@updateservice');
Route::get('/deleteservice/{id}','App\Http\Controllers\ServiceController@deleteservice');
//messages
Route::get('/messages','App\Http\Controllers\MessageController@index');
Route::post('/contact','App\Http\Controllers\MessageController@contact');
Route::get('/deletemessage/{id}','App\Http\Controllers\MessageController@deletemessage');

//skill
Route::get('/skills','App\Http\Controllers\SkillController@index');
Route::post('/newskill','App\Http\Controllers\SkillController@newskill');
Route::get('/addskill','App\Http\Controllers\SkillController@addskill');
Route::get('/editskill/{id}','App\Http\Controllers\SkillController@editskill');
Route::post('/updateskill/{id}','App\Http\Controllers\SkillController@updateskill');
Route::get('/deleteskill/{id}','App\Http\Controllers\SkillController@deleteskill');
//framework
Route::get('/frameworks','App\Http\Controllers\FrameworkController@index');
Route::post('/newframework','App\Http\Controllers\FrameworkController@newframework');
Route::get('/addframework','App\Http\Controllers\FrameworkController@addframework');
Route::get('/editframework/{id}','App\Http\Controllers\FrameworkController@editframework');
Route::post('/updateframework/{id}','App\Http\Controllers\FrameworkController@updateframework');
Route::get('/deleteframework/{id}','App\Http\Controllers\FrameworkController@deleteframework');

//about
Route::get('/about','App\Http\Controllers\AboutController@index');
Route::post('/newabout','App\Http\Controllers\AboutController@newabout');
Route::get('/addabout','App\Http\Controllers\AboutController@addabout');
Route::get('/editabout/{id}','App\Http\Controllers\AboutController@editabout');
Route::post('/updateabout/{id}','App\Http\Controllers\AboutController@updateabout');
Route::get('/deleteabout/{id}','App\Http\Controllers\AboutController@deleteabout');


//feature
Route::get('/features','App\Http\Controllers\FeatureController@index');
Route::post('/newfeature','App\Http\Controllers\FeatureController@newfeature');
Route::get('/addfeature','App\Http\Controllers\FeatureController@addfeature');
Route::get('/editfeature/{id}','App\Http\Controllers\FeatureController@editfeature');
Route::post('/updatefeature/{id}','App\Http\Controllers\FeatureController@updatefeature');
Route::get('/deletefeature/{id}','App\Http\Controllers\FeatureController@deletefeature');

//links
Route::get('/sociallinks','App\Http\Controllers\SociallinkController@index');
Route::post('/newlink','App\Http\Controllers\SociallinkController@newlink');
Route::get('/addlink','App\Http\Controllers\SociallinkController@addlink');
Route::get('/editlink/{id}','App\Http\Controllers\SociallinkController@editlink');
Route::post('/updatelink/{id}','App\Http\Controllers\SociallinkController@updatelink');
Route::get('/deletelink/{id}','App\Http\Controllers\SociallinkController@deletelink');
Route::get('/download',function(){
    $file = public_path()."/cv.pdf";
    $headers = array(
        'Content-Type: application/pdf',
    );
    return Response::download($file,"Mycv.pdf",$headers);
});










Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
