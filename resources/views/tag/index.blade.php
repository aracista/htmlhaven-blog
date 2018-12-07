@extends('include.head')

@section('content')

<div class="container" style="margin-bottom: 60px;">
	<div class="text-center"><h2>Semua Tag <small>({{$tags->total()}})</small></h2></div>
	<hr>
	
	@foreach($tags as $tag)
		<h4><a href="{{route('tag.show',$tag->id)}}">{{$tag->name}}</a></h4>
		<div style="border-bottom: 1px solid #099; margin-bottom: 11px;">
		<p>{{$tag->posts->count()}} <i class="fa fa-list-alt"></i> Post</p>
	</div>
	<p><small class="text-muted"><i class="fa fa-clock-o"></i>{{$tag->created_at->diffForHumans()}}</small></p>
	@endforeach

	<div class="text-center">
		{!!$tags->links()!!}
	</div>
	
</div>

@stop