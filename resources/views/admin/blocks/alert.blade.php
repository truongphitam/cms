@if(Session::has('danger'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {!! Session::get('danger') !!}
    </div>
@endif
@if(Session::has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {!! Session::get('success') !!}
    </div>
@endif
@if (count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {!! $error !!}
        </div>
    @endforeach
@endif