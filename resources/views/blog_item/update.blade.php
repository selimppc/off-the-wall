@extends('layout.master')
@section('sidebar')
@parent
@include('layout.sidebar')
@stop

@section('content')
        <!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <section class="panel">

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



            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        {{$pageTitle}}
                    </header>
                    <div class="panel-body">
                        {!! Form::model($data, ['files'=>'true','method' => 'PATCH', 'route'=> ['blog_item-update', $data->slug]]) !!}
                        <div class="form-group">
                            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
                            <small class="required">(Required)</small>
                            {!! Form::text('title', null, ['id'=>'title', 'class' => 'form-control','required','onkeyup'=>"sel_url()"]) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('slug', 'Slug:', ['class' => 'control-label']) !!}
                            <small class="required">(Required)</small>
                            {!! Form::text('slug', null, ['id'=>'slug', 'class' => 'form-control','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('blog_cat_id', 'Category:', ['class' => 'control-label']) !!}
                            <small class="required">(Required)</small>
                            {!! Form::select('blog_cat_id', $blog_cat_id,Input::old('blog_cat_id'),['class' => 'form-control','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('desc', 'Description:', ['class' => 'control-label']) !!}
                            {!! Form::textarea('desc', null, ['id'=>'desc', 'class' => 'wysihtml5 form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('meta_title', 'Meta Title:', ['class' => 'control-label']) !!}
                            {!! Form::text('meta_title', null, ['id'=>'meta_title', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('meta_keyword', 'Meta Keyword:', ['class' => 'control-label']) !!}
                            {!! Form::text('meta_keyword', null, ['id'=>'meta_keyword', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('meta_desc', 'Meta Description:', ['class' => 'control-label']) !!}
                            {!! Form::textarea('meta_desc', null, ['id'=>'meta_desc', 'class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
                            <small class="required">(Required)</small>
                            {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
                        </div>

                        <p> &nbsp; </p>

                        <a href="{{ route('blog_item-index') }}"  class="btn btn-default" type="button"> Close </a>

                        {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}

                        {{--<script>
                            function sel_url() {
                                $('#title').on('keyup', function () {
                                    var string = $(this).val();
                                    string = string.split(" ");
                                    var myStr = string.join('-');
                                    $('#slug').val(myStr);
                                });
                            }
                        </script>--}}
                    </div>

                </section>
            </div>



        </section>
    </div>
</div>
<!-- page end-->

<!-- Modal  -->
<div class="modal fade" id="etsbModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
{{--<script>
    function sel_url() {
        $('#title').on('keyup', function () {
            var string = $(this).val();
            string = string.split(" ");
            var myStr = string.join('-');
            $('#slug').val(myStr);
        });
    }
</script>--}}
@stop