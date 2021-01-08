@extends('template')

@section('main')
	<div id="siswa">
		<h2>tambah user</h2>		
		{!! Form::open(['url' => 'user']) !!}
			@include('user.form',['submitButton' => 'Simpan'])
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop