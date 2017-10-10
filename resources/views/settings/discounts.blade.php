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
                    Settings                  
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

                	{!! Form::model($data, ['files'=>'true','method' => 'PATCH', 'route'=> ['discounts.update', $data->id]]) !!}
		               @include('settings._discounts_form')
		            {!! Form::close() !!}

                </div>

            </section>
        </div>
    </div>

@stop