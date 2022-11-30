<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InqueryController;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {return view('welcome');});
Route::get('single/{s_slug}', 'Frontend\FrontendController@single');
Route::get('/newbooking', function () {return view('newbooking');});
Route::get('/companies', function () {return view('companies');});
Route::get('/new-booking', function () {return view('fontend.newbooking');});
Route::get('category', 'Admin\CategoriController@allcat');
Route::get('ser/{id}', 'Frontend\FrontendController@services');
Route::get('category/{cat_slug}', 'Frontend\FrontendController@category');
// Route::get('/category/{cat_name}', 'Admin\CategoriController@allcat');
Route::get('/contact', function () {return view('contact');});
Route::get('/vendor', function () {return view('auth/vendor');});
Route::get('/about', 'Superadmin\SettingsController@showabout');
Route::get('/cart/{service}','CartController@AddToCart')->name('cart.add')->middleware('auth');
Route::get('/cart/','CartController@addtocart')->name('cart.index')->middleware('auth');
Route::get('/cart/delete/{itemId}','CartController@deleteItem')->name('cart.delete')->middleware('auth');
Route::get('/cart/update/{itemId}','CartController@updateItem')->name('cart.update')->middleware('auth');
// Route::get('/checkout', function () {return view('checkout');});
Route::get('checkout','CartController@checkout')->name('checkout')->middleware('auth');
// Route::post('store','CartController@store')->name('store')->middleware('auth');

Route::post('autocomplete/fetch', 'AutocompleteController@fetch')->name('autocomplete.fetch');
Route::post('autocomplete/fetchservice', 'AutocompleteController@fetch_service')->name('autocomplete.fetchservice');

Route::resource('orders', 'OrderController')->middleware('auth');

// Inquery
Route::post('new-inquery', 'InqueryController@new_inquery');

Auth::routes();

// POS

Route::post('post-pos', 'Admin\POSController@pos');


// User
// New Shop
Route::get('viewshop', 'ShopController@index');
Route::get('edit-shop/{company_name}', 'ShopController@editshop');
Route::post('edit-shop/{id}', 'ShopController@updateshop');
Route::post('newshop', 'ShopController@new_shop');
// Route::post('/newshop', 'ShopController@editshop');


Route::get('profile',      'UserController@profile');
Route::post('update-ava','UserController@update_avatar');

// Edit
Route::get('edit/{name}',  'Frontend\UserController@edit');
Route::post('edit/{id}',  'Frontend\UserController@save_general');

// Security
Route::get('security/{name}',  'Frontend\UserController@security');
Route::post('security',  'Frontend\UserController@ChangePassword');

// Device
Route::get('device', 'Frontend\UserController@device');



// Statuses
Route::get('changestatus', 'UserController@status')->name('changestatus');
Route::get('shop_status', 'UserController@shop_status')->name('shop_status');
Route::get('servicestatus', 'UserController@servicestatus')->name('servicestatus');



// Super Admin
// Route::get('superadmin', 'Superadmin\UserController@superadmin')->name('superadmin');
Route::get('superadmin/dashboard', 'Superadmin\UserController@admin_dash')->name('superadmin.dashboard');;
Route::get('superadmin/companies', 'Superadmin\UserController@company');

// Roles
Route::get('roles', 'Superadmin\UserController@roles')->name('roles');

Route::namespace('Superadmin')->prefix('superadmin')->name('superadmin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UserController',['except' => ['show','create','store']]);
});

// Slides
Route::get('superadmin/slide', 'Superadmin\SettingsController@slide_view');
Route::post('superadmin/slide/add', 'Superadmin\SettingsController@slide_add');
Route::get('superadmin/slide/edit/{slide_token}', 'Superadmin\SettingsController@slide_edit');
Route::post('superadmin/slide/update/{id}', 'Superadmin\SettingsController@slide_update');
Route::post('superadmin/slide/deleteslide/{id}', 'Superadmin\SettingsController@deleteslide');

// Locations
Route::get('superadmin/service/locations', 'Superadmin\UserController@locations');
Route::post('superadmin/service/add-location', 'Superadmin\UserController@add_location');
Route::get('superadmin/service/editlocation/{id}', 'Superadmin\UserController@get_edit');
Route::post('superadmin/service/edit_location/{id}', 'Superadmin\UserController@edit_location');
Route::post('superadmin/location/delete/{id}', 'Superadmin\UserController@delete_location');

// Company
Route::get('superadmin/company', 'Superadmin\UserController@company');
Route::post('superadmin/company', 'Superadmin\UserController@postcompany');
Route::post('superadmin/company/delete/{id}', 'Superadmin\UserController@del_company');


// Categories
Route::get('superadmin/categories', 'Superadmin\UserController@view');
Route::get('superadmin/categories/edit/{cat_slug}', 'Superadmin\UserController@edit_cate');
Route::post('superadmin/categories/post', 'Superadmin\UserController@addcat');
Route::post('delete/{id}', 'Superadmin\UserController@cat_del');
Route::post('categories/update/{id}', 'Superadmin\UserController@edit_update');

