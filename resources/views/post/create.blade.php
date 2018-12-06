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
					<label for="">Post</label>
					<textarea type="text" class="form-control" id="" placeholder="Input field" name="post"></textarea>
				</div>
				<button type="submit" class="btn btn-success">Submit</button>
			</form>
			
		</div>
	</div>
</div>

@stop