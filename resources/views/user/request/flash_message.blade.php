@extends('layout.master')
@section('sidebar')
    @parent
    @include('layout.sidebar')
@stop

@section('content')

    <div class="col-lg-6"  style="margin-left: 15%">
        <section class="panel">
            <header class="panel-heading">
               <strong>MemberShip Request Successfully Send!!!</strong>
            </header>
            <div class="panel-body">
            Please Check email for the registration .
            </div>
        </section>
    </div>
@stop