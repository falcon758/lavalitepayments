<?php

namespace Shopping\Payments\Repositories\Presenter;

use League\Fractal\TransformerAbstract;
use Hashids;

class PaymentItemTransformer extends TransformerAbstract
{
    public function transform(\Shopping\Payments\Models\Payment $payment)
    {
        return [
            'id'                => $payment->getRouteKey(),
            'id'                => $payment->id,
            'order_id'          => $payment->order_id,
            'user_id'           => $payment->user_id,
            'user_type'         => $payment->user_type,
            'client_id'         => $payment->client_id,
            'method'            => $payment->method,
            'address'           => $payment->address,
            'code'              => $payment->code,
            'status'            => $payment->status,
            'tracking_id'       => $payment->tracking_id,
            'bank_ref_no'       => $payment->bank_ref_no,
            'card_name'         => $payment->card_name,
            'currency'          => $payment->currency,
            'amount'            => $payment->amount,
            'trans_date'        => $payment->trans_date,
            'custom_field'      => $payment->custom_field,
            'description'       => $payment->description,
            'created_at'        => $payment->created_at,
            'updated_at'        => $payment->updated_at,
            'deleted_at'        => $payment->deleted_at,
            'status'            => trans('app.'.$payment->status),
            'created_at'        => format_date($payment->created_at),
            'updated_at'        => format_date($payment->updated_at),
        ];
    }
}