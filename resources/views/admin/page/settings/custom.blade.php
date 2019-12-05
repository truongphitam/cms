@extends('admin.master')
@section('css')
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'settings.custom', 'method' => 'POST', 'id' => 'form-post', 'class' => '', 'autocomplete' => 'off']) !!}
            <input type="hidden" name="id" value="{!! $data->id !!}"/>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label>Custom CSS</label>
                        <textarea class="form-control" rows="10" name="css">{!! $data->css !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Custom JavaScript</label>
                        <textarea class="form-control" rows="10" name="js">{!! $data->js !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Code In between tag head</label>
                        <textarea class="form-control" rows="10"
                                  name="between_head">{!! $data->between_head !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Code In after tag closed head</label>
                        <textarea class="form-control" rows="10" name="after_head">{!! $data->after_head !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Code In after tag closed body</label>
                        <textarea class="form-control" rows="10" name="after_body">{!! $data->after_body !!}</textarea>
                    </div>
                </div>
                <div class="col-md-3">
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