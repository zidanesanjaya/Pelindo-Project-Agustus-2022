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
    <div class="container-sm">
        <form action="{{ route('update',$ship->id) }}" method="POST">
        @csrf
            <div class="form-group mb-3">
                <label for="nama_kapal">Nama Kapal</label>
                <input type="text" class="form-control" name="nama_kapal" id="nama_kapal" value="{{$ship->nama_kapal}}">
            </div>
            <div class="form-group mb-3">
                <label for="schedule">Schedule</label>
                <input type="date" class="form-control" name="schedule" id="schedule" value="{{$ship->schedule}}">
            </div>
            <div class="form-group mb-3">
                <label for="keberangkatan">Keberangkatan</label>
                <input type="time" class="form-control" name="keberangkatan" id="keberangkatan" value="{{$ship->keberangkatan}}">
            </div>
            <div class="form-group mb-3">
                <label for="kedatangan">Kedatangan</label>
                <input type="time" class="form-control" name="kedatangan" id="kedatangan" value="{{$ship->kedatangan}}">
            </div>
            <div class="form-group mb-3">
                <label for="kedatangan">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="Estimate" selected>Estimate</option>
                    <option value="Landed">Landed</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
	
	
</body>
</html>
@endsection
