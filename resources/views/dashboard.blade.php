@extends('layouts.app')
@section('title', getOption('app_name') . ' - Dashboard')
@section('content')
    <div class="row row-eq-height my-3 mt-3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                       <div class="card no-b mb-3">
                            <div class="card-body">
                                
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter">{{ getOption('currency_symbol') . number_format($spentAmount,2, getOption('currency_separator'), '') }}</div>
                                    @lang('general.total_spent')
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="card no-b mb-3">
                            <div class="card-body">
                                
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter">{{ $unreadMessages }}</div>
                                    @lang('general.new_messages')
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="card no-b mb-3">
                            <div class="card-body">
                                
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter">{{ $ordersPending }}</div>
                                    @lang('general.order_pending')
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="card no-b mb-3">
                            <div class="card-body">
                                
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter">{{ $ordersInProgress }}</div>
                                    @lang('general.orders_inprogress')
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--INICIO DIREITA-->
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                       <div class="card no-b mb-3">
                            <div class="card-body">
                                
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter">{{ $ordersCompleted }}</div>
                                    @lang('general.order_completed')
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="card no-b mb-3">
                            <div class="card-body">
                                
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter">{{ $ordersCancelled }}</div>
                                    @lang('general.order_cancelled')
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="card no-b mb-3">
                            <div class="card-body">
                                
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter">{{ $supportTicketOpen }}</div>
                                    @lang('general.open_support_tickets')
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="card no-b mb-3">
                            <div class="card-body">
                                
                                <div class="text-center">
                                    <div class="s-48 my-3 font-weight-lighter">@lang('general.note_from_admin')</div>
                                    {!! getOption('admin_note',true) !!}
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="card no-b">
                    <div class="card-header white">
                        <div class="d-flex justify-content-between">
                            <div class="align-self-center">
                                <strong>Awesome Title</strong>
                            </div>
                            <div class="align-self-end float-right">
                                <ul class="nav nav-tabs card-header-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="w5--tab1" data-toggle="tab" href="#w5-tab1" role="tab" aria-controls="tab1" aria-expanded="true" aria-selected="true">Tab 1</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="w5--tab2" data-toggle="tab" href="#w5-tab2" role="tab" aria-controls="tab2" aria-selected="false">Tab 2</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="w5--tab3" data-toggle="tab" href="#w5-tab3" role="tab" aria-controls="tab3" aria-selected="false">Tab 3</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body no-p">
                        <div class="tab-content">
                            <div class="tab-pane fade text-center p-5 active show" id="w5-tab1" role="tabpanel" aria-labelledby="w5-tab1">								<div class="row">									<div class="card-body align-items-center d-flex justify-content-center">										<div class="login-form">											<form													role="form"													method="POST"													action="{{ url('/order') }}">												{{ csrf_field() }}												<fieldset class="scheduler-border">													<legend class="scheduler-border">@lang('forms.new') @lang('forms.order')</legend>													<div class="form-group{{ $errors->has('service_id') ? ' has-error' : '' }}">														<label for="service_id" class="control-label">@lang('forms.service')</label>														<select name="service_id"																id="service_id"																data-validation="required"																class="form-control">															<option value="">Select a service</option>															@if( ! $services->isEmpty() )																@foreach( $services as $service)																	<option value="{{ $service->id }}"> {{ $service->name  }}</option>																@endforeach															@endif														</select>														@if ($errors->has('service_id'))															<span class="help-block">															<strong>{{ $errors->first('service_id') }}</strong>														</span>														@endif													</div>													<div class="form-group{{ $errors->has('package_id') ? ' has-error' : '' }}">														<label for="package_id" class="control-label">@lang('forms.package')</label>														<select name="package_id"																id="package_id"																data-validation="required"																class="form-control">															<option value="">Select service first</option>
																													</select>														@if ($errors->has('package_id'))															<span class="help-block">															<strong>{{ $errors->first('package_id') }}</strong>														</span>														@endif													</div>													<div class="form-group">														<label for="description" class="control-label">@lang('forms.description')</label>														<textarea name="description"																  id="description"																  rows="5"																  style="height: 50px"																  class="form-control"></textarea>													</div>													<div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">														<label for="link" class="control-label">@lang('forms.link')</label>														<input name="link"															   id="link"															   value="{{ old('link') }}"															   type="text"															   data-validation="required"															   class="form-control"															   placeholder="">														@if ($errors->has('link'))															<span class="help-block">															<strong>{{ $errors->first('link') }}</strong>														</span>														@endif													</div>													<div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">														<label for="quantity" class="control-label">@lang('forms.quantity')</label>														<input name="quantity"															   id="quantity"															   type="text"															   value="{{ old('quantity') }}"															   class="form-control"															   data-validation="number"															   data-validation-allowing="range[1;100]"															   placeholder="">														<span class="help-block">														<span class="label label-default">@lang('forms.minimum_quantity') : <span id="min-q">0</span></span> <span class="label label-default">@lang('forms.maximum_quantity') : <span																		id="max-q">0</span></span>													</span>														@if ($errors->has('quantity'))															<span class="help-block">															<strong>{{ $errors->first('quantity') }}</strong>														</span>														@endif													</div>													<div class="form-group">														<p>@lang('forms.price_total') {{ getOption('currency_symbol') }}<span id="order_total">0</span></p>														<p id="not-enough-funds" style="display:none;color:red">@lang('forms.order_amount_exceed')</p>													</div>													<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}" id="custom-comments-div" style="display: none">														<label for="custom_comments" class="control-label">@lang('forms.custom_comments')</label>														<textarea																class="form-control"																id="custom_comments"																style="height: 150px;"																placeholder="1 on each line"																name="custom_comments">{{old('custom_comments')}}</textarea>														@if ($errors->has('custom_comments'))															<span class="help-block">																	<strong>{{ $errors->first('custom_comments') }}</strong>																</span>														@endif													</div>													<div class="form-group">														<button type="submit" id="btn-proceed" class="btn btn-primary">@lang('buttons.place_order')</button>													</div>												</fieldset>											</form>										</div>									</div>								</div>								<div class="row">									<div class="card-body align-items-center d-flex justify-content-center">										<div class="text-center">											{!!  getPageContent('new-order') !!}										</div>									</div>								</div>                            </div>
                            <div class="tab-pane fade text-center p-5" id="w5-tab2" role="tabpanel" aria-labelledby="w5-tab2">
                                <h4 class="card-title">Tab 2</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                            <div class="tab-pane fade text-center p-5" id="w5-tab3" role="tabpanel" aria-labelledby="w5-tab3">
                                <h4 class="card-title">Tab 3</h4>
                                <p class="card-text">With supporting text below as a natural lead-in to additional
                                    content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
			
   @endsection     
