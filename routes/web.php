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
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', 'Auth\LoginController@index')->name('login');
Route::post('/', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes(['register'=> false, 'reset'=> false]);



Route::middleware(["auth"])->group(function(){

/* Rutas para los reportes*/
Route::get('sales/reports_day', 'ReportController@reports_day')-> name('reports.day');
Route::get('sales/reports_date', 'ReportController@reports_date')-> name('reports.date');

Route::post('sales/report_results', 'ReportController@report_results')->name('report.results');

Route::get('purchases/retentions/{purchase}', 'RetentionController@create')->name('retention.create');
Route::post('purchases/retentions/store', 'RetentionController@store')->name('retention.store');

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
Route::resource('retentions', 'RetentionController')-> names('retentions');

/* Rutas principales para impresiones en pdf, excel e impresoras fiscales del sistema */
Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchase.pdf');
Route::post('purchases/retention/{purchase}', 'PurchaseController@retention')->name('purchase.retention');

Route::get('products/export/list', 'ProductController@export')-> name('product.export');

Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');
Route::get('sales/print/{sale}', 'SaleController@print')->name('sales.print');
Route::get('products/pdf/stock', 'ProductController@pdf')->name('products.pdf');

/* Rutas para subir archivos al sistema */
Route::get('purchases/upload/{purchase}', 'PurchaseController@upload')-> name('upload.purchases');

/* Rutas para el cambio de estatus en bd*/
Route::get('change_status/products/{product}', 'ProductController@change_status')-> name('change.status.products');
Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status')-> name('change.status.purchases');
Route::get('change_status/sales/{sale}', 'SaleController@change_status')-> name('change.status.sales');

});

/* Rutas para las peticiones ajax*/
Route::get('get_products_by_barcode', 'ProductController@get_products_by_barcode')-> name('get_products_by_barcode');
Route::get('get_products_by_id', 'ProductController@get_products_by_id')-> name('get_products_by_id');
Route::get('get_Products', 'PurchaseController@get_Products')->name('get_Products');
Route::get('get_Clients_by_dni', 'ClientController@get_Clients_by_dni')->name('get_Clients_by_dni');
Route::post('get_Only_products', 'ClientController@get_Only_products')->name('get_Only_products');
Route::get('get_Measure', 'ProductController@get_Measure')-> name('get_Measure');
Route::get('get_Retention_create', 'RetentionController@get_Retention_create')-> name('get_Retention_create');
Route::get('get_Retention_edit', 'RetentionController@get_Retention_edit')-> name('get_Retention_edit');
Route::post('get_Retention_update', 'RetentionController@get_Retention_update')-> name('get_Retention_update');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/prueba/{sale}', 'SaleController@prueba')->name('prueba');
