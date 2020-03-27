<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-file-text-o"></i> {!! trans('payments::payment.name') !!} <small> {!! trans('app.manage') !!} {!! trans('payments::payment.names') !!}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! guard_url('/') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
            <li class="active">{!! trans('payments::payment.names') !!}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div id='payments-payment-entry'>
    </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                    <li class="{!!(request('status') == '')?'active':'';!!}"><a href="{!!guard_url('payments/payment')!!}">{!! trans('payments::payment.names') !!}</a></li>
                    <li class="{!!(request('status') == 'archive')?'active':'';!!}"><a href="{!!guard_url('payments/payment?status=archive')!!}">Archived</a></li>
                    <li class="{!!(request('status') == 'deleted')?'active':'';!!}"><a href="{!!guard_url('payments/payment?status=deleted')!!}">Trashed</a></li>
                    <li class="pull-right">
                    <span class="actions">
                    <!--   
                    <a  class="btn btn-xs btn-purple"  href="{!!guard_url('payments/payment/reports')!!}"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-sm hidden-xs"> Reports</span></a>
                    @include('payments::admin.payment.partial.actions')
                    -->
                    @include('payments::admin.payment.partial.filter')
                    @include('payments::admin.payment.partial.column')
                    </span> 
                </li>
            </ul>
            <div class="tab-content">
                <table id="payments-payment-list" class="table table-striped data-table">
                    <thead class="list_head">
                        <th style="text-align: right;" width="1%"><a class="btn-reset-filter" href="#Reset" style="display:none; color:#fff;"><i class="fa fa-filter"></i></a> <input type="checkbox" id="payments-payment-check-all"></th>
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
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">

var oTable;
var oSearch;
$(document).ready(function(){
    app.load('#payments-payment-entry', '{!!guard_url('payments/payment/0')!!}');
    oTable = $('#payments-payment-list').dataTable( {
        'columnDefs': [{
            'targets': 0,
            'searchable': false,
            'orderable': false,
            'className': 'dt-body-center',
            'render': function (data, type, full, meta){
                return '<input type="checkbox" name="id[]" value="' + data.id + '">';
            }
        }], 
        
        "responsive" : true,
        "order": [[1, 'asc']],
        "bProcessing": true,
        "sDom": 'R<>rt<ilp><"clear">',
        "bServerSide": true,
        "sAjaxSource": '{!! guard_url('payments/payment') !!}',
        "fnServerData" : function ( sSource, aoData, fnCallback ) {

            $.each(oSearch, function(key, val){
                aoData.push( { 'name' : key, 'value' : val } );
            });
            app.dataTable(aoData);
            $.ajax({
                'dataType'  : 'json',
                'data'      : aoData,
                'type'      : 'GET',
                'url'       : sSource,
                'success'   : fnCallback
            });
        },

        "columns": [
            {data :'id'},
            {data :'order_id'},
            {data :'client_id'},
            {data :'method'},
            {data :'address'},
            {data :'code'},
            {data :'tracking_id'},
            {data :'bank_ref_no'},
            {data :'card_name'},
            {data :'currency'},
            {data :'amount'},
            {data :'trans_date'},
            {data :'custom_field'},
            {data :'description'},
        ],
        "pageLength": 25
    });

    $('#payments-payment-list tbody').on( 'click', 'tr td:not(:first-child)', function (e) {
        e.preventDefault();

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
        var d = $('#payments-payment-list').DataTable().row( this ).data();
        $('#payments-payment-entry').load('{!!guard_url('payments/payment')!!}' + '/' + d.id);
    });

    $('#payments-payment-list tbody').on( 'change', "input[name^='id[]']", function (e) {
        e.preventDefault();

        aIds = [];
        $(".child").remove();
        $(this).parent().parent().removeClass('parent'); 
        $("input[name^='id[]']:checked").each(function(){
            aIds.push($(this).val());
        });
    });

    $("#payments-payment-check-all").on( 'change', function (e) {
        e.preventDefault();
        aIds = [];
        if ($(this).prop('checked')) {
            $("input[name^='id[]']").each(function(){
                $(this).prop('checked',true);
                aIds.push($(this).val());
            });

            return;
        }else{
            $("input[name^='id[]']").prop('checked',false);
        }
        
    });


    $(".reset_filter").click(function (e) {
        e.preventDefault();
        $("#form-search")[ 0 ].reset();
        $('#form-search input,#form-search select').each( function () {
          oTable.search( this.value ).draw();
        });
        $('#payments-payment-list .reset_filter').css('display', 'none');

    });


    // Add event listener for opening and closing details
    $('#payments-payment-list tbody').on('click', 'td.details-control', function (e) {
        e.preventDefault();
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    });

});
</script>