@extends('Website.layout.app')
@section('page_title')
{{$singleNews->caption}}
@endsection
@section('content')

<div class="col-lg-8 single-content">

    <p class="mb-5">
    <img src="{{asset('/img/news_image/'.$singleNews->image)}}" alt="Image" class="my-img-fluid-2">
    </p> 
    <h1 class="mb-4">
       {{$singleNews->caption}}
    </h1>
    <div class="post-meta d-flex mb-5">
        <div class="vcard">
            <span class="d-block"><a href="#">{{$singleNews->author->name}}</a> in <a href="{{route('getCategory',['category'=>$singleNews->category->name])}}">{{$singleNews->category->name}}</a></span>
            <span class="date-read">{{\Carbon\Carbon::parse($singleNews->created_at)->format('d/m/Y h:i')}} <span class="mx-1">&bullet;</span> {{$singleNews->reading_count}} <i class="fas fa-eye"></i> <span class="mx-1">&bullet;</span> {{$singleNews->commentsCount()}}  <i class="fas fa-comment"></i></span>
        </div>
    </div>
    
    <div>
    {!!$singleNews->text!!}
    </div>

    <div class="pt-3">
        
        <div class="comment-form-wrap t-3 ">
            <div class="section-title mb-3">
                <h2 class="">Rəy yazın</h2>
            </div>
            
           
           
            <form class="p-4 bg-light" id="comment-form">
               
                <div class="form-group">
                   
                    <input type="hidden" name="news" class="form-control" value="{{$singleNews->id}}" id="news">
                </div>
                <div class="form-group">
                    <label for="name">Ad *</label>
                    <input type="text"  name="name" class="form-control" id="name">
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="text"   name="email" class="form-control" id="email">
                </div>

                <div class="form-group">
                    <label for="message">Rəy</label>
                    <textarea  name="comment"  id="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="button" id="add-comment" value="Əlavə edin" class="btn btn-primary py-3">
                </div>
                

            </form> 
        </div>
        <div class="section-title mb-3 mt-3">
            <h2 class="mb-2">Rəylər</h2>
        </div>
        <ul class="comment-list">

            @foreach($singleNews->comments as $comment)
                <li>
                    <div class="comment-body">
                        <h3>{{$comment->username}}</h3>
                        <div class="meta">{{\Carbon\Carbon::parse($comment->created_at)->format('d/m/y H:i')}}</div>
                        <div>{{$comment->comment}}</div>
                       
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
        
   
</div>

@endsection

@section('front_js')
    <script>
            
    $('#add-comment').click(function(e){
        let news = $('#news').val();
        let name = $('#name').val();
        let email = $('#email').val();
        let message = $('#message').val();
    
        if(name == ''){
            $('#comment-error1').html('Adı daxil edin.');
            $('#myCommentModal1').modal('show');
            return false;
            
        }
        if(email == ''){
            $('#comment-error1').html('Emaili daxil edin.');
            $('#myCommentModal1').modal('show');
            return false;
        }
        if(news == ''){
            $('#comment-error1').html('News id ile oynama :)');
            $('#myCommentModal1').modal('show');
            return false;
        }
        if(!/\S+@\S+\.\S+/.test(email)){
            $('#comment-error1').html('Emaili düzgün daxil edin.');
            $('#myCommentModal1').modal('show');
            return false;
        }
        if(message == ''){
            $('#comment-error1').html('Rəyi daxil edin.');
            $('#myCommentModal1').modal('show');
            return false;
        }
        

        
        $('#add-comment').val('Rəyiniz yazılır');

        $.ajax({
            url:"{{route('sendComment')}}",
            type:'POST',
            data:{
                'news':news,
                'name':name,
                'email':email,
                'comment':message
            },
            dataType:'json',
            success:function(response){
                $('#add-comment').val('Əlavə edin');
                let lastComment = response.lastcomment;
                if(response.success){
                    let html = `
                    <li>
                        <div class="comment-body">
                            <h3>${lastComment.username}</h3>
                            <div class="meta">${lastComment.created_at}</div>
                            <div>${lastComment.comment}</div>
                        
                        </div>
                    </li>
                    `;
                    $('.comment-list').prepend(html);
                
                    $('#name').val('');
                    $('#email').val('');
                    $('#message').val('');


                }
                
            },
            error:function(reject){ 
                let errors = reject.responseJSON.errors;

                console.log(reject);
                let valerror = '';
                for (const name in errors) {
                    valerror += `${errors[name]}<br>`;
                }
                $('#comment-error1').html(valerror);
                $('#myCommentModal1').modal('show');

                

            }
        });
        e.preventDefault();

        });
    </script>
@endsection