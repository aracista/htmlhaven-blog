@extends('include.head')

@section('content')
<div class="container">
	<div class="row">
	<div class="text-center"><h1>Halaman Buat Kategori</h1></div>
	<hr>
	<div class="col-md-8 col-md-offset-2">
			<form action="{{route('category.store')}}" method="POST" role="form">
				@csrf
				<div class="form-group">
					<input type="text" class="form-control" id="" placeholder="Buat Kategori Baru......" name="name">
				</div>
				<button type="submit" class="btn btn-success btn-block">Submit</button>
			</form>
			
	</div>
	</div>
	<br>
		<div class="text-center"><h4>Semua Kategori</h4></div>
		 <table class="table table-hover table-striped">
		 	<thead>
		 		<tr class="info">
		 			<th>No.</th>
		 			<th>Nama Kategori</th>
		 			<th>Edit</th>
		 			<th>Delete</th>
		 			<th>Tanggal Edit</th>
		 		</tr>
		 	</thead>
		 	<tbody>
		 		@foreach($category as $showcat)
		 		<tr>
		 			<td>{{$showcat->id}}</td>
		 			<td>{{$showcat->name}}</td>
		 			<td><a href="#{{$showcat->id}}" data-toggle="modal"><i class="fa fa-edit"></i></a></td>
		 			<td><a href="#{{$showcat->id}}-delete" data-toggle="modal"><i class="fa fa-trash"></i></a></td>
		 			<td>{{$showcat->updated_at->diffForHumans()}}</td>
		 		</tr>
<!-- MODAL EDIT KATEGORI -->
		 		<div class="modal fade" id="{{$showcat->id}}">
		 			<div class="modal-dialog">
		 				<div class="modal-content">
		 					<div class="modal-header">
		 						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		 						<h4 class="modal-title">Edit Category</h4>
		 					</div>
		 					<div class="modal-body">
		 						<form action="{{route('category.update',$showcat->id)}}" method="POST" role="form">
		 							@csrf
		 							@method('put')
		 							<div class="form-group">
		 								<label for="">label</label>
		 								<input type="text" class="form-control" name="name" value="{{$showcat->name}}">
		 							</div>
		 							<button type="submit" class="btn btn-primary">Submit</button>
		 						</form>
		 					</div>
		 				</div>
		 			</div>
		 		</div>
<!-- END MODAL EDIT KATEGORI -->

<!-- MODAL HAPUS KATEGORI -->
				<div class="modal fade" id="{{$showcat->id}}-delete">
		 			<div class="modal-dialog">
		 				<div class="modal-content">
		 					<div class="modal-header">
		 						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		 						<h4 class="modal-title">Konfirmasi Hapus Kategori "<b>{{$showcat->name}}</b>" ?</h4>
		 					</div>
		 					<div class="modal-body">
		 						<form action="{{route('category.destroy',$showcat->id)}}" method="POST" role="form">
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