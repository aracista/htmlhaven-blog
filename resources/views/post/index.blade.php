@extends('include.head')

@section('content')
<div class="container">
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
		 		@foreach($posts as $post)
		 		<tr>
		 			<td>{{$post->id}}</td>
		 			<td>{{$post->title}}</td>
		 			<td><a href="{{route('post.edit',$post->id)}}"><i class="fa fa-edit"></i></a></td>
		 			<td><a href="#{{$post->id}}-delete" data-toggle="modal"><i class="fa fa-trash"></i></a></td>
		 			<td>{{$post->updated_at->diffForHumans()}}</td>
		 		</tr>
<!-- MODAL HAPUS POST -->
				<div class="modal fade" id="{{$post->id}}-delete">
		 			<div class="modal-dialog">
		 				<div class="modal-content">
		 					<div class="modal-header">
		 						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		 						<h4 class="modal-title">Konfirmasi Hapus Post "<b>{{$post->title}}</b>" ?</h4>
		 					</div>
		 					<div class="modal-body">
		 						<form action="{{route('post.destroy',$post->id)}}" method="POST" role="form">
		 							@method('DELETE')
		 							@csrf
		 							<input type="submit" class="btn btn-danger btn-block" value="Hapus">
		 						</form>
		 					</div>
		 				</div>
		 			</div>
		 		</div>
<!-- END MODAL HAPUS POST -->
		 		@endforeach
		 	</tbody>
		 </table>
</div>


@stop