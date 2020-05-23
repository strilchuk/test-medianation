<?php


namespace App\Services;


use Illuminate\Support\Facades\Log;

trait logTrait
{
    public static function myLog($request)
    {
        Log::info("====================================");
        Log::info($request->ip() . ' ' . $request->method() . ' '  . $request->getRequestUri());
        Log::info("Headers: " , $request->headers->all());
        Log::info("Content: " . $request->getContent());
    }
}
