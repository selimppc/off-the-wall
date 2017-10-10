@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="col-md-6 col-xs-12">

    <div class="form-group">
        {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::text('title', null, ['id'=>'title', 'class' => 'form-control','required', 'onkeyup'=>"convert_to_slug()"]) !!}
    </div>

    <div class="form-group">
        {!! Form::label('sort_order', 'Sort Order:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::text('sort_order', null, ['id'=>'sort_order', 'class' => 'form-control','required']) !!}
    </div>    

</div>

<div class="col-md-6 col-xs-12">

    <div class="form-group">
        {!! Form::label('slug', 'Slug:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::text('slug', null, ['id'=>'slug', 'class' => 'form-control','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
        <small class="required">(Required)</small>
        {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
    </div>

</div>

<p> &nbsp; </p>

<a href=""  class="btn btn-default" type="button"> Close </a>

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}

<script>

    function convert_to_slug(){
        var str = document.getElementById("title").value;
        str = str.replace(/[^a-zA-Z0-9\s]/g,"");
        str = str.toLowerCase();
        str = str.replace(/\s/g,'-');
        document.getElementById("slug").value = str;

    }

</script>