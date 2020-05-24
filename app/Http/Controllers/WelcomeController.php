<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Services\logTrait;
use App\TestEvent;
use Illuminate\Http\Request;

/**
 * Class WelcomeController
 * @package App\Http\Controllers
 */
class WelcomeController extends Controller
{
    /**
     * @param Request $request
     * @param string $mark
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function welcome(Request $request, $mark = "")
    {
        logTrait::myLog($request);
        if (!$this->checkMark($mark))
            return redirect('test');
        return view('welcome', ['mark' => $mark]);
    }

    /**
     * @param Request $request
     * @param string $mark
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function contact(Request $request, $mark = "")
    {
        logTrait::myLog($request);
        if (!$this->checkMark($mark))
            return redirect('test');

        $phone = $request->input('phone');
        $email = $request->input('email');
        $skype = $request->input('skype');
        $ip = TestEvent::select('ip')->where('mark', $mark)->where('result', 1)->first()->toArray()['ip'];

        $contact = new Contact();
        $contact->ip = $ip;
        $contact->phone = $phone;
        $contact->email = $email;
        $contact->skype = $skype;
        $contact->mark = $mark;
        $contact->save();
        return view('contactStored');
    }

    /**
     * @param $mark
     * @return bool|null
     */
    private function checkMark($mark){
        if (!isset($mark))
            return null;

        $findEvent = TestEvent::where('mark', $mark)->where('result', 1)->first();
        if (!isset($findEvent))
            return false;
        return true;
    }
}
