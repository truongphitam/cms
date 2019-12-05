@extends('admin.master')
@section('css')
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'member.update', 'method' => 'POST', 'id' => 'form-post', 'class' => '', 'autocomplete' => 'off']) !!}
            <input type="hidden" name="id" value="{!! $data->id !!}"/>
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label>{!! trans('admin.field.email') !!}</label>
                        <input type="email" name="email" class="form-control" id="email" onkeyup='checkEmail();'
                               required value="{!! $data->email !!}" disabled/>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.first_name') !!}</label>
                        <input type="text" name="first_name" class="form-control"
                               value="{!! $data->first_name !!}"/>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.last_name') !!}</label>
                        <input type="text" name="last_name" class="form-control"
                               value="{!! $data->last_name !!}"/>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.website') !!}</label>
                        <input type="text" name="website" class="form-control" value="{!! $data->website !!}"/>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.phone') !!}</label>
                        <input type="text" name="phone" class="form-control" value="{!! $data->phone !!}"/>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.address') !!}</label>
                        <textarea class="form-control" name="address" rows="7">{!! $data->address !!}</textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{!! trans('admin.field.password') !!}</label>
                        <input type="password" name="password" class="form-control" id="password"/>
                        <p class="help">{!! trans('admin.field.change_pass') !!}</p>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.role') !!}</label>
                        <select class="form-control" name="role">
                            <option value="subscriber">{!! trans('admin.field.subscriber') !!}</option>
                            <option value="contributor"
                                    @if($data->role == 'contributor') selected @endif>{!! trans('admin.field.contributor') !!}</option>
                            <option value="author"
                                    @if($data->role == 'author') selected @endif>{!! trans('admin.field.author') !!}</option>
                            <option value="editor"
                                    @if($data->role == 'editor') selected @endif>{!! trans('admin.field.editor') !!}</option>
                            <option value="administrator"
                                    @if($data->role == 'administrator') selected @endif>{!! trans('admin.field.administrator') !!}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.image') !!}</label>
                        <img src="{!! $data->image !!}" class="img-responsive" onclick="selectImage('image')"
                             id="img_image">
                        <input type="hidden" name="image" value="{!! $data->image !!}" id="input_image"/>
                    </div>
                    <div class="form-group">
                        <label>
                            {!! trans('admin.button.update') !!}
                        </label>
                        @if ($data->id)
                            <p>@lang('admin.field.created_at'): {{ $data->created_at }}</p>
                            <p>@lang('admin.field.updated_at'): {{ $data->updated_at }}</p>
                            <hr>
                        @endif
                        <button type="submit"
                                class="btn btn-block btn-success btn-sm"
                                id="btn_form">{!! trans('admin.button.update') !!}</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('js')
    <script>
        var check = function () {
            if (document.getElementById('password').value ==
                document.getElementById('confirm_password').value) {
                $(".help").addClass('hidden');
                $("#btn_form").removeAttr('disabled');
            } else {
                $(".help").removeClass('hidden');
                $("#btn_form").attr('disabled', 'disabled');
            }
        }
        var checkEmail = function () {
            var email = $("#email").val();
            _checkEmail(email);
        }
    </script>
@endsection