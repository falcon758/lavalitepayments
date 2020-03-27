<?php

namespace Shopping\Payments\Policies;

use Litepie\User\Contracts\UserPolicy;
use Shopping\Payments\Models\Transaction;

class TransactionPolicy
{

    /**
     * Determine if the given user can view the transaction.
     *
     * @param UserPolicy $user
     * @param Transaction $transaction
     *
     * @return bool
     */
    public function view(UserPolicy $user, Transaction $transaction)
    {
        if ($user->canDo('payments.transaction.view') && $user->isAdmin()) {
            return true;
        }

        return $transaction->user_id == user_id() && $transaction->user_type == user_type();
    }

    /**
     * Determine if the given user can create a transaction.
     *
     * @param UserPolicy $user
     * @param Transaction $transaction
     *
     * @return bool
     */
    public function create(UserPolicy $user)
    {
        return  $user->canDo('payments.transaction.create');
    }

    /**
     * Determine if the given user can update the given transaction.
     *
     * @param UserPolicy $user
     * @param Transaction $transaction
     *
     * @return bool
     */
    public function update(UserPolicy $user, Transaction $transaction)
    {
        if ($user->canDo('payments.transaction.update') && $user->isAdmin()) {
            return true;
        }

        return $transaction->user_id == user_id() && $transaction->user_type == user_type();
    }

    /**
     * Determine if the given user can delete the given transaction.
     *
     * @param UserPolicy $user
     * @param Transaction $transaction
     *
     * @return bool
     */
    public function destroy(UserPolicy $user, Transaction $transaction)
    {
        return $transaction->user_id == user_id() && $transaction->user_type == user_type();
    }

    /**
     * Determine if the given user can verify the given transaction.
     *
     * @param UserPolicy $user
     * @param Transaction $transaction
     *
     * @return bool
     */
    public function verify(UserPolicy $user, Transaction $transaction)
    {
        if ($user->canDo('payments.transaction.verify')) {
            return true;
        }

        return false;
    }

    /**
     * Determine if the given user can approve the given transaction.
     *
     * @param UserPolicy $user
     * @param Transaction $transaction
     *
     * @return bool
     */
    public function approve(UserPolicy $user, Transaction $transaction)
    {
        if ($user->canDo('payments.transaction.approve')) {
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
