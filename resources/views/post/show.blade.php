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
									<span class="label label-success"># tags</span>
								</div>
								<div class="kategori">
									<span class="label label-default">Kategori</span>
								</div>
								<hr>
								</div>
							</div>
						</div>
							<div class="col-md-12">
								<div class="avatar_show"><a href="#"><img src="../images/post1.jpeg"></a></div>
							<br>
								<div class="post-content">
									<p>{!!$posts->post!!}</p>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
								<div class="col-md-3">
									<div class="editdelete">
										<a href="{{route('post.edit',$posts->id)}}" class="btn btn-block btn-success">Edit</a>
									</div>
									<br>
									<form action="" method="POST" role="form">
										<input type="submit" name="" value="Hapus" class="btn btn-block btn-danger">
									</form>
								</div>

								@include('include.sidebar')
	</div>
</div>

@stop