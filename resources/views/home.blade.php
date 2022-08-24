@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Budi's Projects</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="/css/index.css" rel="stylesheet">
<link href="/js/index.js" rel="stylesheet">
  
  <body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>ss</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="{{route('create_page')}}"class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Add New ss</span></a>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th colspan="3">Nama Kapal</th>
                        <th>Schedule</th>
						<th>Keberangkatan</th>
                        <th>Kedatangan</th>
						<th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
					@forelse($ship as $ss)
                    <tr>
                        <td colspan="3">{{$ss->nama_kapal}}</td>
                        <td>{{$ss->schedule}}</td>
						<td>{{$ss->kedatangan}}</td>
                        <td>{{$ss->keberangkatan}}</td>
						<td>{{$ss->status}}</td>
                        <td>
                            <a href="{{route('edit',$ss->id)}}" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							@csrf
                    		@method('DELETE')
                            <a href="{{route('delete',$ss->id) }}" type="submit" class="delete"><i class="material-icons" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
					@empty
					<tr>
						<td colspan="3">There are no users.</td>
					</tr>
					@endforelse 
                </tbody>
            </table>
			{!! $ship->links() !!}

        </div>
    </div>
	
	
</body>
</html>
@endsection
