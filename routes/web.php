<?php

use App\Models\Job;
use App\Mail\JobPosted;
use App\Jobs\TranslateJob;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::get('test' , function(){
    $job = Job::first();
    TranslateJob::dispatch($job);
});

Route::get('/jobs', [JobController::class , 'index']);
Route::get('/jobs/create' , [JobController::class , 'create'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class , 'show']);
Route::post('/jobs', [JobController::class , 'store']);

Route::get('/jobs/{job}/edit', [JobController::class , 'edit'])
        ->middleware('auth')
        ->can('edit', 'job');

Route::patch('/jobs/{job}' , [JobController::class , 'update']);
Route::delete('/jobs/{job}' , [JobController::class , 'destroy']);

// Route::resource('jobs' ,JobController::class);

// Auth
Route::get('/register' , [RegisterController::class , 'create']);
Route::post('/register' , [RegisterController::class , 'store']);

// sesstion
Route::get('/login' , [SessionController::class , 'create'])->name('login');
Route::post('/login' , [SessionController::class , 'store']);
Route::post('/logout' , [SessionController::class , 'destroy']);
