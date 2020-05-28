@extends('admin.layout.admindashboard')

@section('content-header')
    <h2>Show Time</h2>
@endsection
@section('content')
<div class="add-button">
    <a href="{{ url('/addshow') }}" class="btn btn-primary">Add Show Time</a>
</div>  
@include('validation.message')
@endsection