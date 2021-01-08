@extends('template')

@section('main')
	<div id="siswa">
		<h2>{{ $halaman }}</h2>
		@include('_partial.flash_message')
		@include('siswa.form_pencarian')
		@if(!empty($siswa))
			@if(Auth::check())
			<a href="{{ url('siswa/create') }}" class="btn btn-primary">Tambah Siswa</a>
			@endif
		<br><br>
		<table class="table">
			<thead>
				<tr>
					<th>NISN</th>
					<th>Nama</th>
					<th>Kelas</th>
					<th>Tgl Lahir</th>
					<th>JK</th>
					<th>Telepon</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($siswa as $s)
				<tr>
					<td>{{ $s->nisn }}</td>
					<td>{{ $s->nama_siswa }}</td>
					<td>{{ $s->kelas->nama_kelas }}</td>
					<td>{{ $s->tanggal_lahir->format('d-m-Y') }}</td>
					<td>{{ $s->jenis_kelamin }}</td>
					<td>{{ !empty($s->telepon->nomor_telepon) ? $s->telepon->nomor_telepon : '-' }}</td>
					<td>
						@if(Auth::check())
							<div class="box-button">
								{{ link_to('siswa/'.$s->id,'Detail',['class'=>'btn btn-success btn-sm']) }}
							</div>
							<div class="box-button">
								{{ link_to('siswa/'.$s->id.'/edit','Edit',['class'=>'btn btn-warning btn-sm']) }}
							</div>
							<div class="box-button">
								{!! Form::open(['method'=>'DELETE', 'action'=>['SiswaController@destroy',$s->id]]) !!}
									{!! Form::submit('Delete',['class'=>'btn btn-danger btn-sm']) !!}
								{!! Form::close() !!}
							</div>
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@else
		<p>tidak ada data {{ $halaman }}</p>
		@endif
		<div class="table-nav">
			<div class="jumlah-data">
				<strong>Jumlah {{ $halaman }} : {{ $jml_siswa }}</strong>
			</div>
			<div class="paging">
				{{ $siswa->links() }}
			</div>
		</div>		
	</div>
@stop

@section('footer')
	@include('footer')
@stop