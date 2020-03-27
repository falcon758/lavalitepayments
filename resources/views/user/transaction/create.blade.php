<div class="container-fluid"> 
    <div class="row">
        <div class="col-xs-12">
            
            <div class="card">
                <div class="card-header with-sub" data-background-color="red">
                    <div class="row">
                        <div class="col-sm-11 title-main">
                            <i class="pe-7s-news-paper"></i>
                            <h4 class="title">{{ trans('app.create')  }} transaction</h4>
                            <p class="sub-title">{{ trans('app.add')  }} transaction here...</p>
                        </div>
                        <div class="col-sm-1">
                            <a href="{{guard_url('payments/transaction')}}" rel="tooltip" class="btn btn-white btn-round btn-simple btn-icon pull-right add-new" data-original-title="" title="">
                                    <i class="fa fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
                {!!Form::vertical_open()
                ->id('create-payments-transaction')
                ->method('POST')
                ->files('true')
                ->class('dashboard-form')
                ->action(guard_url('payments/transaction'))!!}
                <div class="card-content">                
                    @include('notifications')
                    @include('payments::user.transaction.partial.entry', ['mode' => 'create'])
                </div>
                <div class="card-footer text-right">
                    {!!   Form::actions()
                    ->large_primary_submit(trans('app.create'))
                    ->large_inverse_reset(trans('app.reset'))
                    !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
