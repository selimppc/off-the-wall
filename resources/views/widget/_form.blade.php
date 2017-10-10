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
    {!! Form::label('content', 'Content:', ['class' => 'control-label']) !!}
    {!! Form::textarea('content', null, ['id'=>'content', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('order', 'Order:', ['class' => 'control-label']) !!}
    {!! Form::input('number','order', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('position', 'Position:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::select('position', \App\Widget::PositionName(),null, ['id'=>'position', 'class' => 'form-control','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
    {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ']) !!}
</div>

<div class="form-group">
    {!! Form::label('widget_name', 'Widget Name:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    {!! Form::Select('widget_name',array('Skill'=>'Skill','Team'=>'Team','Article'=>'Article','Social Icon'=>'Social Icon','Blog'=>'Blog','Gallery'=>'Gallery','Slider'=>'Slider'),Input::old('widget_name'),['class'=>'form-control ','required']) !!}
</div>

<div class="form-group">
    {!! Form::label('showtitle', 'Show Title:', ['class' => 'control-label']) !!}
    {!! Form::Select('showtitle',array('yes'=>'Yes','no'=>'No'),Input::old('showtitle'),['class'=>'form-control ']) !!}
</div>
<div class="form-group">
    {!! Form::label('optionsRadios', 'Select Menu:', ['class' => 'control-label']) !!}<br>
    <label class="inline">
        <input type="radio" name="optionsRadios" id="select-all" onclick="selectAllandRemove(this.id)" value="option2">
        All
    </label>
    <label class="inline">
        <input type="radio" name="optionsRadios" id="select-none" onclick="selectAllandRemove(this.id)" value="option2">
        None
    </label>
</div>
<div class="form-group">
    <select multiple id="my_multi_select" name="menu_id[]" size=7 style="width: 100%;">
        @foreach($menu as $menus)
            Parent node
            @if($menus->id == $menus->parent || $menus->parent == 0 )
                {{--@if($menus->id == $data['menu_id'])--}}
                @if(in_array($menus->id , $widget_menu))
                    <option selected value="{{ $menus->id }}">{{ $menus->name }}</option>
                @else
                    <option value="{{ $menus->id }}">{{ $menus->name }}</option>
                @endif
                Child one
                @foreach($menu as $sub)
                    @if($menus->id == $sub->parent)
                        {{--@if($sub->id == $data['parent'])--}}
                        @if(in_array($sub->id , $widget_menu))
                            <option selected value="{{ $sub->id }}">&nbsp;&nbsp;&nbsp;&nbsp; {{ $sub->name }} </option>
                        @else
                            <option value="{{ $sub->id }}">&nbsp;&nbsp;&nbsp;&nbsp; {{ $sub->name }} </option>
                        @endif
                        Child two
                        @foreach($menu as $sub2)
                            @if($sub->id == $sub2->parent)
                                {{--@if($sub2->id == $data['parent'])--}}
                                @if(in_array($sub2->id , $widget_menu))
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
<script>
    function selectAllandRemove(id) {
        if(id == 'select-all'){
            $('#my_multi_select option').attr('selected', 'selected');
        }
        else if(id == 'select-none'){
            $('#my_multi_select option').prop("selected", false);
        }
    }
</script>
<p> &nbsp; </p>

<a href=""  class="btn btn-default" type="button"> Close </a>

{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}