<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')
   <style type="text/css">
        .center
        {
            margin:auto;
            width:80%;
            border:2px solid white;
            text-align:center;
            margin-top:40px;
        }
        .font_size
        {
            text-align:center;
            font-size:40px;
            padding-top:20px;

        }
        .img_size
        {
            width:150px;
            height:150px;
        }
        .th_color
        {
            background:skyblue;
        }
        .th_deg
        {
            padding:30px;
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

        <h2 class="font_size">All Events</h2>
        <table class="center">
            <tr class="th_color">
                <th class="th_deg">Event Nmae</th>
                <th class="th_deg">Description</th>
                <th clas="th_deg">Image</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Quantity</th>
                <th class="th_deg">Delete</th>
                <th class="th_deg">Edit</th>
                <th class="th_deg">Status</th>
            </tr>

            @foreach($event as $event)
                <tr>
                    <td>{{$event->event_name}}</td>
                    <td>{{$event->description}}</td>
                    <td>
                        <img  class="img_size" src="/addEvent/{{$event->image}}">
                    </td>
                    

                    <td>{{$event->price}}</td>
                    <td>{{$event->quantity}}</td>
                    <td>
                        <a class="btn btn-danger" onclick="return confirm('Are You Sure to Delete this?')" href="{{url('delete_events',$event->id)}}">Delete</a>

                     </td>


                     <td>
                     <a class="btn btn-success" href="{{url('update_events',$event->id)}}">Edit</a>

                     </td>
                     <td>
                      <span class"badge">{{ $event->status == '0' ? 'Inactive' : 'Active'}}</span>
                    </td>
                     </tr>
                @endforeach
        </table>
    
            
                      
               
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>