<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content" style="float: left;width: 100%">
        <div class="modal-header">
            <h4 class="modal-title">Update Information</h4>
        </div>
        <div class="modal-body">

            {!! Form::model($data, ['files'=>'true','method' => 'PATCH', 'route'=> ['productvariation-update', $data->slug]]) !!}
               @include('productvariation._form')
            {!! Form::close() !!}

        </div>
    </div>
</div>