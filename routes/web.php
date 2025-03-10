<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\RazorpayController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HeaderController;
use App\Http\Controllers\Admin\AppetizersController;
use GuzzleHttp\Psr7\Header;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\MainCourseController;
use App\Http\Controllers\Admin\DessertController;

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




// website route
Route::get('/', [HomeController::class, 'Home'])->name('home');
Route::get('/about', [HomeController::class, 'About'])->name('about');
Route::get('/menu', [HomeController::class, 'Menu'])->name('menu');
Route::get('/testimonial', [HomeController::class, 'Testimonial'])->name('testimonial');
Route::get('/contact', [HomeController::class, 'Contact'])->name('contact');
Route::get('/feature', [HomeController::class, 'Features'])->name('feature');

// razorpay route
Route::get('/razorpay', [RazorpayController::class, 'index'])->name('razorpay.payment');
Route::post('/razorpay/payment', [RazorpayController::class, 'processPayment'])->name('razorpay.payment.store');

// login routes
Route::get('/login', [AuthController::class, 'Login'])->name('login')->middleware('alreadyLoggedIn');
Route::post('/login-user', [AuthController::class, 'LoginUser'])->name('login-user');
Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');

Route::middleware(['isLoggedIn', 'preventBackHistory'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'Dashboard'])->name('dashboard');
    Route::get('/register', [AuthController::class, 'Register'])->name('register');
    Route::post('/register-user', [AuthController::class, 'RegisterUser'])->name('register-user');


    // Header section
    Route::controller(HeaderController::class)->group(function () {
        Route::get('admin/header', 'Header')->name('header');
        Route::get('admin/add_header', 'Add')->name('add_header');
        Route::post('admin/store_header', 'Store')->name('store_header');
        Route::get('admin/edit_header/{header_id}', 'Edit')->name('edit_header');
        Route::post('admin/update_header/{header_id}', 'Update')->name('update_header');
        Route::delete('admin/delete_header/{header_id}', 'Delete')->name('delete_header');
        Route::get('admin/header_script', 'HeaderScript')->name('header_script');
    });

    // Booking Section
    Route::controller(BookingController::class)->group(function () {
        Route::get('admin/booking', 'Booking')->name('booking');
        Route::post('admin/store_booking', 'Store')->name('store_booking');
        Route::delete('admin/delete_booking/{bookings_id}', 'Delete')->name('delete_booking');
        Route::get('admin/booking_script', 'BookingScript')->name('booking_script');
        Route::get('admin/booking_view/{bookings_id}', 'BookingView')->name('booking_view');
        Route::get('admin/check_availability', 'checkAvailability')->name('check_availability');
    });


    // Appetizer section
    Route::controller(AppetizersController::class)->group(function () {
        Route::get('admin/appetizer', 'Appetizer')->name('appetizer');
        Route::get('admin/add_appetizer', 'Add')->name('add_appetizer');
        Route::post('admin/store_appetizer', 'Store')->name('store_appetizer');
        Route::get('admin/edit_appetizer/{appetizer_id}', 'Edit')->name('edit_appetizer');
        Route::post('admin/update_appetizer/{appetizer_id}', 'Update')->name('update_appetizer');
        Route::delete('admin/delete_appetizer/{appetizer_id}', 'Delete')->name('delete_appetizer');
        Route::get('admin/appetizer_script', 'AppetizerScript')->name('appetizer_script');
    });

    // Main Course section
    Route::controller(MainCourseController::class)->group(function () {
        Route::get('admin/main_course', 'MainCourse')->name('main_course');
        Route::get('admin/add_main_course', 'Add')->name('add_main_course');
        Route::post('admin/store_main_course', 'Store')->name('store_main_course');
        Route::get('admin/edit_main_course/{main_course_id}', 'Edit')->name('edit_main_course');
        Route::post('admin/update_main_course/{main_course_id}', 'Update')->name('update_main_course');
        Route::delete('admin/delete_main_course/{main_course_id}', 'Delete')->name(name: 'delete_main_course');
        Route::get('admin/main_course_script', 'MainCourseScript')->name('main_course_script');
    });

    // Dessert section
    Route::controller(DessertController::class)->group(function () {
        Route::get('admin/dessert', 'Dessert')->name('dessert');
        Route::get('admin/add_dessert', 'Add')->name('add_dessert');
        Route::post('admin/store_dessert', 'Store')->name('store_dessert');
        Route::get('admin/edit_dessert/{dessert_id}', 'Edit')->name('edit_dessert');
        Route::post('admin/update_dessert/{dessert_id}', 'Update')->name('update_dessert');
        Route::delete('admin/delete_dessert/{dessert_id}', 'Delete')->name('delete_dessert');
        Route::get('admin/dessert_script', 'DessertScript')->name('dessert_script');
    });

});
