<?php

return [

    /**
     * Provider.
     */
    'provider'  => 'shopping',

    /*
     * Package.
     */
    'package'   => 'payments',

    /*
     * Modules.
     */
    'modules'   => ['payment', 
'transaction'],

    'image'    => [

        'sm' => [
            'width'     => '140',
            'height'    => '140',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],

        'md' => [
            'width'     => '370',
            'height'    => '420',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],

        'lg' => [
            'width'     => '780',
            'height'    => '497',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],
        'xl' => [
            'width'     => '800',
            'height'    => '530',
            'action'    => 'fit',
            'watermark' => 'img/logo/default.png',
        ],

    ],

    'payment'       => [
        'model' => [
            'model'                 => \Shopping\Payments\Models\Payment::class,
            'table'                 => 'payments',
            'presenter'             => \Shopping\Payments\Repositories\Presenter\PaymentItemPresenter::class,
            'hidden'                => [],
            'visible'               => [],
            'guarded'               => ['*'],
            'slugs'                 => ['slug' => 'name'],
            'dates'                 => ['deleted_at'],
            'appends'               => [],
            'fillable'              => ['user_id', 'id',  'order_id',  'user_id',  'user_type',  'client_id',  'method',  'address',  'code',  'status',  'tracking_id',  'bank_ref_no',  'card_name',  'currency',  'amount',  'trans_date',  'custom_field',  'description',  'created_at',  'updated_at',  'deleted_at'],
            'translatables'         => [],
            'upload_folder'         => 'payments/payment',
            'uploads'               => [],
            'casts'                 => [],
            'revision'              => [],
            'perPage'               => '20',
            'search'        => [
                'name'  => 'like',
                'status',
            ]
        ],

        'controller' => [
            'provider'  => 'Shopping',
            'package'   => 'Payments',
            'module'    => 'Payment',
        ],

    ],

    'transaction'       => [
        'model' => [
            'model'                 => \Shopping\Payments\Models\Transaction::class,
            'table'                 => 'transactions',
            'presenter'             => \Shopping\Payments\Repositories\Presenter\TransactionItemPresenter::class,
            'hidden'                => [],
            'visible'               => [],
            'guarded'               => ['*'],
            'slugs'                 => ['slug' => 'name'],
            'dates'                 => ['deleted_at'],
            'appends'               => [],
            'fillable'              => ['user_id', 'id',  'user_id',  'user_tye',  'seller_id',  'amount',  'tax_amount',  'tax_type',  'status',  'type',  'bank_ref',  'details',  'date_from',  'date_to',  'commission',  'created_at',  'updated_at',  'deleted_at'],
            'translatables'         => [],
            'upload_folder'         => 'payments/transaction',
            'uploads'               => [],
            'casts'                 => [],
            'revision'              => [],
            'perPage'               => '20',
            'search'        => [
                'name'  => 'like',
                'status',
            ]
        ],

        'controller' => [
            'provider'  => 'Shopping',
            'package'   => 'Payments',
            'module'    => 'Transaction',
        ],

    ],
];
