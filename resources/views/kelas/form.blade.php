@if(isset($siswa))
	{!! Form::hidden('id', $siswa->id) !!}
@endif

@if($errors->any())
	<div class="form-group {{ $errors->has('nama_kelas') ? 'has-error' : 'has-success' }}">
@else
	<div class="form-group">
@endif
	{!! Form::label('nama_kelas','Kelas:',['class'=>'control-label']) !!}
	{!! Form::text('nama_kelas', null, ['class' => 'form-control']) !!}
	@if($errors->has('nama_kelas'))
		<span class="help-block">{{ $errors->first('nama_kelas') }}</span>
	@endif
</div>

<div class="form-group">				
	{!! Form::submit($submitButton, ['class'=>'btn btn-primary form-control']) !!}
</div>