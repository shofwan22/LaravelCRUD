@extends('layouts.template')

@section('content')
	<div class="tbl-add">
		<button class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd">Add Berita</button>
	</div>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th width="3%">No</th>
				<th>Judul Berita</th>
				<th>Tanggal</th>
				<th>Penulis</th>
				<th width="20%">Aksi</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $indeks => $dt)
				<tr>
					<td>{{$indeks+1}}</td>
					<td>{{$dt->judul}}</td>
					<td>{{date('d-m-Y',strtotime($dt->tanggal))}}</td>
					<td>{{$dt->penulis}}</td>
					<td>
						<a href="{{ route('showberita',$dt->id) }}" class="btn btn-success" target="_blank">Detail</a>
						<button class="btn btn-info" data-toggle="modal" data-target="#ModalEdit{{$dt->id}}">Edit</button>
						<button onclick="hapusberita{{$dt->id}}(event,{{$dt->id}})" class="btn btn-danger">Hapus</button>
						<form id="form-hapus{{$dt->id}}" action="{{ route('deleteberita',$dt->id) }}" method="POST">
							{{ csrf_field() }}
							<input type="hidden" name="_method" value="DELETE">
						</form>
					</td>
				</tr>

				<!-- Modal -->
				<div class="modal fade" id="ModalEdit{{$dt->id}}" role="dialog">
					<div class="modal-dialog modal-lg">

					  <!-- Modal content-->
					  <div class="modal-content">
					    <div class="modal-header">
					      <button type="button" class="close" data-dismiss="modal">&times;</button>
					      <h4 class="modal-title">Edit Berita</h4>
					    </div>
					    <form action="{{ route('updateberita',$dt->id) }}" method="POST" enctype="multipart/form-data">
					    <div class="modal-body">
					      	{{ csrf_field() }}
					      	<input type="hidden" name="_method" value="PUT">
					      	<div class="form-group">
					      		<label>Judul Berita</label>
					      		<input class="form-control" type="text" name="judul" placeholder="Masukkan Judul Berita" value="{{$dt->judul}}" required>
					      	</div>
					      	<div class="form-group">
					      		<label>Isi Berita</label>
					      		<textarea class="form-control" name="isi" placeholder="Masukkan Isi Berita" required>{{$dt->isi}}</textarea>
					      	</div>
					      	<div class="form-group">
					      		<label>Tanggal Berita</label>
					      		<input type="text" name="tanggal" class="form-control datepicker" placeholder="dd-mm-yyyy" value="{{date('d-m-Y',strtotime($dt->tanggal))}}" required>
					      	</div>
					      	<div class="form-group">
					      		<label>Penulis Berita</label>
					      		<select class="form-control" name="penulis" required>
					      			@if($dt->penulis == "Pitono")
					      			<option disabled>Pilih Nama Penulis</option>
					      			<option value="Pitono" selected>Pitono</option>
					      			<option value="Alex Ono">Alex Ono</option>
					      			<option value="James Suroso">James Suroso</option>
					      			<option value="Frank Andi">Frank Andi</option>
					      			@elseif($dt->penulis == "Alex Ono")
					      			<option disabled>Pilih Nama Penulis</option>
					      			<option value="Pitono">Pitono</option>
					      			<option value="Alex Ono" selected >Alex Ono</option>
					      			<option value="James Suroso">James Suroso</option>
					      			<option value="Frank Andi">Frank Andi</option>
					      			@elseif($dt->penulis == "James Suroso")
					      			<option disabled>Pilih Nama Penulis</option>
					      			<option value="Pitono">Pitono</option>
					      			<option value="Alex Ono">Alex Ono</option>
					      			<option value="James Suroso" selected>James Suroso</option>
					      			<option value="Frank Andi">Frank Andi</option>
					      			@elseif($dt->penulis == "Frank Andi")
					      			<option disabled>Pilih Nama Penulis</option>
					      			<option value="Pitono">Pitono</option>
					      			<option value="Alex Ono">Alex Ono</option>
					      			<option value="James Suroso">James Suroso</option>
					      			<option value="Frank Andi" selected>Frank Andi</option>
					      			@else
					      			<option selected disabled>Pilih Nama Penulis</option>
					      			<option value="Pitono">Pitono</option>
					      			<option value="Alex Ono">Alex Ono</option>
					      			<option value="James Suroso">James Suroso</option>
					      			<option value="Frank Andi">Frank Andi</option>
					      			@endif
					      		</select>
					      	</div>
					      	<div class="form-group">
					      		<div class="row">
					      			<div class="col-md-6">
					      				<label>Upload Gambar</label>
					      				<div class="eddash" id="editdash{{$dt->id}}">
											<input id="editfile{{$dt->id}}" type="file" name="image">
											<p id="editisi{{$dt->id}}">Drag your files here or click in this area.</p>
										</div>
							            <span class="info">* Max size: 5 MB. Only JPG,PNG,JPEG</span>
							      	</div>
					      			<div class="col-md-6">
				      					<label>Preview Gambar</label>
					      				<div class="img-container">
					      					<img class="prev" src="{{ URL($dt->image) }}">	
					      				</div>
					      			</div>
					      		</div>
					      		
					      		
					      	</div>
					    </div>
					    <div class="modal-footer">
					      	<button type="submit" class="btn btn-success">Simpan</button>
					      	<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
					    </div>
					    </form>
					  </div>
					  
					</div>
				</div>

			@endforeach
		</tbody>
		
	</table>

	<!-- Modal -->
	<div class="modal fade" id="ModalAdd" role="dialog">
		<div class="modal-dialog modal-lg">

		  <!-- Modal content-->
		  <div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal">&times;</button>
		      <h4 class="modal-title">Add Berita</h4>
		    </div>
		    <form action="{{ route('addberita') }}" method="POST" enctype="multipart/form-data">
		    <div class="modal-body">
		      	{{ csrf_field() }}
		      	<div class="form-group">
		      		<label>Judul Berita</label>
		      		<input class="form-control" type="text" name="judul" placeholder="Masukkan Judul Berita" required>
		      	</div>
		      	<div class="form-group">
		      		<label>Isi Berita</label>
		      		<textarea class="form-control" name="isi" placeholder="Masukkan Isi Berita" required></textarea>
		      	</div>
		      	<div class="form-group">
		      		<label>Tanggal Berita</label>
		      		<input type="text" name="tanggal" class="form-control datepicker" placeholder="dd-mm-yyyy" required>
		      	</div>
		      	<div class="form-group">
		      		<label>Penulis Berita</label>
		      		<select class="form-control" name="penulis" required>
		      			<option selected disabled>Pilih Nama Penulis</option>
		      			<option value="Pitono">Pitono</option>
		      			<option value="Alex Ono">Alex Ono</option>
		      			<option value="James Suroso">James Suroso</option>
		      			<option value="Frank Andi">Frank Andi</option>
		      		</select>
		      	</div>
		      	<div class="form-group">
		      		<label>Upload Gambar</label>
		      		<div class="dash" id="adddash">
						<input id="addfile" type="file" name="image" required>
						<p id="addisi">Drag your files here or click in this area.</p>
					</div>
		            <span class="info">* Max size: 5 MB. Only JPG,PNG,JPEG</span>
		      	</div>
		    </div>
		    <div class="modal-footer">
		      	<button type="submit" class="btn btn-success">Simpan</button>
		      	<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
		    </div>
		    </form>
		  </div>
		  
		</div>
	</div>

