<?php

// Resource routes  for payment
Route::group(['prefix' => set_route_guard('web').'/payments'], function () {
    Route::resource('payment', 'PaymentResourceController');
});



// Resource routes  for transaction
Route::group(['prefix' => set_route_guard('web').'/payments'], function () {
    Route::resource('transaction', 'TransactionResourceController');
});


