@extends('include.head')

@section('content')
<div class="container">
	<div class="col-md-8 col-md-offset-2">
		<div class="well">
			<form action="{{route('post.store')}}" method="POST" role="form">
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
					<label for="">Post</label>
					<textarea type="text" class="form-control" id="" placeholder="Input field" name="post"></textarea>
				</div>
				<button type="submit" class="btn btn-success">Submit</button>
			
		</form>
			
		</div>
	</div>
</div>
</div>


@stop