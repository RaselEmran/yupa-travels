<?php

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
Route::get('/s',function(){
// 	\Artisan::call('migrate:fresh');
// 	\Artisan::call('db:seed');
	\Artisan::call('storage:link');
	echo 'done';
});
Route::get('/admin', function () {
	return redirect('/admin/login');
});

// Auth::routes();
$this->get('/admin/login', 'AdminAuth\LoginController@showLoginForm')->name('admin.login');
$this->post('admin/login', 'AdminAuth\LoginController@login')->name('admin.login');
$this->post('admin/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'admin', 'middleware' => ['auth:admin']], function () {
	//profile
	Route::get('/profile', 'DashboardController@profile')->name('profile');
	Route::post('/profile/update','DashboardController@profile_up')->name('profile.update');
	Route::post('/password','DashboardController@pass_change')->name('password');
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	//:::::::::::::::travelar::::::::::::::::::
	Route::get('/travelar', 'DashboardController@travelar')->name('travelar');
	//::::::::::::::destination::::::::::::::
	Route::get('/destination', 'DestinationController@index')->name('destination');
	Route::get('/destination/create', 'DestinationController@create')->name('destination.create');
	Route::post('/destination/store', 'DestinationController@store')->name('destination.store');
	Route::get('/destination/edit/{id}', 'DestinationController@edit')->name('destination.edit');
	Route::post('/destination/edit', 'DestinationController@update')->name('destination.update');
	Route::get('/destination/view/{id}', 'DestinationController@view')->name('destination.view');
	Route::get('/destination/delete/{id}', 'DestinationController@delete')->name('destination.delete');
	//packege
	Route::get('/packege', 'PackegeController@index')->name('packege');
	Route::get('/packege/create', 'PackegeController@create')->name('packege.create');
	//.....get
	Route::get('/one-way-itinary', 'PackegeController@one_way');
	Route::get('/two-way-itinary', 'PackegeController@two_way');
	Route::post('/packege/store', 'PackegeController@store')->name('packege.store');
	Route::get('/packege/edit/{id}', 'PackegeController@edit')->name('packege.edit');
	Route::post('/packege/edit', 'PackegeController@update')->name('packege.update');
	Route::post('/packege/edit/{id}', 'PackegeController@update')->name('packege.update');
	Route::get('/packege/view/{id}', 'PackegeController@view')->name('packege.view');
	Route::get('/packege/delete/{id}', 'PackegeController@delete')->name('packege.delete');
	/*:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
		::::::::::::::::::::::booking:::::::::::::::::::::::::::::::::::::::::::::

	*/
	Route::get('/packege/booking', 'BookingController@index')->name('packege.getbooking');
	Route::get('/packege/booking/details/{booking}/{packege}', 'BookingController@packege_details')->name('packege.booking.details');
	Route::post('/send-packege-mail', 'BookingController@send_packege_mail')->name('send-packege-mail');
	Route::post('/send-hotel-mail','BookingController@send_hotel_mail')->name('send-hotel-mail');

	/*::::::::::::::Wishlist:::::::::::::::::::::::::::
	:::::::::::::::::::::*/
	Route::get('wishlist/packege', 'BookingController@pack_wishlist')->name('wishlist.packege');

	/*::::::::::::Travelkit:::::::::::::::::::::::::::::::
	:::::*/
	Route::get('/travelkit', 'TravelkitController@index')->name('travelkit');
	Route::get('/travelkit/create', 'TravelkitController@create')->name('travelkit.create');
	Route::post('/travelkit/store', 'TravelkitController@store')->name('travelkit.store');
	Route::get('/travelkit/edit/{id}', 'TravelkitController@edit')->name('travelkit.edit');
	Route::post('/travelkit/edit', 'TravelkitController@update')->name('travelkit.update');
	Route::get('/travelkit/delete/{id}', 'TravelkitController@delete')->name('travelkit.delete');
	Route::get('/travelkit/order-kit', 'TravelkitController@order_kit')->name('order-kit');
	Route::get('/kitsorder/view/{id}', 'TravelkitController@order_details')->name('kitsorder.view');
	/*:::::::::::::::News:::::::::::::::::::::::::::::::::::
	::::::::::::::::::::::::::::::::::::*/
	Route::get('news/category', 'NewsController@category')->name('news.category');
	Route::get('news/category/create', 'NewsController@category_create')->name('news.category.create');
	Route::post('news/category/create', 'NewsController@category_store')->name('news.category.store');
	Route::get('/news/category/edit/{id}', 'NewsController@category_edit')->name('news.category.edit');
	Route::post('/news/category/edit', 'NewsController@category_update')->name('news.category.update');
	Route::get('/news/category/delete/{id}', 'NewsController@category_delete')->name('news.category.delete');
	Route::get('/news/blog', 'NewsController@news')->name('news.blog');
	Route::get('/news/blog/create', 'NewsController@news_create')->name('news.blog.create');
	Route::post('/news/blog/create', 'NewsController@news_store')->name('news.blog.store');
	Route::get('/news/blog/edit/{id}', 'NewsController@news_edit')->name('news.blog.edit');
	Route::post('/news/blog/edit', 'NewsController@news_update')->name('news.blog.upadte');
	Route::get('/news/blog/delete/{id}', 'NewsController@news_delete')->name('news.blog.delete');

	/*:::::::::::::::::::::::Pages::::::::::::::::::::::::::::*/
	Route::get('/pages', 'PageController@index')->name('pages');
	Route::post('/pages/update', 'PageController@store')->name('page.update');

	/*::::::::::::::::::::payment:::::::::::::::::::::::::*/
	Route::get('/payemnt/packege','PaymentController@index')->name('payment.packege');
	Route::get('/payemnt/hotel','PaymentController@hotel')->name('payment.hotel');

	/*:::::::::::::::::::::team member::::::::::::::::::::*/
	Route::get('/team-member','TeamMemberController@index')->name('team-member');
	Route::get('/team-member/create','TeamMemberController@create')->name('team-member.create');
	Route::post('/team-member/create','TeamMemberController@store')->name('team-member.store');
	Route::get('/team-member/edit/{id}','TeamMemberController@edit')->name('team-member.edit');
	Route::post('/team-member/update','TeamMemberController@upadte')->name('team-member.update');
	Route::get('/team-member/delete/{id}','TeamMemberController@delete')->name('team-member.delete');
	//api set
	Route::get('/setting/api','SettingController@index')->name('api');
	Route::post('/setting/api','SettingController@api_store')->name('api.store');

/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 *:::::::::::::::::::::::::::::::::::::Route From Tariqul Islam ::::::::::::::::::::::::::::::::::::::::::::::
 *::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 */
	Route::get('/amenity', 'AmenityController@index')->name('amenity');
	Route::get('/amenity/create', 'AmenityController@create')->name('amenity.create');
	Route::post('/amenity/store', 'AmenityController@store')->name('amenity.store');
	Route::get('/amenity/edit/{id}', 'AmenityController@edit')->name('amenity.edit');
	Route::post('/amenity/edit', 'AmenityController@update')->name('amenity.update');
	Route::get('/amenity/view/{id}', 'AmenityController@view')->name('amenity.view');
	Route::get('/amenity/delete/{id}', 'AmenityController@delete')->name('amenity.delete');

	//07-07-19

	Route::get('/hotel', 'HotelController@index')->name('hotel');
	Route::get('/hotel/create', 'HotelController@create')->name('hotel.create');
	Route::post('/hotel/store', 'HotelController@store')->name('hotel.store');
	Route::get('/hotel/edit/{id}', 'HotelController@edit')->name('hotel.edit');
	Route::post('/hotel/edit', 'HotelController@update')->name('hotel.update');
	Route::get('/hotel/view/{id}', 'HotelController@view')->name('hotel.view');
	Route::get('/hotel/delete/{id}', 'HotelController@delete')->name('hotel.delete');

/* ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 * :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 * ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 */

	Route::get('booking/hotel', 'BookingController@hotel')->name('hotel.booking');
	Route::get('booking/hotel/details/{booking}', 'BookingController@hotel_details')->name('hotel.booking_details');

	/*::::::::::::::::::::::::::::::::host:::::::::::*/
	Route::get('host','DashboardController@host')->name('host');
	Route::get('host/approve/{id}','DashboardController@host_apply')->name('host.approve');
	Route::get('host/reject/{id}','DashboardController@host_reject')->name('host.reject');
});

