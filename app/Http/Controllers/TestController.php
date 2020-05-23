<?php

namespace App\Http\Controllers;

use App\TestEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    public function test(Request $request)
    {
        $this-> myLog($request);

        $testResult = false;

        $method['compare'] = $request->method() == 'PATCH';
        $method['value'] = $request->method();
        $method['style'] = $method['compare']?'success':'danger';
        $method['text'] = $method['compare']?'выполнено':'не выполнено';

        $pattern = '/^(https?:\/\/)(www.)?(google.com)(\/[\w\.]*)*\/?$/';
        $referer['value'] = $request->headers->get('referer');
        $referer['compare'] = preg_match($pattern, $referer['value']) == 1;
        $referer['style'] = $referer['compare']?'success':'danger';
        $referer['text'] = $referer['compare']?'выполнено':'не выполнено';

        $visit['compare'] = Cookie::get('visit') == 33;
        $visit['value'] = Cookie::get('visit');
        $visit['style'] = $visit['compare']?'success':'danger';
        $visit['text'] = $visit['compare']?'выполнено':'не выполнено';

        $objDT = new \DateTime();
        $timeStamp['current'] = $objDT->getTimestamp();
        $content = $request->getContent();
        $timeStamp['value'] = empty($content)?"пусто":$content;
        $timeStamp['compare'] = $timeStamp['current'] == $timeStamp['value'];
        $timeStamp['style'] = $timeStamp['compare']?'success':'danger';
        $timeStamp['text'] = $timeStamp['compare']?'выполнено':'не выполнено';

        $userAgent['value'] = $request->headers->get('user-agent');
        $userAgent['compare'] = stripos($userAgent['value'], 'BestBrowser') != false;
        $userAgent['style'] = $userAgent['compare']?'success':'danger';
        $userAgent['text'] = $userAgent['compare']?'выполнено':'не выполнено';

        $currVisit = $visit['value'];
        if (!isset($visit['value'])) {
            $visit['value'] = 0;
            $currVisit = 0;
        }
        $currVisit++;
        Cookie::queue('visit', $currVisit);

        $user = "admin";
        $password = "qwerty123";
        $hash = 'Basic ' . base64_encode($user . ":" . $password);
        $auth['value'] = $request->headers->get('authorization');
        $auth['compare'] = $hash == $auth['value'];
        $auth['style'] = $auth['compare']?'success':'danger';
        $auth['text'] = $auth['compare']?'выполнено':'не выполнено';

        if ($method['compare'] &&
                $visit['compare'] &&
                $referer['compare'] &&
                $timeStamp['compare'] &&
                $userAgent['compare'] &&
                $auth['compare'])
            $testResult = true;

        $testData = ['ip' => $request->ip(),
            'method' => $method,
            'visit' => $visit,
            'referer' => $referer,
            'timestamp' => $timeStamp,
            'userAgent' => $userAgent,
            'auth' => $auth,
            'result' => $testResult];

        $this->eventSave($testData);

        if (!$testResult)
            return view('failure',
                $testData);
        else
            return view('success', []);
    }

    private function eventSave($testData)
    {
        $testEvent = new TestEvent();
        $testEvent->ip = $testData['ip'];
        $testEvent->method = $testData['method']['value'];
        $testEvent->referer = $testData['referer']['value'];
        $testEvent->visit = $testData['visit']['value'];
        $testEvent->body = $testData['timestamp']['value'];
        $testEvent->useragent = $testData['userAgent']['value'];
        $testEvent->auth = $testData['auth']['value'];
        $testEvent->result = $testData['result'];
        $testEvent->save();
    }

    private function myLog($request)
    {
        Log::info("====================================");
        Log::info($request->ip() . ' ' . $request->method() . ' '  . $request->getRequestUri());
        Log::info("Headers: " , $request->headers->all());
        Log::info("Content: " . $request->getContent());
    }
}
