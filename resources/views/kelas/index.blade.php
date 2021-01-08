@extends('template')

@section('main')
	<div id="siswa">
		<h2>Kelas</h2>
		@include('_partial.flash_message')		
		@if(count($kelas) > 0)
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Kelas</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php $i=1; @endphp
					@foreach($kelas as $k)
					<tr>
						<td>{{ $i++ }}</td>
						<td>{{ $k->nama_kelas }}</td>
						<td>
							<div class="box-button">
								{{ link_to('kelas/'.$k->id.'/edit','Edit',['class'=>'btn btn-warning btn-sm']) }}
							</div>
							<div class="box-button">
								{!! Form::open(['method' => 'DELETE', 'action'=>['KelasController@destroy', $k->id]]) !!}
								{!! Form::submit('Delete',['class'=>'btn btn-danger btn-sm']) !!}
								{!! Form::close() !!}
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p>tidak ada data kelas</p>
		@endif
		<div class="tombol-nav">
			<a href="{{ url('kelas/create') }}" class="btn btn-primary">Tambah Kelas</a>
		</div>
	</div>
@stop

@section('footer')
	@include('footer')
@stop