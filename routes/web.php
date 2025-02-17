<?php

use Illuminate\Support\Facades\Route;
use App\Events\Event2x;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    // return view('welcome');
    return view("Home");
});


Route::post('sendEvent', function (Request $request) {
    $message = $request->message;
    event(new Event2x($message));
    return "Message Sent Successfully";
}); 

