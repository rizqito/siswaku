@extends('template')

@section('main')
	<div id="siswa">
		<h2>tambah hobi</h2>
		{!! Form::model($hobi,['method' => 'PATCH','action'=>['HobiController@update',$hobi->id]]) !!}			
			@include('hobi.form',['submitButton' => 'Update'])
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop