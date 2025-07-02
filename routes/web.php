<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
	return 'testing endpoint laravel';
});

Route::post('/callback/ailos', function (\Illuminate\Http\Request $request) {
    session(['ailos_data' => $request->all()]);
    return response()->json(session('ailos_data', []));
});

Route::get('/callback/ailos', function () {
    return response()->json(session('ailos_data', []));
});

Route::get('/token', function () {
    $token = csrf_token();
    return response()->json(['token' => $token]);
});