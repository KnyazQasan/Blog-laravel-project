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
        <h1 class="m-0 text-dark">Category</h1>
        </div>
        
    </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <a href="{{ route('addCategory') }}" class="btn btn-info">Add Category</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
             
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>News count</th>
                                    <th>Home view</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th>Delete</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($category as $c)
                                    <tr>
                                        <td>{{$c->id}}</td>
                                        <td>{{$c->name}}</td>
                                        <td>{{$c->news_count()}}</td>
                                        <td>{{$c->h_view}}</td>
                                        <td>{{$c->created_at}}</td>
                                        <td>{{$c->updated_at}}</td>
                                        <td><a href="{{ route('deleteCategory',['id'=>$c->id]) }}"  onclick="return confirm('Are you sure?')" class="btn btn-danger dataDableDelete"><i class="fas fa-trash-alt"></i></a></td>
                                        <td><a href="{{ route('editCategory',['id'=>$c->id]) }}" class="btn btn-success"><i class="fas fa-edit"></i></a></td>
                                    </tr>
                                    

                            @endforeach
                        
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>News count</th>
                                    <th>Home view</th>
                                    <th>Created_at</th>
                                    <th>Updated_at</th>
                                    <th>Delete</th>
                                    <th>Update</th>
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