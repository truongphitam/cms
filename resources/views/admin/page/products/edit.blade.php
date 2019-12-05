@extends('admin.master')
@section('css')
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'products.update', 'method' => 'POST', 'id' => 'form-post', 'class' => '', 'autocomplete' => 'off']) !!}
            <input type="hidden" value="{!! $data->id !!}" name="id"/>
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#info" data-toggle="tab"
                                          aria-expanded="true">{!! trans('admin.field.info') !!}</a></li>
                    <li class=""><a href="#gallery" data-toggle="tab"
                                    aria-expanded="false">{!! trans('admin.field.gallery') !!}</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="info">
                        @include('admin.page.products.partials.edit.info')
                    </div>
                    <div class="tab-pane" id="gallery">
                        @include('admin.page.products.partials.edit.gallery')
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit"
                        class="btn btn-block btn-success btn-sm">{!! trans('admin.button.update') !!}</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('js')
@endsection