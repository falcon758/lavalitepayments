<?php

namespace Shopping\Payments\Policies;

use Litepie\User\Contracts\UserPolicy;
use Shopping\Payments\Models\Payment;

class PaymentPolicy
{

    /**
     * Determine if the given user can view the payment.
     *
     * @param UserPolicy $user
     * @param Payment $payment
     *
     * @return bool
     */
    public function view(UserPolicy $user, Payment $payment)
    {
        if ($user->canDo('payments.payment.view') && $user->isAdmin()) {
            return true;
        }

        return $payment->user_id == user_id() && $payment->user_type == user_type();
    }

    /**
     * Determine if the given user can create a payment.
     *
     * @param UserPolicy $user
     * @param Payment $payment
     *
     * @return bool
     */
    public function create(UserPolicy $user)
    {
        return  $user->canDo('payments.payment.create');
    }

    /**
     * Determine if the given user can update the given payment.
     *
     * @param UserPolicy $user
     * @param Payment $payment
     *
     * @return bool
     */
    public function update(UserPolicy $user, Payment $payment)
    {
        if ($user->canDo('payments.payment.update') && $user->isAdmin()) {
            return true;
        }

        return $payment->user_id == user_id() && $payment->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given payment.
     *
     * @param UserPolicy $user
     * @param Payment $payment
     *
     * @return bool
     */
    public function destroy(UserPolicy $user, Payment $payment)
    {
        return $payment->user_id == user_id() && $payment->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given payment.
     *
     * @param UserPolicy $user
     * @param Payment $payment
     *
     * @return bool
     */
    public function verify(UserPolicy $user, Payment $payment)
    {
        if ($user->canDo('payments.payment.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given payment.
     *
     * @param UserPolicy $user
     * @param Payment $payment
     *
     * @return bool
     */
    public function approve(UserPolicy $user, Payment $payment)
    {
        if ($user->canDo('payments.payment.approve')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the user can perform a given action ve.
     *
     * @param [type] $user    [description]
     * @param [type] $ability [description]
     *
     * @return [type] [description]
     */
    public function before($user, $ability)
    {
        if ($user->isSuperuser()) {
            return true;
        }
    }
}
