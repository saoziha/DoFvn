@extends('templates.posts.master')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Posts</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Posts</li>
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
                                <form class="form-horizontal form-material" method="POST" enctype="multipart/form-data" action='{{url('user/posts/doAdd')}}'>
                                    {!! csrf_field() !!}
                                    <div class="form-group">
                                        <label class="col-md-12">Name</label>
                                        <div class="col-md-12">
                                            <input required='true' minlength="10" type="text" placeholder="Post name" name='name' class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">Title</label>
                                        <div class="col-md-12">
                                            <input required='true' minlength="20" type="text" placeholder="Post title" class="form-control form-control-line" name="title" id="example-email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12" >Category</label>
                                        <div class="col-md-12">
                                            <select name="category_id"  class="form-control">
                                                <?php
                                                    foreach($categories as $cate){
                                                ?>
                                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Tag</label>
                                        <div class="container">
                                        <div class="row">
                                        <?php
                                                foreach($tags as $tag){
                                            ?>
                                                <div class="col-md-1">
                                                    <label> {{$tag->name}} <input type="checkbox" name='tag[]' value="{{$tag->id}}" class="form-control form-control-line"></label>
                                                </div>
                                            <?php }?>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="col-md-12">Image</label>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <input required='true' type="file" onchange="loadFile(event)" name="image" placeholder="image" class="form-control form-control-line">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <img id="output" width="175px" class="img-fluid">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Content</label>
                                        <div class="col-md-12" height="auto">
                                            <textarea height="auto" name='content' id='body' class=" "></textarea>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-success">Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
@endsection
