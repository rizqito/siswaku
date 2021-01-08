@extends('template')

@section('main')
	<div id="siswa">
		<h2>tambah siswa</h2>
		{!! Form::model($siswa,['method' => 'PATCH','files' => true,'action'=>['SiswaController@update',$siswa->id]]) !!}			
			@include('siswa.form',['submitButton' => 'Update'])
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop