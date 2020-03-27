    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#payment" data-toggle="tab">{!! trans('payments::payment.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#payments-payment-edit'  data-load-to='#payments-payment-entry' data-datatable='#payments-payment-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#payments-payment-entry' data-href='{{guard_url('payments/payment')}}/{{$payment->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('payments-payment-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(guard_url('payments/payment/'. $payment->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="payment">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('payments::payment.name') !!} [{!!$payment->name!!}] </div>
                @include('payments::admin.payment.partial.entry', ['mode' => 'edit'])
            </div>
        </div>
        {!!Form::close()!!}
    </div>