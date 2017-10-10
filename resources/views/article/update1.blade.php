<script type="text/javascript" src="{{ URL::asset('etsb/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('etsb/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}"></script>

<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Article</h4>
        </div>
        <div class="modal-body">

            {!! Form::model($data, ['files'=>'true','method' => 'PATCH', 'route'=> ['article-update', $data->slug]]) !!}
               @include('article._form')
            {!! Form::close() !!}

        </div>
    </div>
</div>