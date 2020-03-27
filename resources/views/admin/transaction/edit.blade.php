    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#transaction" data-toggle="tab">{!! trans('payments::transaction.tab.name') !!}</a></li>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#payments-transaction-edit'  data-load-to='#payments-transaction-entry' data-datatable='#payments-transaction-list'><i class="fa fa-floppy-o"></i> {{ trans('app.save') }}</button>
                <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#payments-transaction-entry' data-href='{{guard_url('payments/transaction')}}/{{$transaction->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('app.cancel') }}</button>

            </div>
        </ul>
        {!!Form::vertical_open()
        ->id('payments-transaction-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(guard_url('payments/transaction/'. $transaction->getRouteKey()))!!}
        <div class="tab-content clearfix">
            <div class="tab-pane active" id="transaction">
                <div class="tab-pan-title">  {{ trans('app.edit') }}  {!! trans('payments::transaction.name') !!} [{!!$transaction->name!!}] </div>
                @include('payments::admin.transaction.partial.entry', ['mode' => 'edit'])
            </div>
        </div>
        {!!Form::close()!!}
    </div>