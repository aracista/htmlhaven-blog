<div class="col-md-3">
           <div class="list-group" style="box-shadow: 0 0px 1px 0px rgba(0, 0, 0, 0.26);">
          <a href="{{route('tag.index')}}" class="list-group-item active">
          Total {{$tags->total()}} Tags <small class="pull-right">Lihat Semua  <i class="fa fa-share "></i> </small></a>
          @foreach($tags as $tag)
          <a href="{{route('tag.show',$tag->id)}}" class="list-group-item">{{$tag->name}}<span class="badge badge-primary">{{$tag->posts()->count()}} Posts</span></a>
         @endforeach
        </div>

         <div class="list-group" style="box-shadow: 0 0px 1px 0px rgba(0, 0, 0, 0.26);">
         
         <a href="{{route('category.index')}}" class="list-group-item active">Total {{$categories->total()}} Kategori <small class="pull-right">Lihat Semua  <i class="fa fa-share "></i> </small> </a>
          @foreach($categories as $cat)
         <a href="{{route('category.show',$cat->id)}}" class="list-group-item">{{$cat->name}}<span class="badge badge-primary">{{$cat->posts()->count()}} Posts</span></a>
          @endforeach

        </div>
        <div class="ads-img" style="border: 11px solid #eee;">
          <img src="../images/img-sid.jpeg" style="width: 100%; height: auto;">
         </div>
         </div>