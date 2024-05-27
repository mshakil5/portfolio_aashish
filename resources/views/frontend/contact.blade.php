

@extends('frontend.layouts.master')
@section('content')

<div class="canvas contact-page">
    <div class="contact-bg col-md-8 col-sm-12">
      <img src="{{ asset('images/company/'.\App\Models\CompanyDetail::where('id',1)->first()->footer_logo)}}" alt="" width="100%">
    </div>
    <div class="col-md-4 col-sm-12 contact-bar">
      <iframe src="{{ \App\Models\CompanyDetail::where('id',1)->first()->google_map}}" width="500" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      <h3 class="interest-text text-center"> Thanks for your Interest </h3>
      <br>
      <div class="col-md-6 add-text">
        {{ \App\Models\CompanyDetail::first()->address1}}
      {{ \App\Models\CompanyDetail::first()->phone1}}
      </div>
      <div class="col-md-6 add-text">
      
      </div>
      <br>
      <div class="col-sm-12 col-md-12">
        <div class="ermsg"></div>
          <form method="post" action="">
              <div class="controls controls-row">
                 <div class="">
                  <input id="name" name="name" type="text" class="form-control" placeholder="Name" required> 
                  </div>
                   <div class="">
                    <input id="email" name="email" type="email" class="col-md-6 form-control" placeholder="Email address" required>
                  </div>
              </div>
              <div class="controls">
                  <textarea id="message" name="message" class="col-md-12" placeholder="Your Message" rows="5" required></textarea>
              </div>
                
              <div class="controls btn-full">
                  <button  type="submit" class="btn btn-primary">Send</button>
              </div>
          </form>
      </div>
    </div>
  </div>

    
  




@endsection
@section('script')

<script>
  $(document).ready(function () {


      //header for csrf-token is must in laravel
      $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

         //  make mail start
         var url = "{{URL::to('/contact-submit')}}";
         $("#submit").click(function(){
                 var name= $("#name").val();
                 var email= $("#email").val();
                 var message= $("#message").val();
                 $.ajax({
                     url: url,
                     method: "POST",
                     data: {name,email,message},
                     success: function (d) {
                         if (d.status == 303) {
                             $(".ermsg").html(d.message);
                         }else if(d.status == 300){
                             $(".ermsg").html(d.message);
                             window.setTimeout(function(){location.reload()},2000)
                         }
                     },
                     error: function (d) {
                         console.log(d);
                     }
                 });

         });
         // send mail end


  });
</script>


@endsection

