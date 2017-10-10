@extends('layout.master')
@section('sidebar')
    @parent
    @include('layout.sidebar')
@stop

@section('content')
    
    <div class="product_category_update_section">
           {!! Form::model($data, ['files'=>'true','method' => 'PATCH', 'route'=> ['product-update', $data->slug]]) !!}
               @include('product._form')
            {!! Form::close() !!}
    </div>

@stop