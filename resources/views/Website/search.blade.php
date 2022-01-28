@extends('Website.layout.app')
@section('page_title')
{{$mySettings->name}}
@endsection
@section('content')
<div class="col-lg-8">
    <div class="row">
        <div class="col-12">
            <h2 class="section-title">Axtarılan: {{$searched}}</h2>
           
        </div>
    </div>
    <div class="row">
       

            @if($news->total() == 0)
                <div class="col-12">
                    <div class="card text-white bg-dark mb-3 w-100" >
                        <div class="card-header">Axtarışa nəticə tapılmadı.</div>
                       
                    </div>
                </div>
            @else
                @foreach($news as $n) 
                    <div class="col-md-6">
                    <div class="post-entry-1">
                        <a href="{{route('getSingleNews',['slug'=>$n->slug])}}"><img src="{{asset("/img/news_image/".$n->image)}}" alt="Image" class="my-img-fluid"></a>
                        <h2><a href="{{route('getSingleNews',['slug'=>$n->slug])}}">{{$n->caption}}</a></h2>
                        <p>{{$n->min_text}}</p>
                        <div class="post-meta">
                            <span class="d-block"><a href="#">{{$n->author->name}}</a> <span class="mx-1">&bullet;</span> <a href="{{route('getCategory',['category' => $n->category->name])}}">{{$n->category->name}}</a></span>
                            <span class="date-read">{{\Carbon\Carbon::parse($n->created_at)->format('d/m/Y h:i')}}  <span class="mx-1">&bullet;</span> {{$n->reading_count}} <i class="fas fa-eye"></i> <span class="mx-1">&bullet;</span> {{$n->commentsCount()}}  <i class="fas fa-comment"></i></span>
                        </div>
                        
                    </div>
                    </div>
                @endforeach
                
                <div class="col-12 my-2">
                    {{ $news->links() }}
                </div>

            @endif
            

       

    </div>
</div>

@endsection 