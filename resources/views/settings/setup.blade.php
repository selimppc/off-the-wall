@extends('layout.master')
@section('sidebar')
@parent
@include('layout.sidebar')
@stop

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading ">
                    {{ $pageTitle }}
                </header>
            </section>
        </div>
    </div>

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


    <div class="row">
        <div class="col-lg-12">
             {{--<a href="{{ URL::to('reset_count_mails') }}" class="btn btn-info" title="Reset"> <b>Reset Count  </b></a>--}}
            <a href="{{ URL::to('central-settings') }}" class="btn btn-info" title="Central Settings"> <b>Central Settings </b></a>
        </div>
    </div>
@stop