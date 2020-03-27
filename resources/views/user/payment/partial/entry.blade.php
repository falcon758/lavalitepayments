<div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('order_id')
                       -> label(trans('payments::payment.label.order_id'))
                       -> placeholder(trans('payments::payment.placeholder.order_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('client_id')
                       -> label(trans('payments::payment.label.client_id'))
                       -> placeholder(trans('payments::payment.placeholder.client_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('method')
                       -> label(trans('payments::payment.label.method'))
                       -> placeholder(trans('payments::payment.placeholder.method'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('address')
                       -> label(trans('payments::payment.label.address'))
                       -> placeholder(trans('payments::payment.placeholder.address'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('code')
                       -> label(trans('payments::payment.label.code'))
                       -> placeholder(trans('payments::payment.placeholder.code'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('tracking_id')
                       -> label(trans('payments::payment.label.tracking_id'))
                       -> placeholder(trans('payments::payment.placeholder.tracking_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('bank_ref_no')
                       -> label(trans('payments::payment.label.bank_ref_no'))
                       -> placeholder(trans('payments::payment.placeholder.bank_ref_no'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('card_name')
                       -> label(trans('payments::payment.label.card_name'))
                       -> placeholder(trans('payments::payment.placeholder.card_name'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('currency')
                       -> label(trans('payments::payment.label.currency'))
                       -> placeholder(trans('payments::payment.placeholder.currency'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::decimal('amount')
                       -> label(trans('payments::payment.label.amount'))
                       -> placeholder(trans('payments::payment.placeholder.amount'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('trans_date')
                       -> label(trans('payments::payment.label.trans_date'))
                       -> placeholder(trans('payments::payment.placeholder.trans_date'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('custom_field')
                       -> label(trans('payments::payment.label.custom_field'))
                       -> placeholder(trans('payments::payment.placeholder.custom_field'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('description')
                       -> label(trans('payments::payment.label.description'))
                       -> placeholder(trans('payments::payment.placeholder.description'))!!}
                </div>

