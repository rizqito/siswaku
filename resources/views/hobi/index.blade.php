@extends('template')

@section('main')
	<div id="siswa">
		<h2>Hobi</h2>
		@include('_partial.flash_message')		
		@if(count($hobi) > 0)
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>HObi</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php $i=1; @endphp
					@foreach($hobi as $h)
					<tr>
						<td>{{ $i++ }}</td>
						<td>{{ $h->nama_hobi }}</td>
						<td>
							<div class="box-button">
								{{ link_to('hobi/'.$h->id.'/edit','Edit',['class'=>'btn btn-warning btn-sm']) }}
							</div>
							<div class="box-button">
								{!! Form::open(['method' => 'DELETE', 'action'=>['HobiController@destroy', $h->id]]) !!}
								{!! Form::submit('Delete',['class'=>'btn btn-danger btn-sm']) !!}
								{!! Form::close() !!}
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p>tidak ada data hobi</p>
		@endif
		<div class="tombol-nav">
			<a href="{{ url('hobi/create') }}" class="btn btn-primary">Tambah Hobi</a>
		</div>
	</div>
@stop

@section('footer')
	@include('footer')
@stop