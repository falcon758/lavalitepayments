<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-7 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">{!! trans('payments::transaction.title.main') !!}</h4>
                                <p class="sub-title">{!! trans('payments::transaction.title.sub') !!}</p>
                            </div>
                            <div class="col-sm-5">
                                <div class="columns columns-right pull-right">
                                    <button class="btn btn-default" name="refresh" title="Refresh" type="button">
                                        <i class="fa fa-search"> </i>
                                    </button>
                                    <a href="{!!guard_url('payments/transaction/create')!!}" rel="tooltip" class="btn btn-default add-new" data-original-title="" title="">
                                        <i class="fa fa-plus-circle"></i>
                                    </a>
                                </div>
                                <div class="search pull-right">
                                    {!!Form::open()
                                   ->method('GET')
                                   ->class('form pn')
                                   ->action(guard_url('payments/transaction'))!!}
                                    <div class="form-group form-white mn">
                                      <input class="form-control" placeholder="Search" id="search-2" type="text" name="search">
                                    </div>
                                    {!! Form::close()!!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-content table-responsive">
                        @include('notifications')
                        <table class="table table-bigboy">
                            <thead>
                                <tr>
                                    <th class="text-center">Image</th>
                                    <th>{!! trans('payments::transaction.label.user_tye')!!}</th>
                    <th>{!! trans('payments::transaction.label.seller_id')!!}</th>
                    <th>{!! trans('payments::transaction.label.amount')!!}</th>
                    <th>{!! trans('payments::transaction.label.tax_amount')!!}</th>
                    <th>{!! trans('payments::transaction.label.tax_type')!!}</th>
                    <th>{!! trans('payments::transaction.label.type')!!}</th>
                    <th>{!! trans('payments::transaction.label.bank_ref')!!}</th>
                    <th>{!! trans('payments::transaction.label.details')!!}</th>
                    <th>{!! trans('payments::transaction.label.date_from')!!}</th>
                    <th>{!! trans('payments::transaction.label.date_to')!!}</th>
                    <th>{!! trans('payments::transaction.label.commission')!!}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($transactions as $transaction)
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <a href="{{guard_url('transaction')}}/{{$transaction->getPublickey()}}">
                                              <img alt="" class="img-responsive" src="{!!url($transaction->defaultImage('sm','images'))!!}">
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $transaction->user_tye }}</td>
                    <td>{{ $transaction->seller_id }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->tax_amount }}</td>
                    <td>{{ $transaction->tax_type }}</td>
                    <td>{{ $transaction->type }}</td>
                    <td>{{ $transaction->bank_ref }}</td>
                    <td>{{ $transaction->details }}</td>
                    <td>{{ $transaction->date_from }}</td>
                    <td>{{ $transaction->date_to }}</td>
                    <td>{{ $transaction->commission }}</td>
                                    <td class="td-actions">
                                        <a href="{{trans_url('transaction')}}/{!!$transaction->getPublicKey()!!}" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View Transaction" class="btn btn-info btn-simple">
                                            <i class="material-icons">panorama</i>
                                        </a>
                                        <a href="{!! guard_url('payments/transaction') !!}/{!! $transaction->getRouteKey() !!}/edit" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Transaction" class="btn btn-success btn-simple">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="Remove Transaction" class="btn btn-danger btn-simple" data-action="DELETE" data-href="{!! guard_url('payments/transaction') !!}/{!! $transaction->getRouteKey() !!}" data-remove="{!! $transaction->getRouteKey() !!}">
                                            <i class="material-icons">close</i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan='4' class='text-center'><p>No transactions found.</p></td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{$transactions->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>