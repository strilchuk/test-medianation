<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\logTrait;

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

Route::get('/', function (Request $request) {
    logTrait::myLog($request);
    return redirect('test');
});


Route::get('/welcome/{mark?}', 'WelcomeController@welcome');

Route::post('/welcome/{mark?}', 'WelcomeController@contact');


$methods=['ACL','BASELINE-CONTROL', 'BIND', 'CHECKIN', 'CHECKOUT', 'CONNECT', 'COPY', 'DELETE', 'GET',
    'HEAD', 'LABEL', 'LINK', 'LOCK', 'MERGE', 'MKACTIVITY', 'MKCALENDAR', 'MKCOL', 'MKREDIRECTREF',
    'MKWORKSPACE', 'MOVE', 'OPTIONS', 'ORDERPATCH', 'PATCH', 'POST', 'PRI', 'PROPFIND', 'PROPPATCH', 'PUT',
    'REBIND', 'REPORT', 'SEARCH', 'TRACE', 'UNBIND', 'UNCHECKOUT', 'UNLINK', 'UNLOCK', 'UPDATE',
    'UPDATEREDIRECTREF', 'VERSION-CONTROL', 'PURGE', 'VIEW', 'BAN'];

Route::match($methods,'/test', 'TestController@test');

