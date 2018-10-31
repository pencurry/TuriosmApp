@extends('admin.layouts.app')
@section('title', getOption('app_name') . ' - Coupon ' . $coupon->name)
@section('content')
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> @lang('menus.dashboard')</a></li>
                <li><a href="{{ url('/admin/coupons') }}"><i class="fa fa-dashboard"></i> @lang('menus.coupons')</a></li>
                <li class="active">@lang('menus.edit')</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-form">
                <form
                        role="form"
                        method="POST"
                        action="{{ url('/admin/coupons/'.$coupon->id) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">@lang('forms.edit_coupon')</legend>
                        <div class="form-group{{ $errors->has('numero') ? ' has-error' : '' }}">
                            <label for="numero" class="control-label">@lang('forms.numero')</label>
                            <input type="text"
                                   class="form-control"
                                   value="{{ $coupon->numero }}"
                                   data-validation="required"
                                   id="numero"
                                   name="numero">
                            @if ($errors->has('numero'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('numero') }}</strong>
                                    </span>
                            @endif
                        </div>
						<div class="form-group{{ $errors->has('porusuario') ? ' has-error' : '' }}">
                            <label for="porusuario" class="control-label">@lang('forms.porusuario')</label>
                            <input type="text"
                                   class="form-control"
                                   value="{{ $coupon->porusuario }}"
                                   data-validation="required"
                                   id="porusuario"
                                   name="porusuario">
                            @if ($errors->has('porusuario'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('porusuario') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="control-label">@lang('forms.description')</label>
                            <textarea
                                    class="form-control"
                                    data-validation="required"
                                    id="description"
                                    style="height: 150px;"
                                    name="description">{{ $coupon->description }}</textarea>
                            @if ($errors->has('description'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                            @endif
                        </div>
                       
                        <div class="form-group">
                            <label for="status" class="control-label">@lang('forms.status')</label>
                            <select
                                    class="form-control"
                                    data-validation="required"
                                    id="status"
                                    name="status">
                                <option
                                        value="ACTIVE"
                                        {{ $coupon->status === 'ACTIVE' ? 'selected' : '' }}
                                >ACTIVE
                                </option>
                                <option
                                        value="INACTIVE"
                                        {{ $coupon->status === 'INACTIVE' ? 'selected' : '' }}
                                >INACTIVE
                                </option>
                            </select>
                            @if ($errors->has('numero'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('numero') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">@lang('buttons.update')</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection