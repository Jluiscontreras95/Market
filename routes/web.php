<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\ContabilityController;
use App\Http\Controllers\ExchangeController;

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
    return view('welcome');
});



/* Rutas para los reportes*/
Route::get('sales/reports_day', 'ReportController@reports_day')-> name('reports.day');
Route::get('sales/reports_date', 'ReportController@reports_date')-> name('reports.date');

Route::post('sales/report_results', 'ReportController@report_results')->name('report.results');


/* Rutas principales del sistema */
Route::resource('categories', 'CategoryController')-> names('categories');
Route::resource('clients', 'ClientController')-> names('clients');
Route::resource('products', 'ProductController')-> names('products');
Route::resource('providers', 'ProviderController')-> names('providers');
Route::resource('purchases', 'PurchaseController')-> names('purchases')-> except(['edit', 'update', 'destroy']);
Route::resource('sales', 'SaleController')-> names('sales')-> except(['edit', 'update', 'destroy']);
Route::resource('businesses', 'BusinessController')-> names('businesses')-> only(['index', 'update']);
Route::resource('printers', 'PrinterController')-> names('printers')-> only(['index', 'update']);
Route::resource('users', 'UserController')-> names('users');
Route::resource('roles', 'RoleController')-> names('roles');
Route::resource('contabilities', 'ContabilityController')-> names('contabilities');
Route::resource('exchanges', 'ExchangeController')-> names('exchanges');

/* Rutas principales para impresiones en pdf e impresoras fiscales del sistema */
Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchase.pdf');
Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');
Route::get('sales/print/{sale}', 'SaleController@print')->name('sales.print');

/* Rutas para subir archivos al sistema */
Route::get('purchases/upload/{purchase}', 'PurchaseController@upload')-> name('upload.purchases');

/* Rutas para el cambio de estatus en bd*/
Route::get('change_status/products/{product}', 'ProductController@change_status')-> name('change.status.products');
Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status')-> name('change.status.purchases');
Route::get('change_status/sales/{sale}', 'SaleController@change_status')-> name('change.status.sales');

/* Rutas para las peticiones ajax*/
Route::get('get_products_by_barcode', 'ProductController@get_products_by_barcode')-> name('get_products_by_barcode');
Route::get('get_products_by_id', 'ProductController@get_products_by_id')-> name('get_products_by_id');
Route::get('get_Products', 'PurchaseController@get_Products')->name('get_Products');
Route::get('get_Clients_by_dni', 'ClientController@get_Clients_by_dni')->name('get_Clients_by_dni');
Route::post('get_Only_products', 'ClientController@get_Only_products')->name('get_Only_products');


// Route::get('/prueba', function () {
//     return view('prueba');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/prueba/{sale}', 'SaleController@prueba')->name('prueba');
