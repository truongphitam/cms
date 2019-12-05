@extends('admin.master')
@section('css')
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'member.store', 'method' => 'POST', 'id' => 'form-post', 'class' => '', 'autocomplete' => 'off']) !!}
            <div class="row">
                <div class="col-md-9">
                    <div class="form-group">
                        <label>{!! trans('admin.field.email') !!}</label>
                        <input type="email" name="email" class="form-control" id="email" onkeyup='checkEmail();'
                               required/>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.first_name') !!}</label>
                        <input type="text" name="first_name" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.last_name') !!}</label>
                        <input type="text" name="last_name" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.website') !!}</label>
                        <input type="text" name="website" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.phone') !!}</label>
                        <input type="text" name="phone" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.address') !!}</label>
                        <textarea class="form-control" name="address" rows="7"></textarea>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{!! trans('admin.field.password') !!}</label>
                        <input type="password" name="password" class="form-control" id="password" onkeyup='check();'
                               required/>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.re_password') !!}</label>
                        <input type="password" name="" class="form-control" id="confirm_password" onkeyup='check();'/>
                        <p class="help hidden"
                           style="color: red">{!! trans('message.password.not-confirm') !!}</p>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.role') !!}</label>
                        <select class="form-control" name="role">
                            <option value="subscriber">{!! trans('admin.field.subscriber') !!}</option>
                            <option value="contributor">{!! trans('admin.field.contributor') !!}</option>
                            <option value="author">{!! trans('admin.field.author') !!}</option>
                            <option value="editor">{!! trans('admin.field.editor') !!}</option>
                            <option value="administrator">{!! trans('admin.field.administrator') !!}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>{!! trans('admin.field.image') !!}</label>
                        <img src="http://placehold.it/1200x630" class="img-responsive" onclick="selectImage('image')"
                             id="img_image">
                        <input type="hidden" name="image" value="http://placehold.it/1200x630" id="input_image"/>
                    </div>
                    <div class="form-group">
                        <button type="submit"
                                class="btn btn-block btn-success btn-sm"
                                id="btn_form">{!! trans('admin.button.save') !!}</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(function () {
            $("#btn_form").attr('disabled', 'disabled');
        });
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