@extends('layout.master')
@section('sidebar')
@parent
@include('layout.sidebar')
@stop

@section('content')

	<div class="row">
        <div class="col-lg-12">
            <section class="panel">

            	<header class="panel-heading">
                    {{ $pageTitle }}
                    <a class="btn-sm btn-info pull-right" data-toggle="modal" href="#addData" title="Add">
                        <strong>Add Frame</strong>
                    </a>
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

                <div class="col-md-12">
                    <div class="row">
                        <div class="sort_by_container">

                            {!! Form::open(['route' => 'admin-frame-index','method' => 'GET']) !!}

                                <div class="col-md-2">
                                    <br/>
                                    Search by
                                </div>

                                <div class="col-md-3">
                                   Category  {!! Form::select('frame_category_id', $frame_category_id,isset($id_category) ? $id_category : Input::old('frame_category_id'),['class' => 'form-control','id'=>'frame_category_id','']) !!}
                                </div>

                                <div class="col-md-3">
                                    <br/>
                                    {!! Form::submit('Search', ['class' => 'btn btn-success']) !!}
                                </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>    

                <div class="panel-body">
                    <div class="adv-table">
                        <table  class="display table table-bordered table-striped" id="data-table-example">

                        	<thead>
                                <tr>
                                    <th> Category </th>
                                    <th> Frame Code </th>
                                    <th> Frame Width </th>
                                    <th> Frame Depth </th>
                                    <th> Frame Rebate </th>
                                    <th> Frame Rate </th>
                                    <th> Frame Min Width </th>
                                    <th> Frame Max Width </th>
                                    <th> Status</th>
                                    <th> Action </th>
                                </tr>
                            </thead>

                            <tbody>
                                @if(isset($data))
                                    @foreach($data as $values)
                                        <tr class="gradeX">
                                        	<td>
                                        		{{@$values->relCategory->title}}
                                        	</td>
                                        	<td>
                                        		{{$values->frame_code}}
                                        	</td>
                                        	<td>
                                        		{{$values->frame_width}}
                                        	</td>
                                        	<td>
                                        		{{$values->frame_depth}}
                                        	</td>
                                        	<td>
                                        		{{$values->frame_rebate}}
                                        	</td>
                                        	<td>
                                        		{{$values->frame_rate}}
                                        	</td>
                                        	<td>
                                        		{{$values->frame_min}}
                                        	</td>
                                        	<td>
                                        		{{$values->frame_max}}
                                        	</td>
                                        	
                                        	<td>
                                        		{{$values->status}}
                                        	</td>
                                        	<td>
                                        		<a href="{{ route('admin-frame-show', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" title="View"><i class="icon-eye-open"></i></a>
                                                <a href="{{ route('admin-frame-edit', $values->id) }}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#etsbModal" title="Edit"><i class="icon-edit"></i></a>
                                        <a href="{{ route('admin-frame-delete', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" title="Delete"><i class="icon-trash"></i></a>
                                        	</td>

                                        </tr>
                                    @endforeach
                                   

                                     {!! $data->appends(array('frame_category_id' => Input::get('frame_category_id')))->render() !!}
                                @endif
                            </tbody>    

                        </table>
                    </div>
                </div>

            </section>
        </div>
    </div>    




    <!-- addData -->
    <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog"  style="width: 75%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add </h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'admin-frame-store','files'=>'true']) !!}
                       @include('frame._form')
                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>
    <!-- modal -->

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