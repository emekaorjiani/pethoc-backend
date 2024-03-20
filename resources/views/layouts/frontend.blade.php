<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{--    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />--}}
    {{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />--}}
    {{--    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />--}}
    {{--    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />--}}
    {{--    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />--}}
    {{--    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />--}}
    {{--    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />--}}
    {{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />--}}
    {{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />--}}
    {{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />--}}
    {{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />--}}
    {{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" rel="stylesheet" />--}}
    <link
        href="https://fonts.googleapis.com/css?family=Lato:400,700%7COswald:300,400,500,700%7CRoboto:400,500%7CExo+2:600&display=swap"
        rel="stylesheet">

    <!-- Perfect Scrollbar -->
    <link type="text/css"
          href="{{ asset('') }}assets/vendor/perfect-scrollbar.css"
          rel="stylesheet">

    <!-- Material Design Icons -->
    <link type="text/css"
          href="{{ asset('') }}assets/css/material-icons.css"
          rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link type="text/css"
          href="{{ asset('') }}assets/css/fontawesome.css"
          rel="stylesheet">

    <!-- Preloader -->
    <link type="text/css"
          href="{{ asset('') }}assets/vendor/spinkit.css"
          rel="stylesheet">
    <link type="text/css"
          href="{{ asset('') }}assets/css/preloader.css"
          rel="stylesheet">

    <!-- App CSS -->
    <link type="text/css"
          href="{{ asset('') }}assets/css/app.css"
          rel="stylesheet">

    <!-- Dark Mode CSS (optional) -->
    <link type="text/css"
          href="{{ asset('') }}assets/css/dark-mode.css"
          rel="stylesheet">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"/>
    @yield('styles')
</head>

<body class="layout-app layout-sticky-subnav ">

<div class="preloader">
    <div class="sk-bounce">
    <div class="sk-bounce-dot"></div>
    <div class="sk-bounce-dot"></div>
</div>
    <!-- More spinner examples at https://github.com/tobiasahlin/SpinKit/blob/master/examples.html -->
</div>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    @guest
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('frontend.home') }}">
                                {{ __('Dashboard') }}
                            </a>
                        </li>
                    @endguest
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if(Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item"
                                   href="{{ route('frontend.profile.index') }}">{{ __('My profile') }}</a>

                                @can('user_management_access')
                                    <a class="dropdown-item disabled" href="#">
                                        {{ trans('cruds.userManagement.title') }}
                                    </a>
                                @endcan
                                @can('user_access')
                                    <a class="dropdown-item ml-3" href="{{ route('frontend.users.index') }}">
                                        {{ trans('cruds.user.title') }}
                                    </a>
                                @endcan
                                @can('permission_access')
                                    <a class="dropdown-item ml-3" href="{{ route('frontend.permissions.index') }}">
                                        {{ trans('cruds.permission.title') }}
                                    </a>
                                @endcan
                                @can('role_access')
                                    <a class="dropdown-item ml-3" href="{{ route('frontend.roles.index') }}">
                                        {{ trans('cruds.role.title') }}
                                    </a>
                                @endcan
                                @can('user_alert_access')
                                    <a class="dropdown-item ml-3" href="{{ route('frontend.user-alerts.index') }}">
                                        {{ trans('cruds.userAlert.title') }}
                                    </a>
                                @endcan
                                @can('transaction_access')
                                    <a class="dropdown-item disabled" href="#">
                                        {{ trans('cruds.transaction.title') }}
                                    </a>
                                @endcan
                                @can('pet_wallet_transaction_access')
                                    <a class="dropdown-item ml-3"
                                       href="{{ route('frontend.pet-wallet-transactions.index') }}">
                                        {{ trans('cruds.petWalletTransaction.title') }}
                                    </a>
                                @endcan
                                @can('pump_transaction_access')
                                    <a class="dropdown-item ml-3"
                                       href="{{ route('frontend.pump-transactions.index') }}">
                                        {{ trans('cruds.pumpTransaction.title') }}
                                    </a>
                                @endcan
                                @can('sales_transactions_history_access')
                                    <a class="dropdown-item ml-3"
                                       href="{{ route('frontend.sales-transactions-histories.index') }}">
                                        {{ trans('cruds.salesTransactionsHistory.title') }}
                                    </a>
                                @endcan
                                @can('order_list_access')
                                    <a class="dropdown-item disabled" href="#">
                                        {{ trans('cruds.orderList.title') }}
                                    </a>
                                @endcan
                                @can('order_access')
                                    <a class="dropdown-item ml-3" href="{{ route('frontend.orders.index') }}">
                                        {{ trans('cruds.order.title') }}
                                    </a>
                                @endcan
                                @can('order_tracking_access')
                                    <a class="dropdown-item ml-3" href="{{ route('frontend.order-trackings.index') }}">
                                        {{ trans('cruds.orderTracking.title') }}
                                    </a>
                                @endcan
                                @can('fuel_purchase_access')
                                    <a class="dropdown-item ml-3" href="{{ route('frontend.fuel-purchases.index') }}">
                                        {{ trans('cruds.fuelPurchase.title') }}
                                    </a>
                                @endcan
                                @can('distributor_order_access')
                                    <a class="dropdown-item ml-3"
                                       href="{{ route('frontend.distributor-orders.index') }}">
                                        {{ trans('cruds.distributorOrder.title') }}
                                    </a>
                                @endcan
                                @can('stations_feature_access')
                                    <a class="dropdown-item disabled" href="#">
                                        {{ trans('cruds.stationsFeature.title') }}
                                    </a>
                                @endcan
                                @can('station_management_access')
                                    <a class="dropdown-item ml-3"
                                       href="{{ route('frontend.station-managements.index') }}">
                                        {{ trans('cruds.stationManagement.title') }}
                                    </a>
                                @endcan
                                @can('station_admin_access')
                                    <a class="dropdown-item ml-3" href="{{ route('frontend.station-admins.index') }}">
                                        {{ trans('cruds.stationAdmin.title') }}
                                    </a>
                                @endcan
                                @can('station_access')
                                    <a class="dropdown-item ml-3" href="{{ route('frontend.stations.index') }}">
                                        {{ trans('cruds.station.title') }}
                                    </a>
                                @endcan
                                @can('distributor_access')
                                    <a class="dropdown-item" href="{{ route('frontend.distributors.index') }}">
                                        {{ trans('cruds.distributor.title') }}
                                    </a>
                                @endcan
                                @can('gas_info_access')
                                    <a class="dropdown-item" href="{{ route('frontend.gas-infos.index') }}">
                                        {{ trans('cruds.gasInfo.title') }}
                                    </a>
                                @endcan
                                @can('feature_setting_access')
                                    <a class="dropdown-item disabled" href="#">
                                        {{ trans('cruds.featureSetting.title') }}
                                    </a>
                                @endcan
                                @can('product_access')
                                    <a class="dropdown-item ml-3" href="{{ route('frontend.products.index') }}">
                                        {{ trans('cruds.product.title') }}
                                    </a>
                                @endcan
                                @can('vehicle_access')
                                    <a class="dropdown-item ml-3" href="{{ route('frontend.vehicles.index') }}">
                                        {{ trans('cruds.vehicle.title') }}
                                    </a>
                                @endcan
                                @can('vehicle_category_access')
                                    <a class="dropdown-item ml-3"
                                       href="{{ route('frontend.vehicle-categories.index') }}">
                                        {{ trans('cruds.vehicleCategory.title') }}
                                    </a>
                                @endcan

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @if(session('message'))
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                    </div>
                </div>
            </div>
        @endif
        @if($errors->count() > 0)
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <ul class="list-unstyled mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @yield('content')
    </main>
</div>
</body>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
{{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>--}}
{{--<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>--}}
{{--<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>--}}
{{--<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>--}}
{{--<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>--}}
{{--<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>--}}
{{--<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>--}}
{{--<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>--}}
{{--<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>--}}
<!-- jQuery -->
<script src="{{ asset('') }}assets/vendor/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="{{ asset('') }}assets/vendor/popper.min.js"></script>
<script src="{{ asset('') }}assets/vendor/bootstrap.min.js"></script>

<!-- Perfect Scrollbar -->
<script src="{{ asset('') }}assets/vendor/perfect-scrollbar.min.js"></script>

<!-- DOM Factory -->
<script src="{{ asset('') }}assets/vendor/dom-factory.js"></script>

<!-- MDK -->
<script src="{{ asset('') }}assets/vendor/material-design-kit.js"></script>

<!-- App JS -->
<script src="{{ asset('') }}assets/js/app.js"></script>

<!-- Highlight.js -->
<script src="{{ asset('') }}assets/js/hljs.js"></script>

<!-- Global Settings -->
<script src="{{ asset('') }}assets/js/settings.js"></script>

<!-- Moment.js -->
<script src="{{ asset('') }}assets/vendor/moment.min.js"></script>
<script src="{{ asset('') }}assets/vendor/moment-range.js"></script>

<!-- Chart.js -->
<script src="{{ asset('') }}assets/vendor/Chart.min.js"></script>
<script src="{{ asset('') }}assets/js/chartjs.js"></script>
<script src="{{ asset('') }}assets/js/chartjs-rounded-bar.js"></script>

<!-- Chart.js Samples -->
<script src="{{ asset('') }}assets/js/page.analytics-2-dashboard.js"></script>

<!-- List.js -->
<script src="{{ asset('') }}assets/vendor/list.min.js"></script>
<script src="{{ asset('') }}assets/js/list.js"></script>

<!-- Tables -->
<script src="{{ asset('') }}assets/js/toggle-check-all.js"></script>
<script src="{{ asset('') }}assets/js/check-selected-row.js"></script>

<!-- App Settings (safe to remove) -->
<script src="{{ asset('') }}assets/js/app-settings.js"></script>


<script src="{{ asset('js/main.js') }}"></script>
@yield('scripts')

</html>
