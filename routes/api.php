<?php

use App\Http\Controllers\AdministrativoController;
use App\Http\Controllers\CMSController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FinanceiroController;
use App\Modules\CMS\Page;
use App\Modules\Automacao\AutomacaoController;
use App\Modules\Jobs\JobController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//USERS
Route::post('/register', [UserController::class, "register"]);
Route::get('/getUsuarios', [UserController::class, "getUsuarios"]);
Route::get('/DeleteU/{id}', [UserController::class, "deleteU"]);

//TRANSACTIONS
Route::get('/conta/all', [ FinanceiroController::class, "pegarContas"]);
Route::post('/salvarDespesa', [FinanceiroController::class, "salvarTransação"]);
Route::post('/salvarReceita', [FinanceiroController::class, "salvarReceita"]);

//CATEGORY AND SUBCATEGORTY

Route::prefix('user')->group(function () {
    Route::post('/login', [ UserController::class, "login"]);
});


// core 

Route::prefix('modulos')->group(function () {
    Route::get('/ativos', [ ConfigController::class, "getModulosAtivos"]);
    Route::get('/financeiro/ativar', [ ConfigController::class, "ativarModuloFinanceiro"]);
    Route::get('/cms/ativar', [ ConfigController::class, "ativarModuloCMS"]);
    Route::get('/crm/ativar', [ ConfigController::class, "ativarModuloCRM"]);
    Route::post('/update/all', [ ConfigController::class, "updateAll"]);

    
});

Route::post('/register', [UserController::class, "register"]);
Route::get('/getUsuarios', [UserController::class, "getUsuarios"]);
Route::get('/dados', [AdministrativoController::class, "dados"]);

// cms
Route::post('/salvarTema', [AdministrativoController::class, "salvarTema"]);
Route::get('/tema', [AdministrativoController::class, "tema"]);
Route::post('/cms/uploadFile', [ CMSController::class, "updateFile"]);
Route::post('/cms/update/{id}', [ CMSController::class, "update"]);
Route::get('/cms/page/set-home/{id}', [ CMSController::class, "setHome"]);
Route::get('/cms/page/get-home', [ CMSController::class, "getHome"]);
Route::get('/cms/{id}', [ CMSController::class, "get"]);

Route::prefix('page')->group(function () {
    Route::get('/delete/{id}', [ Page::class, "deleteP"]);
});


// financeiro
Route::post('/salvarDespesa', [FinanceiroController::class, "salvarTransação"]);
Route::post('/salvarReceita', [FinanceiroController::class, "salvarReceita"]);

Route::get('/categoria/all', [ FinanceiroController::class, "pegarCategorias"]);
Route::get('/conta/all', [ FinanceiroController::class, "pegarContas"]);

Route::post('/criarCategoria', [ FinanceiroController::class, "criarNovaCategoria"]);
Route::get('/pegarSubCategoria/{id}', [FinanceiroController::class, "pegarSubcategoriaIdv2"]);
Route::post('/criarSubcategoria', [FinanceiroController::class, "criarNovaSubcategoria"]);
Route::post('/verSubCategoria/{id}', [FinanceiroController::class, "pegarSubcategoriaId"]);
Route::get('/categoria/all', [ FinanceiroController::class, "pegarCategorias"]);
Route::post('/deleteCo/{id}', [ FinanceiroController::class, "deleteCo"]);

//EVENTS
Route::post('/salvarEvento', [AdministrativoController::class, "salvarEvento"]);
Route::get('/buscarEventos', [AdministrativoController::class, "buscarEventos"]);
Route::get('/buscarTodosEventos', [AdministrativoController::class, "buscarTodosEventos"]);
//MODULE
Route::get('/moduloUser/{id}', [AdministrativoController::class, "moduloUser"]);

//DATA
Route::get('/dados', [AdministrativoController::class, "dados"]);

//THEME
Route::get('/tema', [AdministrativoController::class, "tema"]);
Route::post('/salvarTema', [AdministrativoController::class, "salvarTema"]);

//CMS
Route::post('/cms/uploadFile', [ CMSController::class, "updateFile"]);
Route::post('/cms/update/{id}', [ CMSController::class, "update"]);
Route::get('/cms/page/set-home/{id}', [ CMSController::class, "setHome"]);
Route::get('/cms/page/get-home', [ CMSController::class, "getHome"]);
Route::get('/cms/{id}', [ CMSController::class, "get"]);
Route::post('/pegarConta/{id}', [FinanceiroController::class, "pegarContaId"]);
Route::post('/pegarCategoria/{id}', [FinanceiroController::class, "pegarCategoriaId"]);
Route::get('/moduloUser/{id}', [AdministrativoController::class, "moduloUser"]);

// eventos
Route::post('/salvarEvento', [AdministrativoController::class, "salvarEvento"]);
Route::get('/buscarEventos', [AdministrativoController::class, "buscarEventos"]);
Route::get('/buscarTodosEventos', [AdministrativoController::class, "buscarTodosEventos"]);


 


//CONFIG
Route::prefix('config')->group(function () {
    Route::post('/set', [ ConfigController::class, "create"]);
    Route::get('/{key}', [ ConfigController::class, "getKey"]);
});

//JOBS
Route::prefix('job')->group(function () {
    Route::post('/create', [ JobController::class, "create"]);
    Route::get('/{id}', [ JobController::class, "get"]);
    Route::get('/deleteD/{id}', [ JobController::class, "delete"]);
    Route::put('/{id}', [ JobController::class, "update"]);
    Route::get('/run/{id}', [ JobController::class, "runJob"]);
});


// automacao

Route::prefix('flow')->group(function () {
    Route::get('/all', [ AutomacaoController::class, "getAllFlow"]);
    Route::post('/create', [ AutomacaoController::class, "createFlow"]);
    Route::get('/{id}', [ AutomacaoController::class, "getFlow"]);
    Route::get('/delete/{id}', [ AutomacaoController::class, "deleteFlow"]);
    Route::put('/{id}', [ AutomacaoController::class, "editFlow"]);
});

Route::prefix('job')->group(function () {
    Route::post('/create', [ AutomacaoController::class, "createJob"]);
    Route::get('/inflow/{id}', [ AutomacaoController::class, "getJobsInFlow"]);
    Route::get('/{id}', [ AutomacaoController::class, "getJob"]);
    Route::get('/delete/{id}', [ AutomacaoController::class, "deleteJob"]);
    Route::put('/{id}', [ AutomacaoController::class, "editJob"]);
    Route::get('/run/{id}', [ AutomacaoController::class, "runJob"]);
});

//ACCOUNTS
Route::prefix('conta')->group(function () {
    Route::get('/deleteC/{id}', [ FinanceiroController::class, "deleteC"]);
});
Route::post('/pegarConta/{id}', [FinanceiroController::class, "pegarContaId"]);
Route::post('/pegarCategoria/{id}', [FinanceiroController::class, "pegarCategoriaId"]);

//PAGES
Route::prefix('page')->group(function () {
    Route::get('/delete/{id}', [ Page::class, "deleteP"]);
});
    
Route::prefix('processo')->group(function () {
    Route::post('/create', [ JobController::class, "createProcesso"]);
    Route::get('/{id}', [ JobController::class, "getProcesso"]);
    Route::get('/deleteD/{id}', [ JobController::class, "deleteProcesso"]);
    Route::put('/{id}', [ JobController::class, "editProcesso"]);
});

Route::get('/getJ', [ JobController::class, "jobs"]);




