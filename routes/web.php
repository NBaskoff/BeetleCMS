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

Route::group(["prefix" => "admin", "middleware" => ["beetle-authenticate"]], function () {
    Route::get("/", function () {
        return redirect()->route("admin.page", "show");
    })->name("admin.index");
    Route::get("/exit", "App\BeetleCMS\Controllers\Auth@exit")->name("admin.exit");
    Route::match(["get", "post"], "/settings", App\BeetleCMS\Controllers\Settings::class)->name("admin.settings");

    $urlType = "{action}/{parent?}/{parent_id?}/{record_id?}/";

    Route::match(['get', 'post'], "/user/$urlType", App\BeetleCMS\Controllers\User::class)->name('admin.user');
    Route::match(['get', 'post'], "/page/$urlType", App\BeetleCMS\Controllers\Page::class)->name('admin.page');
    Route::match(['get', 'post'], "/catalog/$urlType", App\BeetleCMS\Controllers\Catalog::class)->name('admin.catalog');
    Route::match(['get', 'post'], "/catalog_items/$urlType", App\BeetleCMS\Controllers\CatalogItems::class)->name('admin.catalog_items');
    Route::match(['get', 'post'], "/user_admin/$urlType", App\BeetleCMS\Controllers\UserAdmin::class)->name('admin.user_admin');
    Route::match(["get", "post"], "/slider/$urlType", App\BeetleCMS\Controllers\Slider::class)->name("admin.slider");
    Route::match(["get", "post"], "/delivery/$urlType", App\BeetleCMS\Controllers\Delivery::class)->name("admin.delivery");
    Route::match(["get", "post"], "/payment/$urlType", App\BeetleCMS\Controllers\Payment::class)->name("admin.payment");


    Route::match(['post'], "/system/form/load", "\\BeetleCore\\Controllers\\Form@load");
    Route::match(['post'], "/system/form/save", "\\BeetleCore\\Controllers\\Form@save");

    Route::match(['post'], "/system/image/size", "\\BeetleCore\\Controllers\\Image@size");
    Route::match(['post'], "/system/image/load", "\\BeetleCore\\Controllers\\Image@load");

    Route::match(["get", "post"], "/system/relation/form", "\\BeetleCore\\Controllers\\Relation@form");
    Route::match(["get", "post"], "/system/relation/table", "\\BeetleCore\\Controllers\\Relation@table");
});

Route::get('/', function () {
    return view('welcome');
});
