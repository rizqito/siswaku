@extends('template')

@section('main')
	<div id="siswa">
		<h2>tambah user</h2>
		{!! Form::model($user,['method' => 'PATCH','files' => true,'action'=>['UserController@update',$user->id]]) !!}			
			@include('user.form',['submitButton' => 'Update'])
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop