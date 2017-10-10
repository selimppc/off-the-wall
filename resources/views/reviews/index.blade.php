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
                    {!! Form::open(['route' => 'article-index']) !!}

                    <div  class="col-lg-3 pull-left" >
                        <div class="input-group input-group-sm">
                            {!! Form::text('search_term', Input::old('search_term'), ['id'=>'search_term','placeholder'=>'Search by title','class' => 'form-control','required']) !!}
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
                            <th> Customer Name </th>
                            <th>Location</th>
                            <th>Message</th>
                            <th> Status </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($data))
                            @foreach($data as $values)
                                <tr class="gradeX">
                                    <td>{{$values->name}}</td>
                                    <td>{{$values->location}}</td>
                                    <td>{{$values->message}}</td>
                                    <td>{{$values->status}}</td>
                                    <td>
                                        
                                        <a href="{{ route('reviews-confirm', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Confirm?')" title="Confirm"><i class="icon-check"></i></a>
                                        <a href="{{ route('reviews-delete', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" title="Delete"><i class="icon-trash"></i></a>
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

@stop