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

         $addEvent->event_name=$request->event_name;

        $addEvent->description=$request->description;

        $addEvent->price=$request->price;

         $image=$request->image;

         $imagename=time().'.'.$image->getClientOriginalExtension();

         $request->image->move('addEvent',$imagename);

         $addEvent->image=$image;

         $addEvent->save();

       return redirect()->back();

    }
}