@extends('admin.app')
@section('title', 'عرض  المسجلين')
@section('breadcrumb')
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}">   </a>
    </li>
    <li>المسجلين</li>
</ul>
@endsection
@section('content')

<div class="page-fixed-main-content">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe" aria-hidden="true"></i>المسجلين</div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body ">
            @if(sizeof($orders)>0)
            <div class="col-md-2">

                <a href="#" value="{{route("admins.allorders.destroy")}}" class="btn blue 
                   delete-post-all">حذف كل المسجلين</a>
                <br>
                <br>
                <br>
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


            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>


                        <th style="">رقم الطلب </th>
                        <th style="">الاسم </th>
                        <th style="">المنطقة </th>
                        <th style="">المدينة </th>
                        <th style="">رقم الجوال </th>
                        <th style="">البريد الالكتروني </th>
                        <th style="">الجنسية  </th>
                        <th>خيارات</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $co = 1; ?>
                    @foreach($orders as $c)
                    <tr>


                        <td data-title="رقم ">{{ $c->id}}</td>


                        <td  class='noter' data-title="الاسم">
                            {{$c->name}}
                        </td>
                        <td  class='noter' data-title="المنطقة">
                            {{$c->area->name}}
                        </td>
                        <td  class='noter' data-title="المدينة">
                            {{$c->city->name}}
                        </td>
                        <td   style=" mso-number-format:\@;" class='noter' data-title="رقم الجوال">
                          {{$c->mobile. ''}}
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
                        <td data-title="خيارات">

                            <a class=" delete-post-link btn btn-warning" 
                               data-id="{{$c->id}}" 
                               value="{{route("admins.orders.destroy",["order" =>$c])}}"   >
                                <span class="glyphicon glyphicon-trash"></span> حذف</a>
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
<script>
$('#example tbody').on('click', '.delete-post-link', function (e) {
    var that = this;
    swal({
        title: "هل انت متاكد",
        text: "هل تريد حذف المسجل؟",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: '#DD6B55',
        confirmButtonText: "نعم!",
        cancelButtonText: "لا!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function (isConfirm) {
        if (isConfirm) {


            $.ajax({
                method: 'get',
                url: $(that).attr('value'),
                data: {
                    _token: $(that).data('token')
                },
                success: function (data) {


                    swal("تم الحذف!", "تم حذف  بنجاح.", "success");
                    $(that).closest('tr').remove();
                }

            });
        } else {
            //   t=1;
            swal("تم الالغاء", "تم الغاء الحذف", "error");
        }
    }
    );
});
$('.delete-post-all').on('click', function (e) {
    var that = this;
    swal({
        title: "هل انت متاكد",
        text: "هل تريد حذف جميع المسجلين؟",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: '#DD6B55',
        confirmButtonText: "نعم!",
        cancelButtonText: "لا!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function (isConfirm) {
        if (isConfirm) {


            $.ajax({
                method: 'get',
                url: $(that).attr('value'),
                data: {
                    _token: $(that).data('token')
                },
                success: function (data) {


                    swal("تم الحذف!", "تم حذف  بنجاح.", "success");
                    $("#example tbody").remove()


                }

            });
        } else {
            //   t=1;
            swal("تم الالغاء", "تم الغاء الحذف", "error");
        }
    }
    );
});
///
// Edit a order
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
        var table = $('#example  ');
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