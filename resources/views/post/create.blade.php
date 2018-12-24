@extends('include.head')

@section('content')
<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<div class="well">
			<form action="{{route('post.store')}}" method="POST" role="form" enctype="multipart/form-data">
				@csrf
				<legend>Buat Post</legend>
				<div class="form-group">
					<label for="">Title</label>
					<input type="text" class="form-control" id="" placeholder="Input field" name="title">
				</div>
				<div class="form-group">
					<label>Category</label>
					<select name="category_id" class="form-control">
						<option value="" class="disable selected">Pilih Kategori</option>
						@foreach($category as $cat)
						<option value="{{$cat->id}}">{{$cat->name}}</option>
						@endforeach
					</select>
				</div>
					<div class="form-group">
					<label>Tag</label>
					<select name="tags[]" class="form-control selectpicker" multiple="multiple">
						@foreach($tags as $tag)
						<option value="{{$tag->id}}">{{$tag->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="">Pilih Gambar</label>
					<input type="file" class="form-control" name="image">
				</div>
				<div class="form-group">
					<label for="">Post</label>
					<textarea type="text" class="form-control" id="" placeholder="Input field" name="post"></textarea>
				</div>
				<button type="submit" class="btn btn-success"  data-toggle="modal" data-target="#myModal">Submit</button>
			
		</form>
			
		</div>
	</div>
</div>
</div>
<br>	
<div class="container">
		<div class="text-center"><h4>Semua Post</h4></div>
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