@extends('include.head')
@section('title', 'Welcome')

@section('content')


 <div class="header_wrap">
  <div class="info">
     <div class="container">
         <div class="row">
            <div class="col-md-7">
                 <div class="header_info">
                    <div class="descrip">
                        <a href="#">
                        <h1 style="color:#ece705; font-weight: bold;     margin-top: 0;">SELAMAT DATANG</h1>
                          </a> 
                         <p>
                          HTMLHaven merupakan sebuah kerajaan laut terdalam melebihi bikini bottom ,bergabunglah bersama kami menuju imajinasi tanpa batas dan melampauinya.
                           </p><br>
                           <p><small><small>NB : Bila terciduk FBI bukan merupakan tanggung jawab kami.</small></small></p>
                           <div>
                            @guest
                           <p>
                            <a href="{{ route('login') }}" class="btn btn-danger" >Login</a>
          
                            <a href="{{ route('register') }}" class="btn btn-danger" >Singup</a>
                            </p>
                            @endguest

                            </div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</div>
 
        <section class="wp-separator">
            <article class="section">
                <div class="container">
                    <div class="row text-center">
                        <p class="h1">HTMLHaven</p>
                        <h5 class="lead">The biggest Indonesian Useless Community</h5>
                    </div>
                </div>
            </article>
        </section>

<div class="container-fluid">
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                <div class="well well-sm wl">
                    
                    <div class="btn-group">
                        <a href="#" id="list" class="btn btn-default btn-sm"><span class="fa fa-th-list">
                        </span> List</a> <a href="#" id="grid" class="btn btn-default btn-sm"><span
                            class="fa fa-th"></span> Grid</a>
                    </div>
                </div>
  
      <div id="grid_post" class="row list-group">
        @foreach($posts as $post)
         <div class="item  col-xs-4 col-lg-4">
            <div class="thumbnail as">
               <img class="group list-group-image img-responsive" src="{{asset('images/'.$post->image)}}" style="height: auto; width: 100%;" />
                <div class="caption">
                    <div class="c_hr">
                    <h4 class="group inner list-group-item-heading"><a href="{{route('post.show',$post->slug)}}">{{str_limit($post->title,20)}}</a></h4>
                         <small>{{$post->created_at->diffForHumans()}}</small> | by <a href="#">Admin</a>
                      <p class="group inner list-group-item-text">
                      <span class="label label-default">{{$post->category->name}}</span><br><br>
                      @foreach($post->tags as $tag)
                      <span class="label label-success">#{{$tag->name}}</span>
                      @endforeach
                      <span>{!!str_limit($post->post,50)!!}</span>

                    </p>
                      
                     </div>
                    
                    
                </div>
                
            </div>
        </div>
        @endforeach
  </div><!-- end grid -->
</div>

    @include('include.sidebar')
    </div><!-- end row -->
</div>
        </section>
        <!-- FOOTER --> 
         <div class="text-center">
                {!!$posts->links()!!}
         </div>
        <!-- END FOOTER --> 
</div><!-- end con fluid -->
@endsection
