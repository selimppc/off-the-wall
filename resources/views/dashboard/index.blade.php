@extends('layout.master')

@section('sidebar')
    @parent
    @include('layout.sidebar')
@stop

@section('content')

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

<!--state overview start-->
<div class="row state-overview">
    <div class="col-lg-3 col-sm-6">

    </div>
    <div class="col-lg-3 col-sm-6">

    </div>
    <div class="col-lg-3 col-sm-6">

    </div>
    <div class="col-lg-3 col-sm-6">

    </div>
</div>
<!--state overview end-->


<div class="row">

    <div class="col-lg-12">
        <!--work progress start-->
        {{--<section class="panel">--}}
            <div class="panel-body progress-panel">
                <div class="task-progress">
                    <h1>Welcome To OFF THE WALL</h1>
                </div>
            </div>
        {{--</section>--}}
        <!--work progress end-->
    </div>
</div>




@stop