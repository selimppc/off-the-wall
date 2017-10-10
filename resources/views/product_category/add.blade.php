@extends('layout.master')
@section('sidebar')
@parent
@include('layout.sidebar')
@stop

@section('content')

<div class="row">
    <div class="col-lg-8">
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
                    	 {!! Form::open(['route' => 'product-category-store','files'=>'true']) !!}

                    	 	<div class="form-group">
			                    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
			                    <small class="required">(Required)</small>
			                    {!! Form::text('title', null, ['id'=>'title', 'class' => 'form-control','required','onkeyup'=>"sel_url()"]) !!}
			                </div>

			                 <div class="form-group">
			                    {!! Form::label('Slug', 'Slug:', ['class' => 'control-label']) !!}
			                    {!! Form::text('slug', null, ['id'=>'slug', 'class' => 'form-control']) !!}
			                </div>

                            <div class="form-group">
                                {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                                {!! Form::textarea('description', null, ['id'=>'desc', 'class' => 'form-control', 'cols'=>'30' , 'rows'=>'10']) !!}
                            </div>

                            <div class="form-group last">
                                <label class="control-label col-md-3">Featured Image</label>
                                <div class="col-md-9">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        <div>
                                           <span class="btn btn-white btn-file">
                                           <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
                                           <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                           <input type="file" name="image" id="image" class="default" />
                                           </span>
                                            <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                        </div>
                                    </div>
                                    <span class="label label-danger">NOTE!</span>
                                                     <span>
                                                     Attached image thumbnail is
                                                     supported in Latest Firefox, Chrome, Opera,
                                                     Safari and Internet Explorer 10 only
                                                     </span>
                                </div>
                            </div>


                            <div class="form-group">
                                {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
                                <small class="required">(Required)</small>
                                {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
                            </div>

			                {!! Form::submit('Save changes', ['class' => 'btn btn-success']) !!}
                        	<a href="{{ route('product-category-index') }}" class="btn btn-default" type="button"> Close </a>

                    	 {!! Form::close() !!}
                    </div>

                </section>
            </div>
        </section>
    </div>
</div>

<script>
    function sel_url() {
        $('#title').on('keyup', function () {
            var string = $(this).val();
            string = string.split(" ");
            var myStr1 = string.join('-');
            var myStr = myStr1.toLowerCase();
            $('#slug').val(myStr);
        });
    }
</script>

@stop