<?php
use Illuminate\Support\Facades\Artisan;
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
    return view('index');
});

Route::get('/login', function () {
    return view('login');
});

/*Route::get('storage-link', function () {
    Artisan::call('storage:link');
});*/


Route::livewire('/categorias', 'categorias');
Route::livewire('/emprendedores/{id}','emprendedores');
Route::livewire('/emprendedores-detalle/{id}','emprendedores-mostrar');
Route::livewire('/home','home');
Route::livewire('/quienes-somos','quienes-somos');
Route::livewire('/contacto','contactanos');
Route::livewire('/actividades','actividades');
Route::livewire('/actividades-detalle/{id}','actividad-detalle');
Route::livewire('/unirse','unirse');

Route::group(['middleware' => 'auth'], function() {
Route::get('/admin', function () {
    return view('admin.home');
});

Route::post('/categoria/actualizar', 'CategoriasController@actualizar')->name('actualizar');
Route::get('/categoria/table', 'CategoriasController@getTableCategorias');
Route::resource('/categoria', 'CategoriasController');


Route::post('/emprendedor/actualizar', 'EmprendedoresController@actualizar')->name('emprendedor.actualizar');
Route::get('/emprendedor/table', 'EmprendedoresController@getTableEmprendedores');
Route::resource('/emprendedor', 'EmprendedoresController');


Route::post('/banner/actualizar', 'BannersController@actualizar')->name('banner.actualizar');
Route::get('/banner/table', 'BannersController@getTableBanners');
Route::resource('/banner', 'BannersController');


Route::post('/actividad/actualizar', 'ActividadesController@actualizar')->name('actividad.actualizar');
Route::get('/actividad/table', 'ActividadesController@getTableActividades');
Route::resource('/actividad', 'ActividadesController');

Route::get('/unidos/table', 'UnidosController@getTableUnidos');
Route::resource('/unidos', 'UnidosController');

Route::get('/usuarios/table', 'UsuariosController@getTableUsuarios');
Route::resource('/usuarios', 'UsuariosController');

Route::get('/actividad-excel', 'ExcelController@actividades');
Route::get('/emprendedor-excel', 'ExcelController@emprendedores');
});


Route::resource('/', 'FrontController');
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/login', 'Auth\LoginController@showLoginForm')->middleware('guest');
Route::post('login','Auth\LoginController@login')->name('login');
