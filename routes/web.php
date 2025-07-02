<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
	return 'testing endpoint laravel';
});

Route::post('/callback/ailos', function (\Illuminate\Http\Request $request) {
    session(['ailos callback' => $request->all()]);
    return true;
});

Route::get('/callback/ailos', function () {
    return response()->json(session('ailos callback', []));
});