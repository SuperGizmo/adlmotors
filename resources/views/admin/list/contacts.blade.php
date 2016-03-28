@extends('admin.layout.app')

@section('headerText', 'List Contacts')

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
              <th>Email</th>
              <th>Contact Number</th>
              <th>Enquired</th>
              <th></th>
            </tr>
            @foreach($contacts as $contact)
            <tr>
              <td>{{ $contact->id }}</td>
              <td>{{ $contact->firstName }} {{ $contact->surname }}</td>
              <td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td>
              <td>{{ $contact->contactNumber }}</td>
              <td>{{ $contact->created_at }}</td>
              <td>
                <a href="/admin/viewContact/{{ $contact->id }}" title="Contact" class="btn btn-warning" role="button"><i class="fa fa-user "></i></a>
                <a href="/admin/deleteContact/{{ $contact->id }}" onClick="return confirm('Are you sure you want to delete {{ $contact->firstName }} {{ $contact->surname }}')" class="btn btn-danger" role="button"><i class="fa fa-trash-o"></i></a>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
	</div>
@endsection