            <div class='row'>
                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('user_type')
                       -> label(trans('payments::transaction.label.user_type'))
                       -> placeholder(trans('payments::transaction.placeholder.user_type'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::numeric('seller_id')
                       -> label(trans('payments::transaction.label.seller_id'))
                       -> placeholder(trans('payments::transaction.placeholder.seller_id'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::decimal('amount')
                       -> label(trans('payments::transaction.label.amount'))
                       -> placeholder(trans('payments::transaction.placeholder.amount'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::decimal('tax_amount')
                       -> label(trans('payments::transaction.label.tax_amount'))
                       -> placeholder(trans('payments::transaction.placeholder.tax_amount'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('tax_type')
                       -> label(trans('payments::transaction.label.tax_type'))
                       -> placeholder(trans('payments::transaction.placeholder.tax_type'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('type')
                       -> label(trans('payments::transaction.label.type'))
                       -> placeholder(trans('payments::transaction.placeholder.type'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('bank_ref')
                       -> label(trans('payments::transaction.label.bank_ref'))
                       -> placeholder(trans('payments::transaction.placeholder.bank_ref'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('details')
                       -> label(trans('payments::transaction.label.details'))
                       -> placeholder(trans('payments::transaction.placeholder.details'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                    <div class='form-group'>
                        <label for='date_from' class='control-label'>{!!trans('payments::transaction.label.date_from')!!}</label>
                        <div class='input-group pickdatetime'>
                            {!! Form::text('date_from')
                            -> placeholder(trans('payments::transaction.placeholder.date_from'))
                            -> addClass('pickdatetime')
                            ->raw()!!}
                           <span class='input-group-addon'><i class='fa fa-calendar'></i></span>
                        </div>
                    </div>
                 </div>

                <div class='col-md-4 col-sm-6'>
                    <div class='form-group'>
                        <label for='date_to' class='control-label'>{!!trans('payments::transaction.label.date_to')!!}</label>
                        <div class='input-group pickdatetime'>
                            {!! Form::text('date_to')
                            -> placeholder(trans('payments::transaction.placeholder.date_to'))
                            -> addClass('pickdatetime')
                            ->raw()!!}
                           <span class='input-group-addon'><i class='fa fa-calendar'></i></span>
                        </div>
                    </div>
                 </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::decimal('commission')
                       -> label(trans('payments::transaction.label.commission'))
                       -> placeholder(trans('payments::transaction.placeholder.commission'))!!}
                </div>
            </div>
