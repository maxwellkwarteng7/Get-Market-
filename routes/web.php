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

// Home controller
Route::get('/','HomeController@index');
Route::get('/redirect','HomeController@redirect');
Route::get('/view_product/{id}','HomeController@view_product');
Route::get('/view_cart','HomeController@view_cart');
Route::get('/delete_cart/{id}','HomeController@delete_cart');
Route::get('/cash_on_delivery','HomeController@cash_on_delivery');
Route::get('/all_women_products','HomeController@all_women_products');
Route::get('/all_men','HomeController@all_men');
Route::get('/all_kids','HomeController@all_kids');
Route::get('/about_us','HomeController@about_us');
Route::get('/all_products','HomeController@all_products');
Route::get('/contact_us','HomeController@contact_us');



 // Payment with card
 Route::get('/card_payment/{total}','HomeController@card_payment');
Route::post('/stripe_payment/{total}','HomeController@stripePost')->name('stripe.post');

// Admin controller
Route::get('/add_product','AdminController@add_product');
Route::get('/add_category','AdminController@add_category');
Route::post('/save_category','AdminController@save_category');
Route::get('/delete_category/{id}','AdminController@delete_category');
Route::post('/save_product','AdminController@save_product');
Route::get('/view_products','AdminController@view_products');
Route::get('/delete_product/{id}','AdminController@delete_product');
Route::get('/edit_product/{id}','AdminController@edit_product');
Route::post('/edited_product/{id}','AdminController@edited_product');
Route::get('/add_images/{id}','AdminController@add_images');
Route::post('/save_extra_image/{id}','AdminController@extra_image');
Route::post('/add_to_cart/{id}','AdminController@add_to_cart');
Route::get('/view_extra_images/{id}','AdminController@view_images');
Route::get('/delete_extra_image/{id}','AdminController@delete_extra_image');
Route::get('/orders','AdminController@orders');
Route::get('/delivered/{id}','AdminController@delivered');
Route::post('/subscribers','AdminController@subscribers');
Route::post('/contacts','AdminController@contacts');
Route::get('/all_subscribers','AdminController@all_subscribers');
Route::get('/all_contacts','AdminController@all_contacts');
Route::get('/view_contact/{id}','AdminController@view_contact');
Route::get('/delete_contact/{id}','AdminController@delete_contact');
Route::get('/all_users','AdminController@all_users');
Route::get('/add_about','AdminController@add_about');
Route::post('/save_about','AdminController@save_about');
Route::get('/delete_about/{id}','AdminController@delete_about');
Route::get('/view_about/{id}','AdminController@view_about');
Route::get('/edit_about/{id}','AdminController@edit_about');
Route::post('/save_edited_about/{id}','AdminController@save_edited_about');

// sending subscriber and email
Route::get('/mail_subscriber/{id}','AdminController@mail_subscriber');
Route::post('/send_subscriber_mail/{id}','AdminController@send_subscriber_mail');
Route::get('/delete_subscriber/{id}','AdminController@delete_subscriber');
Route::get('/delete_user/{id}','AdminController@delete_user');

// sending email to contact
Route::get('/mail_contact/{id}','AdminController@mail_contact');
Route::post('/send_contact_mail/{id}','AdminController@send_contact_mail');


// todo
Route::post('/save_todo','AdminController@save_todo');
Route::get('/delete_todo/{id}','AdminController@delete_todo');

// search routes
Route::post('/search_products','AdminController@search_products');
Route::post('/search_contacts','AdminController@search_contacts');
Route::post('/search_subscribers','AdminController@search_subscribers');
Route::post('/search_users','AdminController@search_users');
Route::post('/search_orders','AdminController@search_orders');


// Home searches
Route::get('/search_home_products','HomeController@search_home_products');
Route::get('/search_men_products','HomeController@search_men_products');

Route::get('/search_women_products','HomeController@search_women_products');

Route::get('/search_kids_products','HomeController@search_kids_products');

// rating product
Route::post('/rate_product/{id}','HomeController@rate_product');





Route::post('/send_email_notification/{id}','AdminController@send_email_notification');

Route::get('/send_email/{id}','AdminController@send_email');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
