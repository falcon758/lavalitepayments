    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('payments::payment.name') !!}</a></li>
            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#payments-payment-entry' data-href='{{guard_url('payments/payment/create')}}'><i class="fa fa-plus-circle"></i> {{ trans('app.new') }}</button>
                @if($payment->id )
                <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#payments-payment-entry' data-href='{{ guard_url('payments/payment') }}/{{$payment->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> {{ trans('app.edit') }}</button>
                <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#payments-payment-entry' data-datatable='#payments-payment-list' data-href='{{ guard_url('payments/payment') }}/{{$payment->getRouteKey()}}' >
                <i class="fa fa-times-circle"></i> {{ trans('app.delete') }}
                </button>
                @endif
            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('payments-payment-show')
        ->method('POST')
        ->files('true')
        ->action(guard_url('payments/payment'))!!}
            <div class="tab-content clearfix disabled">
                <div class="tab-pan-title"> {{ trans('app.view') }}   {!! trans('payments::payment.name') !!}  [{!! $payment->name !!}] </div>
                <div class="tab-pane active" id="details">
                    @include('payments::admin.payment.partial.entry', ['mode' => 'show'])
                </div>
            </div>
        {!! Form::close() !!}
    </div>