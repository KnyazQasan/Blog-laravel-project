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
        <h1 class="m-0 text-dark">Comments</h1>
        </div>
        
    </div>
    </div>
</div>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
             
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>News</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>Report Count</th>
                                    <th>Delete</th>
                                    <th>Created_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $comment)
                                <tr>
                                    <td>{{$comment->newsName->caption}}</td>
                                    <td>{{$comment->username}}</td>
                                    <td>{{$comment->email}}</td>
                                    <td>{{$comment->comment}}</td>
                                    <td>{{$comment->report_count}}</td>
                                    <td><a href="{{route('deleteComment',['id'=>$comment->id])}}"  onclick="return confirm('Are you sure?')" class="btn btn-danger dataDableDelete"><i class="fas fa-trash-alt"></i></a></td>
                                    <td>{{$comment->created_at}}</td>
                                </tr>

                                @endforeach
                        
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>News</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>Report Count</th>
                                    <th>Delete</th>
                                    <th>Created_at</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
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

 

//   CKEDITOR.replace( 'about_text' ); 
                
</script>


@endsection