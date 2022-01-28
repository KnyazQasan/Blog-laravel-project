@extends('Admin.layout.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Settings</h1>
        </div>
        
    </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <a href="{{route('editSettings')}}" class="btn btn-success">Edit settings</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <div class="card border-info mb-2 h-100">
                    <div class="card-header">Name</div>
                    <div class="card-body text-info">
                        
                            <h3 class="card-text">{{$settings->name}}</h3>
                        
                        
                    </div>
                </div>
               

            </div>
           
            
        </div>
        <div class="row">
            <div class="col-12 my-3">
                <div class="card">
                    <h5 class="card-header">Subscribe text</h5>
                    <div class="card-body">
                        
                        {{$settings->subtext}}
                    </div>
                </div>

            </div>
            <div class="col-12 my-3">
                <div class="card">
                    <h5 class="card-header">Copyright</h5>
                    <div class="card-body">
                        
                        {{$settings->copyright}}
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="">Facebook:</h4>
                        <p class="card-text">{{$settings->facebook}}</p>
                        <a target="_blank" href="{{$settings->facebook}}" class="btn btn-primary">Go link</a>
                    </div>
                </div>
            </div>
           
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="">Instagram:</h4>
                        <p class="card-text">{{$settings->instagram}}</p>
                        <a target="_blank" href="{{$settings->instagram}}" class="btn btn-primary">Go link</a>
                    </div>
                </div>
            </div>
           
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="">Twitter:</h4>
                        <p class="card-text">{{$settings->twitter}}</p>
                        <a target="_blank" href="{{$settings->twitter}}" class="btn btn-primary">Go link</a>
                    </div>
                </div>
            </div>
        </div>
      
        
    </div>
</section>


@endsection