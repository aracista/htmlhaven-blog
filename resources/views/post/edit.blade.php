@extends('include.head')

@section('content')
<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<div class="well">
			<form action="{{route('post.update',$post->id)}}" method="POST" role="form" enctype="multipart/form-data">
				@method('PUT')
				@csrf
				<legend>Edit Post</legend>
				<div class="form-group">
					<label for="">Title</label>
					<input type="text" class="form-control" id="" placeholder="Input field" name="title" value="{{$post->title}}">
				</div>
				<div class="form-group">
					<label>Category</label>
					<select name="category_id" class="form-control">
						<option value="" class="disable selected">Pilih Kategori</option>
						@foreach($category as $cat)
						<option value="{{$cat->id}}" @php if($post->category_id == $cat->id){echo "selected";}@endphp>{{$cat->name}}</option>
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
					<img src="{{asset('images/'.$post->image)}}" style="width: 100%;" height="300px">
					<label for="">Pilih Gambar</label>
					<input type="file" class="form-control" name="image">
				</div>
				<div class="form-group">
					<label for="">Post</label>
					<textarea type="text" class="form-control" id="" placeholder="Input field" name="post">{{$post->post}}</textarea>
				</div>
				<button type="submit" class="btn btn-success">Submit</button>
			
		</form>
			
		</div>
	</div>
</div>

@stop
@section('js')
<script type="text/javascript">
	$(".selectpicker").selectpicker().val({!!json_encode($post->tags()->allRelatedIds())!!}).trigger('change');
</script>
@stop