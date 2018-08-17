@extends('admin.app')
@section('title', 'تقرير')
@section('breadcrumb')
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}">   </a>
    </li>
    <li>تقرير</li>
</ul>
@endsection
@section('content')

<div class="page-fixed-main-content">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe" aria-hidden="true"></i>تقرير</div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body ">
            @if(sizeof($orders)>0)
            <div class="col-md-2">

             
<input type="button" class="btn btn-info"  
        value="اكسل" id="exportToExcel">
  <br>
                <br>
            </div>
            <div id="selectTriggerFilter" class="col-md-6">
                المنطقة
            </div>
            @endif
            <br>
            <br>
            <br>


            <table id="report" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>

                        <th class="hide-exl" style="display: none">المنطقة </th>
                        <th style="">المدينة </th>
                        <th style="">الاسم </th>
                        <th style="">رقم الجوال </th>
                        <th style="">البريد الالكتروني </th>
                        <th style="">الجنسية  </th>
                     
                    </tr>
                </thead>

                <tbody>
                    <?php $co = 1; ?>
                    @foreach($orders as $c)
                    <tr>


                      
                        <td  class='noter hide-exl' data-title="المنطقة" style="display: none">
                            {{$c->area->name}}
                        </td>
                        <td  class='noter' data-title="المدينة">
                            {{$c->city->name}}
                        </td>

                        <td  class='noter' data-title="الاسم">
                            {{$c->name}}
                        </td>
                        
                        <td  style=" mso-number-format:\@;" class='noter' data-title="رقم الجوال">
                            {{$c->mobile}}
                        </td>
                         <td  class='noter' data-title="البريد الالكتروني ">
                            {{$c->email}}
                        </td>
                         <td  class='noter' data-title="البريد الالكتروني ">
                         @if($c->nationalty==1)
                         سعودي
                         @else
                         غير سعودي
                         @endif
                        </td>
                     

                    </tr>




                    <?php $co++; ?>
                    @endforeach  
                </tbody>
            </table>



        </div>
    </div>
</div>
@endsection
@section('js')
<meta name="_token" content="{{ csrf_token() }}" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script type="text/javascript">
var table = $('#report').DataTable({
     "language": {
            "search": "بحث",
            "lengthMenu": "عرض _MENU_ صفوف",
        },
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "الكل"]],
        order: [[0, 'desc']],
    initComplete: function() {
      var column = this.api().column(0);

      var select = $('<select class="filter "><option value=""></option></select>')
        .appendTo('#selectTriggerFilter')
        .on('change', function() {
          var val = $(this).val();
          //column.search(val ? '^' + $(this).val() + '$' : val, true, false).draw();
          column.search(val).draw()
        });

       var offices = []; 
       column.data().toArray().forEach(function(s) {
       		s = s.split(',');
          s.forEach(function(d) {
            if (!~offices.indexOf(d)) {
            	offices.push(d)
              select.append('<option value="' + d + '">' + d + '</option>');                         }
          })
       })    
  		/*      
      column.data().unique().sort().each(function(d, j) {
        select.append('<option value="' + d + '">' + d + '</option>');
      });a
     */
    }
  });
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
        $(".hide-exl").remove();
        var table = $('#report  ');
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