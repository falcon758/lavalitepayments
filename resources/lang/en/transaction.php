<?php

return [

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'Transaction',
    'names'         => 'Transactions',
    'title'       => [
        'main'  => 'Transactions',
        'sub' => 'Transactions'
    ],

    /**
     * Options for select/radio/check.
     */
    'options'       => [
            
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder'   => [
        'id'                         => 'Please enter id',
        'user_id'                    => 'Please enter user id',
        'user_tye'                   => 'Please enter user tye',
        'seller_id'                  => 'Please enter seller id',
        'amount'                     => 'Please enter amount',
        'tax_amount'                 => 'Please enter tax amount',
        'tax_type'                   => 'Please enter tax type',
        'status'                     => 'Please enter status',
        'type'                       => 'Please enter type',
        'bank_ref'                   => 'Please enter bank ref',
        'details'                    => 'Please enter details',
        'date_from'                  => 'Please select date from',
        'date_to'                    => 'Please select date to',
        'commission'                 => 'Please enter commission',
        'created_at'                 => 'Please select created at',
        'updated_at'                 => 'Please select updated at',
        'deleted_at'                 => 'Please select deleted at',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'id'                         => 'Id',
        'user_id'                    => 'User id',
        'user_tye'                   => 'User tye',
        'seller_id'                  => 'Seller id',
        'amount'                     => 'Amount',
        'tax_amount'                 => 'Tax amount',
        'tax_type'                   => 'Tax type',
        'status'                     => 'Status',
        'type'                       => 'Type',
        'bank_ref'                   => 'Bank ref',
        'details'                    => 'Details',
        'date_from'                  => 'Date from',
        'date_to'                    => 'Date to',
        'commission'                 => 'Commission',
        'created_at'                 => 'Created at',
        'updated_at'                 => 'Updated at',
        'deleted_at'                 => 'Deleted at',
    ],

    /**
     * Columns array for show hide checkbox.
     */
    'cloumns'         => [
        'user_tye'                   => ['name' => 'User tye', 'data-column' => 1, 'checked'],
        'seller_id'                  => ['name' => 'Seller id', 'data-column' => 2, 'checked'],
        'amount'                     => ['name' => 'Amount', 'data-column' => 3, 'checked'],
        'tax_amount'                 => ['name' => 'Tax amount', 'data-column' => 4, 'checked'],
        'tax_type'                   => ['name' => 'Tax type', 'data-column' => 5, 'checked'],
        'type'                       => ['name' => 'Type', 'data-column' => 6, 'checked'],
        'bank_ref'                   => ['name' => 'Bank ref', 'data-column' => 7, 'checked'],
        'details'                    => ['name' => 'Details', 'data-column' => 8, 'checked'],
        'date_from'                  => ['name' => 'Date from', 'data-column' => 9, 'checked'],
        'date_to'                    => ['name' => 'Date to', 'data-column' => 10, 'checked'],
        'commission'                 => ['name' => 'Commission', 'data-column' => 11, 'checked'],
    ],

    /**
     * Tab labels
     */
    'tab'           => [
        'name'  => 'Transactions',
    ],

    /**
     * Texts  for the module
     */
    'text'          => [
        'preview' => 'Click on the below list for preview',
    ],
];
