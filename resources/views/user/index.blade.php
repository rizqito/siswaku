@extends('template')

@section('main')
	<div id="siswa">
		<h2>{{ $halaman }}</h2>
		@include('_partial.flash_message')		
		@if(count($user) > 0)
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Level</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@php $i=1; @endphp
					@foreach($user as $u)
					<tr>
						<td>{{ $i++ }}</td>
						<td>{{ $u->name }}</td>
						<td>{{ $u->email }}</td>
						<td>{{ $u->level }}</td>
						<td>
							<div class="box-button">
								{{ link_to('user/'.$u->id.'/edit','Edit',['class'=>'btn btn-warning btn-sm']) }}
							</div>
							<div class="box-button">
								{!! Form::open(['method' => 'DELETE', 'action'=>['UserController@destroy', $u->id]]) !!}
								{!! Form::submit('Delete',['class'=>'btn btn-danger btn-sm']) !!}
								{!! Form::close() !!}
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p>tidak ada data user</p>
		@endif
		<div class="tombol-nav">
			<a href="{{ url('user/create') }}" class="btn btn-primary">Tambah User</a>
		</div>
	</div>
@stop

@section('footer')
	@include('footer')
@stop