@extends('template')

@section('main')
	<div id="siswa">
		<h2>tambah siswa</h2>		
		{!! Form::open(['url' => 'siswa','files' => 'true']) !!}
			@include('siswa.form',['submitButton' => 'Simpan'])
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop