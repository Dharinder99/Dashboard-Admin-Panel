<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\passwordController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\InquiryController;
use App\Models\Country;
use App\Models\States;
use App\Models\Cities;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('reset', function (){
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    // Artisan::call('config:cache');
    // Artisan::call('route:cache');
});

Route::group(['middleware'=>'customlogin'],function () {

    Route::get('/',[LoginController::class,'login']);

    Route::post('/authenticate_register-users',[LoginController::class,'authenticateadminlogin'])->name('postLogin');

});

Route::group(['middleware'=>'admin'],function(){

Route::get('/dashboard',[UserController::class,'fetchusers'])->name('dashboard');

Route::post('/dashboard',[UserController::class,'userSearch'])->name('userSearch');

});

Route::get('/logout',[LoginController::class,'logout']);



Route::get('/index',[UserController::class,'index']);

Route::get('/viewuser', [UserController::class, 'viewUser']);
Route::get('/deleteUser', [UserController::class, 'deleteUser']);


Route::get('/profiles',[UserController::class,'viewprofiles']);

Route::get('/banners',[BannerController::class,'banners'])->name('banners');

Route::post('/banners',[BannerController::class,'bannerSearch'])->name('bannerSearch');



Route::post('/save-banner',[BannerController::class,'uploadbanner']);




Route::get('/deleteBanner', [BannerController::class, 'deleteBannerUser']);


Route::post('/submit',[UserController::class,'postData']);
Route::get('/register',[UserController::class,'viewData']);

// Route::get('/auth-recoverpw',[LoginController::class,'forgotpw']);
Route::Post('/verification',[passwordController::class,'otps']);

Route::get('/forgetpassword',[passwordController::class,'forgetpassword']);

Route::Post('/sendotp',[passwordController::class,'doSendEmailOtp']);
Route::get('/emailverification',[passwordController::class,'emailverification']);


Route::get('/emailtemplate',[passwordController::class,'email_template']);

Route::get('/get-user-data-by-id',[UserController::class,'getUserDataById'])->name('getUserDataById');

Route::get('/profile-view',[UserController::class,'ProfileView']);

Route::get('/advertisements',[AdvertisementController::class,'advertisement'])->name('advertisements');

Route::post('/uploadadvertisement',[AdvertisementController::class,'uploadadvertisement'])->name('uploadadvertisement');


Route::get('/deleteadvertisement', [AdvertisementController::class, 'deleteadvertisement']);

Route::get('/get-all-countries', [AdvertisementController::class, 'getAllCountries']);
Route::get('/get-all-states', [AdvertisementController::class, 'getAllStates']);
Route::get('/get-all-cities', [AdvertisementController::class, 'getAllCities']);

Route::get('/editloadadvertisement/{id}', [AdvertisementController::class, 'edit'])->name('advertisements.edit');

Route::post('/advertisementupdating', [AdvertisementController::class, 'update'])->name('advertisements.update');

Route::get('/users-subscriptions',[TransactionsController::class,'usersubscriptions']);

Route::get('/inquiry',[InquiryController::class,'inquirytable']);
Route::get('/deleteinquiries', [InquiryController::class, 'deleteinquiries']);



Route::get('/advertisement/edit/{id}', [AdvertisementController::class, 'editadvertisement'])->name('editadvertisement');
Route::post('/advertisement/update', [AdvertisementController::class, 'update'])->name('advertisement.update');


Route::get('/get-states', [AdvertisementController::class, 'getStates'])->name('getStates');
Route::get('/get-cities', [AdvertisementController::class, 'getCities'])->name('getCities');


Route::get('/countries', [Country::class, 'getCountries']);



Route::get('/fetch-state/{country_id}',[AdvertisementController::class,'fatchState']);
Route::get('/fetch-cities/{state_id}',[AdvertisementController::class,'fatchCity']);

Route::get('/edit-fetch-country/{country_name}',[AdvertisementController::class,'editStateByName']);

Route::get('/edit-fetch-state/{country_name}',[AdvertisementController::class,'editStateByName']);
Route::get('/edit-fetch-cities/{state_name}',[AdvertisementController::class,'editCityByName']);


Route::get('/publishads',[AdvertisementController::class,'publishads']);


Route::get('/forgetpassword', [passwordController::class, 'forgetpassword'])->name('forgetpassword');
Route::post('/forgetpassword', [passwordController::class, 'forgetpasswordemail'])->name('forgetpasswordemail');

Route::get('/forget-validate-email-by-otp', [passwordController::class, 'verifyotp']);
Route::post('/reset-password', [passwordController::class, 'resetpasswordsave'])->name('resetpasswordsave');


Route::get('/editloadbanner/{id}', [BannerController::class, 'edit'])->name('edit');
// Route::post('/updatebanner', [BannerController::class, 'update'])->name('banner.update');

Route::post('/bannerupdating', [BannerController::class, 'bannerupdating'])->name('bannerupdating');


