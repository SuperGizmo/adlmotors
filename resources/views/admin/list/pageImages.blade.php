@extends('admin.layout.app')

@section('headerText', 'Page Images')

@section('content')

  @if (session('success'))
       <div class="alert alert-success">
          <b>SUCCESS:</b> {{ session('success') }}
       </div>
  @endif
	<div class='row'>
    @foreach($page->images as $pageImage)
      <div class="well col-xs-2"><a href="/admin/removeImageToPage/{{ $page->id }}/{{ $pageImage->id }}"><img src="/images/250/{!! $pageImage->location !!}" class="img-responsive" /></a></div>
    @endforeach
	</div>
  <div class='row'>
    <div class="col-xs-12">
        <section class="content-header">
            <h1>
              Unselected Images
            </h1>
        </section>
    </div>
  </div>
  <div class='row'>
    @foreach($images as $image)
      <div class="well col-xs-2"><a href="/admin/addImageToPage/{{ $page->id }}/{{ $image->id }}"><img src="/images/250/{!! $image->location !!}" class="img-responsive" /></a></div>
    @endforeach
  </div>
@endsection