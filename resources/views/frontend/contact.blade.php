

@extends('frontend.layouts.master')
@section('content')

<div class="canvas contact-page">

  <div class="container ">
    <div class="contact-bg col-md-8 col-sm-12">
      <h3 class="blog-post-title text-center"> Contact Us </h3>
      
      <img src="{{ asset('images/company/'.\App\Models\CompanyDetail::where('id',1)->first()->footer_logo)}}" alt="" width="100%">
    </div>
    
    <div class="col-md-4 col-sm-12">

      <h3 class="blog-post-title text-center"> Thanks for your Interest </h3>
      {{-- <span class="title-divider"></span> --}}
      <br>

      <div class="col-md-6 add-text">
        {{ \App\Models\CompanyDetail::first()->address1}}
        {{ \App\Models\CompanyDetail::first()->phone1}}
      </div>
      <div class="col-md-6 add-text">
      
      </div>
      <br>
      <div class="col-md-12 col-md-12">
        <div class="ermsg"></div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

          <form method="post" action="{{route('contact.submit')}}">
            @csrf
              <div class="controls controls-row">
                 <div class="">
                  <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" required> 
                  </div>
                   <div class="">
                    <input id="email" name="email" type="email" class="col-md-6 form-control @error('email') is-invalid @enderror" placeholder="Email address" required>
                  </div>
              </div>
              <div class="controls">
                  <textarea id="message" name="message" class="col-md-12  @error('message') is-invalid @enderror" placeholder="Your Message" rows="5" required></textarea>
              </div>
                
              <div class="controls btn-full">
                  <button  type="submit"  class="btn btn-primary m-2">Send</button>
              </div>
          </form>
      </div>
      
      

    </div>

    <div class="col-md-12 col-sm-12">
      <div style="margin-top: 40px" class="m-3">
        
        <iframe src="{{ \App\Models\CompanyDetail::where('id',1)->first()->google_map}}" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>
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

         $("#submitBtn").click(function(){
          alert('btn work');
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

