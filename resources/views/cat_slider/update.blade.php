<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Information</h4>
        </div>
        <div class="modal-body">

            {!! Form::model($data, ['method' => 'PATCH', 'route'=> ['cat-slider-update', $data->slug]]) !!}
               @include('cat_slider._form')
            {!! Form::close() !!}

        </div>
    </div>
</div>