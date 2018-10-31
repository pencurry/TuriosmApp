@extends('admin.layouts.app')
@section('title', getOption('app_name') . ' - coupons')
@section('content')
    <div class="row">
        <div class="col-md-12 mtn10">
            <div class="mb10">
                <a href="{{ url('/admin/coupons/create') }}" class="btn btn-primary btn-sm">@lang('buttons.add_new_coupon')</a>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table mydatatable table-bordered table-hover" style="width: 99.9%">
                            <thead>
                            <tr>
                                <th>@lang('general.coupon_id')</th>
                                <th>@lang('general.numero')</th>
								<th>@lang('general.porusuario')</th>
                                <th>@lang('general.description')</th>
                                <th>@lang('general.status')</th>
                                <th class="text-center">@lang('general.action')</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function () {
            $('.mydatatable').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 25,
                order: [ [0, 'desc'] ],
                ajax: '{!! url('admin/coupons-index/data') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'numero', name: 'numero'},
					{data: 'porusuario', name: 'porusuario'},
                    {data: 'description', name: 'description'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        })
    </script>
@endpush