@extends('Admin.layout.app')

@section('my_css')
 <!-- datatable -->
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection


@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">News</h1>
        </div>
        
    </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row  my-2">
            <div class="col-12 ">
                <a href="{{route('addNews')}}" class="btn btn-info">Add News</a>
            </div>
        </div>
        <div class="row">
              <div class="col-12">
              <div class="card">
             
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th>Id:</th>
                              <th>Caption:</th>
                              <th>Author:</th>
                              <th>Category:</th>
                              <th>Image:</th>
                              <th>H_view:</th>
                              <th>C_view:</th>
                              <th>View:</th>
                              <th>Reading count:</th>
                              <th>D/E:</th>
                              <th>Created_at:</th>
                              <th>Updated_at:</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($news as $n)
                          <tr>
                            <td>{{$n->id}}</td>
                            <td >{{$n->caption}}</td>
                            <td>{{$n->author->name}}</td>
                            <td>{{$n->category->name}}</td>
                            <td>
                              <img src="{{asset('img/news_image/'.$n->image)}}" height="50px" alt="">
                            </td>
                            <td>{{$n->h_view}}</td>
                            <td>{{$n->c_view}}</td>
                            <td><button class="btn btn-success news_view" data-caption="{{$n->caption}}" data-text="{{$n->text}}" data-minText="{{$n->min_text}}" data-img="{{$n->image}}"  data-toggle="modal" data-target="#exampleModal" >V</button></td>
                            <td>{{$n->reading_count}}</td>
                            <td>
                              <a href="{{route('deleteNews',['id'=>$n->id])}}"  onclick="return confirm('Are you sure?')" class="m-1 btn btn-danger dataDableDelete"><i class="fas fa-trash-alt"></i></a>
                              <a href="{{route('editNews',['id'=>$n->id])}}" class=" m-1 btn btn-success"><i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                              {{$n->created_at}}
                            </td>
                            <td>
                              {{$n->updated_at}}
                            </td>
                          </tr>

                        @endforeach
                      
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Id</th>
                          <th>Caption</th>
                          <th>Author</th>
                          <th>Category</th>
                          <th>Image</th>
                          <th>H_view</th>
                          <th>C_view</th>
                          <th>View</th>
                          <th>Reading count</th>
                          <th>D/E</th>
                          <th>Created_at</th>
                          <th>Updated_at</th>
                        </tr>
                      </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              </div>
            </div>
    </div>


    <!-- Modal -->
   <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">

            </h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img  class="img-fluid" id="modelNewsImg" alt="">
            <div class="minText">
            </div>
            <hr>
            
            <div class="Text">

            </div>
          </div>
          
        </div>
      </div>
    </div>

   
</section>

@endsection

@section('my_js')

<!-- datatable -->

<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>



  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  }); 

  $('.news_view').click(function(){
    $('.modal-title').html($(this).attr('data-caption'));
   
    $('.minText').html($(this).attr('data-minText'));
    $('.Text').html($(this).attr('data-text'));
    
  });


                
</script>


@endsection