<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
            <h4 class="modal-title">Edit User Type of :{!! isset($data->title)? ucfirst($data->title):''!!}</h4>
        </div>
        <div class="modal-body">

            {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['central-settings.update', $data->id]]) !!}
            @include('settings.central_settings._form')
            {!! Form::close() !!}

        </div>
    </div>
</div>