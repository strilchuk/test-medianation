<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class TestController extends Controller
{
    public function test(Request $request)
    {
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

        $currVisit = $visit['value'];
        if (!isset($visit['value'])) {
            $visit['value'] = 0;
            $currVisit = 0;
        }
        $currVisit++;
        Cookie::queue('visit', $currVisit);

        if ($method['compare'] &&
                $visit['compare'] &&
                $referer['compare'] &&
                $timeStamp['compare'])
            $testResult = true;

        if (!$testResult)
            return view('failure',
                ['method' => $method,
                'visit' => $visit,
                'referer' => $referer,
                'timestamp' => $timeStamp]);
        else
            return view('success', []);
    }
}
