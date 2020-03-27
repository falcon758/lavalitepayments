<?php

namespace Shopping;

use DB;
use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('transactions')->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'payments.transaction.view',
                'name'      => 'View Transaction',
            ],
            [
                'slug'      => 'payments.transaction.create',
                'name'      => 'Create Transaction',
            ],
            [
                'slug'      => 'payments.transaction.edit',
                'name'      => 'Update Transaction',
            ],
            [
                'slug'      => 'payments.transaction.delete',
                'name'      => 'Delete Transaction',
            ],
            
            
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/payments/transaction',
                'name'        => 'Transaction',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/payments/transaction',
                'name'        => 'Transaction',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'transaction',
                'name'        => 'Transaction',
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
                'module'    => 'Transaction',
                'user_type' => null,
                'user_id'   => null,
                'key'       => 'payments.transaction.key',
                'name'      => 'Some name',
                'value'     => 'Some value',
                'type'      => 'Default',
                'control'   => 'text',
            ],
            */
        ]);
    }
}
