@extends('master')
@section('content')
<h1 class="text-danger">Create Film</h1>
    <form action="{{url("/film")}}" method="post">

		<input type="hidden" name="_token" value="{{ csrf_token() }}">

		     
        <div class="form-group">
			<label class="text-danger text-md" id="title">Title * : </label>
			 <input type ="text" class="form-control" name="title" placeholder="Title"  required /> 		</div> <br/>
		  
        <div class="form-group">
			<label class="text-danger text-md" id="description">Description * : </label>
			 <textarea name="description" rows="4" cols="20" class="form-control"" required></textarea> 		</div> <br/>
		  
        <div class="form-group">
			<label class="text-danger text-md" id="release_year">Release year * : </label>
			 <input type ="number" class="form-control" name="release_year"  data-plugin-maxlength="" maxlength="10"placeholder="Release year"  required /> 		</div> <br/>
		    
        <div class="form-group">
			<label class="text-danger text-md" id="rental_duration">Rental duration * : </label>
							<div class="input-group mb-md">
					<span class="input-group-addon">days</span>
					<input type ="number" class="form-control" name="rental_duration"  data-plugin-maxlength="" maxlength="10"placeholder="Rental duration"  required />
				</div>
					</div> <br/>
		  
        <div class="form-group">
			<label class="text-danger text-md" id="rental_rate">Rental rate * : </label>
							<div class="input-group mb-md">
					<span class="input-group-addon">$</span>
					<input type ="number" class="form-control" name="rental_rate"  data-plugin-maxlength="" maxlength="10"placeholder="Rental rate"  required />
				</div>
					</div> <br/>
		  
        <div class="form-group">
			<label class="text-danger text-md" id="length">Length * : </label>
							<div class="input-group mb-md">
					<span class="input-group-addon">minutes</span>
					<input type ="number" class="form-control" name="length"  data-plugin-maxlength="" maxlength="10"placeholder="Length"  required />
				</div>
					</div> <br/>
		  
        <div class="form-group">
			<label class="text-danger text-md" id="replacement_cost"> Replacement cost : </label>
							<div class="input-group mb-md">
					<span class="input-group-addon">$</span>
					<input type ="number" class="form-control" name="replacement_cost"  data-plugin-maxlength="" maxlength="10"placeholder="Replacement cost"  required />
				</div>
					</div> <br/>
		        
			<div class="form-group">
			<label class="text-danger text-md">Language : </label>

			<select class="form-control" name="language">
				@forelse(\App\Language::all() as  $language)
					<option value="{{$language->language_id}}" @if(session('defaultSelect', 'none') == $language->language_id) {{"selected=\"\"selected\""}} @endif>
						{{$language->name}}
					</option>
				@empty
					<option value="-1">No language</option>
				@endforelse
			</select>
		</div><br/>

		 		<div class="form-group">
			<label class="text-danger text-md">Categories : </label>

			<select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one category"  name="category[]">
					@forelse(\App\Category::all() as  $category)
					    <option value="{{$category->category_id}}" @if(session('defaultSelect', 'none') == $category->category_id) {{"selected=\"\"selected\""}} @endif>
					{{$category->name}}
					    </option>
					@empty
					    <option value="-1">No category</option>
					@endforelse
			</select>
		</div><br/>
	 		<div class="form-group">
			<label class="text-danger text-md">Actors : </label>

			<select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one actor"  name="actor[]">
					@forelse(\App\Actor::all() as  $actor)
					    <option value="{{$actor->actor_id}}" @if(session('defaultSelect', 'none') == $actor->actor_id) {{"selected=\"\"selected\""}} @endif>
					{{$actor->first_name}}
					    </option>
					@empty
					    <option value="-1">No actor</option>
					@endforelse
			</select>
		</div><br/>
	   
		<div class="row">

			<div class="col-md-3">
				<label class="text-danger text-md"> * = Mandatory fields</label>
			</div>

		</div> <br/>

		<div class="row">
			<div class="col-md-3">
			    <button type="submit" name="carl" class="btn btn-primary">Create and return to list</button>
			</div>

			<div class="col-md-3">
				<button type="submit" name="cas" class="btn btn-primary">Create and Stay</button>
			</div>

			<div class="col-md-3">
			    <button type="reset" onclick="goBack();" class="btn btn-danger">Cancel and return to list</button>
			</div>
		</div>
    </form>


    <!-- Specific Page Vendor -->
    <script src="http://localhost/assets/vendor/select2/js/select2.js"></script>
    <script src="http://localhost/assets/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
    <script src="http://localhost/assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
    <script src="http://localhost/assets/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
@endsection