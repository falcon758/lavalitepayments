<?php

namespace Shopping;

use DB;
use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('payments')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'payments.payment.view',
                'name'      => 'View Payment',
            ],
            [
                'slug'      => 'payments.payment.create',
                'name'      => 'Create Payment',
            ],
            [
                'slug'      => 'payments.payment.edit',
                'name'      => 'Update Payment',
            ],
            [
                'slug'      => 'payments.payment.delete',
                'name'      => 'Delete Payment',
            ],
            
            
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/payments/payment',
                'name'        => 'Payment',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/payments/payment',
                'name'        => 'Payment',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'payment',
                'name'        => 'Payment',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
            [
                'pacakge'   => 'Payments',
                'module'    => 'Payment',
                'user_type' => null,
                'user_id'   => null,
                'key'       => 'payments.payment.key',
                'name'      => 'Some name',
                'value'     => 'Some value',
                'type'      => 'Default',
                'control'   => 'text',
            ],
            */
        ]);
    }
}
