@extends('admin.layout.app')

@section('headerText', 'Viewing: '.$contact->firstName.' '.$contact->surname)

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
			{{ csrf_field() }}
			<div class="box-body">
				<div class="row">
					<div class="form-group col-xs-3 col-sm-3 col-md-2">
						<label for="firstName">First Name</label><br />
						{{ $contact->firstName }}
					</div>
					<div class="form-group col-xs-3 col-sm-3 col-md-2">
						<label for="surname">Surname</label><br />
						{{ $contact->surname }}
					</div>
					<div class="form-group col-xs-3 col-sm-3 col-md-2">
						<label for="contactNumber">Number</label><br />
						{{ $contact->contactNumber }}
					</div>
					<div class="form-group col-xs-3 col-sm-3 col-md-2">
						<label for="email">Email</label><br />
						<a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-3 col-sm-3 col-md-2">
						<label for="firstLineAddress">First Line Address</label><br />
						{{ $contact->firstLineAddress }}
					</div>
					<div class="form-group col-xs-3 col-sm-3 col-md-2">
						<label for="secondLineAddress">Second Line Address</label><br />
						{{ $contact->secondLineAddress }}
					</div>
					<div class="form-group col-xs-3 col-sm-3 col-md-2">
						<label for="thirdLineAddress">Third Line Address</label><br />
						{{ $contact->thirdLineAddress }}
					</div>
					<div class="form-group col-xs-3 col-sm-3 col-md-2">
						<label for="city">City</label><br />
						{{ $contact->city }}
					</div>
					<div class="form-group col-xs-3 col-sm-3 col-md-2">
						<label for="postcode">Postcode</label><br />
						{{ $contact->postcode }}
					</div>
				</div>
				<div class="row">
					<div class="form-group col-xs-12">
						<label for="question">Question</label><br />
						{{ $contact->question }}
					</div>
				</div>
				<div class="row">
				<a class="btn btn-danger col-xs-12" onClick="return confirm('Are you sure you want to delete {{ $contact->firstName }} {{ $contact->surname }}')" href="/admin/deleteContact/{{ $contact->id }}" role="button">Remove</a>
				</div> 
			</div>
		</div>
	</div>
@endsection