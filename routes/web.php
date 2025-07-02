<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
	return 'testing endpoint laravel';
});

Route::post('/callback/ailos', function (\Illuminate\Http\Request $request) {
    $code = $request->input('code');
    $state = $request->input('state');
    
    Cache::put('ailos_callback', [
        'code' => $code,
        'state' => $state,
    ], 60);

    return Cache::get('ailos_callback', []);
});

Route::get('/callback/ailos', function () {
    return Cache::get('ailos_callback', []);
});

Route::get('/token', function () {
    $token = csrf_token();
    return response()->json(['token' => $token]);
});