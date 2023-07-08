<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin.css')

   <style type="text/css">
    .div_center
    {
        text-align:center;
        padding-top:40px;
    }
    .h2font
    {
        font-size:40px;
        padding-bottom:40px;
    }
    .input_color
    {
        color:black;
    }
    .table
    {
        margin-auto;
        width:50%;
        text-align:center;
        margin-top:30px;
        margin-left:30%;
        border:3px solid white;
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
        <!--<div class="main-pannel" style="background:black; widht:50%; padding-left:500px;" >-->
        <div class="content-wrapper"style="padding-top:100px">
        @if(session()->has('message'))

        <div class=" alert alert success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button">
                {{session()->get('message')}}
            </div>


        @endif
            <div class="div_center">

                <h2 class="h2font">Add category</h2>
                    <form action="{{url('/add_event')}}" method="post">
                        @csrf
                        <input class="input_color" type="text" name="event" placeholder="write event category">
                        <input type="submit" class=" btn btn-primary" name="submit" value="Add category">
                        
                    </form>
                </div>
                <table class="table">
                    <tr>
                        <td>Event category</td>
                        <td>Action</td>
                    </tr>  

                    @foreach($data as $data)
                    

                    <tr>
                        <td>{{$data->event_name}}</td>

                        <td>
                            <a onclick="return confirm('Are you sure to Delete this?')"class="btn btn-danger" 
                            href="{{url('delete_event',$data->id)}}">Delete</a>
                    </td>   
                    </tr>    
                    @endforeach
            </table>
   

        </div>
      <!-- page-body-wrapper ends -->
        </div>
        <!-- </div> -->
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.script')
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>