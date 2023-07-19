<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\addEvent;

use App\Models\ticket;


class HomeController extends Controller
{
    public function index(){
        $event=addEvent::where('status',1)->paginate(6);
        // $event=addEvent::paginate(10);
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
        public function get_tickets( Request $request, $id)
        {
            if(Auth::id())
            {
                $user=Auth::user();

                $event=addEvent::find($id);

               

                $ticket=new ticket;
                $ticket->name=$user->name;
                $ticket->email=$user->email;
                $ticket->phone=$user->phone;
                $ticket->user_id=$user->id;


                $ticket->event_name=$event->event_name;
                $ticket->price=$event->price;
                $ticket->image=$event->image;
                $ticket->event_id=$event->id;
                $ticket->quantity=$request->quantity;

                $ticket->save();
                
                return redirect()->back();
            }
            else{
                return redirect('login');
            }
        }
    }

