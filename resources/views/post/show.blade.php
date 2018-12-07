@extends('include.head')

@section('content')
<div class="container" style="margin-top: 3%;">
	<div class="row">
		<div class="col-md-9">
			<div class="post-item">
				<div class="post-inner">
					<div class="post-head clearfix">
						<div class="col-md-12">
							<div class="detail">
								<h2 class="handle">{{$posts->title}}</h2>
								<div class="post-meta">
								<div class="asker-meta">
									<span>{{$posts->created_at->diffForHumans()}}</span>
									<span>by</span>
									<span><a href="#">Admin</a></span>
								</div>
								<div class="share">
									<label>Share :</label>
										<i class="fa fa-facebook"></i>
										<i class="fa fa-twitter"></i>
										<i class="fa fa-instagram"></i>
								</div>
								<div class="tags">
									@foreach($posts->tags as $tag)
									<span class="label label-success">#{{$tag->name}}</span>
									@endforeach
								</div>
								<div class="kategori">
									<span class="label label-default">{{$posts->category->name}}</span>
								</div>
								<hr>
								</div>
							</div>
						</div>
							<div class="col-md-12">
								<div class="avatar_show"><a href="#"><img src="{{asset('images/'.$posts->image)}}"></a></div>
							<br>
								<div class="post-content">
									<p>{!!$posts->post!!}</p>
								</div>
							</div>
					</div>
				</div>
			</div>
			<!-- comment -->
						<hr>
						<h4>Comment :</h4>
						<div class="panel with-nav-tabs panel-default">
							<div class="panel-heading">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab1" data-toggle="tab">All Comment</a></li>
									<li><a href="#tab2" data-toggle="tab">Add comment</a></li>
									<li><a href="#tab3" data-toggle="tab">Disqus</a></li>
								</ul>
							</div>
							<div class="panel-body">
								<div class="tab-content">
										<div class="tab-pane fade in active" id="tab1">
											@if($posts->comments->isEmpty())
											<div class="text-center">Tidak Ada Komentar</div>
											@else
											@foreach($posts->comments as $comment)
											<div class="post-item">
												<div class="post-inner">
													<div class="post-head clearfix">
														<div class="col-md-2">
															<img src="//a.disquscdn.com/1504815928/images/noavatar92.png" style="border-radius: 120px;">
														</div>
														<div class="col-md-10">
															<h4>{{$comment->comment}}</h4>
															<hr>
															<p>By <a href=""> {{$comment->user->name}}</a></p>
															<div class="pull-right">
																<small>{{$comment->created_at->diffForHumans()}}</small>
															</div>

																					
														</div>
													</div>
												</div>
											</div>
											@endforeach
											@endif
										</div>	
										<div class="tab-pane fade" id="tab2">
											<form action="{{route('buatKomentar.store',$posts->id)}}" method="POST" role="form">
											@csrf
												<div class="form-group">
													<label for="">Tulis Komentar :</label>
													<textarea type="text" class="form-control" name="comment" id="" placeholder="Input field"></textarea>
												</div>
												<button type="submit" class="btn btn-primary">Submit</button>
											</form>
										</div>
										<div class="tab-pane fade" id="tab3">
											<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://htmlhaven.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
										</div>								
								</div>
										
							</div>
							
						</div>
			<!-- comment -->



		</div>

								@include('include.sidebar')
	</div>
</div>

@stop