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
            <div class="box-header" style="background-color: #0490a6">
                <h3 class="text-center text-green"><b style="color: #f5f5f5">Profile Picture</b></h3>
            </div>
            <span class="text-muted "></span>
            {{--<span class="text-muted "><em style="color:midnightblue"><span style="color:red;">(*)</span> Marked are required fields </em></span>--}}

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

            <div class="panel-body">
                {!! Form::open(['route' => 'user.profile-picture-save','files'=>'true']) !!}
                <div class="form-group last">
                    <label class="control-label col-md-3">Image Upload</label>
                    <div class="col-md-9">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                @if($data->image != '')
                                    <img src="{{URL::to($data->image)}}" alt="" />
                                    @else
                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                @endif
                            </div>
                            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                            <div>
                                                   <span class="btn btn-white btn-file fileupload-new">
                                                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
                                                   <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                       {!! Form::file('profile_pic', array('class'=>'default')) !!}
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


                <p> &nbsp; </p>

                {!! Form::submit('Save changes', ['class' => 'btn btn-success']) !!}
                {!! Form::close() !!}
            </div>
        </section>
    </div>
</div>

{{--{!! Form::submit('Save changes', ['class' => 'btn btn-success','onClick'=>'return validate()']) !!}--}}

<script>

    function validation() {
        $('#confirm_password').on('keyup', function () {
            if ($(this).val() == $('#password').val()) {
                $('#message').html('');
            } else $('#message').html('confirm password do not match with password,please check.').css('color', 'red');
        });
    }

</script>
@stop