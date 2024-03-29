<div id="pencarian">
	{!! Form::open(['url' => 'siswa/cari', 'method' => 'GET', 'id'=>'form-pencarian']) !!}
	<div class="row">
		<div class="col-md-2">
			{!! Form::select('id_kelas', ['1'=>'X-1','2'=>'X-2'], (!empty($id_kelas) ? $id_kelas : null), ['id'=>'id_kelas','class'=>'form-control','placeholder'=>'-Kelas-']) !!}
		</div>	
		<div class="col-md-2">
			{!! Form::select('jenis_kelamin', ['L'=>'Laki-laki','P'=>'Perempuan'], (!empty($jenis_kelamin) ? $jenis_kelamin : null), ['id'=>'jenis_kelamin','class'=>'form-control','placeholder'=>'-Kelamin-']) !!}
		</div>	
		<div class="input-group">
			{!! Form::text('kata_kunci', (!empty($kata_kunci)) ? $kata_kunci : null, ['class' => 'form-control', 'placeholder' => 'masukkan_nama_siswa']) !!}
			<span class="input-group-btn">
				{!! Form::button('Cari', ['class' => 'btn btn-default', 'type' => 'submit']) !!}
			</span>
		</div>
	</div>
	{!! Form::close() !!}
</div>