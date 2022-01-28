@extends('Website.layout.app')
@section('page_title')
{{$mySettings->name}}
@endsection
@section('content')

<div class="col-lg-8 ">
    
    <div class="site-section bg-light p-4 mb-3">
        <div class="section-title mb-5">
            <h2>Bizə yazın</h2>

        </div>
        <form>
       
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="fname">Ad</label>
                    <input type="text" id="fname"  name="name" class="form-control form-control-lg">
                </div>
                <div class="col-md-6 form-group">
                    <label for="lname">Soyad</label>
                    <input type="text" id="lname" name="surname" class="form-control form-control-lg">
                </div>
            </div>
            <div class="row">
                <div class="col-12 form-group">
                    <label for="eaddress">Email</label>
                    <input type="text" name="email" id="eaddress" class="form-control form-control-lg">
                </div>
               
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="message">Mesajınız</label>
                    <textarea  id="message" name="message" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <input type="button" id="buttonContact" value="Göndər" class="btn btn-primary py-3 px-5">
                
                    
                </div>
                
            </div>
        
        </form>
           
       
    </div>

</div>
@endsection
@section('front_js')

<script>
    $('#buttonContact').click(function(e){
        let name = $('#fname').val();
        let surname = $('#lname').val();
        let email = $('#eaddress').val();
        let message = $('#message').val();

        if(name == ''){
            $('#comment-error1').html('Adı daxil edin.');
            $('#myCommentModal1').modal('show');
            return false;
            
        }
        if(surname == ''){
            $('#comment-error1').html('Soyadı daxil edin.');
            $('#myCommentModal1').modal('show');
            return false;
        }
        if(email == ''){
            $('#comment-error1').html('Emaili daxil edin.');
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


        $('#buttonContact').val('Göndərilir');
        
        $.ajax({
            url:"{{route('sendMessage')}}",
            type:'POST',
            data:{
                'name':name,
                'surname':surname,
                'email':email,
                'message':message
            },
            dataType:'json',
            success:function(response){
                $('#buttonContact').val('Göndər');
                $('#fname').val('');
                $('#lname').val('');
                $('#eaddress').val('');
                $('#message').val('');
                $('#comment-error1').html('Mesajınız bizə çatdı.Ən qısa zamanda sizə geri dönüş edeceyik.');
                $('#myCommentModal1').modal('show');
                

            },
            error:function(reject){
                $('#buttonContact').val('Göndər');
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
        });



        e.preventDefault();

        
    })
    

</script>
@endsection