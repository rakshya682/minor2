<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\Models\event;
use App\Models\addEvent;
class AdminController extends Controller
{
    public function view_event()
    {
        $data =event::all();
        return view('admin.event',compact('data'));
    }
    public function add_event(Request $request)
    {
        $data=new event;
        $data->event_name=$request->event;
        $data->save();
        return redirect()->back()->with('message','Event added sucessfully');


}
    public function delete_event($id)
    {
        $data=event::find($id);

        $data->delete();
        return redirect()->back()->with('message','Event Deleted Successfully');

    }
    public function view_addEvent()
    {
        // $event=new event;
        return view('admin.addEvent');
    }
    public function event_add(Request $request)
    {
        $addEvent=new addEvent;

        // dd($request->all());


         $addEvent->event_name=$request->event_name;

        $addEvent->description=$request->description;

        $addEvent->price=$request->price;

        $addEvent->quantity=$request->quantity;

         
            $image=$request->image;

            if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('addEvent',$imagename);

        $addEvent->image=$imagename;


        }

         $addEvent->save();

       return redirect()->back();

    }
    public function show_events()
    {
        $event=addEvent::all();
        return view('admin.show_events',compact('event'));
    }
    public function delete_events($id)
    {
            $event=addEvent::find($id);

            $event->delete();
            return redirect()->back()->with('message','Evnets Deleted Successfully');

    }
    public function update_events($id)
    {
        $event=addEvent::find($id);

        return view('admin.update_events',compact('event'));
    }
    public function update_events_confirm(Request $request,$id)
    {
        $event=addEvent::find($id);

        $event->event_name=$request->event_name;

        $event->description=$request->description;

        $event->price=$request->price;

        $event->quantity=$request->quantity;
        $event->status=$request->status;
        
        $image=$request->image;

        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('addEvent',$imagename);

        $event->image=$imagename;


        }
        
        $event->update();

        return redirect()->back()->with('message','Event Updated Successfully');



    }


}