@extends('include.head')

@section('content')
<div class="container">
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

@stop