@extends('master')
@section('content')
<h1 class="text-danger">Edit Country</h1>
    <form method="post" action="{{url("country/$country->country_id")}}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
           
        <div class="form-group">
            <label class="text-danger text-md">Country : </label>
            <input type ="text" class="form-control" name="country" value = "{{$country->country}}"placeholder="Country"  required />
        </div>
           
            @if(isset($country->city))
        <label class="text-danger text-md">Add Cities</label>
        <select id="city" name="city[]" multiple="multiple" size="10">
            @forelse(\App\City::all()->sortBy('city') as  $city)
                <option value="{{$city->city_id}}" @foreach($country->city as  $citytmp) @if($citytmp->city_id == $city->city_id) selected = "selected" @endif @endforeach>
                    {{$city->city}}
                </option>
            @empty
                <option value="-1">No city</option>
            @endforelse
        </select><br/>
        <script> $('#city').bootstrapDualListbox(
            {
                nonSelectedListLabel: 'Non-selected City',
                selectedListLabel: 'Selected City',
                moveOnSelect: true,
                nonSelectedFilter: ''
            }
        ); </script>
    @else
            @endif
     
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update" />
        </div>

    </form>@endsection