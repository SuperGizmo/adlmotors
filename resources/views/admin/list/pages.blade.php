@extends('admin.layout.app')

@section('headerText', 'List Pages')

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
          <table class="table table-striped">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>URL</th>
              <th>Updated</th>
              <th></th>
            </tr>
            @foreach($pages as $page)
            <tr>
              <td>{{ $page->id }}</td>
              <td>{{ $page->name }}</td>
              <td>{{ $page->url }}</td>
              <td>{{ $page->updated_at }}</td>
              <td>
                  <a href="/admin/pageImages/{{ $page->id }}" title="Page Images" class="btn btn-warning" role="button"><i class="fa fa-file-image-o "></i></a>

                @if($page->live == "Y")
                  <a href="/admin/deactivatePage/{{ $page->id }}" onClick="return confirm('Are you sure you want to deactivate {{ $page->name }}')" title="Deactivate Page" class="btn btn-success" role="button"><i class="fa fa-eye "></i></a>
                @else
                  <a href="/admin/activatePage/{{ $page->id }}" onClick="return confirm('Are you sure you want to activate {{ $page->name }}')" title="Activate Page" class="btn btn-warning" role="button"><i class="fa fa-eye-slash"></i></a>
                @endif

                @if($page->hidden == "N")
                  <a href="/admin/hidePage/{{ $page->id }}" title="Hide Page" class="btn btn-success" role="button"><i class="fa fa-eye "></i></a>
                @else
                  <a href="/admin/unhidePage/{{ $page->id }}" title="Unhide Page" class="btn btn-warning" role="button"><i class="fa fa-eye-slash"></i></a>
                @endif

                <a href="/admin/editPage/{{ $page->id }}" class="btn btn-primary" role="button"><i class="fa fa-pencil-square-o"></i></a>
                <a href="/admin/deletePage/{{ $page->id }}" onClick="return confirm('Are you sure you want to delete {{ $page->name }}')" class="btn btn-danger" role="button"><i class="fa fa-trash-o"></i></a>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
	</div>
  <div class='row'>
    <div class="col-xs-12">
        <section class="content-header">
            <h1>
              <small>Deleted pages</small>
            </h1>
        </section>
    </div>
  </div>
  <div class='row'>
    <div class="col-xs-12">
          <table class="table table-striped">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>URL</th>
              <th>deleted</th>
              <th></th>
            </tr>
            @foreach($trashed as $trashed)
            <tr>
              <td>{{ $trashed->id }}</td>
              <td>{{ $trashed->name }}</td>
              <td>{{ $trashed->url }}</td>
              <td>{{ $trashed->deleted_at }}</td>
              <td>
                <a href="/admin/undeletePage/{{ $trashed->id }}" onClick="return confirm('Are you sure you want to undelete {{ $trashed->name }}')" class="btn btn-danger" role="button"><i class="fa fa-plus-square-o"></i></a>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
  </div>
@endsection