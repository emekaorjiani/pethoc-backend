<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 18,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 21,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 22,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 23,
                'title' => 'vehicle_create',
            ],
            [
                'id'    => 24,
                'title' => 'vehicle_edit',
            ],
            [
                'id'    => 25,
                'title' => 'vehicle_show',
            ],
            [
                'id'    => 26,
                'title' => 'vehicle_delete',
            ],
            [
                'id'    => 27,
                'title' => 'vehicle_access',
            ],
            [
                'id'    => 28,
                'title' => 'order_list_access',
            ],
            [
                'id'    => 29,
                'title' => 'payment_create',
            ],
            [
                'id'    => 30,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 31,
                'title' => 'payment_show',
            ],
            [
                'id'    => 32,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 33,
                'title' => 'payment_access',
            ],
            [
                'id'    => 34,
                'title' => 'feature_setting_access',
            ],
            [
                'id'    => 35,
                'title' => 'job_create',
            ],
            [
                'id'    => 36,
                'title' => 'job_edit',
            ],
            [
                'id'    => 37,
                'title' => 'job_show',
            ],
            [
                'id'    => 38,
                'title' => 'job_delete',
            ],
            [
                'id'    => 39,
                'title' => 'job_access',
            ],
            [
                'id'    => 40,
                'title' => 'vehicle_category_create',
            ],
            [
                'id'    => 41,
                'title' => 'vehicle_category_edit',
            ],
            [
                'id'    => 42,
                'title' => 'vehicle_category_show',
            ],
            [
                'id'    => 43,
                'title' => 'vehicle_category_delete',
            ],
            [
                'id'    => 44,
                'title' => 'vehicle_category_access',
            ],
            [
                'id'    => 45,
                'title' => 'wallet_transaction_create',
            ],
            [
                'id'    => 46,
                'title' => 'wallet_transaction_edit',
            ],
            [
                'id'    => 47,
                'title' => 'wallet_transaction_show',
            ],
            [
                'id'    => 48,
                'title' => 'wallet_transaction_delete',
            ],
            [
                'id'    => 49,
                'title' => 'wallet_transaction_access',
            ],
            [
                'id'    => 50,
                'title' => 'order_create',
            ],
            [
                'id'    => 51,
                'title' => 'order_edit',
            ],
            [
                'id'    => 52,
                'title' => 'order_show',
            ],
            [
                'id'    => 53,
                'title' => 'order_delete',
            ],
            [
                'id'    => 54,
                'title' => 'order_access',
            ],
            [
                'id'    => 55,
                'title' => 'product_create',
            ],
            [
                'id'    => 56,
                'title' => 'product_edit',
            ],
            [
                'id'    => 57,
                'title' => 'product_show',
            ],
            [
                'id'    => 58,
                'title' => 'product_delete',
            ],
            [
                'id'    => 59,
                'title' => 'product_access',
            ],
            [
                'id'    => 60,
                'title' => 'order_tracking_create',
            ],
            [
                'id'    => 61,
                'title' => 'order_tracking_edit',
            ],
            [
                'id'    => 62,
                'title' => 'order_tracking_show',
            ],
            [
                'id'    => 63,
                'title' => 'order_tracking_delete',
            ],
            [
                'id'    => 64,
                'title' => 'order_tracking_access',
            ],
            [
                'id'    => 65,
                'title' => 'fuel_purchase_create',
            ],
            [
                'id'    => 66,
                'title' => 'fuel_purchase_edit',
            ],
            [
                'id'    => 67,
                'title' => 'fuel_purchase_show',
            ],
            [
                'id'    => 68,
                'title' => 'fuel_purchase_delete',
            ],
            [
                'id'    => 69,
                'title' => 'fuel_purchase_access',
            ],
            [
                'id'    => 70,
                'title' => 'transaction_access',
            ],
            [
                'id'    => 71,
                'title' => 'station_management_create',
            ],
            [
                'id'    => 72,
                'title' => 'station_management_edit',
            ],
            [
                'id'    => 73,
                'title' => 'station_management_show',
            ],
            [
                'id'    => 74,
                'title' => 'station_management_delete',
            ],
            [
                'id'    => 75,
                'title' => 'station_management_access',
            ],
            [
                'id'    => 76,
                'title' => 'distributor_create',
            ],
            [
                'id'    => 77,
                'title' => 'distributor_edit',
            ],
            [
                'id'    => 78,
                'title' => 'distributor_show',
            ],
            [
                'id'    => 79,
                'title' => 'distributor_delete',
            ],
            [
                'id'    => 80,
                'title' => 'distributor_access',
            ],
            [
                'id'    => 81,
                'title' => 'pet_wallet_transaction_create',
            ],
            [
                'id'    => 82,
                'title' => 'pet_wallet_transaction_edit',
            ],
            [
                'id'    => 83,
                'title' => 'pet_wallet_transaction_show',
            ],
            [
                'id'    => 84,
                'title' => 'pet_wallet_transaction_delete',
            ],
            [
                'id'    => 85,
                'title' => 'pet_wallet_transaction_access',
            ],
            [
                'id'    => 86,
                'title' => 'gas_info_create',
            ],
            [
                'id'    => 87,
                'title' => 'gas_info_edit',
            ],
            [
                'id'    => 88,
                'title' => 'gas_info_show',
            ],
            [
                'id'    => 89,
                'title' => 'gas_info_delete',
            ],
            [
                'id'    => 90,
                'title' => 'gas_info_access',
            ],
            [
                'id'    => 91,
                'title' => 'distributor_order_create',
            ],
            [
                'id'    => 92,
                'title' => 'distributor_order_edit',
            ],
            [
                'id'    => 93,
                'title' => 'distributor_order_show',
            ],
            [
                'id'    => 94,
                'title' => 'distributor_order_delete',
            ],
            [
                'id'    => 95,
                'title' => 'distributor_order_access',
            ],
            [
                'id'    => 96,
                'title' => 'station_admin_create',
            ],
            [
                'id'    => 97,
                'title' => 'station_admin_edit',
            ],
            [
                'id'    => 98,
                'title' => 'station_admin_show',
            ],
            [
                'id'    => 99,
                'title' => 'station_admin_delete',
            ],
            [
                'id'    => 100,
                'title' => 'station_admin_access',
            ],
            [
                'id'    => 101,
                'title' => 'station_create',
            ],
            [
                'id'    => 102,
                'title' => 'station_edit',
            ],
            [
                'id'    => 103,
                'title' => 'station_show',
            ],
            [
                'id'    => 104,
                'title' => 'station_delete',
            ],
            [
                'id'    => 105,
                'title' => 'station_access',
            ],
            [
                'id'    => 106,
                'title' => 'stations_feature_access',
            ],
            [
                'id'    => 107,
                'title' => 'pump_transaction_create',
            ],
            [
                'id'    => 108,
                'title' => 'pump_transaction_edit',
            ],
            [
                'id'    => 109,
                'title' => 'pump_transaction_show',
            ],
            [
                'id'    => 110,
                'title' => 'pump_transaction_delete',
            ],
            [
                'id'    => 111,
                'title' => 'pump_transaction_access',
            ],
            [
                'id'    => 112,
                'title' => 'sales_transactions_history_create',
            ],
            [
                'id'    => 113,
                'title' => 'sales_transactions_history_edit',
            ],
            [
                'id'    => 114,
                'title' => 'sales_transactions_history_show',
            ],
            [
                'id'    => 115,
                'title' => 'sales_transactions_history_delete',
            ],
            [
                'id'    => 116,
                'title' => 'sales_transactions_history_access',
            ],
            [
                'id'    => 117,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
