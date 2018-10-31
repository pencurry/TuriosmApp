@php
    // alignment direction according to language
    $dir = "ltr";
    $rtlLang = ['ar'];
    if(in_array(getOption('language'),$rtlLang)):
        $dir="rtl";
    endif;

@endphp
<!DOCTYPE html>
<html lang="{{ getOption('language') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {!! getOption('home_page_meta') !!}
    <title>@yield('title')</title>
    <!-- CSS -->
    <link rel="stylesheet" href="/novo/assets/css/app.css">
    

<!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
        window.baseUrl = "<?php echo url('/') ?>";
        var spinner = "<span class='loader'></span>";
    </script>
    <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="/novo/js/vendor/jquery.min.js?v={{ config('constants.VERSION') }}"></script>
    <script src="/novo/js/vendor/form-validator/jquery.form-validator.min.js?v={{ config('constants.VERSION') }}"></script>
    <script type="text/javascript">
        $(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.validate({
                modules: 'date',
                validateOnBlur: false,
                lang: '{{ getOption('language') }}'
            });

            $(document).on('click','.dropdown-lang a',function (e) {
                e.preventDefault();
                var locale = $(this).data('locale');
                $('#locale').val(locale);
                document.getElementById('lang-form').submit();
            });
        });
    </script>
    <script src="/novo/js/my-script.js?v={{ config('constants.VERSION') }}"></script>
</head>
<body dir="{{ $dir }}" class="light sidebar-mini sidebar-collapse">
    <div id="app">
<!-- Pre loader -->
<div id="loader" class="loader">
    <div class="plane-container">
        <div class="preloader-wrapper small active">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>

            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div><div class="gap-patch">
                <div class="circle"></div>
            </div><div class="circle-clipper right">
                <div class="circle"></div>
            </div>
            </div>
        </div>
    </div>
</div>
<div id="app">
   
