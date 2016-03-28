@extends('admin.layout.app')

@section('headerText', 'Add Images')

@section('content')
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	<div class='row'>
		<div class='col-md-12'>
				<form role="form" action="/admin/postImage"  enctype="multipart/form-data" method="POST">
				{{ csrf_field() }}
					<div class="box-body">
						<div class="form-group col-xs-6">
							<label for="name">Name</label>
							<input type="text" class="form-control" id="name" name="name">
						</div>
						<div class="form-group col-xs-6">
							<label for="imageType">Type</label>
							<select name="imageType" class="form-control" >
								<option value="page" selected >Page</option>
								<option value="background" >Background</option>
							</select>
						</div>
						
						<div class="form-group col-xs-12">
							<label for="location">Images</label>
    						<input type="file" class="form-control" name="location[]" multiple="multiple" id="location">
						</div>                

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
	</div>
@endsection