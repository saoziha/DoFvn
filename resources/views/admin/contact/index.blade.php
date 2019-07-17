@extends('templates.admin.master')
@section('content')
   <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">Contact</h3>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </div>
            <div class="col-md-6 col-4 align-self-center">
                <a href="{{url('/admin/contact/1')}}" class="btn pull-right hidden-sm-down btn-danger">Sent</a>
            </div>
        </div>

        <div class="row">
            <!-- column -->
            <div class="col-sm-12">
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
                        <?php
                            $msg='';
                            if(request()->session()->has('msg')){
                                $msg = session('msg');
                        ?>
                            <div class="alert alert-success">
                                {{$msg}}
                            </div>
                        <?php
                            }
                        ?>

                        <h4 class="card-title">List</h4>
                        <div class="table-responsive">
                            <table id="myTable" class="table">
                                <thead>
                                    <tr>
                                        <th class="no-sort">#</th>
                                        <th class="no-sort">Name</th>
                                        <th>Mail</th>
                                        <th class="no-sort">Subject</th>
                                        <th class="no-sort">Created at</th>
                                        <th class="no-sort">Status</th>
                                        <th class="no-sort">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt=1; foreach($items as $item){ ?>
                                    <tr>
                                        <td>{{$stt}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->mail}}</td>
                                        <td>{{$item->subject}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            <form action='{{url("admin/contact")."/".$item->id."/edit"}}' method="POST">
                                                {!! csrf_field() !!}
                                            @if($item->status==0)
                                                <input value="1" name='status' type="hidden"/>
                                                <button type="submit" class="btn btn-success">Inbox</button>
                                            @else
                                                <input value="0" name='status' type="hidden"/>
                                                <button type="submit" class="btn btn-danger">Sent</button>
                                            @endif
                                            </form>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sendModal{{$item->id}}">Reply</button>
                                            <div id="sendModal{{$item->id}}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Reply contact</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="form-horizontal form-material" action="{{url("admin/contact/$item->id/send")}}" method="POST">
                                                                {!! csrf_field() !!}
                                                                <div class="form-group">
                                                                    <label class="col-md-2" style="padding-left:3px;font-weight:bold;">Mail to:</label>
                                                                    <div class="col-md-12">
                                                                        <input type="text" readonly required="true" name="mail" value="{{$item->mail}}"   placeholder="mail" class="col-md-9">
                                                                    </div>
                                                                    <label class="col-md-2"  style="padding-left:3px;font-weight:bold;">Subject:</label>
                                                                    <div class="col-md-12">
                                                                        <input type="text" required="true"   name="subject"   placeholder="subject" class="col-md-9">
                                                                    </div>
                                                                    <label class="col-md-2" style="padding-left:3px;font-weight:bold;">Content:</label>
                                                                    <div class="col-md-12">
                                                                        <textarea class="col-md-9" required="true" name="description" id="description"  rows="5"></textarea>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success">Send</button>
                                                            </form>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModal{{$item->id}}">Delete</button>
                                                <!-- Modal -->
                                            <div id="delModal{{$item->id}}" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Delete contact</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h2>Do you want do this contact?</h2>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form class='form-horizontal form-material' action='{{url("admin/contact")."/".$item->id."/delete"}}' method="POST">
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
