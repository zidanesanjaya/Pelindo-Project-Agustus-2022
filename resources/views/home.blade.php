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
						<h2>Manage <b>Ship</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="{{route('create_page')}}"class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="material-icons">&#xE147;</i> <span>Add New Ship</span></a>
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th colspan="3">Nama Kapal</th>
                        <th>Schedule</th>
                        <th>Kedatangan</th>
						<th>Keberangkatan</th>
						<th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
					@forelse($ship as $ss)
                    <tr>
                        <td colspan="3">{{$ss->nama_kapal}}</td>
                        <td>{{date("d-M-Y", strtotime($ss->schedule))}}</td>
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
						<td colspan="12">There are no Ship.</td>
					</tr>
					@endforelse 
                </tbody>
            </table>
			{!! $ship->links() !!}

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{ route('store') }}" method="POST">
        @csrf
            <div class="form-group mb-3">
                <label for="nama_kapal">Nama Kapal</label>
                <select name="nama_kapal" id="nama_kapal" class="form-control">
                    <option value="Kapal 1" selected>Kapal 1</option>
                    <option value="Kapal 2" >Kapal 2</option>
                    <option value="Kapal 3" >Kapal 3</option>
                    <option value="Kapal 4" >Kapal 4</option>
                    <option value="Kapal 5" >Kapal 5</option>
                </select>
                <!-- <input type="text" class="form-control" name="nama_kapal" id="nama_kapal"> -->
            </div>
            <div class="form-group mb-3">
                <label for="schedule">Schedule</label>
                <input type="date" class="form-control" name="schedule" id="schedule">
            </div>
            <div class="form-group mb-3">
                <label for="kedatangan">Kedatangan</label>
                <input type="time" class="form-control" name="kedatangan" id="kedatangan">
            </div>
            <div class="form-group mb-3">
                <label for="keberangkatan">Keberangkatan</label>
                <input type="time" class="form-control" name="keberangkatan" id="keberangkatan">
            </div>
            <div class="form-group mb-3">
                <label for="kedatangan">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="Estimate" selected>Estimate</option>
                    <option value="Leanded">Leanded</option>
                    <option value="Delay">Delay</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
        </div>
    </div>
    </div>
	
	
</body>
</html>
@endsection
