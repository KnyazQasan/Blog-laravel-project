<!DOCTYPE html>
<html lang="en">

<head>
  <title>
    @yield('page_title')
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">


  <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet">
  

  <link rel="stylesheet" href="{{asset('website/fonts/icomoon/style.css')}}">

  <link rel="stylesheet" href="{{asset('website/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('website/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('website/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('website/css/owl.theme.default.min.css')}}">

  <!-- <link rel="stylesheet" href="{{asset('website/css/jquery.fancybox.min.css')}}"> -->

  <!-- <link rel="stylesheet" href="{{asset('website/css/bootstrap-datepicker.css')}}"> -->

  <link rel="stylesheet" href="{{asset('website/fonts/flaticon/font/flaticon.css')}}">

  <!--fontawesome  -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('website/css/aos.css')}}">
  <!-- <link href="{{asset('website/css/jquery.mb.YTPlayer.min.css')}}" media="all" rel="stylesheet" type="text/css"> -->

  @yield('front_css')
  <link rel="stylesheet" href="{{asset('website/css/style.css')}}">
  



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <!-- header -->
    <div class="header-top">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-lg-6 d-flex">
            <a href="{{route('getHome')}}" class="site-logo">
            {{$mySettings->name}}
            </a>

            <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>

          </div>
          <div class="col-12 col-lg-6 ml-auto d-flex">
            <div class="ml-md-auto top-social d-none d-lg-inline-block">
              <a href="{{$mySettings->facebook}}"  target="_blank" class="d-inline-block p-3"><span class="icon-facebook"></span></a>
                <a href="{{$mySettings->twitter}}"  target="_blank" class="d-inline-block p-3"><span class="icon-twitter"></span></a>
                <a href="{{$mySettings->instagram}}" target="_blank"  class="d-inline-block p-3"><span class="icon-instagram"></span></a>
            </div>
            <form action="{{route('postSearch')}}" method="get" role="search" class="search-form d-inline-block ">

              <div class="d-flex">
              
                <input type="text" name="text" required class="form-control" placeholder="Axtarın...">
                <button type="submit" class="btn btn-secondary" ><span class="icon-search"></span></button>
              </div>
            </form>

            
          </div>
          <div class="col-6 d-block d-lg-none text-right">
            
          </div>
          
        </div>
      </div>
      


      <!-- menu -->
      <div class="site-navbar py-0  site-navbar-target d-none pl-0 d-lg-block" role="banner">

        <div class="container">
            <div class="d-flex align-items-center">
            
            <div class="mr-auto">
                <nav class="site-navigation position-relative" role="navigation">
                <ul class="site-menu main-menu js-clone-nav  d-none pl-0 d-lg-block">
                    <li >
                    <a href="{{route('getHome')}}" class="nav-link text-left pl-0">Əsas</a>
                    </li> 
                    @foreach($menuCategory as $c)
                    <li>
                    <a href="{{route('getCategory',['category' => $c->name])}}" class="nav-link text-left pl-0">{{$c->name}}</a>
                    </li>

                    @endforeach  
                          
                    <li><a href="{{route('getContact')}}" class="nav-link text-left pl-0">Əlaqə</a></li>
                </ul>                                                                                                                                                                                                                                                                                         
                </nav>

            </div>
            
            </div>
        </div>
        <hr>
    </div>
    
    </div>

    @yield('header-content')
    
    <div class="site-section">
      <div class="container">
        <div class="row">
         
           @yield('content')
          
          <div class="col-lg-4">
            <div class="section-title ">
              <h2>Həftənin trendləri</h2>
            </div>

            @foreach($trendAtWeek as $trendNews)
              <div class="trend-entry d-flex">
                <div class="number align-self-start">0{{$loop->iteration}}</div>
                <div class="trend-contents">
                  <h2><a href="{{route('getSingleNews',['slug'=>$trendNews->slug])}}">{{$trendNews->caption}}</a></h2>
                  <div class="post-meta">
                    <span class="d-block"><a href="{{route('getAuthor',['author'=>$trendNews->author->name])}}">{{$trendNews->author->name}}</a> in <a href="{{route('getCategory',['category' => $trendNews->category->name])}}">{{$trendNews->category->name}}</a></span>
                    <span class="date-read">{{\Carbon\Carbon::parse($trendNews->created_at)->format('d/m/Y h:i')}} <span class="mx-1">&bullet;</span> {{$trendNews->reading_count}} <i class="fas fa-eye"></i> <span class="mx-1">&bullet;</span> {{$trendNews->commentsCount()}}  <i class="fas fa-comment"></i></span>

                  </div>
                </div>
              </div>
            @endforeach
            


          </div>
        </div>
      </div>
    </div>
   
 


   


  

    <div class="site-section subscribe bg-light">
      <div class="container pt-5 pb-4">
        <form class="row align-items-center">
          <div class="col-md-5 mr-auto">
            <h2>Newsletter Subcribe</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis aspernatur ut at quae omnis pariatur obcaecati possimus nisi ea iste!</p>
          </div>
          <div class="col-md-6 ml-auto">
            <div class="d-flex">
            
              @csrf
              <input type="text" name="email" id="subsEmail" class="form-control" placeholder="Email">
              <button type="button" id="subsemailButton" class="btn btn-secondary" ><span class="icon-paper-plane"></span></button>
             
            </div>
          </div>
        </form>
      </div>
    </div>


    
    <div class="footer">
      <div class="container">
        

        <div class="row py-2">
          <div class="col-12">
            <div class="copyright">
                <p>
                    {{$mySettings->copyright}}
                    </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    

  </div>
  <!-- .site-wrap -->



  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15"/></svg></div>
  
  
  <div class="modal hide fade" id="myCommentModal1" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">{{$mySettings->name}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body " id="comment-error1">
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script src="{{asset('website/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('website/js/jquery-ui.js')}}"></script>
  <script src="{{asset('website/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('website/js/owl.carousel.min.js')}}"></script>
 
  <script src="{{asset('website/js/aos.js')}}"></script>

  <script src="{{asset('website/js/main.js')}}"></script>



