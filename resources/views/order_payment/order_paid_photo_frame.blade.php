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
                    Photo Frame Current Order
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

                <div class="panel-body">
                    <div class="adv-table">
                        <table  class="display table table-bordered table-striped" id="data-table-example">
                            <thead>
                            <tr>
                                <th> Invoice No# </th>
                                <th> User Name </th>
                                <th> Status</th>
                                <th> Action </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($data))
                                @foreach($data as $values)
                                    <tr class="gradeX">
                                        <td>{{$values->invoice_id}}</td>
                                        <td>{{$values->relCustomer->first_name}}</td>
                                        <td>{{$values->status}}</td>
                                        <td>
                                            <a href="{{ route('order-paid-show-photo-frame', $values->id) }}" data-toggle="modal" data-target="#etsbModal" class="btn btn-info btn-xs" title="Details"><i class="icon-eye-open"></i></a>
                                            <a href="{{ route('order-paid-approve', $values->id) }}" class="btn btn-info btn-xs" onclick="return confirm('Are you sure to Approved?')" title="Approved"><i class="icon-exclamation"></i></a>
                                            <a href="{{ route('order-paid-cancel', $values->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Cancel?')" title="Cancel"><i class="icon-trash"></i></a>
                                        </td>
                                    </tr>
                            @endforeach
                            @endif
                        </table>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>


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