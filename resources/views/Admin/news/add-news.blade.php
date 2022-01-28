@extends('Admin.layout.app')

@section('my_css')
   <!-- ck editor -->
  <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
@endsection


@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0 text-dark">Add News</h1>
        </div>
        
    </div>-
    </div>
</div>

<section class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">News</h3>
                    </div>
                <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('addNewsPost') }}" method="POST" enctype="multipart/form-data"> 
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

                            <div class="row my-2">
                                <div class="col-sm-6 mx-auto">
                                <div class="form-group my-0">
                                    <label for="caption">Caption:</label>
                                    <input type="text" name="caption" class="form-control" id="capton" placeholder="Caption">
                                </div>
                                    
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-sm-6 mx-auto">
                                    <label for="author_id">Author</label>
                                    <select id="author_id" name="author_id" class="form-control">
                                        <option value="" >Select</option>

                                        @foreach($author as $a)
                                            <option value="{{$a->id}}">{{$a->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-sm-6 mx-auto">
                                    <label for="category_id">Category</label>
                                    <select id="category_id" name="category_id" class="form-control">
                                        <option value="" >Select</option>
                                        @foreach($category as $c)
                                            <option value="{{$c->id}}">{{$c->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row my-4">
                                <div class="col-sm-6 mx-auto">
                                    <div class="form-check ">
                                        <input class="form-check-input" name="h_view" type="checkbox"  id="h_view">
                                        <label class="form-check-label" for="h_view">
                                            Home view
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-4">
                                <div class="col-sm-6 mx-auto">
                                    <div class="form-check ">
                                        <input class="form-check-input" name="c_view" type="checkbox"  id="c_view">
                                        <label class="form-check-label" for="c_view">
                                            Category view
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col-sm-6 mx-auto">
                                    <label for="text">Text</label><br>
                                    <textarea name="text" id="text"></textarea>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-sm-6 mx-auto">
                                <div class="form-group my-0">
                                    <label for="mintext">Min text:</label>
                                    <input type="text" class="form-control" id="mintext" name="mintext" placeholder="mintext">
                                </div>
                                    
                                </div>
                            </div>




                            <div class="row">
                                <div class="col-sm-6 mx-auto">
                                    <div class="form-group my-0">
                                        <label for="image">Image:</label>
                                        <input type="file" class="form-control-file" name="image" id="image">
                                    </div>
                                </div>
                            </div>


                            <div class="row my-3  ">
                                <div class="col-sm-6 mx-auto">
                                  <button type="submit" class="btn btn-primary">Add</button>
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

@section('my_js')
    <script>
        CKEDITOR.replace( 'text' ); 
    </script>
  

@endsection