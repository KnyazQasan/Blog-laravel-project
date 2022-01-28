@extends('Website.layout.app')
@section('page_title')
{{$mySettings->name}}
@endsection
@section('content')

<div class="col-lg-8 ">

    <div class="site-section bg-light p-4 mb-3">
        <div class="section-title mb-3">
            <h2>Aboneliyinizi aktiv edin.</h2>
        </div>
        <form>

            <div class="row">
                <div class="col-12 form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="example@gmail.com" id="email" class="form-control form-control-lg">
                </div>
            </div>
               
            <div class="row">

            
                <div class="col-12 form-group">
                    <label for="code">Kod</label>
                    <input type="number"  id="code" name="code" placeholder="xxxxx" class="form-control form-control-lg">
                </div>
           </div>
           <div class="row">

           
                <div class="col-12">
                    <input type="button" id="buttonSubs" value="Göndər"  class="btn btn-primary py-3 px-5">
                </div>
                
            </div>
        
        </form>
           
       
    </div>

</div>
@endsection


@section('front_js')
    <script>
        $('#buttonSubs').click(function(){
            let email = $('#email').val();
            let code = $('#code').val();   
            if(email == ''){
                $('#comment-error1').html('Emaili daxil edin.');
                $('#myCommentModal1').modal('show');
                return false
            }
            if(code == ''){
                $('#comment-error1').html('Kodu daxil edin.');
                $('#myCommentModal1').modal('show');
                return false
            }
            if(!/\S+@\S+\.\S+/.test(email)){
                $('#comment-error1').html('Emaili düzgün daxil edin.');
                $('#myCommentModal1').modal('show');
                return false;
            }
            if (code.length != 5) {
                $('#comment-error1').html('5 rəqəmli kodu düzgün daxil edin.');
                $('#myCommentModal1').modal('show');
                return false;
            }

            $('#buttonSubs').val('Göndərilir');

            $.ajax({
                url:'{{route("activeSubs")}}',
                type:'post',
                data:{
                    'email':email,
                    'code':code
                },
                dataType:'json',
                success:function(response){
                    $('#buttonSubs').val('Göndər');
                    if(response.subs == null){
                        $('#comment-error1').html('Bu email abonələr arasında yoxdu');
                        $('#myCommentModal1').modal('show');
                        return;
                        
                    }
                    if(response.subs == 1){
                        $('#comment-error1').html('Bu email daha əvvəldən abonədir');
                        $('#myCommentModal1').modal('show');
                        return;
                    }
                    if(response.subs == 'active'){
                        $('#email').val('');
                        $('#code').val('');  
                        $('#comment-error1').html('Abone oldubuz');
                        $('#myCommentModal1').modal('show');
                        return;
                    }
                    if(response.subs == 'deactive'){
                        $('#comment-error1').html('Şifrə sehvdir');
                        $('#myCommentModal1').modal('show');
                        return;
                    }
                    

                },
                error:function(reject){
                    $('#buttonSubs').val('Göndər');
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
@endsection