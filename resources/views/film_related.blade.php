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
            <th class="c_numeric">Category<br/>id</th>
             <th class="c_string">Name</th>
          </thead>
@forelse($film->category as  $category)
    <tbody>
            <td class="c_numeric">{{$category->category_id}}</td>
             <td class="c_string">{{$category->name}}</td>
          </tbody>
@empty
    <td>No category for film</td>
@endforelse
</table>    @else
    <label class="text-danger">No film.</label>
    @endif
@endsection