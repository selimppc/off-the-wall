<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Information</h4>
        </div>
        <div class="modal-body">

            {!! Form::model($data, ['files'=>'true','method' => 'PATCH', 'route'=> ['product-group-update', $data->slug]]) !!}
               @include('product_group._form')
            {!! Form::close() !!}

        </div>
    </div>
</div>