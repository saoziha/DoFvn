@extends('templates.admin.master')
@section('content')
   <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Posts</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">Posts</li>
                </ol>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <a href="{{url('/admin/posts/add')}}" class="btn pull-right hidden-sm-down btn-success"> Add</a>
            </div>
        </div>

        <div class="row">
            <!-- column -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-block">
                        <h4 class="card-title">List</h4>
                        <div class="table-responsive">
                            <table id="myTable" class="table">
                                <thead>
                                    <tr>
                                        <th class="no-sort">#</th>
                                        <th class="no-sort">Name</th>
                                        <th class="no-sort" width="600px">Title</th>
                                        <th class="no-sort">Created at</th>
                                        <th class="no-sort">Updated at</th>
                                        <th class="no-sort">Status</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt=1; foreach($items as $item){ ?>
                                    <tr>
                                        <td>{{$stt}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->updated_at}}</td>
                                        <td>
                                            <form action='{{url("admin/posts")."/".$item->id."/edit"}}' method="POST">
                                                {!! csrf_field() !!}
                                            @if($item->status==1)
                                                <input value="0" name='status' type="hidden"/>
                                                <button type="submit" class="btn btn-success">Enabled</button>
                                            @else
                                                <input value="1" name='status' type="hidden"/>
                                                <button type="submit" class="btn btn-danger">Disabled</button>
                                            @endif
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{url("admin/posts/$item->id/edit")}}" class="btn btn-success">Edit</a>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModal{{$item->id}}">Delete</button>
                                                <!-- Modal -->
                                            <div id="delModal{{$item->id}}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Delete category</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h2>Do you want do this category?</h2>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form class='form-horizontal form-material' action='{{url("admin/category")."/".$item->id."/delete"}}' method="POST">
                                                                {!! csrf_field() !!}
                                                                <button type="submit" id="delete_{{$item->id}}" class="btn btn-success">Yes</button>
                                                            </form>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $stt++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
@endsection
