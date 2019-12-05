@extends('admin.master')
@section('css')
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">
                    {!! Form::open(['route' => 'post.cate.store', 'method' => 'POST', 'id' => 'form-post', 'class' => '', 'autocomplete' => 'off']) !!}
                    <div class="form-group">
                        @include('partials.lang_input', ['type' => 'text', 'model' => 'post_cate', 'attr' => 'title', 'title' => trans('admin.field.title'), 'required' => 'required'])
                        <p class="help">{!! trans('admin.help.title') !!}</p>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.slug') !!}</label>
                        {{ Form::text('slug', '', ['class'=>'form-control','id' => 'slug', 'placeholder' => '']) }}
                        <p class="help">{!! trans('admin.help.slug') !!}</p>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.categories') !!}</label>
                        <select class="form-control" name="parent_id">
                            <option value="0"> None</option>
                            {!! admin_PostCateSelect(0,"",0,'post') !!}
                        </select>
                        <p class="help">{!! trans('admin.help.categories') !!}</p>
                    </div>
                    <div class="form-group">
                        @include('partials.lang_input', ['type' => 'textarea', 'model' => '', 'attr' => 'expert', 'title' => trans('admin.field.description')])
                        <p class="help">{!! trans('admin.help.description') !!}</p>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.image') !!}</label>
                        <img src="http://placehold.it/1200x630" class="img-responsive" onclick="selectImage('image')"
                             id="img_image">
                        <input type="hidden" name="image" value="http://placehold.it/1200x630" id="input_image"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            {!! trans('admin.button.save') !!}
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-md-8" style="margin-top: 20px">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th class="no-sort hidden" style="width: 50px">Image</th>
                            <th>@lang('admin.field.title')</th>
                            <th class="no-sort">@lang('admin.field.slug')</th>
                            <th>@lang('admin.field.publish')</th>
                            <th>@lang('admin.field.date')</th>
                            <th class="no-sort text-center"></th>
                        </tr>
                        </thead>
                        @if(isset($data))
                            <tbody>
                            {!! admin_ShowPostCate(0,'','post') !!}
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection