@extends('layout.main')

@section('container')
    <div class="cms-main-container">
        {{-- <p>{{$movie->trailer_link}}</p> --}}
        <div class="text-center">

            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalYT">YouTube Modal</button>
          </div>
          
          <!--Modal: Name-->
          <div class="modal fade" id="modalYT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
          
              <!--Content-->
              <div class="modal-content">
          
                <!--Body-->
                <div class="modal-body mb-0 p-0">
          
                  <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                  <iframe class="embed-responsive-item" src="{{$movie->trailer_link}}" allowfullscreen></iframe>
                  </div>
          
                </div>
          
                <!--Footer-->
                <div class="close-con" style="margin-top:-5px; margin-bottom:5px; text-align:center;">
                  <button type="button" class="btn btn-primary m-2 p-2" data-dismiss="modal">Close</button>
                </div>
          
              </div>
              <!--/.Content-->
          
            </div>
          </div>
          <!--Modal: Name-->
          
          <!--Modal: Name-->
          <div class="modal fade" id="modalVM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
          
              <!--Content-->
              <div class="modal-content">
          
                <!--Body-->
                <div class="modal-body mb-0 p-0">
          
                  <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                    <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/115098447" allowfullscreen></iframe>
                  </div>
          
                </div>
          
                <!--Footer-->
                <div class="modal-footer justify-content-center">
                  <span class="mr-4">Spread the word!</span>
                  <a type="button" class="btn-floating btn-sm btn-fb"><i class="fab fa-facebook-f"></i></a>
                  <!--Twitter-->
                  <a type="button" class="btn-floating btn-sm btn-tw"><i class="fab fa-twitter"></i></a>
                  <!--Google +-->
                  <a type="button" class="btn-floating btn-sm btn-gplus"><i class="fab fa-google-plus-g"></i></a>
                  <!--Linkedin-->
                  <a type="button" class="btn-floating btn-sm btn-ins"><i class="fab fa-linkedin-in"></i></a>
          
                  <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>
          
                </div>
          
              </div>
              <!--/.Content-->
          
            </div>
          </div>
    </div>
@endsection
@section('footer')
@include('layout.footer')
@endsection