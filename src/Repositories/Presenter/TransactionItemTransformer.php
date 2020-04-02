<?php

namespace Shopping\Payments\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class TransactionItemTransformer extends TransformerAbstract
{
    public function transform(\Shopping\Payments\Models\Transaction $transaction)
    {
        return [
            'id'                => $transaction->getRouteKey(),
            'id'                => $transaction->id,
            'user_id'           => $transaction->user_id,
            'user_type'         => $transaction->user_type,
            'seller_id'         => $transaction->seller_id,
            'amount'            => $transaction->amount,
            'tax_amount'        => $transaction->tax_amount,
            'tax_type'          => $transaction->tax_type,
            'status'            => $transaction->status,
            'type'              => $transaction->type,
            'bank_ref'          => $transaction->bank_ref,
            'details'           => $transaction->details,
            'date_from'         => $transaction->date_from,
            'date_to'           => $transaction->date_to,
            'commission'        => $transaction->commission,
            'created_at'        => $transaction->created_at,
            'updated_at'        => $transaction->updated_at,
            'deleted_at'        => $transaction->deleted_at,
            'status'            => trans('app.'.$transaction->status),
            'created_at'        => format_date($transaction->created_at),
            'updated_at'        => format_date($transaction->updated_at),
        ];
    }
}
