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

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
	<body>
			<div class="table-wrapper">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="logo_pelindo">
							<a href="{{url ('http://127.0.0.1:8000/kd')}}"><img src="{{asset ('/img/logo-pelindo.png')}}" class="logo_pelindo"></a>
						</div>
					</div>

					<div class="col-9">
						<div class="table-title">
							<h2>Jadwal <b>keberangkatan</b> Kapal</h2>
						</div>
					</div>
				</div>
				
				<br><hr><br>

				<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>Logo</th>
										<th colspan="2">Nama Kapal</th>
										<th>Schedule</th>
										<th>Keberangkatan</th>
										<th>Status</th>
										<th>Destination</th>
									</tr>
								</thead>
								<tbody>
									@forelse($ship_ as $s1)
									<tr>
									<?php
										for ($i=0; $i < sizeof($kapal) ; $i++) { 
											if($s1->nama_kapal == $kapal[$i]->nama_kapal ){
										?>
											<td><img src="{{$kapal[$i]->path_logo}}" style="width: 80%; height: 60%"></td>
										<?php
											}
										} 
									?>
										<td colspan="2">{{$s1->nama_kapal}}</td>
										<td>{{date("d-M-Y", strtotime($s1->schedule))}}</td>
										<td>{{$s1->keberangkatan}}</td>
										<td>{{$s1->status}}</td>
										<td>{{$s1->destination}}</td>
									</tr>
									@empty
									<tr>
										<td colspan="12">There are no Ship.</td>
									</tr>
									@endforelse 
								</tbody>
							</table>
							{{$ship->links()}}
						</div>
	</body>
</html>