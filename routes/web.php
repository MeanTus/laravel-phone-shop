<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;
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
// Front-end
Route::get('/', 'PageController@index');

// Product
Route::get('/product-type', 'PageController@show');
Route::get('/product-detail/{id}', 'PageController@detail');
Route::post('/add-cmt','PageController@rating')->middleware('auth');

// About-Store 
Route::get('/about', function () {
    return view('user_temp.about');
});
Route::get('/store', function () {
    return view('user_temp.store');
});

//Contact
Route::get('/contact', function () {
    return view('user_temp.contact');
});
Route::post('/send-mail','PageController@send_mail');

//Wishlist
Route::get('/wishlist-detail', 'CartController@wishlist_detail')->middleware('auth');
Route::post('/add-wish', 'CartController@save_wish')->middleware('auth');
Route::post('/add-list','CartController@wish_list')->middleware('auth');
Route::get('/delete-list/{pro_id}','CartController@delete_list')->middleware('auth');

// Checkout
Route::get('/checkout', function () {
    return view('user_temp.checkout');
})->middleware('auth');
Route::post('/save-checkout', 'PageController@save_checkout')->middleware('auth');

//Login
Route::get('/login', function () {
    return view('user_temp.login'); 
});
Route::post('/loginuser','CheckLogin@checkAdmin');

// Cart
Route::get('/cart', function () {
    return view('user_temp.cart');
});
Route::post('/add-cart','CartController@save_cart');
Route::post('/add-multi','CartController@cart_multi');
Route::get('/delete-cart/{id}', 'CartController@delete_cart');
Route::post('/add-cart/{id}', 'CartController@add_cart');
Route::post('/remove-cart/{id}', 'CartController@remove_cart');

// Search
Route::get('/search','PageController@search');

// Info
Route::get('/info','UserController@information')->middleware('auth');
Route::get('/cancel/{id}','UserController@cancel_order')->middleware('auth');
Route::post('/save-user/{id}','UserController@update_user')->middleware('auth');

//--------------------------------------------------------------------

// Back-end
// Route::get('/admin', function () {
//     return redirect('login');
// });
Route::get('/admin', 'AdminController@index')->middleware('admin');

// Account
Route::get('/account', 'UserController@all_account')->middleware('admin');

Route::get('/add-account', function(){
    return view('admin_temp.add_account');
})->middleware('admin');
Route::post('/save-account','UserController@save_account')->middleware('admin');

Route::get('/edit-account/{id}','UserController@edit_account')->middleware('admin');
Route::post('/update-account/{id}','UserController@update_account')->middleware('admin');

Route::get('/delete-account/{id}','UserController@delete_account')->middleware('admin');

Route::get('/active-account/{id}','UserController@active_account')->middleware('admin');
Route::get('/unactive-account/{id}','UserController@unactive_account')->middleware('admin');

// Mail
Route::get('/mail','AdminController@email')->middleware('admin');
Route::get('/active-mail/{id}','AdminController@active_mail')->middleware('admin');
Route::get('/delete-mail/{id}','AdminController@delete_mail')->middleware('admin');

// Product
Route::get('/product', 'ProductController@all_product')->middleware('admin');

Route::get('/add-product','ProductController@add_product')->middleware('admin');
Route::post('/save-product','ProductController@save_product')->middleware('admin');

Route::get('/edit-product/{id}','ProductController@edit_product')->middleware('admin');
Route::post('/update-product/{id}','ProductController@update_product')->middleware('admin');

Route::get('/delete-product/{id}','ProductController@delete_product')->middleware('admin');

// Wishlist - Comment - Mail
Route::get('/wishlist','AdminController@wish_list')->middleware('admin');
Route::get('/active-cmt/{id}','AdminController@active_cmt')->middleware('admin');
Route::get('/delete-cmt/{id}','AdminController@delete_cmt')->middleware('admin');
Route::get('/comment','AdminController@comment')->middleware('admin');

// Order
Route::get('/order','AdminController@user_order');
Route::get('/active-order/{id}','AdminController@active_order');
Route::get('/confirm-order/{id}','AdminController@confirm_order');
Route::get('/delete-order/{id}','AdminController@delete_order');

// Warehouse
Route::get('/warehouse', 'ProductController@all_warehouse')->middleware('admin');
Route::post('/save-warehouse/{id}', 'ProductController@save_warehouse')->middleware('admin');

// Product_Brand
Route::get('/brand-cat', 'ProductController@all_brand')->middleware('admin');

Route::get('/add-brand', function () {
    return view('admin_temp.add_brand');
})->middleware('admin');
Route::post('/save-brand','ProductController@add_brand')->middleware('admin');

Route::get('/edit-brand/{id}','ProductController@edit_brand')->middleware('admin');
Route::post('/update-brand/{id}','ProductController@update_brand')->middleware('admin');

Route::get('/delete-brand/{id}','ProductController@delete_brand')->middleware('admin');

Route::get('/active-brand/{id}','ProductController@active_brand')->middleware('admin');
Route::get('/unactive-brand/{id}','ProductController@unactive_brand')->middleware('admin');

//Product_Category

Route::get('/add-cat', function () {
    return view('admin_temp.add_cat');
})->middleware('admin');
Route::post('/save-cat','ProductController@add_cat')->middleware('admin');

Route::get('/edit-cat/{id}','ProductController@edit_cat')->middleware('admin');
Route::post('/update-cat/{id}','ProductController@update_cat')->middleware('admin');

Route::get('/delete-cat/{id}','ProductController@delete_cat')->middleware('admin');

Route::get('/active-cat/{id}','ProductController@active_cat')->middleware('admin');
Route::get('/unactive-cat/{id}','ProductController@unactive_cat')->middleware('admin');

//Slider
Route::get('/slide', 'AdminController@all_slide')->middleware('admin');
Route::post('/add-slide','AdminController@add_slide')->middleware('admin');
Route::get('/delete-slide/{id}','AdminController@delete_slide')->middleware('admin');

Route::get('/active-slide/{id}','AdminController@active_slide')->middleware('admin');
Route::get('/unactive-slide/{id}','AdminController@unactive_slide')->middleware('admin');

// Search
Route::get('/acc-search','AdminController@acc_search');
Route::get('/pro-search','AdminController@pro_search');


Auth::routes();

