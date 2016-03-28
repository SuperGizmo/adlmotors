@extends('admin.layout.app')

@section('headerText', 'Create a Page')

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
			<form role="form" action="/admin/postPage" method="POST">
			{{ csrf_field() }}
				<div class="box-body">
					<div class="form-group col-xs-6">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name">
					</div>
					<div class="form-group col-xs-6">
						<label for="url">URL</label>
						<input type="text" class="form-control" id="url" name="url">
					</div>
					<div class="form-group">
						<label for="metaDescription">meta Description</label>
						<input type="text" class="form-control" id="metaDescription" name="metaDescription">
					</div>
					<div class="form-group">
						<label for="content">Content</label>
						<textarea class="textarea form-control" name="content" placeholder="Place some text here"></textarea>
					</div>
					<div class="form-group">
						<label for="newsletter">Send Newsletter</label>
						<select class="form-control" id="newsletter" name="newsletter">
							<option value="1" selected>Do not send</option>
							<option value="2">Send Me</option>
						</select>
					</div>
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>
		</div>
</div>
@endsection