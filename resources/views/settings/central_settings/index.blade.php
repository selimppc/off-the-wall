@extends('layout.master')
@section('sidebar')
@parent
@include('layout.sidebar')
@stop

@section('content')

        <!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <strong>{{ $pageTitle }}</strong>
            </header>
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    <p>{{ Session::get('flash_message') }}</p>
                </div>
            @endif
            @if(Session::has('flash_message_error'))
                <div class="alert alert-danger">
                    <p>{{ Session::get('flash_message_error') }}</p>
                </div>
            @endif

            <div class="panel-body">

                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="data-table-example">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th> Status </th>
                            <th> User Type </th>
                            <th>Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($data))
                            @foreach($data as $v)
                                <tr class="gradeX">
                                    <td>{{isset($v->title)?ucfirst($v->title):''}}</td>
                                    <td>{{isset($v->status)?ucfirst($v->status):''}}</td>
                                    <td>{{isset($v->user_type)? ucfirst($v->user_type):''}}</td>
                                    <td>
                                        <a href="{{ route('central-settings.show', $v->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal"><i class="icon-eye-open"></i></a>
                                        <a href="{{ route('central-settings.edit', $v->id) }}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#etsbModal"><i class="icon-edit"></i></a>
                                    </td>

                                </tr>
                        @endforeach
                        @endif
                    </table>
                    {{--<span class="pull-right">{!! str_replace('/?', '?', $data->render()) !!} </span>--}}
                </div>
            </div>
        </section>
    </div>
</div>
<!-- page end-->





<!-- Modal  -->
<div class="modal fade" id="etsbModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
</div>
<!-- modal -->

<!--script for this page only-->
@if($errors->any())
    <script type="text/javascript">
        $(function(){
            $("#addData").modal('show');
        });
    </script>
@endif

@stop