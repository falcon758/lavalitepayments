<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <i class="fa fa-file-text-o"></i> {!! trans('payments::transaction.name') !!} <small> {!! trans('app.manage') !!} {!! trans('payments::transaction.names') !!}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{!! guard_url('/') !!}"><i class="fa fa-dashboard"></i> {!! trans('app.home') !!} </a></li>
            <li class="active">{!! trans('payments::transaction.names') !!}</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div id='payments-transaction-entry'>
    </div>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                    <li class="{!!(request('status') == '')?'active':'';!!}"><a href="{!!guard_url('payments/transaction')!!}">{!! trans('payments::transaction.names') !!}</a></li>
                    <li class="{!!(request('status') == 'archive')?'active':'';!!}"><a href="{!!guard_url('payments/transaction?status=archive')!!}">Archived</a></li>
                    <li class="{!!(request('status') == 'deleted')?'active':'';!!}"><a href="{!!guard_url('payments/transaction?status=deleted')!!}">Trashed</a></li>
                    <li class="pull-right">
                    <span class="actions">
                    <!--   
                    <a  class="btn btn-xs btn-purple"  href="{!!guard_url('payments/transaction/reports')!!}"><i class="fa fa-bar-chart" aria-hidden="true"></i><span class="hidden-sm hidden-xs"> Reports</span></a>
                    @include('payments::admin.transaction.partial.actions')
                    -->
                    @include('payments::admin.transaction.partial.filter')
                    @include('payments::admin.transaction.partial.column')
                    </span> 
                </li>
            </ul>
            <div class="tab-content">
                <table id="payments-transaction-list" class="table table-striped data-table">
                    <thead class="list_head">
                        <th style="text-align: right;" width="1%"><a class="btn-reset-filter" href="#Reset" style="display:none; color:#fff;"><i class="fa fa-filter"></i></a> <input type="checkbox" id="payments-transaction-check-all"></th>
                        <th>{!! trans('payments::transaction.label.user_type')!!}</th>
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
    app.load('#payments-transaction-entry', '{!!guard_url('payments/transaction/0')!!}');
    oTable = $('#payments-transaction-list').dataTable( {
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
        "sAjaxSource": '{!! guard_url('payments/transaction') !!}',
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
            {data :'user_type'},
            {data :'seller_id'},
            {data :'amount'},
            {data :'tax_amount'},
            {data :'tax_type'},
            {data :'type'},
            {data :'bank_ref'},
            {data :'details'},
            {data :'date_from'},
            {data :'date_to'},
            {data :'commission'},
        ],
        "pageLength": 25
    });

    $('#payments-transaction-list tbody').on( 'click', 'tr td:not(:first-child)', function (e) {
        e.preventDefault();

        oTable.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
        var d = $('#payments-transaction-list').DataTable().row( this ).data();
        $('#payments-transaction-entry').load('{!!guard_url('payments/transaction')!!}' + '/' + d.id);
    });

    $('#payments-transaction-list tbody').on( 'change', "input[name^='id[]']", function (e) {
        e.preventDefault();

        aIds = [];
        $(".child").remove();
        $(this).parent().parent().removeClass('parent'); 
        $("input[name^='id[]']:checked").each(function(){
            aIds.push($(this).val());
        });
    });

    $("#payments-transaction-check-all").on( 'change', function (e) {
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
        $('#payments-transaction-list .reset_filter').css('display', 'none');

    });


    // Add event listener for opening and closing details
    $('#payments-transaction-list tbody').on('click', 'td.details-control', function (e) {
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
