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
        <h1 class="m-0 text-dark">Authors</h1>
        </div>
        
    </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{route('addAuthor')}}" class="btn btn-info">Add Author</a>
            </div>
        </div>
        <br>
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
                            <th>Created_at</th>
                            <th>Updated_at</th>
                            <th>Delete</th>
                            <th>Update</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach($author as $a)
                            <tr>
                                <td>{{$a->id}}</td>
                                <td>{{$a->name}}</td>
                                <td>{{$a->news_count()}}</td>
                                <td>{{$a->created_at}}</td>
                                <td>{{$a->updated_at}}</td>
                                <td><a href="{{ route('deleteAuthor',['id' => $a->id]) }}"  onclick="return confirm('Are you sure?')" class="btn btn-danger dataDableDelete"><i class="fas fa-trash-alt"></i></a></td>
                                <td><a href="{{ route('editAuthor',['id' => $a->id]) }}" class="btn btn-success"><i class="fas fa-edit"></i></a></td>
                            </tr>
                            

                       @endforeach
                
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>News count</th>
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