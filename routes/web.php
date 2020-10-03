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
Artisan::call('view:clear');

Route::group(["prefix" => "admin", "namespace" => "Admin", "middleware" => ["beetle-authenticate"]], function () {
	Route::get("/", function () {
		return redirect()->route("admin.page", "show");
	})->name("admin.index");
	Route::get("/exit", "Auth@exit")->name("admin.exit");
	Route::match(["get", "post"], "/settings", "Settings")->name("admin.settings");

	$urlType = "{action}/{parent?}/{id?}/{record?}/";

	Route::match(['get', 'post'], "/user/$urlType", "User")->name('admin.user');
	Route::match(['get', 'post'], "/page/$urlType", "Page")->name('admin.page');
	Route::match(['get', 'post'], "/catalog/$urlType", "Catalog")->name('admin.catalog');
	Route::match(['get', 'post'], "/catalog_items/$urlType", "CatalogItems")->name('admin.catalog_items');
	Route::match(['get', 'post'], "/user_admin/$urlType", "UserAdmin")->name('admin.user_admin');
	Route::match(["get", "post"], "/slider/$urlType", "Slider")->name("admin.slider");
	Route::match(["get", "post"], "/delivery/$urlType", "Delivery")->name("admin.delivery");
	Route::match(["get", "post"], "/payment/$urlType", "Payment")->name("admin.payment");

	Route::match(['post'], "/system/image/size", "\\BeetleCore\\Controllers\\Image@size");
	Route::match(['post'], "/system/image/load", "\\BeetleCore\\Controllers\\Image@load");
	Route::match(['post'], "/system/relation/form/{model}", "\\BeetleCore\\Controllers\\Relation@form");
	Route::match(['post'], "/system/relation/table/{model}", "\\BeetleCore\\Controllers\\Relation@table");
    Route::match(['get'], "/system/back", "\\BeetleCore\\Controllers\\Back")->name("admin.back");;
});


Route::get('/', function () {
	return view('welcome');
});