<aside class="main-sidebar fixed offcanvas b-r sidebar-tabs" data-toggle='offcanvas'>
    <div class="sidebar">
        <div class="d-flex hv-100 align-items-stretch">
            <div class="indigo text-white">
                <div class="nav mt-5 pt-5 flex-column nav-pills" id="v-pills-tab" role="tablist"
                     aria-orientation="vertical">
                    <a class="nav-link" id="v-pills-home-tab" href="{{ url('/dashboard') }}" role="tab"
                       aria-controls="v-pills-home" aria-selected="true"><i class="icon-dashboard2"></i></a>
                    <a class="nav-link blink " id="v-pills-profile-tab" href="{{ url('/order/new') }}" role="tab"
                       aria-controls="v-pills-profile" aria-selected="false"><i class="icon-add"></i></a>
                       <a class="nav-link" id="v-pills-home-tab" href="{{ url('/orders') }}" role="tab"
                       aria-controls="v-pills-home" aria-selected="true"><i class="icon-history"></i></a>
                    <a class="nav-link blink "  href="{{ url('/services') }}"><i class="icon-playlist_add_check"></i></a>
                    <a class="nav-link" id="v-pills-messages-tab" href="{{ url('/support') }}"><i class="icon-support"></i></a>
                    <a href="{{ url('/account/settings') }}">
                        <figure class="avatar">
                            <img src="/novo/assets/img/dummy/u3.png" alt="">
                            <span class="avatar-badge online"></span>
                        </figure>
                    </a>
                </div>
            </div>
            
            <div class="tab-content flex-grow-1" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                     aria-labelledby="v-pills-home-tab">
                    <div class="relative brand-wrapper sticky b-b">
                        <div class="d-flex justify-content-between align-items-center p-3">
                            <div class="text-xs-center">
                                <span class="font-weight-lighter s-18">Menu</span>
                            </div>
                            
                        </div>
                    </div>
                   
                    <ul class="sidebar-menu">
                        <li class="treeview">
                            <a href="{{ url('/dashboard') }}">
                            <i class="icon icon-dashboard2 s-24"></i><span>@lang('menus.dashboard')</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="{{ url('/order/new') }}">
                            <i class="icon icon-add s-24"></i><span> @lang('menus.new_order')</span>
                            </a>
                        </li>
                        
                        <li class="treeview">
                            <a href="{{ url('/orders') }}">
                            <i class="icon icon-history s-24"></i><span> @lang('menus.order_history')</span>
                            </a>
                        </li>
                        @if(getOption('module_subscription_enabled') == 1)
                        <li class="treeview">
                            <a href="{{ url('/subscriptions') }}">
                            <i class="icon icon-subtitles s-24"></i><span>@lang('menus.subscriptions')</span>
                            </a>
                        </li>
                        @endif
                        <li class="treeview">
                            <a href="{{ url('/payment/add-funds') }}">
                            <i class="icon icon-attach_money s-24"></i><span>@lang('menus.add_funds')</span>
                            </a>
                        </li>
                        @if(getOption('module_support_enabled') == 1)
                        <li class="treeview">
                            <a href="{{ url('/support') }}">
                            <i class="icon icon-support s-24"></i><span>@lang('menus.support')</span>
                            </a>
                        </li>
                        @endif
                         @if(getOption('module_api_enabled') == 1)
                        <li class="treeview">
                            <a href="{{ url('/api') }}">
                            <i class="icon icon-cloud s-24"></i><span>@lang('menus.api')</span>
                            </a>
                        </li>
                         @endif
                        <li class="treeview">
                            <a href="{{ url('/services') }}">
                            <i class="icon icon-playlist_add_check s-24"></i><span>@lang('menus.service_list')</span>
                            </a>
                        </li>
                        
                        
                    </ul>
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <div class="relative brand-wrapper sticky b-b p-3">
                        <form>
                            <div class="form-group input-group-sm has-right-icon">
                                <input class="form-control form-control-sm light r-30" placeholder="Search" type="text">
                                <i class="icon-search"></i>
                            </div>
                        </form>
                    </div>
                    <div class="sticky slimScroll">

                        <div class="p-2">
                            <ul class="list-unstyled">
                                <!-- Alphabet with number of contacts -->
                                <li class="pt-3 pb-3 sticky p-3 b-b white">
                                    <span class="badge r-3 badge-success">A</span>
                                </li>
                                <!-- Single contact -->
                                <li class="my-1">
                                    <div class="card no-b p-3">
                                        <div class="">

                                            <div class="image mr-3  float-left">
                                                <img class="w-40px" src="/novo/assets/img/dummy/u1.png" alt="User Image">
                                            </div>
                                            <div>
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="my-1">
                                    <div class="card no-b p-3">
                                        <div class="">

                                            <div class="image mr-3  float-left">
                                                <img class="w-40px" src="/novo/assets/img/dummy/u6.png" alt="User Image">
                                            </div>
                                            <div>
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="my-1">
                                    <div class="card no-b p-3">
                                        <div class="">

                                            <div class="image mr-3  float-left">
                                                <img class="w-40px" src="/novo/assets/img/dummy/u6.png" alt="User Image">
                                            </div>
                                            <div>
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-unstyled">
                                <li class="pt-3 pb-3 sticky p-3 b-b white">
                                    <span class="badge r-3 badge-danger">B</span>
                                </li>
                                <li class="my-1">
                                    <div class="card no-b p-3">
                                        <div class="">

                                            <div class="image mr-3  float-left">
                                                <img class="w-40px" src="/novo/assets/img/dummy/u2.png" alt="User Image">
                                            </div>
                                            <div>
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="my-1">
                                    <div class="card no-b p-3">
                                        <div class="">

                                            <div class="image mr-3  float-left">
                                                <img class="w-40px" src="/novo/assets/img/dummy/u3.png" alt="User Image">
                                            </div>
                                            <div>
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="my-1">
                                    <div class="card no-b p-3">
                                        <div class="">

                                            <div class="image mr-3  float-left">
                                                <img class="w-40px" src="/novo/assets/img/dummy/u4.png" alt="User Image">
                                            </div>
                                            <div>
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="list-unstyled">
                                <!-- Alphabet with number of contacts -->
                                <li class="pt-3 pb-3 sticky p-3 b-b white">
                                    <span class="badge r-3 badge-success gradient">C</span>
                                </li>
                                <!-- Single contact -->
                                <li class="my-1">
                                    <div class="card no-b p-3">
                                        <div class="">

                                            <div class="image mr-3  float-left">
                                                <img class="w-40px" src="/novo/assets/img/dummy/u1.png" alt="User Image">
                                            </div>
                                            <div>
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="my-1">
                                    <div class="card no-b p-3">
                                        <div class="">

                                            <div class="image mr-3  float-left">
                                                <img class="w-40px" src="/novo/assets/img/dummy/u6.png" alt="User Image">
                                            </div>
                                            <div>
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="my-1">
                                    <div class="card no-b p-3">
                                        <div class="">

                                            <div class="image mr-3  float-left">
                                                <img class="w-40px" src="/novo/assets/img/dummy/u6.png" alt="User Image">
                                            </div>
                                            <div>
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="my-4">
                                    <span class="badge r-3 badge-danger purple">D</span>
                                </li>
                                <li class="my-1">
                                    <div class="card no-b p-3">
                                        <div class="">

                                            <div class="image mr-3  float-left">
                                                <img class="w-40px" src="/novo/assets/img/dummy/u2.png" alt="User Image">
                                            </div>
                                            <div>
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="my-1">
                                    <div class="card no-b p-3">
                                        <div class="">

                                            <div class="image mr-3  float-left">
                                                <img class="w-40px" src="/novo/assets/img/dummy/u3.png" alt="User Image">
                                            </div>
                                            <div>
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="my-1">
                                    <div class="card no-b p-3">
                                        <div class="">

                                            <div class="image mr-3  float-left">
                                                <img class="w-40px" src="/novo/assets/img/dummy/u4.png" alt="User Image">
                                            </div>
                                            <div>
                                                <div>
                                                    <strong>Alexander Pierce</strong>
                                                </div>
                                                <small> alexander@paper.com</small>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>

