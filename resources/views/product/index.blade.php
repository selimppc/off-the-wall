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
                    <strong>Add Product</strong>
                </a>
            </header>
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

            <div class="col-md-12">
                <div class="row">
                    <div class="sort_by_container">

                        {!! Form::open(['route' => 'product-index','method' => 'GET']) !!}

                            <div class="col-md-2">
                                <br/>
                                Search by
                            </div>
                            <div class="col-md-3">
                               Product Group  {!! Form::select('product_group_id', $product_group_id_search, isset($id_product_group) ? $id_product_group : Input::old('product_group_id'),['class' => 'form-control','id'=>'product_group_id','required']) !!}
                            </div>
                            <div class="col-md-3">
                                Product Subgroup

                                @if(isset($id_product_subgroup))

                                    {!! Form::select('product_subgroup_id', $product_subgroup_lists, isset($id_product_subgroup) ? $id_product_subgroup : Input::old('product_group_id'),['class' => 'form-control','id'=>'product_subgroup_id','']) !!}

                                @else

                                    <select class='form-control' id="product_subgroup_id" name="product_subgroup_id">
                                    </select>

                                @endif

                               
                            </div>
                            <div class="col-md-3">
                                <br/>
                                {!! Form::submit('Search', ['class' => 'btn btn-success']) !!}
                            </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="panel-body">
                <div class="adv-table">
                    <table  class="display table table-bordered table-striped" id="data-table-example">
                        <thead>
                            <tr>
                                <th> Title </th>
                                <th>Product Group</th>
                                <th>Product Sub Group</th>
                                <th> Status</th>
                                <th> Action </th>
                            </tr>
                         </thead>
                        <tbody>
                            @if(isset($data))
                                @foreach($data as $values)
                                     <tr class="gradeX">
                                        <td>{{$values->title}}</td>
                                        <td>{{$values->relGetproductgroup->title}}</td>
                                        <td>{{$values->relGetproductsubgroup->title}}</td>
                                        <td>{{$values->status}}</td>
                                        <td>
                                            <a href="{{ route('product-show', $values->slug) }}" data-toggle="modal" data-target="#etsbModal" class="btn btn-info btn-xs" title="View"><i class="icon-eye-open"></i></a>
                                            <a href="{{ route('productvariation-index', $values->slug) }}" target="_blank" class="btn btn-primary btn-xs" title="Variation"><i class="icon-adjust"></i></a>
                                            <a href="{{ route('product-edit', $values->slug) }}" target="_blank" class="btn btn-primary btn-xs" title="Edit"><i class="icon-edit"></i></a>
                                            <a href="{{ route('product-duplicate', $values->slug) }}" target="_self" class="btn btn-primary btn-xs" title="Duplicate"><i class="icon-copy"></i></a>
                                            <a href="{{ route('product-delete', $values->slug) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" title="Delete"><i class="icon-trash"></i></a>
                                        </td>
                                     </tr>
                                @endforeach

                                {!! $data->appends(array('product_group_id' => Input::get('product_group_id'),'product_subgroup_id' => Input::get('product_subgroup_id')))->render() !!}

                            @endif
                        </table>
                       
                    </table>
                </div>
            </div>

        </section>
    </div>
</div>


<!-- addData -->
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  style="width: 75%;">
        <div class="modal-content" style="width:100%;float:left;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Product</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'product-store','files'=>'true']) !!}
                   @include('product._form')
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

<!-- View image for media in Modal  -->
<div class="modal fade" id="imageView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background-color: #1a1a1a; margin: 0 auto; opacity: 0.9">
</div>
<!-- modal -->

<script>

    $(function(){
        $("#product_group_id").on('change',function(e){

            var product_group_id = $("#product_group_id").val();
            var site_url = $('#site_url').attr("href");
            $.ajax({
                url: site_url+'/product_category/cat_product_group_ajax',
                type: 'POST',
                dataType: 'json',
                data: {_token: '{!! csrf_token() !!}',product_group_id:product_group_id,},
                success: function(response)
                {
                    $("#product_subgroup_id").html(response.message);
                }
            });


            return false;
        });
    });

</script>
@stop