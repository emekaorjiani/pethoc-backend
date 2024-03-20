<?php


use App\Http\Controllers\PaystackDepositController;

Route::view('/', 'welcome');
Auth::routes();
Route::get('/paystack/callback', [PaystackDepositController::class, 'handleCallback'])->name('paystack.callback');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::post('users/parse-csv-import', 'UsersController@parseCsvImport')->name('users.parseCsvImport');
    Route::post('users/process-csv-import', 'UsersController@processCsvImport')->name('users.processCsvImport');
    Route::resource('users', 'UsersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::get('user-alerts/read', 'UserAlertsController@read');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Vehicle
    Route::delete('vehicles/destroy', 'VehicleController@massDestroy')->name('vehicles.massDestroy');
    Route::post('vehicles/parse-csv-import', 'VehicleController@parseCsvImport')->name('vehicles.parseCsvImport');
    Route::post('vehicles/process-csv-import', 'VehicleController@processCsvImport')->name('vehicles.processCsvImport');
    Route::resource('vehicles', 'VehicleController');

    // Payments
    Route::delete('payments/destroy', 'PaymentsController@massDestroy')->name('payments.massDestroy');
    Route::resource('payments', 'PaymentsController');

    // Jobs
    Route::delete('jobs/destroy', 'JobsController@massDestroy')->name('jobs.massDestroy');
    Route::resource('jobs', 'JobsController');

    // Vehicle Category
    Route::delete('vehicle-categories/destroy', 'VehicleCategoryController@massDestroy')->name('vehicle-categories.massDestroy');
    Route::post('vehicle-categories/parse-csv-import', 'VehicleCategoryController@parseCsvImport')->name('vehicle-categories.parseCsvImport');
    Route::post('vehicle-categories/process-csv-import', 'VehicleCategoryController@processCsvImport')->name('vehicle-categories.processCsvImport');
    Route::resource('vehicle-categories', 'VehicleCategoryController');

    // Wallet Transactions
    Route::delete('wallet-transactions/destroy', 'WalletTransactionsController@massDestroy')->name('wallet-transactions.massDestroy');
    Route::post('wallet-transactions/parse-csv-import', 'WalletTransactionsController@parseCsvImport')->name('wallet-transactions.parseCsvImport');
    Route::post('wallet-transactions/process-csv-import', 'WalletTransactionsController@processCsvImport')->name('wallet-transactions.processCsvImport');
    Route::resource('wallet-transactions', 'WalletTransactionsController');

    // Order
    Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    Route::post('orders/parse-csv-import', 'OrderController@parseCsvImport')->name('orders.parseCsvImport');
    Route::post('orders/process-csv-import', 'OrderController@processCsvImport')->name('orders.processCsvImport');
    Route::resource('orders', 'OrderController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::post('products/parse-csv-import', 'ProductController@parseCsvImport')->name('products.parseCsvImport');
    Route::post('products/process-csv-import', 'ProductController@processCsvImport')->name('products.processCsvImport');
    Route::resource('products', 'ProductController');

    // Order Tracking
    Route::delete('order-trackings/destroy', 'OrderTrackingController@massDestroy')->name('order-trackings.massDestroy');
    Route::post('order-trackings/parse-csv-import', 'OrderTrackingController@parseCsvImport')->name('order-trackings.parseCsvImport');
    Route::post('order-trackings/process-csv-import', 'OrderTrackingController@processCsvImport')->name('order-trackings.processCsvImport');
    Route::resource('order-trackings', 'OrderTrackingController');

    // Fuel Purchase
    Route::delete('fuel-purchases/destroy', 'FuelPurchaseController@massDestroy')->name('fuel-purchases.massDestroy');
    Route::post('fuel-purchases/parse-csv-import', 'FuelPurchaseController@parseCsvImport')->name('fuel-purchases.parseCsvImport');
    Route::post('fuel-purchases/process-csv-import', 'FuelPurchaseController@processCsvImport')->name('fuel-purchases.processCsvImport');
    Route::resource('fuel-purchases', 'FuelPurchaseController');

    // Station Management
    Route::delete('station-managements/destroy', 'StationManagementController@massDestroy')->name('station-managements.massDestroy');
    Route::post('station-managements/parse-csv-import', 'StationManagementController@parseCsvImport')->name('station-managements.parseCsvImport');
    Route::post('station-managements/process-csv-import', 'StationManagementController@processCsvImport')->name('station-managements.processCsvImport');
    Route::resource('station-managements', 'StationManagementController');

    // Distributor
    Route::delete('distributors/destroy', 'DistributorController@massDestroy')->name('distributors.massDestroy');
    Route::post('distributors/parse-csv-import', 'DistributorController@parseCsvImport')->name('distributors.parseCsvImport');
    Route::post('distributors/process-csv-import', 'DistributorController@processCsvImport')->name('distributors.processCsvImport');
    Route::resource('distributors', 'DistributorController');

    // Pet Wallet Transaction
    Route::delete('pet-wallet-transactions/destroy', 'PetWalletTransactionController@massDestroy')->name('pet-wallet-transactions.massDestroy');
    Route::post('pet-wallet-transactions/parse-csv-import', 'PetWalletTransactionController@parseCsvImport')->name('pet-wallet-transactions.parseCsvImport');
    Route::post('pet-wallet-transactions/process-csv-import', 'PetWalletTransactionController@processCsvImport')->name('pet-wallet-transactions.processCsvImport');
    Route::resource('pet-wallet-transactions', 'PetWalletTransactionController');

    // Gas Info
    Route::delete('gas-infos/destroy', 'GasInfoController@massDestroy')->name('gas-infos.massDestroy');
    Route::post('gas-infos/parse-csv-import', 'GasInfoController@parseCsvImport')->name('gas-infos.parseCsvImport');
    Route::post('gas-infos/process-csv-import', 'GasInfoController@processCsvImport')->name('gas-infos.processCsvImport');
    Route::resource('gas-infos', 'GasInfoController');

    // Distributor Order
    Route::delete('distributor-orders/destroy', 'DistributorOrderController@massDestroy')->name('distributor-orders.massDestroy');
    Route::post('distributor-orders/parse-csv-import', 'DistributorOrderController@parseCsvImport')->name('distributor-orders.parseCsvImport');
    Route::post('distributor-orders/process-csv-import', 'DistributorOrderController@processCsvImport')->name('distributor-orders.processCsvImport');
    Route::resource('distributor-orders', 'DistributorOrderController');

    // Station Admin
    Route::delete('station-admins/destroy', 'StationAdminController@massDestroy')->name('station-admins.massDestroy');
    Route::post('station-admins/parse-csv-import', 'StationAdminController@parseCsvImport')->name('station-admins.parseCsvImport');
    Route::post('station-admins/process-csv-import', 'StationAdminController@processCsvImport')->name('station-admins.processCsvImport');
    Route::resource('station-admins', 'StationAdminController');

    // Station
    Route::delete('stations/destroy', 'StationController@massDestroy')->name('stations.massDestroy');
    Route::post('stations/parse-csv-import', 'StationController@parseCsvImport')->name('stations.parseCsvImport');
    Route::post('stations/process-csv-import', 'StationController@processCsvImport')->name('stations.processCsvImport');
    Route::resource('stations', 'StationController');

    // Pump Transaction
    Route::delete('pump-transactions/destroy', 'PumpTransactionController@massDestroy')->name('pump-transactions.massDestroy');
    Route::post('pump-transactions/parse-csv-import', 'PumpTransactionController@parseCsvImport')->name('pump-transactions.parseCsvImport');
    Route::post('pump-transactions/process-csv-import', 'PumpTransactionController@processCsvImport')->name('pump-transactions.processCsvImport');
    Route::resource('pump-transactions', 'PumpTransactionController');

    // Sales Transactions History
    Route::delete('sales-transactions-histories/destroy', 'SalesTransactionsHistoryController@massDestroy')->name('sales-transactions-histories.massDestroy');
    Route::post('sales-transactions-histories/parse-csv-import', 'SalesTransactionsHistoryController@parseCsvImport')->name('sales-transactions-histories.parseCsvImport');
    Route::post('sales-transactions-histories/process-csv-import', 'SalesTransactionsHistoryController@processCsvImport')->name('sales-transactions-histories.processCsvImport');
    Route::resource('sales-transactions-histories', 'SalesTransactionsHistoryController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::post('users/media', 'UsersController@storeMedia')->name('users.storeMedia');
    Route::post('users/ckmedia', 'UsersController@storeCKEditorImages')->name('users.storeCKEditorImages');
    Route::resource('users', 'UsersController');

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Vehicle
    Route::delete('vehicles/destroy', 'VehicleController@massDestroy')->name('vehicles.massDestroy');
    Route::resource('vehicles', 'VehicleController');

    // Jobs
    Route::delete('jobs/destroy', 'JobsController@massDestroy')->name('jobs.massDestroy');
    Route::resource('jobs', 'JobsController');

    // Vehicle Category
    Route::delete('vehicle-categories/destroy', 'VehicleCategoryController@massDestroy')->name('vehicle-categories.massDestroy');
    Route::resource('vehicle-categories', 'VehicleCategoryController');

    // Order
    Route::delete('orders/destroy', 'OrderController@massDestroy')->name('orders.massDestroy');
    Route::resource('orders', 'OrderController');

    // Product
    Route::delete('products/destroy', 'ProductController@massDestroy')->name('products.massDestroy');
    Route::resource('products', 'ProductController');

    // Order Tracking
    Route::delete('order-trackings/destroy', 'OrderTrackingController@massDestroy')->name('order-trackings.massDestroy');
    Route::resource('order-trackings', 'OrderTrackingController');

    // Fuel Purchase
    Route::delete('fuel-purchases/destroy', 'FuelPurchaseController@massDestroy')->name('fuel-purchases.massDestroy');
    Route::resource('fuel-purchases', 'FuelPurchaseController');

    // Station Management
    Route::delete('station-managements/destroy', 'StationManagementController@massDestroy')->name('station-managements.massDestroy');
    Route::resource('station-managements', 'StationManagementController');

    // Distributor
    Route::delete('distributors/destroy', 'DistributorController@massDestroy')->name('distributors.massDestroy');
    Route::resource('distributors', 'DistributorController');

    // Pet Wallet Transaction
    Route::delete('pet-wallet-transactions/destroy', 'PetWalletTransactionController@massDestroy')->name('pet-wallet-transactions.massDestroy');
    Route::resource('pet-wallet-transactions', 'PetWalletTransactionController');

    // Gas Info
    Route::delete('gas-infos/destroy', 'GasInfoController@massDestroy')->name('gas-infos.massDestroy');
    Route::resource('gas-infos', 'GasInfoController');

    // Distributor Order
    Route::delete('distributor-orders/destroy', 'DistributorOrderController@massDestroy')->name('distributor-orders.massDestroy');
    Route::resource('distributor-orders', 'DistributorOrderController');

    // Station Admin
    Route::delete('station-admins/destroy', 'StationAdminController@massDestroy')->name('station-admins.massDestroy');
    Route::resource('station-admins', 'StationAdminController');

    // Station
    Route::delete('stations/destroy', 'StationController@massDestroy')->name('stations.massDestroy');
    Route::resource('stations', 'StationController');

    // Pump Transaction
    Route::delete('pump-transactions/destroy', 'PumpTransactionController@massDestroy')->name('pump-transactions.massDestroy');
    Route::resource('pump-transactions', 'PumpTransactionController');

    // Sales Transactions History
    Route::delete('sales-transactions-histories/destroy', 'SalesTransactionsHistoryController@massDestroy')->name('sales-transactions-histories.massDestroy');
    Route::resource('sales-transactions-histories', 'SalesTransactionsHistoryController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
    Route::post('profile/toggle-two-factor', 'ProfileController@toggleTwoFactor')->name('profile.toggle-two-factor');

    // Paystack Payments
    Route::get('/frontend/paystackDeposit', [PaystackDepositController::class, 'showPaystackDepositForm'])->name('deposit.paystackForm');
    Route::post('/frontend/paystackDeposit/initiate', [PaystackDepositController::class, 'initiatePaystackDeposit'])->name('deposit.initiatePaystack');
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
    // Two-Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
