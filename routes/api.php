<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Vehicle
    Route::apiResource('vehicles', 'VehicleApiController');

    // Payments
    Route::apiResource('payments', 'PaymentsApiController');

    // Wallet Transactions
    Route::apiResource('wallet-transactions', 'WalletTransactionsApiController');

    // Order
    Route::apiResource('orders', 'OrderApiController');

    // Product
    Route::apiResource('products', 'ProductApiController');

    // Order Tracking
    Route::apiResource('order-trackings', 'OrderTrackingApiController');

    // Fuel Purchase
    Route::apiResource('fuel-purchases', 'FuelPurchaseApiController');

    // Station Management
    Route::apiResource('station-managements', 'StationManagementApiController');

    // Distributor
    Route::apiResource('distributors', 'DistributorApiController');

    // Pet Wallet Transaction
    Route::apiResource('pet-wallet-transactions', 'PetWalletTransactionApiController');

    // Gas Info
    Route::apiResource('gas-infos', 'GasInfoApiController');

    // Distributor Order
    Route::apiResource('distributor-orders', 'DistributorOrderApiController');

    // Station Admin
    Route::apiResource('station-admins', 'StationAdminApiController');

    // Station
    Route::apiResource('stations', 'StationApiController');

    // Pump Transaction
    Route::apiResource('pump-transactions', 'PumpTransactionApiController');

    // Sales Transactions History
    Route::apiResource('sales-transactions-histories', 'SalesTransactionsHistoryApiController');
});
