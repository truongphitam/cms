<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-info" onclick="addMoreGallery()">
            <i class="fa fa-fw fa-plus"></i>
        </button>
    </div>
</div>
<div class="row" id="list_gallery">
    @if(isset($data->galley))
        @foreach($data->galley as $_id => $itemGallery)
            <div class="col-md-3 item_galley" id="item_galley_{!! $_id !!}">
                <div class="form-group">
                    <label>{!! trans('admin.field.image') !!}</label>
                    <img src="{!! $itemGallery->image !!}" class="img-responsive"
                         onclick="selectImage('image_{!! $_id !!}')"
                         id="img_image_{!! $_id !!}">
                    <input type="hidden" name="gallery[]" value="{!! $itemGallery->image !!}"
                           id="input_image_{!! $_id !!}"/>
                </div>
                <div class="col-md-6 text-right p-r0">
                    <button onclick="selectImage('image_{!! $_id !!}')" type="button" class="btn btn-info btn-sm"><i
                                class="fa fa-fw fa-edit"></i>
                    </button>
                </div>
                <div class="col-md-6 text-left p-l0">
                    <button onclick="deleteItemGallary('{!! $_id !!}')" type="button" class="btn btn-danger btn-sm"><i
                                class="fa fa-fw fa-trash"></i>
                    </button>
                </div>
            </div>
        @endforeach
    @endif
</div>