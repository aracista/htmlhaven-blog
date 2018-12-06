@extends('include.head')

@section('content')
<div class="container">
	<div class="row">
	<div class="text-center"><h1>Halaman Buat Tag</h1></div>
	<hr>
	<div class="col-md-8 col-md-offset-2">
			<form action="{{route('tag.store')}}" method="POST" role="form">
				@csrf
				<div class="form-group">
					<input type="text" class="form-control" id="" placeholder="Buat tag Baru......" name="name">
				</div>
				<button type="submit" class="btn btn-success btn-block">Submit</button>
			</form>
			
	</div>
	</div>
	<br>
		<div class="text-center"><h4>Semua tag</h4></div>
		 <table class="table table-hover table-striped">
		 	<thead>
		 		<tr class="info">
		 			<th>No.</th>
		 			<th>Nama tag</th>
		 			<th>Edit</th>
		 			<th>Delete</th>
		 			<th>Tanggal Edit</th>
		 		</tr>
		 	</thead>
		 	<tbody>
		 		@foreach($tag as $showtag)
		 		<tr>
		 			<td>{{$showtag->id}}</td>
		 			<td>{{$showtag->name}}</td>
		 			<td><a href="#{{$showtag->id}}" data-toggle="modal"><i class="fa fa-edit"></i></a></td>
		 			<td><a href="#{{$showtag->id}}-delete" data-toggle="modal"><i class="fa fa-trash"></i></a></td>
		 			<td>{{$showtag->updated_at->diffForHumans()}}</td>
		 		</tr>
<!-- MODAL EDIT KATEGORI -->
		 		<div class="modal fade" id="{{$showtag->id}}">
		 			<div class="modal-dialog">
		 				<div class="modal-content">
		 					<div class="modal-header">
		 						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		 						<h4 class="modal-title">Edit Tag</h4>
		 					</div>
		 					<div class="modal-body">
		 						<form action="{{route('tag.update',$showtag->id)}}" method="POST" role="form">
		 							@csrf
		 							@method('put')
		 							<div class="form-group">
		 								<label for="">Nama :</label>
		 								<input type="text" class="form-control" name="name" value="{{$showtag->name}}">
		 							</div>
		 							<button type="submit" class="btn btn-primary">Submit</button>
		 						</form>
		 					</div>
		 				</div>
		 			</div>
		 		</div>
<!-- END MODAL EDIT KATEGORI -->

<!-- MODAL HAPUS KATEGORI -->
				<div class="modal fade" id="{{$showtag->id}}-delete">
		 			<div class="modal-dialog">
		 				<div class="modal-content">
		 					<div class="modal-header">
		 						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		 						<h4 class="modal-title">Konfirmasi Hapus tag "<b>{{$showtag->name}}</b>" ?</h4>
		 					</div>
		 					<div class="modal-body">
		 						<form action="{{route('tag.destroy',$showtag->id)}}" method="POST" role="form">
		 							@method('DELETE')
		 							@csrf
		 							<input type="submit" class="btn btn-danger btn-block" value="Hapus">
		 						</form>
		 					</div>
		 				</div>
		 			</div>
		 		</div>
<!-- END MODAL HAPUS KATEGORI -->
		 		@endforeach
		 	</tbody>
		 </table>
</div>

@stop