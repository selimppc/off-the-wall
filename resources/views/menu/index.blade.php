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
                {{ $pageTitle }}
                <a class="btn-sm btn-info pull-right" data-toggle="modal" href="#addData" title="Add">
                    <strong>Add Menu</strong>
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

                    {{-------------- DB :Filter -------------------------------------------}}
                    {!! Form::open(['route' => 'menu-index']) !!}

                    <div  class="col-lg-3 pull-left" >
                        <div class="input-group input-group-sm">
                            {!! Form::text('search_term', Input::old('search_term'), ['id'=>'search_term','placeholder'=>'Search by name','class' => 'form-control','required']) !!}
                            <span class="input-group-btn">
                               <button class="btn btn-info btn-flat" type="submit" >Search</button>
                                {{--<button type="button" class="btn sr-btn"><i class="icon-search"></i></button>--}}
                            </span>
                        </div>
                    </div>
                    {!! Form::close() !!}

                    <table  class="display table table-bordered table-striped" id="data-table-example">
                        <thead>
                        <tr>
                            <th> Name </th>
                            <th> Menu Type </th>
                            <th> Parent </th>
                            <th> Url </th>
                            <th> Type </th>
                            <th> Status </th>
                            <th> Ext Name </th>
                            <th> Order </th>
                            <th> Action </th>

                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($data))
                            @foreach($data as $values)
                                <tr class="gradeX">
                                    <td>{{$values->name}}</td>
                                    <td>{{$values->relMenuType->title}}</td>
                                    <td>{{$values->parent}}</td>
                                    <td>{{$values->url}}</td>
                                    <td>{{$values->type}}</td>
                                    <td>{{$values->status}}</td>
                                    <td>{{$values->ext_name}}</td>
                                    <td>{{$values->order}}</td>
                                    <td>
                                        <a href="{{ route('menu-show', [$values->slug,$values->id]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#etsbModal" title="View"><i class="icon-eye-open"></i></a>
                                        <a href="{{ route('menu-edit', [$values->slug,$values->id]) }}" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#etsbModal" title="Edit"><i class="icon-edit"></i></a>
                                        <a href="{{ route('menu-delete',[$values->slug,$values->id]) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" title="Delete"><i class="icon-trash"></i></a>
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
<!-- page end-->


<!-- addData -->
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  style="width: 75%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Menu</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'menu-store']) !!}
                   @include('menu._form')
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