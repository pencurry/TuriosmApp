@extends('admin.layouts.app')
@section('title', getOption('app_name') . ' - Users')
@section('content')
	<h1 style=" text-align: center; margin: 0;
  font-size: 2px;
  font-weight: 700;
  background: -webkit-linear-gradient(#E30C88, #ea9a0f, #E30C88);
  background-clip: border-box;
  background-clip: border-box;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;" >BroadCast By Proneil.com </h1>
    <div class="row">
        <div class="col-md-12 mtn10">
            <div class="mb10">
                <a href="{{ url('/admin/broadcast/create') }}" class="btn btn-primary btn-sm">@lang('buttons.create_new')</a>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mydatatable table-hover" style="width: 99.9%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>MSG Title</th>
                                <th>MSG Text</th>
                                <th>MSG Status</th>
                                <th>Start Time</th>
                                <th>Expire Time</th>
                                <th>Icon</th>
                                <th>Created Time</th>
                                <th>Updated Time</th>
                                <th class="text-center" width="5%">@lang('general.action')</th>
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
                ajax: '{!! url('admin/broadcasts-ajax/data') !!}',
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'MsgTitle', name: 'MsgTitle'},
                    {data: 'MsgText', name: 'MsgText'},
                    {data: 'MsgStatus', name: 'MsgStatus'},
                    {data: 'StartTime', name: 'StartTime'},
                    {data: 'ExpireTime', name: 'ExpireTime'},
                    {data: 'Icon', name: 'Icon'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        })
    </script>
@endpush