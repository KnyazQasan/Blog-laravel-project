@extends('Admin.layout.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Category</h1>
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
                    <h3 class="card-title">Category</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('editCategoryPost',['id'=>$category->id]) }}" method="POST"> 
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
                                <input name="name" value="{{ $category->name }}" type="text" class="form-control" placeholder="Coronavirus">
                            </div>
                            </div>
                            <br>
                            <div class="col-12">
                                
                            <!-- text input -->
                            <div class="form-group">
                                <label for="home_viewer">Home view</label>
                                <input name="home_view" type="checkbox" @if($category->h_view == 1) checked @endif id="home_viewer">
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