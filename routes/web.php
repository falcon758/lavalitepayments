<?php

// Resource routes  for payment
Route::group(['prefix' => '{guard}/payments'], function () {
    Route::resource('payment', 'PaymentResourceController');
});



// Resource routes  for transaction
Route::group(['prefix' => '{guard}/payments'], function () {
    Route::resource('transaction', 'TransactionResourceController');
});


