<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Slider Image</h4>
        </div>
        <div class="modal-body">

            {!! Form::model($data, ['files'=>'true','method' => 'PATCH', 'route'=> ['slider-image-update', $data->slug]]) !!}
               @include('slider_image._form')
            {!! Form::close() !!}

        </div>
    </div>
</div>