<?php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\FrontController;



Route::get('/mhow-home', [HomeController::class, 'homepage'])->name('website.home');


// Frontend routes
Route::get('/', [HomeController::class, 'index'])->name('front.index');
Route::get('/about-us', [FrontController::class, 'about'])->name('front.about');
Route::get('/our-team', [FrontController::class, 'team'])->name('front.team');
Route::get('/our-partners', [FrontController::class, 'partners'])->name('front.partners');
Route::get('/projects', [FrontController::class, 'projects'])->name('front.projects');
Route::get('/project/{slug}', [FrontController::class, 'projectDetail'])->name('front.project.detail');
Route::get('/events', [FrontController::class, 'events'])->name('front.events');
Route::get('/charity-pages', [FrontController::class, 'charityPages'])->name('front.charity.pages');
Route::get('/landing-pages', [FrontController::class, 'landingPages'])->name('front.landing.pages');
Route::post('/free-booking', [FrontController::class, 'freeBooking'])->name('event.free.book');
Route::post('/paid-booking', [FrontController::class, 'paidBooking'])->name('event.paid.book');
Route::post('/event/booking/store', [FrontController::class, 'booking'])->name('front.event.book');
Route::get('/blogs', [FrontController::class, 'blogs'])->name('front.blogs');
Route::get('/blogs/{slug}', [FrontController::class, 'blogDetail'])->name('front.blog.detail');
Route::get('/gallery', [FrontController::class, 'gallery'])->name('front.gallery');
Route::get('/become-volunteer', [FrontController::class, 'becomeVolunteer'])->name('front.volunteer');
Route::post('/store-volunteer', [FrontController::class, 'storeVolunteer'])->name('front.store.volunteer');
Route::get('/our-team', [FrontController::class, 'ourTeam'])->name('front.our.team');
Route::get('/our-partners', [FrontController::class, 'ourPartners'])->name('front.out.partners');
Route::get('/way-to-donate', [FrontController::class, 'wayToDonate'])->name('front.way.to.donate');
Route::post('/contact-us/store', [FrontController::class, 'contactUsStore'])->name('front.contactus.store');
Route::get('/donate-now', [FrontController::class, 'donateNow'])->name('front.donate.now');
Route::get('/donate-form', [FrontController::class, 'donateNowFrom'])->name('front.donate.now.form');


Route::post('/store-inquiry', [FrontController::class, 'storeInquiry'])->name('front.store.inquiry');
// Route::post('/contact-us/store', [FrontController::class, 'contactUsStore'])->name('front.contactus.store');
Route::get('/contactus', [FrontController::class, 'contactus'])->name('front.contactus');
Route::get('/donate', [FrontController::class, 'donate'])->name('front.donate');
Route::get('/payment/return', [FrontController::class, 'handlePaymentReturn'])
    ->name('event.paid.booking.return');

Route::post('/donate-store', [FrontController::class, 'donateStore'])->name('front.donate.store');


Route::get('/donated', [FrontController::class, 'showOptions'])->name('donation.form');

Route::post('/process-subscription', [FrontController::class, 'processSubscription'])->name('subscription.process');
// Route::get('/payment/return', [FrontController::class, 'handlePaymentReturn'])->name('payment.return');
Route::get('/donation/success', [FrontController::class, 'showSuccess'])->name('donation.success');

Route::get('/{slug}', [FrontController::class, 'eventDetail'])->name('front.event.detail');
























