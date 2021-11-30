<?php

use App\Http\Controllers\UserController;
use App\Modules\CMS\Theme;
use App\Core\User\User;
use App\Http\Controllers\TrainingController;
use Illuminate\Support\Facades\Response;
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

Route::get('/', function () {
    return view('home');
});

//PAGES
Route::get('/login', function () {
    return view('login');
});
Route::view('/user/dashboard', 'user.dash');
Route::view('/user/modulos', 'user.modulos.modulos');

//USERS
Route::post('/login', [ UserController::class,"loginWeb"]);
Route::post('/update',[ UserController::class,"update"]);
Route::view('/user/usuarios', 'user.administrativo.usuarios');
Route::view('/forgotpassword', 'user.administrativo.forgotp');
Route::view('/requestpassword/{id}', 'user.administrativo.requestp');
//TRAINING
Route::get('/user/training', [TrainingController::class, "trainingHome"]);

//CSS
Route::get('/geral.css', function () {
    $css = Theme::find(1);
    $page = view('css', ['css' => $css]);
    return Response::view('css', ['css' => $css])->header('Content-Type', 'text/css');

    return response()->header('Content-Type', 'text/css');
});

//Route::view('/user/pages/{id}', 'user.cms.pageedit', [ 'id' => $id ]);


Route::get('/user/training', [TrainingController::class, "trainingHome"]);
