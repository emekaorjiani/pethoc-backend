<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('job_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.jobs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/jobs") || request()->is("admin/jobs/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-globe c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.job.title') }}
                </a>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/user-alerts*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_alert_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userAlert.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('transaction_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/wallet-transactions*") ? "c-show" : "" }} {{ request()->is("admin/pet-wallet-transactions*") ? "c-show" : "" }} {{ request()->is("admin/pump-transactions*") ? "c-show" : "" }} {{ request()->is("admin/sales-transactions-histories*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-exchange-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.transaction.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('wallet_transaction_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.wallet-transactions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/wallet-transactions") || request()->is("admin/wallet-transactions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-wallet c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.walletTransaction.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('pet_wallet_transaction_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pet-wallet-transactions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pet-wallet-transactions") || request()->is("admin/pet-wallet-transactions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-wallet c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.petWalletTransaction.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('pump_transaction_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pump-transactions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pump-transactions") || request()->is("admin/pump-transactions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-gas-pump c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.pumpTransaction.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('sales_transactions_history_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sales-transactions-histories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sales-transactions-histories") || request()->is("admin/sales-transactions-histories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.salesTransactionsHistory.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('payment_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.payments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/payments") || request()->is("admin/payments/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-credit-card c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.payment.title') }}
                </a>
            </li>
        @endcan
        @can('order_list_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/orders*") ? "c-show" : "" }} {{ request()->is("admin/order-trackings*") ? "c-show" : "" }} {{ request()->is("admin/fuel-purchases*") ? "c-show" : "" }} {{ request()->is("admin/distributor-orders*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.orderList.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('order_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.orders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/orders") || request()->is("admin/orders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cart-arrow-down c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.order.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('order_tracking_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.order-trackings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/order-trackings") || request()->is("admin/order-trackings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-fast-forward c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.orderTracking.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('fuel_purchase_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.fuel-purchases.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/fuel-purchases") || request()->is("admin/fuel-purchases/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-gas-pump c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.fuelPurchase.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('distributor_order_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.distributor-orders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/distributor-orders") || request()->is("admin/distributor-orders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-shopping-cart c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.distributorOrder.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('stations_feature_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/station-managements*") ? "c-show" : "" }} {{ request()->is("admin/station-admins*") ? "c-show" : "" }} {{ request()->is("admin/stations*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-archway c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.stationsFeature.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('station_management_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.station-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/station-managements") || request()->is("admin/station-managements/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-archway c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.stationManagement.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('station_admin_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.station-admins.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/station-admins") || request()->is("admin/station-admins/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.stationAdmin.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('station_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.stations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/stations") || request()->is("admin/stations/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-archway c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.station.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('distributor_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.distributors.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/distributors") || request()->is("admin/distributors/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-shuttle-van c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.distributor.title') }}
                </a>
            </li>
        @endcan
        @can('gas_info_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.gas-infos.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/gas-infos") || request()->is("admin/gas-infos/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-gas-pump c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.gasInfo.title') }}
                </a>
            </li>
        @endcan
        @can('feature_setting_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/products*") ? "c-show" : "" }} {{ request()->is("admin/vehicles*") ? "c-show" : "" }} {{ request()->is("admin/vehicle-categories*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.featureSetting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('product_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.products.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-gas-pump c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.product.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('vehicle_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.vehicles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/vehicles") || request()->is("admin/vehicles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-car c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.vehicle.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('vehicle_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.vehicle-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/vehicle-categories") || request()->is("admin/vehicle-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-clipboard-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.vehicleCategory.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>