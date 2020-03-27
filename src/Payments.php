<?php

namespace Shopping\Payments;

use User;

class Payments
{
    /**
     * $payment object.
     */
    protected $payment;
    /**
     * $transaction object.
     */
    protected $transaction;

    /**
     * Constructor.
     */
    public function __construct(\Shopping\Payments\Interfaces\PaymentRepositoryInterface $payment,
        \Shopping\Payments\Interfaces\TransactionRepositoryInterface $transaction)
    {
        $this->payment = $payment;
        $this->transaction = $transaction;
    }

    /**
     * Returns count of payments.
     *
     * @param array $filter
     *
     * @return int
     */
    public function count()
    {
        return  0;
    }

    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function gadget($view = 'admin.payment.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->payment->pushCriteria(new \Litepie\Shopping\Repositories\Criteria\PaymentUserCriteria());
        }

        $payment = $this->payment->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('payments::' . $view, compact('payment'))->render();
    }
    /**
     * Make gadget View
     *
     * @param string $view
     *
     * @param int $count
     *
     * @return View
     */
    public function gadget($view = 'admin.transaction.gadget', $count = 10)
    {

        if (User::hasRole('user')) {
            $this->transaction->pushCriteria(new \Litepie\Shopping\Repositories\Criteria\TransactionUserCriteria());
        }

        $transaction = $this->transaction->scopeQuery(function ($query) use ($count) {
            return $query->orderBy('id', 'DESC')->take($count);
        })->all();

        return view('payments::' . $view, compact('transaction'))->render();
    }
}
