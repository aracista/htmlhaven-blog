 @extends('include.head')

@section('content')

<div class="container" style="margin-bottom: 120px;">
	<div class="text-center"><h1>Kategori {{$categories2->name}}<small>({{$categories2->posts()->count()}} Posts)</small></h1></div>
	<hr>
	<div class="row">
		<div class="col-md-9">
			@foreach($categories2->posts as $post)
			<div class="post-item">
				<div class="post-iner">
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

								
								<span class="label label-success">{{$categories2->name}}</span>
								

							<div class="content" style="margin-top: 12px;">
								{!!str_limit($post->post,150)!!}
							</div>
						</div>
						
					</div>
					
				</div>
			</div>
			@endforeach
		</div>
		
			@include('include.sidebar')
		
	</div>
	
</div>


@stop