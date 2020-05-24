<?php

namespace App\Http\Controllers;

use App\Contact;
use App\TestEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

/**
 * Class StatisticController
 * @package App\Http\Controllers
 */
class StatisticController extends Controller
{
    public function index(Request $request)
    {
        $authToken = Cookie::get('auth_token');
        $admin = env("MEDIA_ADMIN");
        $pass = env("MEDIA_PASSWORD");
        $hash = base64_encode("$admin:$pass");

        if ($authToken != $hash)
            return view('login');

        $action = $request->query->get('action');
        if (!isset($action))
            $action = 'list';

        $ipFilter = $request->query->get('ip');
        if (!isset($ipFilter))
            $ipFilter = null;

        if ($action == 'list'){
            if (isset($ipFilter))
                $testEvents = TestEvent::where('ip', $ipFilter)->orderBy('created_at', 'desc')->get()->toArray();
            else
                $testEvents = TestEvent::orderBy('created_at', 'desc')->get()->toArray();
            return view('statistic', ['data' => $testEvents]);
        } elseif ($action == 'listsuccess') {
            if (isset($ipFilter))
                $testEvents = TestEvent::where('ip', $ipFilter)->where('result', 1)->orderBy('created_at', 'desc')->get()->toArray();
            else
                $testEvents = TestEvent::where('result', 1)->orderBy('created_at', 'desc')->get()->toArray();
            return view('statistic', ['data' => $testEvents]);
        } else {
            $contacts = Contact::all()->toArray();
            return view('contacts', ['data' => $contacts]);
        }
    }
}
