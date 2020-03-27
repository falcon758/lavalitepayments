<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header with-sub" data-background-color="red">
                        <div class="row">
                            <div class="col-sm-7 title-main">
                                <i class="pe-7s-display2"></i>
                                <h4 class="title">{!! trans('payments::payment.title.main') !!}</h4>
                                <p class="sub-title">{!! trans('payments::payment.title.sub') !!}</p>
                            </div>
                            <div class="col-sm-5">
                                <div class="columns columns-right pull-right">
                                    <button class="btn btn-default" name="refresh" title="Refresh" type="button">
                                        <i class="fa fa-search"> </i>
                                    </button>
                                    <a href="{!!guard_url('payments/payment/create')!!}" rel="tooltip" class="btn btn-default add-new" data-original-title="" title="">
                                        <i class="fa fa-plus-circle"></i>
                                    </a>
                                </div>
                                <div class="search pull-right">
                                    {!!Form::open()
                                   ->method('GET')
                                   ->class('form pn')
                                   ->action(guard_url('payments/payment'))!!}
                                    <div class="form-group form-white mn">
                                      <input class="form-control" placeholder="Search" id="search" type="text" name="search">
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
                                    <th>{!! trans('payments::payment.label.order_id')!!}</th>
                    <th>{!! trans('payments::payment.label.client_id')!!}</th>
                    <th>{!! trans('payments::payment.label.method')!!}</th>
                    <th>{!! trans('payments::payment.label.address')!!}</th>
                    <th>{!! trans('payments::payment.label.code')!!}</th>
                    <th>{!! trans('payments::payment.label.tracking_id')!!}</th>
                    <th>{!! trans('payments::payment.label.bank_ref_no')!!}</th>
                    <th>{!! trans('payments::payment.label.card_name')!!}</th>
                    <th>{!! trans('payments::payment.label.currency')!!}</th>
                    <th>{!! trans('payments::payment.label.amount')!!}</th>
                    <th>{!! trans('payments::payment.label.trans_date')!!}</th>
                    <th>{!! trans('payments::payment.label.custom_field')!!}</th>
                    <th>{!! trans('payments::payment.label.description')!!}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($payments as $payment)
                                <tr>
                                    <td>
                                        <div class="img-container">
                                            <a href="{{guard_url('payment')}}/{{$payment->getPublickey()}}">
                                              <img alt="" class="img-responsive" src="{!!url($payment->defaultImage('sm','images'))!!}">
                                            </a>
                                        </div>
                                    </td>
                                    <td>{{ $payment->order_id }}</td>
                    <td>{{ $payment->client_id }}</td>
                    <td>{{ $payment->method }}</td>
                    <td>{{ $payment->address }}</td>
                    <td>{{ $payment->code }}</td>
                    <td>{{ $payment->tracking_id }}</td>
                    <td>{{ $payment->bank_ref_no }}</td>
                    <td>{{ $payment->card_name }}</td>
                    <td>{{ $payment->currency }}</td>
                    <td>{{ $payment->amount }}</td>
                    <td>{{ $payment->trans_date }}</td>
                    <td>{{ $payment->custom_field }}</td>
                    <td>{{ $payment->description }}</td>
                                    <td class="td-actions">
                                        <a href="{{trans_url('payment')}}/{!!$payment->getPublicKey()!!}" rel="tooltip" data-toggle="tooltip" data-placement="top" title="View Payment" class="btn btn-info btn-simple">
                                            <i class="material-icons">panorama</i>
                                        </a>
                                        <a href="{!! guard_url('payments/payment') !!}/{!! $payment->getRouteKey() !!}/edit" rel="tooltip" data-toggle="tooltip" data-placement="top" title="Edit Payment" class="btn btn-success btn-simple">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a rel="tooltip" data-toggle="tooltip" data-placement="top" title="Remove Payment" class="btn btn-danger btn-simple" data-action="DELETE" data-href="{!! guard_url('payments/payment') !!}/{!! $payment->getRouteKey() !!}" data-remove="{!! $payment->getRouteKey() !!}">
                                            <i class="material-icons">close</i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan='4' class='text-center'><p>No payments found.</p></td>
                                </tr>
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{$payments->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>