<?php

namespace Shopping\Payments\Repositories\Eloquent;

use Shopping\Payments\Interfaces\PaymentRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class PaymentRepository extends BaseRepository implements PaymentRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('shopping.payments.payment.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('shopping.payments.payment.model.model');
    }
}