<script type="text/javascript">
	$(document).ready(function(){
		@foreach($data as $dt)
		$('#editfile{{$dt->id}}').change(function(){
	      var size = $('#editfile{{$dt->id}}')[0].files[0].size;
	      var tipe = $('#editfile{{$dt->id}}').val().split('.').pop().toLowerCase();
	      var nama = $('#editfile{{$dt->id}}').val();
	      if($.inArray(tipe, ['jpg','png','jpeg']) == -1 || size>5097152){
	        $('#editfile{{$dt->id}}').val('');
	        $('#editdash{{$dt->id}}').css('border','4px dashed red');
	        $('#editisi{{$dt->id}}').text('Drag your files here or click in this area.');
	        swal('','Max size: 5 MB. Only JPG,PNG,JPEG !','error');
	      } else{
	        $('#editisi{{$dt->id}}').text(nama);
	        $('#editdash{{$dt->id}}').css('border','4px dashed green');
	      }
	    });
	    @endforeach

	})
</script>

<script type="text/javascript">
	@foreach($data as $dt)
	    function hapusberita{{$dt->id}}(event,id) {
	      event.preventDefault();
	      swal({
	      title: "Hapus Berita",
	      text: "Apakah Anda Yakin Ingin Menghapus Berita '{{$dt->judul}}' ?",
	      icon: "warning",
	      closeOnClickOutside: true,
	      buttons: [true,"Yes"],
	      })
	      .then((Yes) => {
	      if(Yes){
	      $("#form-hapus{{$dt->id}}").submit();
	      }
	      });
	    }
    @endforeach
 </script>



@endsection