// Route::get('/home', 'HomeController@index')->name('home');

$this->post('/login', 'Auth\LoginController@login')->name('login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');
$this->post('register', 'Auth\RegisterController@register')->name('register');

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/news', 'HomeController@news')->name('home.news');
Route::get('/news-details/{slug}/{id}', 'HomeController@news_details')->name('news-details');
Route::get('/about-us', 'HomeController@about_us')->name('about-us');
Route::get('/sign-up', 'HomeController@sign_up')->middleware(['guest'])->name('sign-up');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');
Route::post('/dashboard', 'DashboardController@profile_update')->name('dashboard.store')->middleware('auth');

Route::post('/change-pass', 'DashboardController@change_pass')->name('change-pass')->middleware('auth');
Route::post('/profile-pic','DashboardController@profile_pic')->name('profile_pic')->middleware('auth');

Route::get('/login', 'HomeController@login')->middleware(['guest'])->name('login');

Route::get('facebook', function () {
	return view('home');
});
Route::get('auth/{service}', 'Auth\FacebookController@redirectToFacebook');
Route::get('auth/{service}/callback', 'Auth\FacebookController@handleFacebookCallback');

//:::::::::::::booking:::::::::::::::

Route::get('/explore', 'ExperienceBookingController@index')->name('explore');
Route::get('/experience-booking/{id}', 'ExperienceBookingController@experience_booking')->name('experience-booking');
Route::get('/booking-result', 'ExperienceBookingController@booking_result')->name('booking-result')->middleware('auth');
Route::post('/itinaray-up', 'ExperienceBookingController@itinaray_up')->name('itinaray-up')->middleware('auth');
Route::get('/user/wishlist', 'ExperienceBookingController@wishliststore')->name('user.wishlist')->middleware('auth');
Route::get('/wishlist', 'ExperienceBookingController@wishlist')->name('wishlist')->middleware('auth');
Route::get('/experience-booking-details/{id}', 'ExperienceBookingController@packege_book_details')->name('experience-booking-details')->middleware('auth');
Route::get('/user-travel-kit', 'DashboardController@user_kit')->name('user-travel-kit')->middleware('auth');
Route::get('/user-kit-details/{id}', 'DashboardController@user_kit_details')->name('user-kit-details')->middleware('auth');
Route::get('/apply-host','Hostcontroller@index')->name('host')->middleware('auth');
Route::post('/apply-host','Hostcontroller@store')->name('host.store')->middleware('auth');
Route::get('/add-hotel','Hostcontroller@hotel_create')->name('add-hotel')->middleware('auth');
Route::post('/add-hotel','Hostcontroller@hotel_store')->name('hotel.store')->middleware('auth');
Route::get('/hotel-list','Hostcontroller@hotel_list')->name('hotel-list')->middleware('auth');
Route::get('/hotel-edit/{id}','Hostcontroller@hotel_edit')->name('hotel.edit')->middleware('auth');
Route::post('/hotel-edit','Hostcontroller@hotel_update')->name('hotel.update')->middleware('auth');

