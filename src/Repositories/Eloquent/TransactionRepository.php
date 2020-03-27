<?php

namespace Shopping\Payments\Repositories\Eloquent;

use Shopping\Payments\Interfaces\TransactionRepositoryInterface;
use Litepie\Repository\Eloquent\BaseRepository;

class TransactionRepository extends BaseRepository implements TransactionRepositoryInterface
{


    public function boot()
    {
        $this->fieldSearchable = config('shopping.payments.transaction.search');

    }

    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model()
    {
        return config('shopping.payments.transaction.model.model');
    }
}
