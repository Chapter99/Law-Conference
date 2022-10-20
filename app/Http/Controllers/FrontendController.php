<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.pages.index');
    }

    public function publish(){
        return view('frontend.pages.publish');
    }

    public function timeline(){
        return view('frontend.pages.timeline');
    }

    public function contact(){
        return view('frontend.pages.contact');
    }

    public function download(){
        return view('frontend.pages.download');
    }

    public function venue(){
        return view('frontend.pages.venue');
    }

    public function list(){
        $users = User::where('status', 1)->get();
        return view('frontend.pages.list')->with(compact('users'));
    }

    public function payment(){
        return view('frontend.pages.payment');
    }

    public function presenttype(){
        return view('frontend.pages.presenttype');
    }

    public function submissionstep(){
        return view('frontend.pages.submissionstep');
    }

    public function prepare(){
        return view('frontend.pages.prepare');
    }

    public function hotel(){
        return view('frontend.pages.hotel');
    }

    public function touristattraction(){
        return view('frontend.pages.touristattraction');
    }

    public function question(){
        return view('frontend.pages.question');
    }

    public function invitedspeaker(){
        return view('frontend.pages.invitedspeaker');
    }
}
