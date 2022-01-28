@extends('Website.layout.app')
@section('page_title')
{{$mySettings->name}}
@endsection

@section('header-content')
<div class="site-section py-0">
      <div class="owl-carousel hero-slide owl-style">


        @foreach($homeNews as $hn)
            <div class="site-section">
            <div class="container">
                <div class="half-post-entry d-block d-lg-flex bg-light">
                    <div class="img-bg"   style="background-image:url('{{asset("/img/news_image/".$hn->image)}}')" ></div>
                    <div class="contents">
                        <h2><a href="{{route('getSingleNews',['slug'=>$hn->slug])}}">{{$hn->caption}}</a></h2>
                        <p class="mb-3"> {{$hn->min_text}} </p>
                        
                        <div class="post-meta">
                            <span class="d-block"><a href="{{route('getAuthor',['author'=>$hn->author->name])}}">{{$hn->author->name}}</a> <span class="mx-1">&bullet;</span> <a href="{{route('getCategory',['category' => $hn->category->name])}}">{{$hn->category->name}}</a></span>
                            <span class="date-read">{{\Carbon\Carbon::parse($hn->created_at)->format('d/m/Y h:i')}} <span class="mx-1">&bullet;</span> {{$hn->reading_count}} <i class="fas fa-eye"></i> <span class="mx-1">&bullet;</span> {{$hn->commentsCount()}}  <i class="fas fa-comment"></i></span>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        @endforeach
       


      </div>
    </div>

    <div class="site-section my-3">
      <div class="container">
        <div class="row">

        @foreach($nfc as $category)
           
            <div class="col-12" >
              <div class="section-title mb-2">
                <h2>{{$category->name}}</h2>
              </div>
            </div>
            @foreach($category->limitedNews as $cNews)
            

            <div class="col-lg-4 col-md-6 mt-2 mb-1">
            
            <div class="post-entry-1 ">
              <a href="{{route('getSingleNews',['slug'=>$cNews->slug])}}"><img src="{{asset("/img/news_image/".$cNews->image)}}" alt="Image" class="my-img-fluid"></a>
              
              <h2><a href="{{route('getSingleNews',['slug'=>$cNews->slug])}}">{{$cNews->caption}}</a></h2>
              <p>{{$cNews->min_text}}</p>
              <div class="post-meta">
                <span class="d-block"><a href="{{route('getAuthor',['author'=>$cNews->author->name])}}">{{$cNews->author->name}}</a></span>
                <span class="date-read">{{\Carbon\Carbon::parse($cNews->created_at)->format('d/m/Y h:i')}}  <span class="mx-1">&bullet;</span> {{$cNews->reading_count}} <i class="fas fa-eye"></i> <span class="mx-1">&bullet;</span> {{$cNews->commentsCount()}}  <i class="fas fa-comment"></i></span>
              </div>
              
            </div>

            </div>
            @endforeach
         
           
        @endforeach
      
        </div>
      </div>
    </div>

@endsection


@section('content') 
<div class="col-lg-8">


<div class="row">
    <div class="col-12">
        <div class="section-title">
            <h2>Son Xəbərlər</h2>
        </div>
    </div>
</div>


<div class="row my-recent-news">
  
  @foreach($news as $n) 
    <div class="col-md-6">
      <div class="post-entry-1">
        <a href="{{route('getSingleNews',['slug'=>$n->slug])}}"><img src="{{asset("/img/news_image/".$n->image)}}" alt="Image" class="my-img-fluid"></a>
        <h2><a href="{{route('getSingleNews',['slug'=>$n->slug])}}">{{$n->caption}}</a></h2>
        <p>{{$n->min_text}}</p>
        <div class="post-meta">
        <span class="d-block"><a href="{{route('getAuthor',['author'=>$n->author->name])}}">{{$n->author->name}}</a> <span class="mx-1">&bullet;</span> <a href="{{route('getCategory',['category' => $n->category->name])}}">{{$n->category->name}}</a></span>
          <span class="date-read">{{\Carbon\Carbon::parse($n->created_at)->format('d/m/Y h:i')}}  <span class="mx-1">&bullet;</span> {{$n->reading_count}} <i class="fas fa-eye"></i> <span class="mx-1">&bullet;</span> {{$n->commentsCount()}}  <i class="fas fa-comment"></i></span>
        </div>
        
      </div>
    </div>
  @endforeach
   
  

  <div class="col-12 my-2">
  {{ $news->links() }}
  </div>
</div>
</div>




@endsection

