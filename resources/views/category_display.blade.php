@extends('master')
@section('content')
<h1 class="text-danger">Display Category</h1>

    <a href="{{url("/category/$category->category_id")}}/edit">Edit</a></br>

    <br/>

       
    <label class="text-primary">Name : </label>
    <p>{{$category->name}}</p>

       
    
    @if(isset($category->film))
            @else
        <label class="text-danger">No film related to this category.</label>
    @endif
    @endsection