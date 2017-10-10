<div class="modal-dialog"  style="width: 75%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Information</h4>
        </div>
        <div class="modal-body">

            {!! Form::model($data, ['files'=>'true','method' => 'PATCH', 'route'=> ['product-subgroup-update', $data->id]]) !!}
               @include('product_subgroup._form')
            {!! Form::close() !!}

        </div>
    </div>
</div>