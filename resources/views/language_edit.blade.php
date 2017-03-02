@extends('master')
@section('content')
<h1 class="text-danger">Edit Language</h1>
    <form method="post" action="{{url("language/$language->language_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
           
        <div class="form-group">
            <label class="text-danger text-md">Name : </label>
             <input type ="text" class="form-control" name="name" value = "{{$language->name}}"placeholder="Name"  required />         </div>
           
          
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection