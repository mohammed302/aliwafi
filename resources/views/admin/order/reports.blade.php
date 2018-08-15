@extends('admin.app')
@section('title', 'التقارير  ')
@section('breadcrumb')
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}">   </a>
    </li>
    <li>التقارير</li>
</ul>
@endsection
@section('content')

<div class="page-fixed-main-content">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe" aria-hidden="true"></i>التقارير</div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body ">

<input type="button" class="btn btn-info"  
        value="اكسل" id="exportToExcel">
<br>
<br>
<br>
            <table border="0" cellspacing="5" cellpadding="5">
                <tbody><tr>
                        <td> من:</td>
                        <td><input type="text" id="min" name="min"></td>
                    </tr>
                    <tr >

                        <td>إلى :</td>
                        <td><input type="text" id="max" name="max" style="margin-top: 10px;margin-bottom: 10px;"> </td>
                    </tr>
                </tbody>


                <table id="example3" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>

                            <th >رقم  </th>
                            <th >رقم الطلب </th>
                            <th >التاريخ  </th>
                            <th >تكلفة المشتريات </th>

                            <th >تكلفةالشحن </th>
                            <th >عمولتنا </th>
                            <th >المجموع </th>

                        </tr>
                    </thead>

                    <tbody>
                        <?php $co = 1; ?>
                        @foreach($orders as $c)
                        <tr>

                            <td data-title="رقم ">{{ $co}}</td>

                            <td data-title="رقم الطلب ">{{ $c->id}}</td>

                            <td data-title=" التاريخ ">{{ Carbon\Carbon::parse(   $c->date)->format('Y-m-d') }}
                            </td>
                            <td  class='noter' data-title="تكلفة المشتريات">
                                {{$c->purshase_cost}}
                            </td>
                            <td  class='noter' data-title="تكلفة الشحن">
                                {{$c->charge_cost}}
                            </td>
                            <td  class='noter' data-title="عمولتنا ">
                                {{$c->commission}}
                            </td>
                            <td  class='noter' data-title="الاجمالي ">
                                {{$c->total}}
                            </td>
                        </tr>




                        <?php $co++; ?>
                        @endforeach  
                    </tbody>
                    <tfoot align="right">
                        <tr><th></th><th class="num_order">رقم الطلب</th><th></th><th></th><th></th><th></th><th></th></tr>
                    </tfoot>
                </table>

        </div>
    </div>
</div>
 

@endsection
@section('js')

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/plug-ins/1.10.19/api/sum().js"></script>

<script>

$(document).ready(function () {
    $('#example3 tfoot .num_order').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Search ' + title + '" />');
    });
    $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                var min = $('#min').datepicker("getDate");
                var max = $('#max').datepicker("getDate");
                var startDate = new Date(data[2]);
                startDate.setHours(0, 0, 0, 0);
                //   var startDate=  format(startDate2);
                // alert(startDate);
                if (min == null && max == null) {
                    return true;
                }
                if (min == null && startDate <= max) {
                    return true;
                }
                if (max == null && startDate >= min) {
                    return true;
                }
                if (startDate <= max && startDate >= min) {
                    return true;
                }
                return false;
            }
    );


    $("#min").datepicker({dateFormat: 'yy-mm-dd'}, {onSelect: function () {
            table.draw();
        }, changeMonth: true, changeYear: true});
    $("#max").datepicker({dateFormat: 'yy-mm-dd'}, {onSelect: function () {
            table.draw();
        }, changeMonth: true, changeYear: true});
    var table = $('#example3').DataTable({
        dom: 'Bfrtip',
        "language": {
            "search": "بحث",
            "lengthMenu": "عرض _MENU_ صفوف",
        },
       buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "الكل"]],
        order: [[0, 'desc']],
        drawCallback: function () {
            var api = this.api();
            /* $( api.table().footer() ).html(
             api.column( 4, {page:'current'} ).data().sum()
             
             );*/
            $(api.column(3).footer()).html(api.column(3, {page: 'current'}).data().sum());
            $(api.column(4).footer()).html(api.column(4, {page: 'current'}).data().sum());
            $(api.column(5).footer()).html(api.column(5, {page: 'current'}).data().sum());
            $(api.column(6).footer()).html(api.column(6, {page: 'current'}).data().sum());
        },
     
        "processing": true,
    });

    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').change(function () {
        table.draw();
    });

    table.columns().every(function () {
        var that = this;

        $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that
                        .search(this.value)
                        .draw();
            }
        });
    });
});

///

</script>
<script type="text/javascript">

var tableToExcel = (function () {
    var uri = 'data:application/vnd.ms-excel;base64,',
        template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>',
        base64 = function (s) {
            return window.btoa(unescape(encodeURIComponent(s)))
        }, format = function (s, c) {
            return s.replace(/{(\w+)}/g, function (m, p) {
                return c[p];
            })
        }
    return function (table, name, filename) {
        if (!table.nodeType) table = document.getElementById(table)
        var ctx = {
            worksheet: name || 'Worksheet',
            table: table.innerHTML
        }
   document.getElementById("dlink").href = uri + base64(format(template, ctx));
            document.getElementById("dlink").download = filename;
            document.getElementById("dlink").click();
    }
})();
 $('#exportToExcel').on('click', function () {
       // debugger;
        var a = document.createElement('a');
        var data_type = 'data:application/vnd.ms-excel';
        var table = $('#example3  ');
        // var Header = table.find('th');
       var table_html = '<table> <thead><tr><th> تقرير عام </th>'; //<th>رقم الطلب</th><th> التاريخ </th><th> نكلفة المشتريات</th><th>تكلفة الشحن</th><th>العمولة</th><th>المجموع</th></tr></thead></table>';
    
   //table= table.replace(/<\/?tfoot>/g, '');
    table_html =table_html+ table[0].outerHTML.replace(/ /g, '%20');
        a.href = data_type + ', ' + table_html;
        a.download = 'تقرير.xls';
        a.click();
     //  window.open('data:application/vnd.ms-excel,' + encodeURIComponent(table[0].outerHTML));
    });

    </script>

@endsection