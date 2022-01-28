@extends('Admin.layout.app')


@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Add Category</h1>
            </div>
            
        </div>
        <div class="row">
            <div class="col-12">
            <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Category</h3>
                    </div>
                <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{route('addCategoryPost') }}" method="POST"> 
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
                                    <input name="name" type="text" class="form-control" placeholder="Sport">
                                </div>
                                </div>
                                <br>
                                <div class="col-12">
                                  
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="home_viewer">Home view</label>
                                    <input name="home_view" type="checkbox" id="home_viewer">
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <div class="form-group">
                                <br>
                                    <button type="submit" class="btn btn-primary">Add</button>
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
</div>

<section class="content">
    <div class="container-fluid">
        
    </div>
</section>


@endsection