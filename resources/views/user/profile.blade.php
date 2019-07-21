@extends('templates.posts.master')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Gallery</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            <form class="form-horizontal form-material" enctype="multipart/form-data" action="{{url('user/changeProfile')}}" method="POST">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label class="col-md-12">Name</label>
                                    <div class="col-md-12">
                                        <input type="text" value="{{$item->name}}" name="name" required='true' minlength="2" placeholder="Gallery name" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label >Password</label>
                                   <div class="col-md-12">
                                       <input type="password"  name="password" placeholder="Password" class="form-control  ">
                                   </div>
                               </div>
                               <div class="form-group">
                                    <label >Avatar</label>
                                   <div class="col-md-12">
                                       <input type="file" onchange="loadFile(event)"  name="avatar" placeholder="Avatar" class="form-control  ">
                                   </div>
                                   <div class="col-md-6">
                                       <img class="img-fluid" id='output' src='{{url('storage').'/'.$item->avatar}}'>
                                   </div>
                               </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Update</button>
                                        <a  href="{{url('user')}}" class="btn btn-secondary">Back</a>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
@endsection
