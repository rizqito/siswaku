@extends('template')

@section('main')
	<div id="siswa">
		<h2>tambah hobi</h2>		
		{!! Form::open(['url' => 'hobi']) !!}
			@include('hobi.form',['submitButton' => 'Simpan'])
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop