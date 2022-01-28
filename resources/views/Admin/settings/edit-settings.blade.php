<!-- editor -->

@extends('Admin.layout.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-sm-6">
            <h1 class="m-0 text-dark">Edit Settings</h1>
            </div>
            
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Settings</h3>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{route('editSettingsPost')}}" method="post" enctype="multipart/form-data"> 
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                <!-- text input -->
                                    <div class="form-group">
                                    
                                        <label for="s_name"> Name:</label>
                                        <input name="name" id="s_name" value="{{$settings->name}}" type="text" class="form-control" />
                                    </div>
                                    
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                <!-- text input -->
                                    <div class="form-group">
                                        
                                        <label for="s_subscribe"> Subscribe text:</label>
                                        <input name="subscribe" id="s_subscribe" value="{{$settings->subtext}}" type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                    <label for="s_copyright">Copyright:</label>
                                    <input name="copyright" id="s_copyright" value="{{$settings->copyright}}" type="text" class="form-control" />

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                <!-- text input -->
                                    <div class="form-group">
                                   <br>
                                    <label for="s_facebook"> Facebook:</label>
                                        <input name="facebook_link" id="s_facebook" value="{{$settings->facebook}}" type="text" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                <!-- text input -->
                                    <div class="form-group">
                                   
                                        <label for="s_twitter"> Twitter:</label>
                                        <input name="twitter_link" id="s_twitter" value="{{$settings->twitter}}" type="text" class="form-control"/> 
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mx-auto">
                                <!-- text input -->
                                    <div class="form-group">
                                    <label for="s_instagram"> Twitter:</label>
                                        <input name="instagram_link" id="s_instagram" value="{{$settings->instagram}}" type="text" class="form-control"/> 
                                    </div>
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="col-md-6 my-3 mx-auto">
                                    <button type="submit" class="btn btn-primary float-right">Edit</button> 
                                </div>
                            </div>
                               
                           
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection


