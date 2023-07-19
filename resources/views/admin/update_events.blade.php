<!DOCTYPE html>
<html lang="en">
  <head>

  <base href="/public">

   @include('admin.css')
<style>
.div_center
{
    text-align:center;
    padding-top:40px;
}
.font_size
{
    font-size:40px;
    padding-bottom:40px;
}
.text_color{
    color:black;
    padding-bottom:20px;
}
label{
    display:inline-block;
    width:200px;
}
.div_design{
    padding-bottom:15px;
}
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.slidebar')
      <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="content-wrapper"style="padding-top:100px">
        @if(session()->has('message'))

        <div class=" alert alert success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button">
                {{session()->get('message')}}
            </div>
            @endif
            <div class="div_center">
                <h1 class="font_size">Update Events</h2>


                <form action="{{url('/update_events_confirm',$event->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                 <div class="div_design">
                <label>Event Name</label>
                <input class="text_color" type="text" name="event_name" placeholder="Write the Event Name" required="" value="{{$event->event_name}}">
                    </div> 

                    <div class="div_design">
                <label>Description</label>
                <textarea class="text_color" type="text" name="description" placeholder="Write a description" required="" rows="4" cols="50">{{$event->description}}
</textarea>
                    </div>

                    <!-- <div class="div_design">
                <label>Event Category</label>
                <sekect class="text_color"  name="category">
                    <option value="" selected="">add a category</option>
                   
                    <option>Concert</option>
                  
                </select>
                    </div> -->
                    

                     <div class="div_design">
                <label>Event Price</label>
                <input class="text_color" type="number" name="price" placeholder="Write a price" required="" value="{{$event->price}}">>
                    </div>  

                    <div class="div_design">
                <label>Quantity</label>
                <input class="text_color" type="number" name="quantity" placeholder="Write a quantity" required="" value="{{$event->quantity}}">>
                    </div>  
                    <div class="div_design">
                <label>Current Event Image Here :</label>
                <img style="margin:auto;"  height="100" width="100" src="/addEvent/{{$event->image}}">
                    </div> 
                    
                     <div class="div_design">
                <label>Change Event Image Here :</label>
                <input  type="file" name="image" value="{{$event->event_name}}">>
                    </div> 
                    <div class="div_design">
                <label>Event Staus:</label>
                <select name="status">
                    <option value="0">Inactive</option>
                    <option value="1">Active</option>
                </select>
                    </div> 

                    <div class="div_design">
                <input  type="submit" value="Update Product" class="btn btn-primary">
                    </div>

                </form>     
             </div>

                      
               
          
          
        </div>
     
    
    
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
