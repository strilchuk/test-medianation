<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('test');
    Log::info("====================================");
    Log::info($request->ip() . ' ' . $request->method() . ' '  . $request->getRequestUri());
    Log::info("Headers: " , $request->headers->all());
    Log::info("Content: " . $request->getContent());
});


Route::get('/', function () {
    return redirect('test');
    Log::info("====================================");
    Log::info($request->ip() . ' ' . $request->method() . ' '  . $request->getRequestUri());
    Log::info("Headers: " , $request->headers->all());
    Log::info("Content: " . $request->getContent());
});


$methods=['ACL','BASELINE-CONTROL', 'BIND', 'CHECKIN', 'CHECKOUT', 'CONNECT', 'COPY', 'DELETE', 'GET',
    'HEAD', 'LABEL', 'LINK', 'LOCK', 'MERGE', 'MKACTIVITY', 'MKCALENDAR', 'MKCOL', 'MKREDIRECTREF',
    'MKWORKSPACE', 'MOVE', 'OPTIONS', 'ORDERPATCH', 'PATCH', 'POST', 'PRI', 'PROPFIND', 'PROPPATCH', 'PUT',
    'REBIND', 'REPORT', 'SEARCH', 'TRACE', 'UNBIND', 'UNCHECKOUT', 'UNLINK', 'UNLOCK', 'UPDATE',
    'UPDATEREDIRECTREF', 'VERSION-CONTROL', 'PURGE', 'VIEW', 'BAN'];

Route::match($methods,'/test', 'TestController@test');

