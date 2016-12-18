@extends('master')
@section('content')
<h1 class="text-danger">Film add form</h1>
<form action="{{url("/film")}}" method="post">     
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="title">Title * : </label>
			</div>
			<div class="col-md-7">
			<input type ="text" class="form-control" name="title" placeholder="Title"  required />
			</div>
		</div> <br/>
		  
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="description">Description * : </label>
			</div>
			<div class="col-md-7">
			<textarea name="description" rows="4" cols="20" class="form-control" required></textarea>
			</div>
		</div> <br/>
		  
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="release_year"> Release year : </label>
			</div>
			<div class="col-md-3">
			<input type ="number" class="form-control" name="release_year"  data-plugin-maxlength="" maxlength="10"placeholder="Release year"  required />
			</div>
		</div> <br/>
		    
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="rental_duration">Rental duration * : </label>
			</div>
			<div class="col-md-3">
			<input type ="number" class="form-control" name="rental_duration"  data-plugin-maxlength="" maxlength="10"placeholder="Rental duration"  required />
			</div>
		</div> <br/>
		  
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="rental_rate">Rental rate * : </label>
			</div>
			<div class="col-md-3">
			<input type ="number" class="form-control" name="rental_rate"  data-plugin-maxlength="" maxlength="10"placeholder="Rental rate"  required />
			</div>
		</div> <br/>
		  
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="length">Length * : </label>
			</div>
			<div class="col-md-3">
			<input type ="number" class="form-control" name="length"  data-plugin-maxlength="" maxlength="10"placeholder="Length"  required />
			</div>
		</div> <br/>
		  
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<div class="row">
			<div class="col-md-2">
			<label class="text-primary" id="replacement_cost">Replacement cost * : </label>
			</div>
			<div class="col-md-3">
			<input type ="number" class="form-control" name="replacement_cost"  data-plugin-maxlength="" maxlength="10"placeholder="Replacement cost"  required />
			</div>
		</div> <br/>
		        
			<div class="row">
			<div class="col-md-2">
				<label class="text-primary">Language : </label>
			</div>

			<div class="col-md-5">
				<select class="form-control" name="language">
					@forelse(\App\Language::all() as  $language)
					<option value="{{$language->language_id}}" @if(session('defaultSelect', 'none') == $language->language_id) {{"selected=\"\"selected\""}} @endif>
						{{$language->name}}
					</option>
					@empty
					<option value="-1">No language</option>
					@endforelse
				</select>
			</div>
		</div><br/>
		 		<div class="row">
			<div class="col-md-2">
				<label class="text-primary">Categorys : </label>
			</div>

			<div class="col-md-7">
				<select multiple data-plugin-selectTwo class="form-control populate" title="Please select at least one category"  name="category[]">
					@forelse(\App\Category::all() as  $category)
					<option value="{{$category->category_id}}" @if(session('defaultSelect', 'none') == $category->category_id) {{"selected=\"\"selected\""}} @endif>
					{{$category->name}}
					</option>
					@empty
					<option value="-1">No category</option>
					@endforelse
				</select>
			</div>

		</div><br/>
	  
		<div class="row">
			<div class="col-md-2">
				<label class="text-danger"> * = Mandatory fields</label>
			</div>
		</div> <br/>

		<div class="row">
			<div class="col-md-2">
			<button type="submit" class="btn btn-primary">Create and return to list</button>
			</div>

			<div class="col-md-2 col-md-offset-4">
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