<div class="has-sidebar-left">
    <div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark pt-2 pb-2 pl-4 pr-2">
            <div class="search-bar">
                <input class="transparent s-24 text-white b-0 font-weight-lighter w-128 height-50" type="text"
                       placeholder="start typing...">
            </div>
            <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false"
               aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
        </div>
    </div>
</div>
</div>
<a href="#" data-toggle="push-menu" class="paper-nav-toggle left ml-2 fixed">
    <i></i>
</a>
<div class="has-sidebar-left has-sidebar-tabs">
    <!--navbar-->
    <div class="sticky">
        <div class="navbar navbar-expand d-flex justify-content-between bd-navbar white shadow">
            <div class="relative">
                <div class="d-flex">
                    <div class="d-none d-md-block">
                        <h1 class="nav-title">Dashboard</h1>
                    </div>
                </div>
            </div>
            <!--Top Menu Start -->
<div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
        
        
        <!-- Notifications
        <li class="dropdown custom-dropdown notifications-menu">
           <div class=" nav-link" data-toggle="dropdown" aria-expanded="false">
                <i class="icon-language2"></i>
                
           </div>
            <ul class="dropdown-menu dropdown-lang role="menu">
                
                <li>
                    
                    <!-- inner menu: contains the actual data 
                    <ul class="menu">
                        <li>
                            
                        <form id="lang-form" action="{{ url('/change-lang') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="en" name="locale" id="locale">
                                    </form>
                            <a href="#"data-locale="en">
                                <i class="icon icon-arrow_forward text-success"></i> English
                            </a>
                        </li>
                        <li>
                            <a href="#"data-locale="pt">
                                <i class="icon icon-arrow_forward text-success"></i>Português
                            </a>
                        </li>
                        
                    </ul>
                </li>
                
            </ul>
        </li> -->
        
        
        <!-- User Account-->
        <li class="dropdown custom-dropdown user user-menu ">
            <a href="#" class="nav-link" data-toggle="dropdown">
                <img src="/novo/assets/img/dummy/u8.png" class="user-image" alt="User Image">
                <i class="icon-more_vert "></i>
            </a>
            <div class="dropdown-menu p-4 dropdown-menu-right">
                
                
                <hr>
                <div class="row box justify-content-between my-4">
                    <div class="col">
                        <a href="{{ url('/account/funds-load-history') }}">
                            <i class="icon-attach_money purple lighten-2 avatar  r-5"></i>
                            <div class="pt-1">@lang('menus.funds_load_history')</div>
                        </a>
                    </div>
                    <div class="col"><a href="{{ url('/account/settings') }}">
                        <i class="icon-settings2 pink lighten-1 avatar  r-5"></i>
                        <div class="pt-1">@lang('menus.settings')</div>
                    </a></div>
                    <div class="col">
                        <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="icon-power-off indigo lighten-2 avatar  r-5"></i>
                            <div class="pt-1">@lang('menus.logout')</div>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                        </a>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
        </div>
    </div>
    <!--#navbar-->
    <div class="container-fluid relative animatedParent animateOnce my-3">
        <!--INICO CONTEUDO-->
        @yield('content')
        <!--FIM CONTEUDO-->
        
    </div>
