@extends('include.head')

@section('content')

<div class="container" style="margin-bottom: 60px;">
	<div class="text-center"><h2>Semua Kategori <small>({{$categories->total()}})</small></h2></div>
	<hr>
	
	@foreach($categories as $cat)
		<h4><a href="{{route('category.show',$cat->id)}}">{{$cat->name}}</a></h4>
		<div style="border-bottom: 1px solid #099; margin-bottom: 11px;">
		<p>{{$cat->posts->count()}} <i class="fa fa-list-alt"></i> Post</p>
	</div>
	<p><small class="text-muted"><i class="fa fa-clock-o"></i>{{$cat->created_at->diffForHumans()}}</small></p>
	@endforeach

	<div class="text-center">
		{!!$categories->links()!!}
	</div>
	
</div>

@stop