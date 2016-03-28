@extends('admin.layout.app')

@section('headerText', 'List MOT\'s')

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
                    <th>MOT Date</th>
                    <th></th>
                </tr>
                @foreach($MOTS as $MOT)
                    <tr>
                        <td>{{ $MOT->id }}</td>
                        <td>{{ $MOT->name }}</td>
                        <td><a href="mailto:{{ $MOT->email }}">{{ $MOT->email }}</a></td>
                        <td>{{ $MOT->number }}</td>
                        <td>{{ $MOT->day }}/{{ $MOT->month }}</td>
                        <td>
                            <a href="/admin/deleteMOT/{{ $MOT->id }}" onClick="return confirm('Are you sure you want to delete {{ $MOT->name }}')" class="btn btn-danger" role="button"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection