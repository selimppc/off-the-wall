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
    {!! Form::label('link', 'Link:', ['class' => 'control-label']) !!}
    <small class="required">(Required)</small>
    <i>(ex:'www.domain.com')</i>
    {!! Form::text('link', null, ['id'=>'link', 'class' => 'form-control','readonly']) !!}
    <div id="error-input" style="visibility: hidden;text-decoration-color: #660000;"></div>
</div>
<script>
    //url validation ------------------------------
    function validate() {
        //alert('Hello');

        var link = document.getElementById("link").value;
        var submit = document.getElementById("submit-form");
        var error_input = document.getElementById("error-input");
        // This code is validate with or without http://--------------------------------------------
        var pattern = /(http(s)?:\\)?([\w-]+\.)+[\w-]+[.com|.in|.org]+(\[\?%&=]*)?/;

        if(pattern.test(link) == false){
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

<div class="form-group last">
    <label class="control-label col-md-3">Icon Upload
        <small class="required">(Required)</small></label>
    <div class="col-md-9">
        <div class="fileupload fileupload-new" data-provides="fileupload">
            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                {{--<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />--}}
                @if($data['icon'] != '')
                    <a href="{{ route('social_icon.image.show', $data['slug']) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#imageView"><img src="{{ URL::to($data['icon']) }}" height="50px" width="50px" alt="{{$data['icon']}}" />
                    </a>
                @else
                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                @endif
            </div>
            <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
            <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
                                                   <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                   <input type="file" name="icon" id="icon" class="default" />
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
    {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive'),Input::old('status'),['class'=>'form-control ','required']) !!}</div>

<p> &nbsp; </p>

<a href=""  class="btn btn-default" type="button"> Close </a>

{!! Form::submit('Submit', ['id'=>'submit-form','class' => 'btn btn-success']) !!}