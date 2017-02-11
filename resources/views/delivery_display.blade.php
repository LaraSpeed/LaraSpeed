@extends('master')
@section('content')
<h1 class="text-danger">Display Delivery</h1>

    <a href="{{url("/delivery/$delivery->id")}}/edit">Edit</a></br>

    <br/>


       
        <div class="form-group">
            <label class="text-danger text-md">Identifiant : </label>
            <input type ="text" class="form-control" name="identifiant" value = "{{$delivery->identifiant}}"placeholder="Identifiant" readonly required />
        </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Date : </label>
            <div class="input-group"><span class="input-group-addon"><i class="fa fa-calendar"></i></span><input class="form-control" id="date" data-plugin-datepicker="" name="date" value="{{$delivery->date}}" placeholder="MM/DD/-YYYY" type="text"/></div>
        </div>
      
        <div class="form-group">
            <label class="text-danger text-md">Articles : </label>
            <textarea name="articles" rows="10" cols="40" class="form-control"" readonly >{{$delivery->articles}}</textarea>
        </div>
     

    

    @endsection