// Coupons
Route::get('superadmin/coupons', 'Superadmin\SettingsController@view_cup');
Route::post('superadmin/coupons/add', 'Superadmin\SettingsController@add_coupon');
Route::post('superadmin/coupons/update/{id}', 'Superadmin\SettingsController@update_coupon');
Route::get('superadmin/coupon/edit/{coupon_code}', 'Superadmin\SettingsController@edit_coupon');
Route::post('superadmin/coupon/delete/{id}', 'Superadmin\SettingsController@delete_coupon');

// Settings
Route::get('superadmin/service', 'Superadmin\SiteController@superadminsettings');
Route::post('superadmin/logo', 'Superadmin\SettingsController@site_logo');

Route::post('superadmin/service/general/{id}', 'Superadmin\SettingsController@general');
Route::post('superadmin/service/currency', 'Superadmin\SettingsController@currency');
Route::post('superadmin/service/currency/delete/{id}', 'Superadmin\SettingsController@delete_currency');
Route::post('superadmin/service/seo', 'Superadmin\SettingsController@seo');
Route::get('superadmin/service/seo/edit/{meta_author}', 'Superadmin\SettingsController@edit_seo');
Route::post('superadmin/service/seo/update/{id}', 'Superadmin\SettingsController@update_seo');
Route::post('superadmin/service/seo/delete/{id}', 'Superadmin\SettingsController@delete_seo');
Route::post('superadmin/service/social', 'Superadmin\SettingsController@social');
Route::post('superadmin/service/social/delete/{id}', 'Superadmin\SettingsController@delete_social');
Route::post('superadmin/service/footer', 'Superadmin\SettingsController@footer');
Route::post('superadmin/service/footer/update/{id}', 'Superadmin\SettingsController@update_footer');
Route::post('superadmin/service/about/{id}', 'Superadmin\SettingsController@about');
Route::post('superadmin/service/privacy', 'Superadmin\SettingsController@privacy');
Route::post('superadmin/service/terms', 'Superadmin\SettingsController@terms');
Route::get('superadmin/service/terms/edit/{term_title}', 'Superadmin\SettingsController@edit_terms');
Route::post('superadmin/service/terms/update/{id}', 'Superadmin\SettingsController@update_terms');
Route::post('superadmin/service/terms/delete/{id}', 'Superadmin\SettingsController@delete_terms');


// End SuperAdmin


// author
Route::get('author', 'Author\AuthorController@index')->name('author');


// Admin

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UserController',['except' => ['show','create','store']]);
});

// Dashboard
Route::get('admin/dashboard', 'Dashboard\DashboardController@admin_dash')->name('admin');


// Admin_Services
Route::get('singleser/{id}', 'Admin\CategoriController@searchService');



Route::get('admin/service/view', 'Admin\CategoriController@admin_view');
Route::get('admin/service/edit/{s_name}', 'Admin\CategoriController@admin_edit');
Route::post('admin/service/add', 'Admin\CategoriController@service');
Route::post('admin/service/update/{id}', 'Admin\CategoriController@update_service');
Route::post('admin/service/delete/{id}', 'Admin\CategoriController@delete_service');

// POS
Route::get('admin/pos/view', 'Admin\POSController@index');
Route::get('add/{service}', 'Admin\POSController@addToCart')->name('admin.add')->middleware('auth');
Route::get('admin/delete/{itemId}','Admin\POSController@deleteItem')->middleware('auth');
Route::get('admin/update/{itemId}','Admin\POSController@updateItem')->middleware('auth');
Route::get('cart/{service}','CartController@AddToCart')->name('cart.add')->middleware('auth');
Route::get('cart/','CartController@addtocart')->name('cart.index')->middleware('auth');
Route::get('cart/delete/{itemId}','CartController@deleteItem')->name('cart.delete')->middleware('auth');

// Employee
Route::get('admin/employee', 'Admin\EmployeeController@employee');
Route::post('admin/addemployee', 'Admin\EmployeeController@addemployee');

// Add Product
Route::get('admin/viewproduct', 'Admin\ProductController@viewproducts');
Route::post('admin/addproduct', 'Admin\ProductController@addproduct');
Route::post('admin/updateproduct', 'Admin\ProductController@updateproduct');

// Booking booking
Route::get('admin/booking', 'Admin\ServiceController@viewbookings');
Route::get('admin/booking/invoice/{order_number}', 'Admin\ServiceController@order_number');
Route::get('admin/inquery', 'InqueryController@view_inqery');
Route::get('admin/inquery', 'InqueryController@view_inqery');
// Admin Settings
  // Add Services

  Route::get('admin/service', 'settings\ServiceController@index');
  Route::post('admin/service/general/{id}', 'settings\ServiceController@updatesite');
  Route::post('admin/service/currency', 'settings\ServiceController@currency');
  Route::post('admin/service/seo', 'settings\ServiceController@seo');
  Route::post('admin/service/social', 'settings\ServiceController@social');
  Route::post('admin/service/footer', 'settings\ServiceController@footer');
  Route::post('admin/service/about', 'settings\ServiceController@about');
  Route::post('admin/service/privacy', 'settings\ServiceController@privacy');