@push('scripts')
    <script>

        var userFunds = '{{ Auth::user()->funds }}';
        $(function () {

            $('#service_id').change(function () {
                var service_id = $(this).val();
                if (service_id !== '') {
                    resetValues();
                    $.ajax({
                        url: baseUrl + '/service/get-packages/' + service_id,
                        type: "GET",
                        success: function (packages) {
                            $('#package_id').html(packages);
                        }
                    });

                }
            });

            // On select display minimum quantity of package
            $('#package_id').change(function () {
                var sel = $('#package_id option:selected');
                if (sel.val() != '') {
                    $('#min-q').html(sel.data('min'));
                    $('#max-q').html(sel.data('max'));
                    $('#description').text(sel.data('description'));
                    $('#quantity').attr('data-validation-allowing', 'range[' + sel.data('min') + ';' + sel.data('max') + ']')
                    $('#link').focus();

                    if (sel.data('comments') == 1) {
                        $('#custom-comments-div').show();
                        $('#quantity')
                            .val(0)
                            .attr('readonly', true);
                    } else {
                        $('#custom-comments-div').hide();
                        $('#quantity').removeAttr('readonly');
                    }
                }
            });

            $('#custom_comments').on('keyup', function () {
                var text = $(this).val();
                var lines = text.split(/\r|\r\n|\n/);
                var q = lines.length;
                $('#quantity').val($.trim(q));

                var sel = $('#package_id option:selected');
                var orderTotal = 0;
                if (q > 0) {
                    var price_per_item = sel.data('peritem');
                    orderTotal = q * price_per_item;
                }
                $('#order_total').text(orderTotal.toFixed(2).replace(".", "{{ getOption('currency_separator') }}"));

                if (orderTotal > userFunds) {
                    $('#not-enough-funds').show();
                } else {
                    $('#not-enough-funds').hide();
                }
            });

            $('#quantity').on('keyup', function () {

                var sel = $('#package_id option:selected');
                var orderTotal = 0;
                var q = $(this).val();
                if (q > 0) {
                    var price_per_item = sel.data('peritem');
                    orderTotal = q * price_per_item;
                }
                $('#order_total').text(orderTotal.toFixed(2).replace(".", "{{ getOption('currency_separator') }}"));

                if (orderTotal > userFunds) {
                    $('#not-enough-funds').show();
                } else {
                    $('#not-enough-funds').hide();
                }

            });

        });

        function resetValues() {
            $('#order_total').text(0);
            $('#description').text('');
            $('#quantity').val(0);
            $('#min-q').html(0);
            $('#max-q').html(0);
        }
    </script>
@endpush


                    