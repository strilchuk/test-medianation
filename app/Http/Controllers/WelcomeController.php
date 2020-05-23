<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Services\logTrait;
use App\TestEvent;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function welcome(Request $request, $mark = "")
    {
        logTrait::myLog($request);
        if (!$this->checkMark($mark))
            return redirect('test');
        return view('welcome', ['mark' => $mark]);
    }

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

    private function checkMark($mark){
        if (!isset($mark))
            return null;

        $findEvent = TestEvent::where('mark', $mark)->where('result', 1)->first();
        if (!isset($findEvent))
            return false;
        return true;
    }
}
