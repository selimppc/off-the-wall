@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="form-group">
    {!! Form::label('old_password', 'Old Password') !!}
    {!! Form::password('old_password',['class' => 'form-control','placeholder'=>'Enter Old Password','required','id'=>'old']) !!}
    <div style="color:firebrick" id ="errors"></div>
</div>
<div class="form-group">
    {!! Form::label('password', 'New Password') !!}
    {!! Form::password('password',['class' => 'form-control','placeholder'=>'Enter New Password','required','id'=>'password','name'=>'password']) !!}
</div>
<div class="form-group">
    {!! Form::label('confirm_password', 'Confirm Password') !!}
    {!! Form::password('confirm_password', ['class' => 'form-control','placeholder'=>'Re-Enter New Password','required','id'=>'confirm_password','name'=>'confirm_password','onkeyup'=>"validation()"]) !!}
    <span id='message'></span>
</div>


<p> &nbsp; </p>

{!! Form::submit('Save changes', ['class' => 'btn btn-success']) !!}

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