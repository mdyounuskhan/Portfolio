<?php


//Frontend Routes..
Route::get('/', 'FrontendController@index');
//Product
Route::get('/product/details/{id}', 'FrontendController@productdetails');
//Category
Route::get('/category/product/{id}', 'FrontendController@categoryproduct');
//Contact
Route::get('/contact', 'FrontendController@contact');
Route::post('/contact/insert', 'FrontendController@contactinsert');
//cart Routes..
Route::get('/add/to/cart/{id}', 'CartController@addtocart');
Route::get('/cart', 'CartController@cart');
Route::get('/cart/{cupon_code}', 'CartController@cart');
Route::get('/delete/from/cart/{cart_id}', 'CartController@deletefromcart');
Route::get('/clear/cart', 'CartController@clearcart');
Route::post('/update/cart', 'CartController@updatecart');

// checkout
Route::post('/checkout/proceed', 'CheckoutController@Checkout');

//Customer Login
Route::post('/user_login','CustomerController@login');
Route::post('/register_user','CustomerController@register');

//Order..
Route::post('/order/success','CustomerController@order');






//Backend Routes..
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Product
route::get('/add/product', 'ProductController@index')->name('addproduct');
route::post('/add/product/insert', 'ProductController@productinsert');
route::get('/add/product/list', 'ProductController@addedpoductlist')->name('addproductlist');
route::get('/delete/product/{id}', 'ProductController@deleteproduct');
route::get('/edit/product/{id}', 'ProductController@editproduct');
route::get('/product/profile/{id}', 'ProductController@productprofile');
route::post('/edit/product/insert', 'ProductController@editproductinsert');
route::get('/restore/product/{id}', 'ProductController@restoreproduct');
route::get('/Permanently/delete/product/{id}', 'ProductController@Permanentlydeleteproduct');

//Category
route::get('/add/product/category', 'CategoryController@addproductcategory')->name('addproductcategory');
route::post('/add/category/insert', 'CategoryController@addcategoryinsert');
route::get('/add/category/list', 'CategoryController@addcategorylist')->name('addcategorylist');
route::get('/change/menu/status/{id}', 'CategoryController@changemenustatus');

//Contact
route::get('/view/contact/message','HomeController@viewcontactmessage');
route::get('/view/contact/{id}','HomeController@viewcontact');
//Cupon
route::get('/view-cupon','CuponController@viewcupon')->name('viewcupon');
route::get('/add-cupon','CuponController@addcupon')->name('addcupon');
route::post('/cupon/insert','CuponController@cuponinsert');

