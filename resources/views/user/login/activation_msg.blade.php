@extends('layout.master')
@section('sidebar')
    @parent
    {{--@include('layout.sidebar')--}}
@stop

@section('content')

    <div class="col-lg-6"  style="margin-left: 15%">
        <section class="panel">
            <header class="panel-heading">
                <strong>Successfully Completed Registration Process.</strong>
            </header>
            <div class="panel-body">
                Please Check Your Email For Login Activation Link .
            </div>
        </section>
    </div>
@stop