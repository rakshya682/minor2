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
                           <a href="" class="option1">
                           Add   To Cart
                           </a>
                           <a href="" class="option2">
                           Get Tickets
                           </a>
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