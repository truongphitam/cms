@extends('admin.master')
@section('css')
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'settings.overview', 'method' => 'POST', 'id' => 'form-post', 'class' => '', 'autocomplete' => 'off']) !!}
            <input type="hidden" value="{!! $data->id !!}" name="id"/>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        @include('partials.lang_input', ['type' => 'text', 'model' => 'data', 'attr' => 'title', 'title' => trans('admin.field.title'), 'required' => 'required'])
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label>{!! trans('admin.field.phone') !!}</label>
                            <input class="form-control" type="text" name="phone" value="{!! $data->phone !!}"/>
                        </div>
                        <div class="col-md-6">
                            <label>{!! trans('admin.field.hotline') !!}</label>
                            <input class="form-control" type="text" name="hotline" value="{!! $data->hotline !!}"/>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label>{!! trans('admin.field.email') !!}</label>
                            <input class="form-control" type="email" name="email" value="{!! $data->email !!}"/>
                        </div>
                        <div class="col-md-6">
                            <label>{!! trans('admin.field.fax') !!}</label>
                            <input class="form-control" type="text" name="fax" value="{!! $data->fax !!}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        @include('partials.lang_input', ['type' => 'textarea', 'model' => 'data','class' => 'form-control ckeditor', 'attr' => 'expert', 'title' => trans('admin.field.expert')])
                    </div>
                    <div class="form-group">
                        @include('partials.lang_input', ['type' => 'textarea', 'model' => 'data','class' => 'form-control ckeditor', 'attr' => 'description', 'title' => trans('admin.field.description')])
                    </div>
                    @include('partials.seo')
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Twitter</label>
                        <input class="form-control" type="text" name="twitter" value="{!! $data->twitter !!}"/>
                    </div>
                    <div class="form-group">
                        <label>Facebook</label>
                        <input class="form-control" type="text" name="facebook" value="{!! $data->facebook !!}"/>
                    </div>
                    <div class="form-group">
                        <label>Google Plus</label>
                        <input class="form-control" type="text" name="plus" value="{!! $data->plus !!}"/>
                    </div>
                    <div class="form-group">
                        <label>Pinterest</label>
                        <input class="form-control" type="text" name="pinterest" value="{!! $data->pinterest !!}"/>
                    </div>
                    <div class="form-group">
                        <label>Linkedin</label>
                        <input class="form-control" type="text" name="linkedin" value="{!! $data->linkedin !!}"/>
                    </div>
                    <div class="form-group">
                        <label>Tumblr</label>
                        <input class="form-control" type="text" name="tumblr" value="{!! $data->tumblr !!}"/>
                    </div>
                    <div class="form-group">
                        <label>Instagram</label>
                        <input class="form-control" type="text" name="instagram" value="{!! $data->instagram !!}"/>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.image') !!}</label>
                        <img src="{!! $data->image !!}" class="img-responsive" onclick="selectImage('image')"
                             id="img_image">
                        <input type="hidden" name="image" value="{!! $data->image !!}" id="input_image"/>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.logo') !!}</label>
                        <img src="{!! $data->logo !!}" class="img-responsive" onclick="selectImage('logo')"
                             id="img_logo">
                        <input type="hidden" name="logo" value="{!! $data->logo !!}" id="input_logo"/>
                    </div>
                    <div class="form-group">
                        <label>
                            {!! trans('admin.button.update') !!}
                        </label>
                        @if (isset($data->id))
                            <p>@lang('admin.field.created_at'): {{ $data->created_at }}</p>
                            <p>@lang('admin.field.updated_at'): {{ $data->updated_at }}</p>
                            <hr>
                        @endif
                        <button type="submit"
                                class="btn btn-block btn-success btn-sm">{!! trans('admin.button.update') !!}</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('js')
@endsection