@extends('template')

@section('main')
	<div id="siswa">
		<h2>tambah siswa</h2>
		{!! Form::model($kelas,['method' => 'PATCH','files' => true,'action'=>['KelasController@update',$kelas->id]]) !!}			
			@include('kelas.form',['submitButton' => 'Update'])
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop