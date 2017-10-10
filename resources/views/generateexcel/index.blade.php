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
	                {{ $title }}
	                
	            </header>
	            
	          	<br /><br />

	          	&nbsp;&nbsp;&nbsp;<a class="btn btn-success" href="{{URL::to('order_paid/generate_excel_current')}}">Current Order</a>
	          	&nbsp;&nbsp;&nbsp;<a class="btn btn-success" href="{{URL::to('order_paid/generate_excel_approved')}}">Approved Order</a>
	          	&nbsp;&nbsp;&nbsp;<a class="btn btn-success" href="{{URL::to('order_paid/generate_excel_delivered')}}">Deliverd Order</a>

	          	<br /><br />
	        </section>
	    </div>
	</div>

@stop