@extends('admin.layout.admindashboard')

@section('content-header')
    <h2>Movie</h2>
@endsection
@section('content')
<div class="add-button">
    <a href="{{ url('admin/movie/add') }}" class="btn btn-primary">Add Movies</a>
</div>  @include('validation.message')

    <div class="row">
        <div class="panel-body">
            <table class="table table-striped deals-table">
              <thead>
                <tr>
                    <th>Movie</th>
                    <th>Release Date</th>
                    <th>Movie Duration</th>
                    <th>Movie Director</th>
                    <th>Cast Members</th>
                    <th>Active Movie</th>
                    {{-- <th>Title Image</th> --}}
                    <th>Action</th>
                    
                
                </tr>
              </thead>
              <tbody>
                @if (count($movies) > 0)
                @foreach ($movies as $movie)
                    <tr>
                        <td>{{ $movie->movie_name }}</td>
                        <td>{{ $movie->release_date }}</td>
                        <td>{{ $movie->duration_min }}</td>
                        <td>{{ $movie->director }}</td>
                        <td>{{ $movie->cast }}</td>
                        @if($movie->isActive==1)
                            <td>Yes</td>
                        
                        @else
                            <td>No</td>
                        
                        @endif
                        {{-- <td>{{$movie->isActive}}</td> --}}
                        <td>
                            <a href="{{ url('admin/status') }}/{{ $movie->id }}"  class="ibtn btn-icon"> <i class="fa fa-eye" rel="tootltip" title="Active movie status"></i> </a>
                            <a href="{{ url('admin/movie/add') }}/{{ $movie->id }}" class="ibtn btn-icon"> <i class="fa fa-pen" rel="tootltip"  aria-hidden="true" title="Edit"></i> </a>  
                            <a href="{{ url('admin/delete') }}/{{ $movie->id }}" onclick="return confirmDelete()" class="ibtn btn-icon"> <i class="fa fa-remove" rel="tootltip" title="Delete"></i> </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8">No records found</td>
                </tr>
            @endif
               
              </tbody>
            </table>
          </div>
    </div>
@endsection