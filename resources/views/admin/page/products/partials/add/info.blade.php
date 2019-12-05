<div class="row">
    <div class="col-md-9">
        <div class="form-group">
            @include('partials.lang_input', ['type' => 'text', 'model' => 'post', 'attr' => 'title', 'title' => trans('admin.field.title'), 'required' => 'required'])
        </div>
        <div class="form-group">
            <label>{!! trans('admin.field.slug') !!}</label>
            {{ Form::text('slug', '', ['class'=>'form-control','id' => 'slug', 'placeholder' => '']) }}
        </div>
        <div class="form-group">
            @include('partials.lang_input', ['type' => 'textarea', 'model' => 'post','class' => 'form-control', 'attr' => 'expert', 'title' => trans('admin.field.expert')])
        </div>
        <div class="form-group">
            @include('partials.lang_input', ['type' => 'textarea', 'model' => 'post','class' => 'form-control ckeditor', 'attr' => 'description', 'title' => trans('admin.field.description')])
        </div>
        @include('partials.seo')
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>{!! trans('admin.field.status') !!}</label>
            <select class="form-control" name="is_published">
                <option value="on">{!! trans('admin.field.publish') !!}</option>
                <option value="">{!! trans('admin.field.hide') !!}</option>
            </select>
        </div>
        <div class="form-group">
            <label>{!! trans('admin.field.categories') !!}</label>
            <div class="box-body chat" id="chat-box">
                <?php
                categories(0, '', '', 'products');
                ?>
            </div>
        </div>
        <div class="form-group">
            <label>{!! trans('admin.field.image') !!}</label>
            <img src="http://placehold.it/1200x630" class="img-responsive" onclick="selectImage('image')"
                 id="img_image">
            <input type="hidden" name="image" value="http://placehold.it/1200x630" id="input_image"/>
        </div>
    </div>
</div>