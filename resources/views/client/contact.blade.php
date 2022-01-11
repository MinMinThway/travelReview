@extends('client.layout')
  @section('content')
  @if (Session::get("success"))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Holy guacamole!</strong> {{ Session::get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
      <div class="container-fluid bg-light mb-5 mt-5">
        <div class="container bg-light pt-5 pb-5">
            <div class="row">
                <div class="col-lg-7">
                    <h1 class="font">Say Hello</h1>
                     <form action="{{ route('send.mail') }}" method="POST">
                         @csrf
                       <div class="row">
                         <div class="col-6">
                             <div class="form-group">
                                 <label for="name" class="font">Full Name</label>
                                 <input type="text" name="name" id="border" class="form-control">
                             </div>
                         </div>
                         <div class="col-6">
                             <div class="form-group">
                                 <label for="email" class="font">Email Address</label>
                                 <input type="email" name="email" id="border" class="form-control">
                             </div>
                         </div>
                       </div>
                       <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label for="subject" class="font">Message Subject</label>
                                 <input type="text" name="subject" id="border" class="form-control">
                             </div>
                         </div>
                       </div>
                       <div class="row">
                         <div class="col-12">
                             <div class="form-group">
                                 <label for="message">Message</label>
                                 <textarea name="message" id="border"class="form-control" cols="30" rows="3"></textarea>
                             </div>
                         </div>
                       </div>
                       <button type="submit"  class="btn btn-dark btn-sm mt-2">Send</button>
                     </form>
                </div>
                <div class="col-lg-5">
                 <h1 class="font mb-5">Need Help?</h1>
                 <p class="font mb-5" style="line-height: 40px">
                     Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus repellendus doloribus minus ipsa qui ea deleniti sequi veritatis modi laboriosam perspiciatis facilis nostrum laudantium dolor est eos, quibusdam odit velit!
                 </p>
                 <button  class="btn btn-dark btn-sm mt-2">Open A Ticket</button>

             </div>
            </div>
        </div>
      </div>
@endsection;

