@extends('Admin.layout.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Author</h1>
        </div>
        
    </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Author</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{route('editAuthorPost',['id'=>$author->id])}}" method="POST"> 
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <br>
                                <input name="name" value="{{ $author->name }}" type="text" class="form-control" placeholder="Ibad Asadov">
                            </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="form-group">
                            <br>
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                            </div>
                        </div>
                  

                   
                   

                   
                    </form>
                </div>
                <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection