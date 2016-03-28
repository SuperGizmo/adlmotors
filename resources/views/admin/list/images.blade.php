@extends('admin.layout.app')

@section('headerText', 'Page Images')

@section('content')

	@if (session('success'))
	     <div class="alert alert-success">
	        <b>SUCCESS:</b> {{ session('success') }}
	     </div>
	@endif

	@if (session('error'))
	     <div class="alert alert-danger">
	        <b>ERROR:</b> {{ session('error') }}
	     </div>
	@endif
	<div class='row'>
		<div class="col-xs-12">
      @foreach($pageImages as $pageImage)
        <div class="well col-xs-2">
          <a href="/admin/deleteImage/{{ $pageImage->id }}" onClick="return confirm('Are you sure you want to remove this image: {{ $pageImage->name }}')"><img src="{{ asset("images/300/".$pageImage->location) }}" class="img-responsive" /></a>
        </div>
      @endforeach
    </div>

  <div class='row'>
    <div class="col-xs-12">
        <section class="content-header">
            <h1>
              Background Images
            </h1>
        </section>
    </div>
  </div>
  <div class='row'>
    <div class="col-xs-12">
      @foreach($backgroundImages as $backgroundImage)
        <div class="well col-xs-2">
          <a href="/admin/deleteImage/{{ $backgroundImage->id }}" onClick="return confirm('Are you sure you want to remove this image: {{ $backgroundImage->name }}')"><img src="{{ asset("images/300/".$backgroundImage->location) }}" class="img-responsive" /></a>
        </div>
      @endforeach
    </div>
  </div>
@endsection