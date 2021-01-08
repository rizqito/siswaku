@if(isset($siswa))
	{!! Form::hidden('id', $siswa->id) !!}
@endif

@if($errors->any())
	<div class="form-group {{ $errors->has('name') ? 'has-error' : 'has-success' }}">
@else
	<div class="form-group">
@endif
	{!! Form::label('name','Nama:',['class'=>'control-label']) !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
	@if($errors->has('name'))
		<span class="help-block">{{ $errors->first('name') }}</span>
	@endif
</div>

@if($errors->any())
	<div class="form-group {{ $errors->has('email') ? 'has-error' : 'has-success' }}">
@else
	<div class="form-group">
@endif
	{!! Form::label('email','Email:',['class'=>'control-label']) !!}
	{!! Form::text('email', null, ['class' => 'form-control']) !!}
	<span class="help-block">{{ $errors->first('email') }}</span>
</div>

@if($errors->any())
	<div class="form-group {{ $errors->has('level') ? 'has-error' : 'has-success' }}">
@else
	<div class="form-group">
@endif
	{!! Form::label('level','Level:',['class'=>'control-label']) !!}	
	<label>{!! Form::radio('level','operator') !!} Operator</label>
	<label>{!! Form::radio('level','admin') !!} Administrator</label>
	@if($errors->has('level'))
		<span class="help-block">{{ $errors->first('level') }}</span>
	@endif
</div>

@if($errors->any())
	<div class="form-group {{ $errors->has('password') ? 'has-error' : 'has-success' }}">
@else
	<div class="form-group">
@endif
	{!! Form::label('password','Password:',['class'=>'control-label']) !!}
	{!! Form::password('password', null, ['class' => 'form-control']) !!}
	<span class="help-block">{{ $errors->first('password') }}</span>
</div>

@if($errors->any())
	<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : 'has-success' }}">
@else
	<div class="form-group">
@endif
	{!! Form::label('password_confirmation','Password Confirmation:',['class'=>'control-label']) !!}
	{!! Form::password('password_confirmation', null, ['class' => 'form-control']) !!}
	<span class="help-block">{{ $errors->first('password_confirmation') }}</span>
</div>

<div class="form-group">				
	{!! Form::submit($submitButton, ['class'=>'btn btn-primary form-control']) !!}
</div>