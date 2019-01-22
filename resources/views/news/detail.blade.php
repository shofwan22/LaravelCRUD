@extends('layouts.template')

@section('content')
	<link rel="stylesheet" type="text/css" href="{{URL('css/detail2.css')}}">
	<div class="panel panel-default">
		<div class="panel-heading">
			<p class="tgl">{{date('d-m-Y',strtotime($data->tanggal))}}</p>
		</div>
		<div class="panel-body">
			<h2>{{$data->judul}}</h2>
			<img src="{{URL($data->image)}}">
			<p class="isi">{{$data->isi}}</p>
		</div>
		<div class="panel-footer">
			<p class="penulis">Penulis : {{$data->penulis}}</p>
		</div>
	</div>
	
	

@endsection