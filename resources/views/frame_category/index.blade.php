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
                        <strong>Add Frame Category</strong>
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

                <div class="panel-body">
                    <div class="adv-table">
                        <table  class="display table table-bordered table-striped" id="data-table-example">

                            <thead>
                                <tr>
                                    <th> Title </th>
                                    <th> Slug </th>
                                    <th> Order </th>
                                    <th> Status</th>
                                    <th> Action </th>

                                </tr>
                            </thead>

                            <tbody>
                                @if(isset($data))
                                    @foreach($data as $values)
                                        <tr class="gradeX">
                                            <td>
                                                {{$values->title}}
                                            </td>
                                            <td>
                                                {{$values->slug}}
                                            </td>
                                            
                                            <td>
                                                {{$values->sort_order}}
                                            </td>
                                            <td>
                                                {{$values->status}}
                                            </td>
                                            <td>
                                                <a href="{{ route('admin-frame-category-show', $values->id) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" title="View"><i class="icon-eye-open"></i></a>
                                                <a href="{{ route('admin-frame-category-edit', $values->id) }}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#etsbModal" title="Edit"><i class="icon-edit"></i></a>
                                        <a href="{{ route('admin-frame-category-delete', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" title="Delete"><i class="icon-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                        </table>

                        <span class="pull-right">{!! str_replace('/?', '?', $data->render()) !!} </span>

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
                    {!! Form::open(['route' => 'admin-frame-category-store','files'=>'true']) !!}
                       @include('frame_category._form')
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