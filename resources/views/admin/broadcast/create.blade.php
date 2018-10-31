@extends('admin.layouts.app')
@section('title', getOption('app_name') . ' - New BroadCast')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i> @lang('menus.dashboard')</a></li>
                <li><a href="{{ url('/admin/broadcast') }}"><i class="fa fa-dashboard"></i> Broadcasts</a></li>
                <li class="active">New</li>
            </ol>
        </div>
    </div>
	<h1 style=" text-align: center; margin: 0;
  font-size: 2px;
  font-weight: 700;
  background: -webkit-linear-gradient(#E30C88, #ea9a0f, #E30C88);
  background-clip: border-box;
  background-clip: border-box;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;" >BroadCast By Proneil.com </h1>

    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-form">
                <form
                        role="form"
                        method="POST"
                        action="{{ url('/admin/broadcast') }}">
                    {{ csrf_field() }}
                    <fieldset class="scheduler-border">
                        <legend class="scheduler-border">Broadcast Details</legend>
                        <div class="form-group">
                            <label for="mtitle" class="control-label">Title</label>
                            <input type="text"
                                   class="form-control"
                                   id="mtitle"
                                   value=""
                                   name="mtitle"
                                   data-validation="required">
                        </div>
                        <div class="form-group{{ $errors->has('mtext') ? ' has-error' : '' }}">
                            <label for="mtext" class="control-label">Message</label>
                            <textarea rows="5"
                                   class="form-control"
                                   id="mtext"
                                   value=""
                                   name="mtext"
                                   style="height: 100px;"
                                 data-validation="required"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="micon" class="control-label">Icon</label>
                            <select
                                    class="form-control"
                                    data-validation="required"
                                    id="micon"
                                    name="micon">
                                <option
                                        value="info"
                                        selected
                                >Information
                                </option>
                                <option
                                        value="success"
                                >Success
                                </option>
                                <option
                                        value="warning"
                                >Warning
                                </option>
                                <option
                                        value="error"
                                >Error
                                </option>
                                <option
                                        value="question"
                                >Question
                                </option>
                            </select>
                            @if ($errors->has('micon'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('micon') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="mstatus" class="control-label">Status</label>
                            <select
                                    class="form-control"
                                    data-validation="required"
                                    id="mstatus"
                                    name="mstatus">
                                <option
                                        value="1"
                                        selected
                                >ACTIVE
                                </option>
                                <option
                                        value="0"
                                >INACTIVE
                                </option>
                            </select>
                            @if ($errors->has('mstatus'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('mstatus') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="mstime" class="control-label">Start Time</label>
                            <input type="text"
                                   class="form-control"
                                   id="mstime"
                                   value="{{ date_format(date_create("now", new DateTimeZone('Asia/Kolkata')), 'Y-m-d H:i:s')  }}"
                                   name="mstime"
                                   data-validation="required">
                        </div>
                        <div class="form-group">
                            <label for="metime" class="control-label">Expire Time</label>
                            <input type="text"
                                   class="form-control"
                                   id="metime"
                                   value="{{ date_format(date_create("now", new DateTimeZone('Asia/Kolkata'))->modify('+2 day'), 'Y-m-d H:i:s')  }}"
                                   name="metime"
                                   data-validation="required">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">@lang('buttons.create')</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div> 
    
    @endsection