</div>
<!-- Right Sidebar -->
<aside class="control-sidebar fixed white ">
    <div class="slimScroll">
        <div class="sidebar-header">
            <h4>Activity List</h4>
            <a href="#" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i></i></a>
        </div>
        <div class="p-3">
            <div>
                <div class="my-3">
                    <small>25% Complete</small>
                    <div class="progress" style="height: 3px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%;" aria-valuenow="25"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="my-3">
                    <small>45% Complete</small>
                    <div class="progress" style="height: 3px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: 45%;" aria-valuenow="45"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="my-3">
                    <small>60% Complete</small>
                    `
                    <div class="progress" style="height: 3px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 60%;" aria-valuenow="60"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="my-3">
                    <small>75% Complete</small>
                    <div class="progress" style="height: 3px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 75%;" aria-valuenow="75"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div class="my-3">
                    <small>100% Complete</small>
                    <div class="progress" style="height: 3px;">
                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-3 bg-primary text-white">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="font-weight-normal s-14">Sodium</h5>
                    <span class="font-weight-lighter text-primary">Spark Bar</span>
                    <div> Oxygen
                        <span class="text-primary">
                                                    <i class="icon icon-arrow_downward"></i> 67%</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <canvas width="100" height="70" data-chart="spark" data-chart-type="bar"
                            data-dataset="[[28,68,41,43,96,45,100,28,68,41,43,96,45,100,28,68,41,43,96,45,100,28,68,41,43,96,45,100]]"
                            data-labels="['a','b','c','d','e','f','g','h','i','j','k','l','m','n','a','b','c','d','e','f','g','h','i','j','k','l','m','n']">
                    </canvas>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                <tbody>
                <tr>
                    <td>
                        <a href="#">INV-281281</a>
                    </td>
                    <td>
                        <span class="badge badge-success">Paid</span>
                    </td>
                    <td>$ 1228.28</td>
                </tr>
                <tr>
                    <td>
                        <a href="#">INV-01112</a>
                    </td>
                    <td>
                        <span class="badge badge-warning">Overdue</span>
                    </td>
                    <td>$ 5685.28</td>
                </tr>
                <tr>
                    <td>
                        <a href="#">INV-281012</a>
                    </td>
                    <td>
                        <span class="badge badge-success">Paid</span>
                    </td>
                    <td>$ 152.28</td>
                </tr>
                <tr>
                    <td>
                        <a href="#">INV-01112</a>
                    </td>
                    <td>
                        <span class="badge badge-warning">Overdue</span>
                    </td>
                    <td>$ 5685.28</td>
                </tr>
                <tr>
                    <td>
                        <a href="#">INV-281012</a>
                    </td>
                    <td>
                        <span class="badge badge-success">Paid</span>
                    </td>
                    <td>$ 152.28</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="sidebar-header">
            <h4>Activity</h4>
            <a href="#" data-toggle="control-sidebar" class="paper-nav-toggle  active"><i></i></a>
        </div>
        <div class="p-4">
            <div class="activity-item activity-primary">
                <div class="activity-content">
                    <small class="text-muted">
                        <i class="icon icon-user position-left"></i> 5 mins ago
                    </small>
                    <p>Lorem ipsum dolor sit amet conse ctetur which ascing elit users.</p>
                </div>
            </div>
            <div class="activity-item activity-danger">
                <div class="activity-content">
                    <small class="text-muted">
                        <i class="icon icon-user position-left"></i> 8 mins ago
                    </small>
                    <p>Lorem ipsum dolor sit ametcon the sectetur that ascing elit users.</p>
                </div>
            </div>
            <div class="activity-item activity-success">
                <div class="activity-content">
                    <small class="text-muted">
                        <i class="icon icon-user position-left"></i> 10 mins ago
                    </small>
                    <p>Lorem ipsum dolor sit amet cons the ecte tur and adip ascing elit users.</p>
                </div>
            </div>
            <div class="activity-item activity-warning">
                <div class="activity-content">
                    <small class="text-muted">
                        <i class="icon icon-user position-left"></i> 12 mins ago
                    </small>
                    <p>Lorem ipsum dolor sit amet consec tetur adip ascing elit users.</p>
                </div>
            </div>
        </div>
    </div>
</aside>
<!-- /.right-sidebar -->
<!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
<div class="control-sidebar-bg shadow white fixed"></div>
</div>
</div>
<!--/#app -->
<script src="/novo/assets/js/app.js"></script>
<!--script-->
<script src="/novo/js/application.js?v={{ config('constants.VERSION') }}"></script>
<script>
    $(function () {

        if (!$(".alert").hasClass('no-auto-close')) {
            $(".alert").delay(3000).slideUp(300);
        }

    });
</script>
@stack('scripts')
</body>

</body>
</html>