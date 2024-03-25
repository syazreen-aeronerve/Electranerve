<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeOrganiserController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\RefundController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Customer;
use App\Http\Controllers\AnnouncementController;





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
 
Route::group(['middleware' => ['guest']], function () { 
// Authentication
Route::get('/', [AuthController::class, 'index']);

//AUTH Customer
Route::get('register-user',[AuthController::class, 'register']);
Route::post('register-post',[AuthController::class, 'registerpost'])->name('register-post');
Route::post('login-user',[AuthController::class, 'login']);
});

Route::group(['middleware' => ['auth']], function () { 


Route::get('signout-user',[AuthController::class, 'signout']);

Route::middleware([customer::class])->group(function(){
//Customer
Route::get('customer-home',[HomeController::class, 'index']);
});

Route::get('viewEvent/{id}',[EventController::class, 'viewEvent']);
Route::post('checkout',[EventController::class, 'checkout']);
Route::post('paynow',[EventController::class, 'paynow']);
Route::any('returnPayment/{id}',[EventController::class, 'returnPayment']);
Route::get('mypurchase',[EventController::class, 'mypurchase']);
Route::any('printTicket/{id}',[EventController::class, 'printTicket']);
Route::get('faq',[HomeController::class, 'faq']);
Route::any('events',[EventController::class, 'events']);
Route::any('bookingconfirmed/{id}',[EventController::class, 'bookingconfirmed']);
Route::get('customer-profile',[HomeController::class, 'profile']);
Route::post('updProfilecust',[HomeController::class, 'updProfilecust']);
Route::post('changepasscust',[HomeController::class, 'changepasscust']);
Route::post('updnewsletter',[HomeController::class, 'updnewsletter']);
Route::post('requestRefund',[HomeController::class, 'requestRefund']);
Route::get('myrefund',[HomeController::class, 'myrefund']);



//Support
Route::get('mysupport',[SupportController::class, 'index']);
Route::post('sendReply/{id}',[SupportController::class, 'reply']);
Route::post('startChat',[SupportController::class, 'startChat']);

//feedback
Route::post('Postfeedback',[HomeController::class, 'Postfeedback']);




Route::middleware([admin::class])->group(function(){
Route::get('home-organiser',[HomeOrganiserController::class, 'index']);
});

Route::get('admin-profile',[HomeOrganiserController::class, 'profile']);
Route::post('updProfileadmin',[HomeOrganiserController::class, 'updProfileadmin']);
Route::post('changepassadmin',[HomeOrganiserController::class, 'changepassadmin']);


//Venue Management
Route::get('venuemanagement',[HomeOrganiserController::class, 'venuemanagement']);
Route::POST('postVenue',[VenueController::class, 'store']);
Route::get('fetchVenue',[VenueController::class, 'fetchVenue']);


//Event Management
Route::get('eventsmanagement',[HomeOrganiserController::class, 'eventsmanagement']);
Route::POST('postEvent',[EventController::class, 'store']);
Route::get('fetchEvent',[EventController::class, 'fetchEvent']);
Route::any('removeEvent/{id}',[EventController::class, 'removeEvent']);

//Testing
Route::get('testing',[EventController::class, 'testing']);


//order management
Route::get('ordermanagement',[HomeOrganiserController::class, 'ordermanagement']);
Route::get('fetchOrder',[HomeOrganiserController::class, 'fetchOrder']);
Route::get('mysupportadmin',[SupportController::class, 'mysupportadmin']);
Route::post('sendReplyAdmin/{id}',[SupportController::class, 'replyAdmin']);


//review
Route::get('review',[HomeOrganiserController::class, 'review']);

//refundmanagement
Route::get('refundlist',[RefundController::class, 'index']);
Route::any('apvRefund/{id}',[RefundController::class, 'apvRefund']);
Route::any('rejRefund/{id}',[RefundController::class, 'rejRefund']);

//sales report
Route::get('salesreport',[HomeOrganiserController::class, 'salesreport']);
Route::get('printSP',[HomeOrganiserController::class, 'printSP']);
Route::get('fetch-chart-data',[HomeOrganiserController::class, 'fetchChartData']);
Route::get('announcementmanagement',[HomeOrganiserController::class, 'announcementmanagement']);
Route::any('postAnnouncement',[HomeOrganiserController::class, 'postAnnouncement']);
Route::any('removeAnnouncement/{id}',[HomeOrganiserController::class, 'removeAnnouncement']);


//Newsletter
Route::any('subsnewsletter',[HomeController::class, 'subsnewsletter']);


//Announcement
Route::get('announcementlist',[AnnouncementController::class, 'index']);

});










