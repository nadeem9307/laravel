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

Route::get('/test', function () {
    echo phpinfo();
});
Route::get('/', 'FrontController@index');
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'FrontController@switchLang']);

Auth::routes();

Route::get('dashboard', 'HomeController@index')->name('dashboard')->middleware('auth');

Route::group(['middleware' => 'Admin'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
});

Route::group(['middleware' => 'Admin'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::get('reviews', ['as' => 'user-reviews', 'uses' => 'UserController@Reviews']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	Route::resource('category', 'CategoriesController');
	Route::resource('menus', 'MenusController');
	Route::resource('ingredents', 'IngredentController');
	Route::resource('plans', 'PlanController');
	Route::get('remove-image','MenusController@RemoveImageIndex');
	Route::resource('nutricians', 'NutricianFactsController');
	Route::resource('deliverylocation', 'DeliveryLocationController');
	Route::resource('orders', 'OrderController');
	Route::post('orders','OrderController@GetOrderByDate')->name('orders');
	Route::get('change_order_status','OrderController@ChangeOrderStatus');
	Route::get('change_payment_status','OrderController@ChangePaymentStatus');
	Route::get('donload_csv','OrderController@DownloadCsvData')->name('donload_csv');
	Route::get('donload_pdf','OrderController@DownloadDataPdf')->name('donload_pdf');
	Route::resource('giftcards', 'GiftCardsController');
	Route::resource('deliverydays', 'DeliveryDaysController');
	Route::resource('contents', 'ContentController');
	Route::resource('settings', 'SettingController');
	Route::get('remove-content-thumb','ContentController@RemoveImageIndex');
	Route::resource('faqs', 'FaqController');
	Route::resource('experts', 'ExpertController');
	Route::get('remove-expert-thumb','ExpertController@RemoveImageIndex');
	Route::resource('addcoupon', 'CouponAddController');
	Route::resource('assign-coupon-to-user', 'CouponAssigningController');
	Route::get('coupon_expiry', 'CouponAssigningController@GetCouponExpiry');
	Route::get('send_coupon_email', 'CouponAssigningController@SendEmailCoupon');
	

});
//Route::get('model', 'FrontController@index');
Route::get('join-now','FrontController@join')->name('join-now');
Route::post('delivery','FrontController@validatezip');
Route::get('delivery_dates','FrontController@delivery_dates');
Route::post('choose-meal','FrontController@ChooseMeal')->name('choose-meal');
Route::get('customer-login','FrontController@Login')->name('customer-login');
Route::post('/postajaxmenu','FrontController@postmenu');
Route::post('login-action','FrontController@LoginAction')->name('login-action');
Route::get('index', 'FrontController@index')->name('index');
Route::get('meals', 'FrontController@PlansMenu')->name('meals');
Route::get('gift', 'FrontController@Gift')->name('gift');
Route::post('/postaddmenu','FrontController@postaddmenu');
Route::get('forgot-password', 'FrontController@ForgotPsw')->name('forgot-password');
Route::get('checkout','FrontController@NextForCheckout')->name('checkout');
//payment gateway started
Route::post('checkout/payment', 'StripePaymentController@stripe')->name('checkout/payment');
Route::post('thank-you', 'StripePaymentController@stripepost')->name('thank-you');
Route::post('stripe-gift', 'StripePaymentController@StripePostGift')->name('stripe-gift');
//payment gateway end
Route::post('/postajaxcategory','FrontController@postCategory');
Route::post('/postajaxmenumodal','FrontController@postmenumodal');
Route::post('/validateZipcode','FrontController@validateZipcode');
Route::get('/privacy-policy','FrontController@Privacy')->name('privacy-policy');
Route::get('/terms-and-conditions','FrontController@Terms')->name('terms-and-conditions');
Route::get('/about','FrontController@About')->name('about');
Route::get('/faq','FrontController@Faq')->name('faq');
Route::get('/contact','FrontController@Contact')->name('contact');
Route::post('contact-submit','FrontController@Contactsubmit')->name('contact-submit');
Route::post('/feedinstagram','FrontController@instagrammedia')->name('feedinstagram');
Route::get('/customer-logout','FrontController@CustomerLogout')->name('customer-logout');
Route::post('/ordermodalprofile','FrontController@OrderItemsmodal');
Route::post('forgot-pass-action','FrontController@ForgotPswAction')->name('forgot-pass-action');
Route::get('forgot-pass-link','FrontController@ForgotPswLink')->name('forgot-pass-link');
Route::post('/product_add','AddToCartController@AddToCart');
Route::post('/product_date_update','AddToCartController@ProductDateUpdate');
Route::post('/remove_item','AddToCartController@removeItem');
Route::get('gift-redeem', 'FrontController@RedeemGift')->name('gift-redeem');
Route::get('gift-purchase', 'FrontController@PurchaseGift')->name('gift-purchase');
Route::get('/sitemap.xml', 'SitemapController@sitemap');
Route::get('/layouts', 'SitemapController@Layouts');

Route::group(['middleware' => 'customer'], function () {
	Route::get('/my-profile','FrontController@MyProfile')->name('my-profile');
	Route::post('/post-comment','FrontController@PostComment')->name('post-comment');
	Route::post('/update-profile','FrontController@UpdateProfile')->name('update-profile');
	Route::post('/rate-order','FrontController@Rateorder');
	Route::post('apply_coupon', 'FrontController@ApplyCouponCode');
});

