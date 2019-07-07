@extends('templates.admin.master')
@section('content')
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Category</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Category</li>
                </ol>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <a href="{{url('admin/category/add')}}" class="btn pull-right hidden-sm-down btn-success"> Add</a>
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
                            <form class="form-horizontal form-material" action="{{url('admin/category/doAdd')}}" method="POST">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label class="col-md-12">Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="name" placeholder="Category name" class="form-control form-control-line">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success">Add</button>
                                        <a  href="{{url('admin/category')}}" class="btn btn-secondary">Back</a>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
@endsection
