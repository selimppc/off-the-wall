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
@if(Session::has('error_message'))
    <div class="alert alert-danger">
        <p>{{ Session::get('error_message') }}</p>
    </div>
@endif

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <a href="{{ URL::previous() }}" class="btn btn-xs btn-default pull-right" type="button"> x </a>
            <h4 class="modal-title">Comments Details</h4>

        </div>

        <div class="modal-body">
            <div>
                <p>
                <table class="table table-striped  table-bordered">
                    <tr>
                        <td> Blog Item ::  </td>
                        <td>{{ $data->title }}</td>
                    </tr>
                </table>

                <small>Comments as below: </small>

                @foreach($comment_data as $comment)
                    <div style="padding: 2%; background: #efefef; margin-bottom: 20px;">

                        <div class="pull-right"> <i> <small> <b>
                                        User Email : {{ isset($comment->name)?$comment->name:'' }} ({{isset($comment->email)?$comment->email:''  }})
                                    </b> </small> </i>
                        </div>
                        @if(count($comment->comment)>0)
                            <div style="line-height: 30px;"> <b> Comments :</b>
                                <div style="padding-left: 10%;"> <?php echo $comment->comment; ?>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            <div>
                {!! Form::open(['route' => 'blog_comment-store']) !!}

                <div class="form-group">
                    {{--{!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}<small class="required">(Required)</small>--}}
                    {{--{!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive','ban'=>'Ban','review'=>'Review'),Input::old('status'),['class'=>'form-control ','required']) !!}--}}
                    {!! Form::hidden('status', '1') !!}
                    <b>{!! Form::label('comment', 'Comment:', ['class' => 'control-label']) !!}</b>
                    {!! Form::textarea('comment', Input::old('comment'), ['class' => 'form-control','required']) !!}
                    {!! Form::hidden('blog_item_id', $data->id) !!}
                    {!! Form::hidden('name', 'abc') !!}
                    {!! Form::hidden('email', 'abc') !!}
                </div>

                {!! Form::submit('Save', ['class' => 'btn btn-success pull-right']) !!}
                {!! Form::close() !!}

                <p> &nbsp; </p>
            </div>
        </div>

        <div class="modal-footer">
            <a href=""  class="btn btn-default" type="button"> Close </a>
        </div>
    </div>
</div>