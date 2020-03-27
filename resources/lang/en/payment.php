<?php

return [

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'Payment',
    'names'         => 'Payments',
    'title'       => [
        'main'  => 'Payments',
        'sub' => 'Payments'
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
        'order_id'                   => 'Please enter order id',
        'user_id'                    => 'Please enter user id',
        'user_type'                  => 'Please enter user type',
        'client_id'                  => 'Please enter client id',
        'method'                     => 'Please enter method',
        'address'                    => 'Please enter address',
        'code'                       => 'Please enter code',
        'status'                     => 'Please enter status',
        'tracking_id'                => 'Please enter tracking id',
        'bank_ref_no'                => 'Please enter bank ref no',
        'card_name'                  => 'Please enter card name',
        'currency'                   => 'Please enter currency',
        'amount'                     => 'Please enter amount',
        'trans_date'                 => 'Please enter trans date',
        'custom_field'               => 'Please enter custom field',
        'description'                => 'Please enter description',
        'created_at'                 => 'Please select created at',
        'updated_at'                 => 'Please select updated at',
        'deleted_at'                 => 'Please select deleted at',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'id'                         => 'Id',
        'order_id'                   => 'Order id',
        'user_id'                    => 'User id',
        'user_type'                  => 'User type',
        'client_id'                  => 'Client id',
        'method'                     => 'Method',
        'address'                    => 'Address',
        'code'                       => 'Code',
        'status'                     => 'Status',
        'tracking_id'                => 'Tracking id',
        'bank_ref_no'                => 'Bank ref no',
        'card_name'                  => 'Card name',
        'currency'                   => 'Currency',
        'amount'                     => 'Amount',
        'trans_date'                 => 'Trans date',
        'custom_field'               => 'Custom field',
        'description'                => 'Description',
        'created_at'                 => 'Created at',
        'updated_at'                 => 'Updated at',
        'deleted_at'                 => 'Deleted at',
    ],

    /**
     * Columns array for show hide checkbox.
     */
    'cloumns'         => [
        'order_id'                   => ['name' => 'Order id', 'data-column' => 1, 'checked'],
        'client_id'                  => ['name' => 'Client id', 'data-column' => 2, 'checked'],
        'method'                     => ['name' => 'Method', 'data-column' => 3, 'checked'],
        'address'                    => ['name' => 'Address', 'data-column' => 4, 'checked'],
        'code'                       => ['name' => 'Code', 'data-column' => 5, 'checked'],
        'tracking_id'                => ['name' => 'Tracking id', 'data-column' => 6, 'checked'],
        'bank_ref_no'                => ['name' => 'Bank ref no', 'data-column' => 7, 'checked'],
        'card_name'                  => ['name' => 'Card name', 'data-column' => 8, 'checked'],
        'currency'                   => ['name' => 'Currency', 'data-column' => 9, 'checked'],
        'amount'                     => ['name' => 'Amount', 'data-column' => 10, 'checked'],
        'trans_date'                 => ['name' => 'Trans date', 'data-column' => 11, 'checked'],
        'custom_field'               => ['name' => 'Custom field', 'data-column' => 12, 'checked'],
        'description'                => ['name' => 'Description', 'data-column' => 13, 'checked'],
    ],

    /**
     * Tab labels
     */
    'tab'           => [
        'name'  => 'Payments',
    ],

    /**
     * Texts  for the module
     */
    'text'          => [
        'preview' => 'Click on the below list for preview',
    ],
];