<script>
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $('#subsemailButton').click(function(){
    let subsEmail = $('#subsEmail').val();
    if(subsEmail == ''){
      $('#comment-error1').html('Emaili daxil edin.');
      $('#myCommentModal1').modal('show');
      return false;
    }
    if(!/\S+@\S+\.\S+/.test(subsEmail)){
      $('#comment-error1').html('Emaili düzgün daxil edin.');
      $('#myCommentModal1').modal('show');
      return false;
    }
    $('#subsEmail').val('');
    $('#subsEmail').attr('placeholder','Göndərilir...');
    $.ajax({
      url:"{{route('sendAndAddSubs')}}",
      dataType:'json',
      type:'POST',
      data:{
        'email':subsEmail
      },
      success:function(response){
       
        $('#subsEmail').attr('placeholder','Email');
        if(response.subs == null){
          $('#comment-error1').html('Aktiv etmək üçün emailinizə baxın.');
          $('#myCommentModal1').modal('show');
        }
        if(response.subs == 0){
          $('#comment-error1').html('Aktiv etmək üçün emailinizə baxın.');
          $('#myCommentModal1').modal('show');
        }
        if(response.subs == 1){
          $('#comment-error1').html('Sizin emailiniz bizə abonədir.');
          $('#myCommentModal1').modal('show');
        }

        

      },
      error:function(reject){
        $('#subsEmail').attr('placeholder','Email');
      
        if(reject.responseJSON.errors){
          let errors = reject.responseJSON.errors;
          let valerror = '';
          for (const name in errors) {
              valerror += `${errors[name]}<br>`;
          }
          $('#comment-error1').html(valerror);
          $('#myCommentModal1').modal('show');
        }

      }
    })
  });
</script>

  

  @yield('front_js')
  

</body>

</html>