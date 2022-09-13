<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta http-equiv="refresh" content="20">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="/img/logo-head.png" type="image/icon type">
	<title>Keberangkatan</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="/css/index.css" rel="stylesheet">
	<link href="/js/index.js" rel="stylesheet">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<style>
		.table-title1::before {
			content: "Jadwal Keberangkatan Kapal";
			animation: table-title1 infinite 3s;
		}

		@keyframes table-title1 {

			0% {
				content: "Jadwal Keberangkatan Kapal";
			}

			50% {
				content: "Ship Departure Schedule";
			}
		}

		.kapal1::before {
			content: "Kapal";
			animation: kapal1 infinite 3s;
		}

		@keyframes kapal1 {

			0% {
				content: "Kapal";
			}

			50% {
				content: "Ship";
			}
		}

		.jadwal1::before {
			content: "Jadwal";
			animation: jadwal1 infinite 3s;
		}

		@keyframes jadwal1 {

			0% {
				content: "Jadwal";
			}

			50% {
				content: "Schedule";
			}
		}

		.tujuan1::before {
			content: "Tujuan";
			animation: tujuan1 infinite 3s;
		}

		@keyframes tujuan1 {

			0% {
				content: "Tujuan";
			}

			50% {
				content: "Destination";
			}
		}

		.keberangkatan1::before {
			content: "Keberangkatan";
			animation: keberangkatan1 infinite 3s;
		}

		@keyframes keberangkatan1 {

			0% {
				content: "Keberangkatan";
			}

			50% {
				content: "Departure";
			}
		}

	</style>

	</head>
	<body onload="startTime()">
			<div class="table-wrapper">
			<div>
				<div class="row">
					<div class="col">
						<div class="logo_pelindo">
						<a href="{{url ('http://127.0.0.1:8000/kd')}}"><img src="{{asset ('/img/logo-pelindo.png')}}" class="logo_pelindo"></a>
						</div>
					</div>
					<div class="col-9">
						<div class="table-title" style="right: 50%; margin-right: 1%;">
							<h2><span class="table-title1"></span></h2>
						</div>
					</div>
				</div>
				
			<br><hr><br>

			<button type="button" class="btn btn-primary" style="float: right; width: 135px; height: 60px; font-size: 30px;"><div id="txt"></div></button>

			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Logo</th>
						<th colspan="2"><span class="kapal1"></span></th>
						<th><span class="jadwal1"></span></th>
						<th><span class="tujuan1"></span></th>
						<th><span class="keberangkatan1"></span></th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
				@forelse($ship_ as $s1)					
					<tr>
						<?php
							for ($i=0; $i < sizeof($kapal) ; $i++) { 
								if($s1->nama_kapal == $kapal[$i]->nama_kapal ){
							?>
						<td><img src="{{$kapal[$i]->path_logo}}" style="width: 150%; height: 150%"></td>
						<?php
									}
								} 
							?>
						<td colspan="2">{{$s1->nama_kapal}}</td>
						<td>{{date("d-M-Y", strtotime($s1->schedule))}}</td>
						<td>{{$s1->destination}}</td>
						<td>{{$s1->keberangkatan}}</td>
						@if($s1->status == 'Estimasi')
						<td class = 'text-primary'><b>{{$s1->status}}</b></td>
						@elseif($s1->status == 'Bersandar')
						<td class = 'text-success'><b>{{$s1->status}}</b></td>
						@elseif($s1->status == 'Tertunda')
						<td class = 'text-danger'><b>{{$s1->status}}</b></td>
						@endif										
					</tr>
					@empty
					<tr>
						<td colspan="12">Tidak ada Kapal.</td>
					</tr>
					@endforelse 
				</tbody>
			</table>
			{{$ship->links()}}
			</div>
		<script>
			function startTime() {
			const today = new Date();
			let h = today.getHours();
			let m = today.getMinutes();
			let s = today.getSeconds();
			m = checkTime(m);
			s = checkTime(s);
			document.getElementById('txt').innerHTML =  h + ":" + m + ":" + s;
			setTimeout(startTime, 1000);
			}

			function checkTime(i) {
			if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
			return i;
			}
		</script>
	</body>
</html>