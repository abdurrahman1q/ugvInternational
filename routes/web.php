<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('search', 'search')->name('search');
});

Route::controller(PagesController::class)->group(function () {
    Route::get('/faculties/{faculty:slug}', 'faculty')->name('faculty');
    Route::get('/department/{slug}', 'department_details')->name('department.details');
    Route::get('/faculty-staff', 'faculty_staff')->name('faculty.staff');
    Route::get('/faculty-staff/slug', 'staff__details')->name('faculty.staff.details');
    Route::get('/notices', 'notices')->name('notices');
    Route::get('/notice/{notice}', 'notice_deatils')->name('notices.show');
    Route::get('/blogs', 'blog')->name('blogs');
    Route::get('/blog/{blog:slug}', 'blog_details')->name('blog.details');
    Route::get('/events', 'event')->name('events');
    Route::get('/event/{event:slug}', 'event_details')->name('event.details');
    Route::get('/program/slug', 'singleProgram')->name('single.program');
    Route::get('admission', 'admission')->name('admission');
});
