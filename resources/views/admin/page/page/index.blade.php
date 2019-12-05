@extends('admin.master')
@section('css')
    <link rel="stylesheet" href="/assets/plugins/datatables/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-8 text-right">
                    <a href="{!! route('page.create') !!}" class="btn btn-info">
                        <i class="fa fa-fw fa-plus"></i>
                    </a>
                </div>
                <div class="col-md-12" style="margin-top: 20px">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                        <tr>
                            <th class="no-sort" style="width: 50px">Image</th>
                            <th>@lang('admin.field.title')</th>
                            <th class="no-sort">@lang('admin.field.slug')</th>
                            <th>@lang('admin.field.publish')</th>
                            <th>@lang('admin.field.date')</th>
                            <th class="no-sort text-center"></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('table').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: '{{ action('Admin\PageController@index') }}',
                    data: function (d) {
                        d.category = $('.category-filter').val();
                    }
                },
                "columnDefs": [
                    {orderable: false, targets: 'no-sort'},
                    {className: 'select-checkbox', targets: 0}
                ],
                "initComplete": function () {
                    var $searchInput = $('.dataTables_filter > label > input');
                    $searchInput.unbind();
                    $searchInput.bind('keyup', function (e) {
                        if (e.keyCode === 13 || this.value === '') {
                            table.search(this.value).draw();
                        }
                    });
                }
            });
            $('.category-filter').change(function () {
                table.ajax.reload();
            });
        });
    </script>
@endsection