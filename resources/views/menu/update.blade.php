<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Menu</h4>
        </div>
        <div class="modal-body">

            {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['menu-update',$data->slug,$data->id]]) !!}
               @include('menu._form')
            {!! Form::close() !!}

        </div>
    </div>
</div>