@extends('include.head')

@section('content')

@if(count($posts)>0)
<div class="container" style="margin-top: 3%; margin-bottom: 6%;">
	<div class="text-center"><h1>Hasil Pencarian</h1></div>

	@foreach($posts->all() as $post)
			<div class="post-item">
				<div class="post-inner">
					<div class="post-head clearfix">
						<div class="col-md-4">
							<a href=""><img src="{{asset('images/'.$post->image)}}" style="width: 100%; height: 200px;"></a>
						</div>
						<div class="col-md-8">
							<div class="detail">
								<h3 class="handle"><a href="{{route('post.show',$post->slug)}}">{{$post->title}}</a></h3>
							</div>
							<div class="post-meta">
								<div>
									<span>{{$post->created_at->diffForHumans()}}</span>
									<span>By</span>
									<span><a href="" title="">Admin</a></span>
								</div>
							</div>
							<span class="share">
								<i class="fa fa-facebook"></i>
								<i class="fa fa-twitter"></i>
								<i class="fa fa-instagram"></i>
							</span>

								@foreach($post->tags as $tag)
								<span class="label label-success">{{$tag->name}}</span>
								@endforeach

							<div class="content" style="margin-top: 12px;">
								{!!str_limit($post->post,150)!!}
							</div>
						</div>
						
					</div>
					
				</div>
			</div>
	@endforeach
</div>

@else

	<div class="container" style="margin-top: 3%; margin-bottom: 22%;">
		<div class="text-center"><h1>Hasil Pencarian</h1>
		<hr>
			<div class="post-inner">
				No result
			</div>
	</div>
	</div>
@endif

@stop