<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\BookingController; 
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ContactController; 
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LanguageController;

Route::get('/', function () {
    return view('welcome');
});

 
Auth::routes();

 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 
Route::middleware(['auth'])->group(function () {
  
    

    // Dashboard-related routes
    Route::get('/frontend-events', [DashboardController::class, 'index'])->name('frontend.events');
    Route::get('/events/{id}', [DashboardController::class, 'show'])->name('events.show');

    // Event-related routes
    Route::get('/events', [EventController::class, 'event'])->name('events.index');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/create', [EventController::class, 'create'])->name('events.create');

    // Contact routes
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/contact/{id}', [ContactController::class, 'show'])->name('contact.show');
    Route::get('/del', [App\Http\Controllers\EventController::class, 'delete']);

    // Booking-related routes
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{id}', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
    Route::put('/bookings/{id}', [BookingController::class, 'update'])->name('bookings.update');
    Route::delete('/bookings/{id}', [BookingController::class, 'destroy'])->name('bookings.destroy');

    // Venue routes
    Route::get('/venues/wedding', [VenueController::class, 'wedding'])->name('venues.wedding');
    Route::get('/venues/conference', [VenueController::class, 'conference'])->name('venues.conference');
    Route::get('/venues/party', [VenueController::class, 'party'])->name('venues.party');

    Route::post('/venues/party/submit', [VenueController::class, 'submitPartyForm'])->name('venues.party.submit');
    Route::post('/venues/conference/submit', [VenueController::class, 'submitConferenceForm'])->name('venues.conference.submit');
    Route::post('/venues/wedding/submit', [VenueController::class, 'submitWeddingForm'])->name('venues.wedding.submit');

    Route::get('/venues', [VenueController::class, 'index'])->name('venues.index');
    Route::get('/{id}/edit', [VenueController::class, 'edit'])->name('admin.venues.edit');

    // Update venue
    Route::put('/{id}', [VenueController::class, 'update'])->name('admin.venues.update');

    Route::delete('/venues/{id}', [VenueController::class, 'destroy'])->name('admin.venues.destroy');

    // User management routes
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Report routes
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::resource('posts', PostController::class);

    // Comment routes
    Route::post('comment/{post}', [CommentController::class, 'store'])->name('comments.store');
    Route::post('/comments/{comment}/reply', [CommentController::class, 'reply'])->name('comments.reply');
    Route::post('/comments/{comment}/approve', [CommentController::class, 'approve'])->name('comments.approve');
});

 
Route::get('change/{lang}', [LanguageController::class, 'change'])->name('lang.change');

