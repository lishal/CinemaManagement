@extends('admin.layout.admindashboard')
@section('content-header')
    <h2>Movie</h2>
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="panel panel-default panel-default-equal">
            <div class="panel-heading">
                <h5>Add Movie</h5>
            </div>
            <div class="panel-body">
                @include('validation.message')

                <form class="form-horizontal" role="form" method="post" action="{{ url('/admin/addmovie')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="movie_id" id="movie_id" value="{{ $movies->id }}">
                    <div class="form-group type_name">
                        <label class="col-md-2 control-label">Name*</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" placeholder="Movie Name" name="name" value="{{ old('name')? old('name'): ($movies->movie_name? $movies->movie_name: '') }}">
                            @error('name')
                                    <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group type_name">
                        <label class="col-md-2 control-label"> Duration (In min)*</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" placeholder="Duration" name="duration"value="{{ old('duration')? old('duration'): ($movies->duration_min? $movies->duration_min: '') }}">
                            @error('duration')
                                    <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group type_name">
                        <label class="col-md-2 control-label"> Director*</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" placeholder="Director" name="director" value="{{ old('director')? old('director'): ($movies->director? $movies->director: '') }}">
                            @error('director')
                                    <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>

                    <div class="form-group long_description">
                        <label class="col-md-2 control-label"> Cast*</label>

                        <div class="col-md-7">
                            <textarea class="form-control" placeholder="Description" id="cast" name="cast" >{{ old('cast')? old('cast'): ($movies->cast? $movies->cast: '') }}</textarea>
                            @error('description')
                                    <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group type_name">
                        <label class="col-md-2 control-label"> Language*</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" placeholder="Language" name="language" value="{{ old('language')? old('language'): ($movies->language? $movies->language: '') }}">
                            @error('language')
                                    <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Is 18+?*</label>

                        <div class="col-md-7">
                            <input type="radio" name="checkage" value="1" {{ old("checkage") == "1"? "checked": ($movies->checkage == "1"? "checked": "") }}> Yes
                            <input type="radio" name="checkage" value="0" {{ old("checkage") == "0"? "checked": ($movies->checkage == "0"? "checked": "") }}> No
                            @error('checkage')
                                    <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                    </div>
                    

                    <div class="form-group type_name">
                        <label class="col-md-2 control-label">Release Date*</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" placeholder="Release Date" name="releasedate" id="releasedate" value="{{ old('releasedate')? old('releasedate'): ($movies->release_date? $movies->release_date: '') }}" autocomplete="off">
                            @error('releasedate')
                                    <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>

                     <div class="form-group long_description">
                        <label class="col-md-2 control-label"> Description*</label>

                        <div class="col-md-7">
                            <textarea class="form-control" placeholder="Description" id="description" name="description">{{ old('description')? old('description'): ($movies->description? $movies->description: '') }}</textarea>
                            @error('description')
                                    <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                    {{-- @if($movies->id==0) --}}
                        <div class="form-group type_name">
                            <label class="col-md-2 control-label">Title Image*</label>

                            <div class="col-md-7">
                            <input type="file" class="form-control" placeholder="Title Image" name="titleimg" value="{{ old('titleimg')? old('titleimg'): ($movies->title_image? $movies->title_image: '') }}">
                                @error('titleimg')
                                <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                    {{-- @endif --}}

                    <div class="form-group type_name">
                        <label class="col-md-2 control-label">Trailer Path*</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control" placeholder="Trailer Path" name="trailerpath" value="{{ old('trailerpath')? old('trailerpath'): ($movies->trailer_link? $movies->trailer_link: '') }}">
                            @error('trailerpath')
                            <span style="color: #BE3636 ;" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div>
                

                    <div class="form-group bi-form-controls">
                        <div class="col-md-9 text-left">
                            <button type="submit" class="btn btn-default pull-right" value="save" name="action" style="margin-right:10px">SAVE </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
      $( "#releasedate").datepicker();
    } );
    </script>
@endsection

