@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<div class="form-group">
    {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::text('title', null, ['id'=>'title', 'class' => 'form-control','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::text('slug', null, ['class' => 'form-control','required']) !!}
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

<a href=""  class="btn btn-default" type="button"> Close </a>

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}

{{--
<script>
    function sel_url() {
        $('#title').on('keyup', function () {
            var string = $(this).val();
            string = string.split(" ");
            var myStr = string.join('-');
            $('#slug').val(myStr);
        });
    }
</script>--}}
