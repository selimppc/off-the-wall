@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
<div class="form-group">
    {!! Form::label('menu_type_id', 'Menu Type:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    @if(count($menu_type)>0)
        {!! Form::Select('menu_type_id',$menu_type,Input::old('cat_id'),['class'=>'form-control ','required']) !!}
    @else
        {!! Form::text('menu_type_id', 'No menu type available',['id'=>'menu_type_id','class' => 'form-control','required','disabled']) !!}
    @endif
</div>

<div class="form-group">
    {!! Form::label('name', 'Name:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::text('name', null, ['id'=>'name', 'class' => 'form-control','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('parent', 'Parent List:', ['class' => 'control-label']) !!}
        {{--{!! $parent !!}--}}
    <select name="parent" class="form-control">
        <option value="0"></option>

        @foreach($parent as $parents)
            Parent node
            @if($parents->id == $parents->parent || $parents->parent == 0 )
                @if($parents->id == $data['parent'])
                    <option selected value="{{ $parents->id }}">{{ $parents->name }}</option>
                @else
                    <option value="{{ $parents->id }}">{{ $parents->name }}</option>
                @endif
                Child one
                @foreach($parent as $sub)
                    @if($parents->id == $sub->parent)
                        @if($sub->id == $data['parent'])
                            <option selected value="{{ $sub->id }}">&nbsp;&nbsp;&nbsp;&nbsp; {{ $sub->name }} </option>
                        @else
                            <option value="{{ $sub->id }}">&nbsp;&nbsp;&nbsp;&nbsp; {{ $sub->name }} </option>
                        @endif
                        Child two
                            @foreach($parent as $sub2)
                                @if($sub->id == $sub2->parent)
                                    @if($sub2->id == $data['parent'])
                                        <option selected value="{{ $sub.$i->id }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $sub2->name }} </option>
                                    @else
                                        <option value="{{ $sub->id }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $sub2->name }} </option>
                                    @endif

                                @endif
                            @endforeach

                    @endif
                @endforeach
            @endif
        @endforeach
    </select>
</div>
<div class="form-group">
    {!! Form::label('alias', 'Alias:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::text('alias', null, ['id'=>'alias', 'class' => 'form-control','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('url', 'Url:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    <i>(ex:'www.domain.com')</i>
    {{--{!! Form::text('url', null, ['id'=>'url', 'class' => 'form-control','required','onblur'=>'validate()']) !!}--}}
    {!! Form::text('url', null, ['id'=>'url', 'class' => 'form-control','required']) !!}
    <div id="error-input" style="visibility: hidden;text-decoration-color: #660000;"></div>
</div>
<script>
    //url validation ------------------------------
    function validate() {
        //alert('Hello');

        var url = document.getElementById("url").value;
        var submit = document.getElementById("submit-form");
        var error_input = document.getElementById("error-input");
       // This code is validate with or without http://--------------------------------------------
        var pattern = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/;

        if(pattern.test(url) == false){
            submit.disabled = true;
            error_input.style.visibility = 'visible';
            error_input.innerHTML = '<p>Please enter a correct URL</p>';
        }
        else{
            error_input.style.visibility = 'hidden';
            submit.disabled = false;
        }
    }
</script>

<div class="form-group">
    {!! Form::label('type', 'Type:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::Select('type',array('url'=>'Url','ext'=>'Ext'),Input::old('type'),['class'=>'form-control ','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}
</div>
<div class="form-group">
    {!! Form::label('ext_name', 'Ext Name:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::Select('ext_name',array('skill'=>'Skill','team'=>'Team','article'=>'Article','social_icon'=>'Social Icon','blog'=>'Blog','gallery'=>'Gallery','slider'=>'Slider'),Input::old('ext_name'),['class'=>'form-control ','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('order', 'Order:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::input('number', 'order', null, ['id'=>'order', 'class' => 'form-control','required']) !!}
</div>

<p> &nbsp; </p>

<a href=""  class="btn btn-default" type="button"> Close </a>

{!! Form::submit('Submit', ['id'=>'submit-form','class' => 'btn btn-success']) !!}

