<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">User Registration</h4>
        </div>
        <div class="modal-body">

            {!! Form::model($user_data, ['method' => 'PATCH', 'route'=> ['user.store', $user_data->id]]) !!}
            @include('user.admin.user_registration')
            {!! Form::close() !!}

        </div>
    </div>
</div>