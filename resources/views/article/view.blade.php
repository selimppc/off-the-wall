<div class="modal-dialog" style="width: 80%;">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{$pageTitle}}</h4>
            <a href="" class="btn btn-default" style="float: right;margin-top: -30px;color: #fff;" type="button"> X </a>
        </div>

        <div class="modal-body">
            <div style="padding: 5px;">

                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#basic" aria-controls="home" role="tab" data-toggle="tab">Basic info</a></li>
                    <li role="presentation"><a href="#advanced" aria-controls="profile" role="tab" data-toggle="tab">Advanced</a></li>
                </ul>

                <div class="tab-content " style="padding: 30px 0px;">
                    <div role="tabpanel" class="tab-pane article-page-tab active" id="basic">
                       
                        <table id="" class="table table-bordered table-hover table-striped">
                            <tr>
                                <th class="col-lg-4"> Title </th>
                                <td>{{ isset($data->title)?$data->title:''}}</td>
                            </tr>
                            <tr>
                                <th class="col-lg-4"> Slug </th>
                                <td>{{ isset($data->slug)?$data->slug:'' }}</td>
                            </tr>
                            <tr>
                                <th class="col-lg-4"> Featured Image </th>
                                <td>
                                    <div>
                                        @if($data->thumbnail)
                                        <a href="{{ route('article.image.show', $data->slug) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#imageView"><img src="{{ URL::to($data->thumbnail) }}" height="50px" width="50px" alt="{{$data->thumbnail}}" />
                                        </a>
                                            @endif
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th class="col-lg-4"> Desc </th>
                                <td>{!! isset($data->desc)?$data->desc:'' !!}</td>
                            </tr>
                            <tr>
                                <th class="col-lg-4"> Meta Title </th>
                                <td>{{ isset($data->meta_title)?$data->meta_title:'' }}</td>
                            </tr>
                            <tr>
                                <th class="col-lg-4"> Meta Keyword </th>
                                <td>{{ isset($data->meta_keyword)?$data->meta_keyword:'' }}</td>
                            </tr>
                            <tr>
                                <th class="col-lg-4"> Meta Desc </th>
                                <td>{{ isset($data->meta_desc)?$data->meta_desc:'' }}</td>
                            </tr>
                            <tr>
                                <th class="col-lg-4"> Sort Order </th>
                                <td>{{ isset($data->sort_order)?$data->sort_order:'' }}</td>
                            </tr>
                            <tr>
                                <th class="col-lg-4"> Status </th>
                                <td>{{ isset($data->status)?$data->status:'' }}</td>
                            </tr>


                        </table>

                    </div>
                    <div role="tabpanel" class="tab-pane article-page-tab " id="advanced">
                        
                        <table id="" class="table table-bordered table-hover table-striped">
                            @if(!empty($all_article_data))
                                <tr>
                                    <th> Title </th>
                                    <th> Description </th>
                                    <th> Image</th>
                                    <th> Action</th>
                                </tr>
                                @foreach($all_article_data as $all_article)

                                    <tr>
                                        <td> {{$all_article->title}} </td>
                                        <td> {{$all_article->desc}} </td>
                                        <td> {{$all_article->image}}</td>
                                        <td> <a href="{{ route('article-subarticledelete', $all_article->id) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete?')" title="Delete"><i class="icon-trash"></i></a></td>
                                    </tr>

                                @endforeach
                            @endif                           

                        </table>
                    </div>
                </div>


                
            </div>
        </div>
        <div class="modal-footer">
            <a href="" class="btn btn-default" type="button"> Close </a>
        </div>
    </div>
</div>