/*::::::::::::::::::::::travelkit:::::::::::::::::::::::
::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
Route::get('/travelkit', 'ExperienceBookingController@travelkit')->name('travelkit');
Route::post('/travelkit-book', 'ExperienceBookingController@travelkit_book')->name('travelkit-book')->middleware('auth');

Route::get('stay/{id}', 'HotelController@show')->name('hotel.show');

// 10-07-2019
Route::get('/stays', 'HotelController@index')->name('hotel.index');
Route::post('/stay/{id}', 'HotelController@booking')->name('hotel.booking')->middleware('auth');

//13-07-2019

Route::get('/hotel-booking-details/{id}', 'HotelController@book_details')->name('hotel.booking_details')->middleware('auth');
Route::get('/hotel-booking-list', 'HotelController@booking_list')->name('hotel.booking_list')->middleware('auth');

Route::get('/destination/{id}', 'HomeController@destination_show')->name('destination.show');
Route::get('/destination-list', 'HomeController@destination_list')->name('destination.index');


//::::::::::::::::checkout:::::::::::::::::::::::

Route::get('/packege-chackeout','CheckoutController@index')->name('packege-chackeout')->middleware('auth');
Route::post('/post-pack-checkout','CheckoutController@post_pack_checkout')->name('post_pack_checkout')->middleware('auth');

Route::get('/hotel-chackeout','CheckoutController@hotel')->name('hotel-chackeout')->middleware('auth');
Route::post('/post-hotel-checkout','CheckoutController@post_hotel_checkout')->name('post_hotel_checkout')->middleware('auth');

Route::get('/packege-chackeout', 'CheckoutController@index')->name('packege-chackeout');

Route::post('hotel/review/store', 'HotelReviewController@store')->name('hotel.review.store')->middleware('auth');
Route::post('package/review/store', 'PackageReviewController@store')->name('package.review.store')->middleware('auth');

Route::get('search', 'DashboardController@search')->name('search');

