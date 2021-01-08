@extends('template')

@section('main')
	<div id="siswa">
		<h2>tambah kelas</h2>		
		{!! Form::open(['url' => 'kelas']) !!}
			@include('kelas.form',['submitButton' => 'Simpan'])
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop