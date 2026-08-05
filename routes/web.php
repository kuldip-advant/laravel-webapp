<?php

use App\Jobs\SayHello;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/queue-test', function () {
    return view('queue-test');
})->name('queue-test');

Route::post('/queue-test', function () {
    SayHello::dispatch('Hello from the queue test button!');

    return back()->with('status', 'Job dispatched. Watch the queue worker / log for confirmation.');
})->name('queue-test.dispatch');
