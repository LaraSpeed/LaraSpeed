@extends('master')
@section('content')
@if(isset($film->language))
    <h3 class="text-danger">Language : </h3>
     {{$film->language->name}}
      @else
    <label class="text-danger">No film.</label>
    @endif
    @if(isset($film->category))
    <h1 class="text-danger">List of Categorys</h1>
<table class="table">
    <thead>
            <th>Category id</th>
             <th>Name</th>
          </thead>
@forelse($film->category as  $category)
    <tbody>
            <td>{{$category->category_id}}</td>
             <td>{{$category->name}}</td>
          </tbody>
@empty
    <td>No category for film</td>
@endforelse
</table>    @else
    <label class="text-danger">No film.</label>
    @endif
@endsection