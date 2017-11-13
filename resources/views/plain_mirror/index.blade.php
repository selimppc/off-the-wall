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
                    <strong>Add Plain Mirror Frame</strong>
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
                        {!! Form::open(['route' => 'admin-plain-frame-index','method' => 'GET']) !!}

                            <div class="col-md-2">
                                <br/>
                                Search by
                            </div>

                            <div class="col-md-3">
                                 Category
                                {!! Form::select('frame_color', $frame_color_id,isset($id_frame_color) ? $id_frame_color : Input::old('frame_color'),['class' => 'form-control','id'=>'frame_color','']) !!}

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

                    <span class="pull-left">{!! str_replace('/?', '?', $data->render()) !!} </span>

                    <table  class="display table table-bordered table-striped" id="data-table-example">

                        <thead>
                            <tr>                                
                                <th> Frame Code </th>
                                <th> Frame Rate </th>
                                <th> Frame Rebate </th>
                                <th> Frame Width </th>
                                <th> Frame Height </th>
                                <th> Price </th>
                                <th> Status</th>
                                <th> Action </th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(isset($data))
                                @foreach($data as $values)
                                    <tr class="gradeX">

                                        <td>
                                            {{$values->frame_code}}
                                        </td>

                                        <td>
                                            {{$values->frame_rate}}
                                        </td>

                                        <td>
                                            {{$values->frame_rebate}}
                                        </td>
                                        <td>
                                            {{$values->frame_width}}
                                        </td>
                                        <td>
                                            {{$values->frame_height}}
                                        </td>
                                        <td>
                                            {{$values->price}}
                                        </td>
                                        <td>
                                            {{$values->status}}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin-plain-frame-show', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" title="View"><i class="icon-eye-open"></i></a>
                                            
                                            <a href="{{ route('admin-plain-frame-edit', $values->id) }}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#etsbModal" title="Edit"><i class="icon-edit"></i></a>
                                        
                                            <a href="{{ route('admin-plain-frame-delete', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" title="Delete"><i class="icon-trash"></i></a>
                                        </td>

                                    </tr>
                                @endforeach
                            @endif        

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
                    {!! Form::open(['route' => 'admin-plain-frame-store','files'=>'true']) !!}
                       @include('plain_mirror._form')
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