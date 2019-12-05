<div class="form-group">
    <label>CONFIG SEO</label>
</div>
<div class="form-group">
    @include('partials.lang_input', ['type' => 'text', 'model' => 'data', 'attr' => 'meta_title', 'title' => trans('admin.field.meta_title')])
</div>
<div class="form-group">
    @include('partials.lang_input', ['type' => 'textarea', 'model' => 'data','class' => 'form-control', 'attr' => 'meta_description', 'title' => trans('admin.field.meta_description')])
</div>
<div class="form-group">
    @include('partials.lang_input', ['type' => 'textarea', 'model' => 'data','class' => 'form-control', 'attr' => 'meta_keywords', 'title' => trans('admin.field.meta_keywords'), 'rows' => 7])
</div>