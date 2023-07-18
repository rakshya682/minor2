<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\addEvent;

class HomeController extends Controller
{
    public function index(){
        $event=addEvent::paginate(10);
        return view('home.userpage',compact('event'));
    }
    public function redirect()
    {
        $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
            return view ('admin.home');
        }

        else
        {
            $event=addEvent::paginate(10);
            return view('home.userpage',compact('event'));
        }
        }
        public function event_details($id)
        {
            $event=addEvent::find($id);
            return view('home.event_details',compact('event'));
        }
        public function get_tickets($id)
        {
            if(Auth::id())
            {
                return redirect()->back();
            }
            else{
                return redirect('login');
            }
        }
    }

