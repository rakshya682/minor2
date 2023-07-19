<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>Event</span>
               </h2>
            </div>
            <div class="row">
               @foreach($event as $events)

               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('event_details',$events->id)}}" class="option1">
                           Event Details
                           </a>
               
                           <form action="{{url('get_tickets',$events->id)}}" method="post">
                              @csrf
                              <div class="row">
                                 <div class="col-md-4">
                                 <input type="number" name="quantity" value="1" min="1" style="width:100px;">
                                 </div>

                                 <div class="col-md-4">
                                 <input type="submit"value="Get tickets">
                              </div>
                           
                        </div>
                        </form>

                        </div>
                     </div>
                     <div class="img-box">
                        <img src="addEvent/{{$events->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                        {{$events->event_name}}
                        </h5>
                        <h6>
                           Price<br>
                        Rs.{{$events->price}}

                        </h6>
      
                     </div>
                  </div>
               </div>
               
                  @endforeach   
                  <span style="padding-top:20px;">
            {!!$event->withQueryString()->links('pagination::bootstrap-5')!!}
               </span> 
         </div>
      </section>