@extends('admin.app')
@section('title', 'عرض  الطلبات')
@section('breadcrumb')
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}">   </a>
    </li>
    <li>الطلبات</li>
</ul>
@endsection
@section('content')

<div class="page-fixed-main-content">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe" aria-hidden="true"></i>الطلبات</div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body ">
               @if(sizeof($orders)>0)
            <div class="col-md-2">
             
                <a href="#" value="{{route("admins.allorders.destroy")}}" class="btn blue 
                   delete-post-all">حذف كل الطلبات</a>

            </div>
            <div id="selectTriggerFilter" class="col-md-6">
                المتجر
            </div>
            @endif
            <br>
            <br>
            <br>

            <ul class="nav nav-tabs">
                <li class=" @if(Request::segment(2)=='orders' && Request::segment(3)==''  )
                    active
                    @endif "><a href="{{route('admin.orders')}}">كل الحالات</a></li>
              <?php $i=0;?>
                @foreach($states as $state)
                <li class=" @if(Request::segment(3)==$state->id  )
                    active
                    @endif ">
                    @if($i!=2  )
                    @if($state->id!=13)
                    <a href="{{route('admins.orders.search',$state->id)}}">{{$state->name}}</a>
                     </li>
                    @endif
                @else
                  <li class=" @if(Request::segment(3)==$state->id  )
                    active
                    @endif ">
                      <a href="{{route('admins.orders.search',$states[9]->id)}}">{{$states[9]->name}}</a></li>
                  <li class=" @if(Request::segment(3)==$state->id  )
                    active
                    @endif ">
                  <a href="{{route('admins.orders.search',$state->id)}}">{{$state->name}}</a>
                  </li>
                @endif
               
                <?php $i++;?>
                @endforeach

            </ul>
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>


                        <th style="width: 10%">رقم الطلب </th>
                        <th style="width: 15%">الاسم </th>

                        <th style="width: 10%">المتجر </th>
                        <th style="width: 20%">الحالة </th>

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
                        <td  class='noter' data-title="الاسم">
                            {{$c->store_name->name}}
                        </td>
                        <td  class='noter' data-title="الحالة">
                            <select class="form-control input-medium"  id='type' name='state'>
                                @foreach($states as $state)
                                @if($state->id!=8 && $state->id!=9 && $state->id!=5)
                                <option   value="{{route("admins.order.update",["id" =>$c,"st"=>$state->id])}}"
                                          @if($state->id==$c->status_id) selected @endif>{{$state->name}}</option>
                                @elseif($state->id==9)
                                <option   value="{{route("admins.order.updateCharge",["id" =>$c])}}"
                                          @if($state->id==$c->status_id) selected @endif>{{$state->name}}</option>
                                @elseif($state->id==8)
                                <option   value="{{route("admins.order.updateOrder",["id" =>$c])}}"
                                          @if($state->id==$c->status_id) selected @endif>{{$state->name}}</option>
                                @elseif($state->id==5)
                                <option   value="{{route("admins.order.updateCost",["id" =>$c])}}"
                                          @if($state->id==$c->status_id) selected @endif>{{$state->name}}</option>
                                @endif
                                @endforeach      
                            </select>




                        </td>

                        <td data-title="خيارات">





                            <a class="edit-modal2 btn btn-success " 
                               data-id="{{$c->id}}" data-name="{{$c->name}}" 
                               data-whatsup="{{$c->whatsup}}"  
                               data-address="{{$c->address}}"
                               data-link="{{$c->link}}"
                               <?php Carbon\Carbon::setLocale('ar'); ?>
                               data-date="   {{ Carbon\Carbon::parse($c->date)->diffForHumans() }}"
                               data-state="{{$c->state->name}}"
                               data-ord="{{$c->order}}"
                               data-chr="{{$c->charge}}"
                               data-whatslink="https://wa.me/{{$c->whatsup}}?text=شكرا لطلبك من  هاتلي, نتواصل معك بخصوص طلبك رقم -{{$c->id}}"
                               data-toggle="collapse" data-target="#demo{{$co}}" >
                                <span class="glyphicon glyphicon-edit" ></span> عرض</a></li>
                            <a class=" delete-post-link btn btn-warning" 
                               data-id="{{$c->id}}" 
                               value="{{route("admins.orders.destroy",["order" =>$c])}}"

                               >
                                <span class="glyphicon glyphicon-trash"></span> حذف</a>






                            <div id="demo{{$co}}" class="collapse" style="width:100%">
                                <form class="form-horizontal" >
                                    <div class="form-body">
                                        <br>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">
                                                رقم الطلب

                                            </label>
                                            <div class="col-md-6 padding-top">

                                                {{$c->id}} 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6  control-label">
                                                اسم 

                                            </label>
                                            <div class="col-md-6  padding-top">

                                                {{$c->name}} 
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="col-md-6  control-label">
                                                رقم الواتساب

                                            </label>
                                            <div class="col-md-6 padding-top ">

                                                {{$c->whatsup}} 

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6  control-label">
                                                العنوان

                                            </label>
                                            <div class="col-md-6 padding-top">

                                                {{$c->address}} 

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12  control-label text-center" style="
                                                   text-align: center;
                                                   ">
                                                المنتجات

                                            </label>



                                            <table class="table table-bordered"style="
                                                   margin: 0 auto; width: 96%;
                                                   ">
                                                <thead>
                                                    <tr>
                                                        <th>الرابط</th>
                                                        <th>اللون</th>
                                                        <th>المقاس</th>
                                                        <th>العدد</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($c->products as $product)
                                                    <tr>
                                                        <td> {{$product->link}}</td>
                                                        <td> {{$product->color}}</td>
                                                        <td> {{$product->size}}</td>
                                                        <td>   {{$product->count}}</td>
                                                    </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>

                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-6  control-label">
                                                تاريخ الطلب

                                            </label>
                                            <div class="col-md-6  padding-top">
                                                <?php Carbon\Carbon::setLocale('ar'); ?>
                                                {{ Carbon\Carbon::parse($c->date)->diffForHumans() }}

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6  control-label">
                                                حالة الطلب

                                            </label>
                                            <div class="col-md-6 padding-top">
                                                {{$c->state->name}}

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6  control-label">
                                                رقم  الطلب من الموقع

                                            </label>
                                            <div class="col-md-6  padding-top">
                                                {{$c->order}}

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6  control-label">
                                                رقم الشحنة

                                            </label>
                                            <div class="col-md-6  padding-top">
                                                {{$c->charge}}

                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-6  control-label">
                                              تكلفة المشتريات

                                            </label>
                                            <div class="col-md-6  padding-top">
                                                {{$c->purshase_cost}}

                                            </div>
                                        </div>
                                           <div class="form-group">
                                            <label class="col-md-6  control-label">
                                           تكلفة الشحن

                                            </label>
                                            <div class="col-md-6  padding-top">
                                                {{$c->charge_cost}}

                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-6  control-label">
                                        العمولة

                                            </label>
                                            <div class="col-md-6  padding-top">
                                                {{$c->commission}}

                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="col-md-6  control-label">
                                        الاجمالي

                                            </label>
                                            <div class="col-md-6  padding-top">
                                                {{$c->total}}

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6  control-label">
                                                ارسل رسالة

                                            </label>
                                            <div class="col-md-6 padding-top ">

                                                <a href="https://wa.me/{{$c->whatsup}}?text=شكرا لطلبك من  هاتلي, نتواصل معك بخصوص طلبك رقم -{{$c->id}}" target="_blank">أرسل</a>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </td>

                    </tr>




                    <?php $co++; ?>
                    @endforeach  
                </tbody>
            </table>
            <div id="stateModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3 class="modal-title"></h3>
                        </div>
                        <form class="form-horizontal" role="form" id='or' action="">
                            <div class="modal-body">

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="id">رقم الطلب:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name='order' id="order" required="">
                                    </div>
                                </div>


                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" >
                                        حفظ
                                    </button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                                        <span class='glyphicon glyphicon-remove'></span> اغلاق
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
            <div id="chargeModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3 class="modal-title"></h3>
                        </div>
                        <form class="form-horizontal" role="form" id='ch' >
                            <div class="modal-body">

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="id">رقم الشحنة:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name='charge' class="form-control" id="charge" required="">
                                    </div>
                                </div>


                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-success" >
                                        حفظ
                                    </button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                                        <span class='glyphicon glyphicon-remove'></span> اغلاق
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 

            <div id="costModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3 class="modal-title"></h3>
                        </div>
                        <form class="form-horizontal" role="form" id='ct' >
                            <div class="modal-body">

                                <div class="form-group">
                                    <label class="control-label col-sm-3" >تكلفة المشتريات :</label>
                                    <div class="col-sm-9">
                                        <input type="number" name='purshase_cost' class="form-control" id="purshase_cost" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" > تكلفة الشحن:</label>
                                    <div class="col-sm-9">
                                        <input type="number" name='charge_cost' class="form-control" 
                                               id="charge_cost" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" > العمولة :</label>
                                    <div class="col-sm-9">
                                        <input type="number" name='commission' class="form-control" 
                                               id="commission" required="">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="control-label col-sm-3" > الإجمالي :</label>
                                    <div class="col-sm-9">
                                        <input type="number" name='total' class="form-control" 
                                               id="total" required="">
                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-success" >
                                        حفظ
                                    </button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                                        <span class='glyphicon glyphicon-remove'></span> اغلاق
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 

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
        text: "هل تريد حذف الطلب؟",
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
        text: "هل تريد حذف جميع الطلبات؟",
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
$(document).on('click', '.edit-modal', function () {
    $('.modal-title').text('عرض الطلب');
    $('#id_edit').val($(this).data('id'));
    $('#name_edit').val($(this).data('name'));
    $('#tel_edit').val($(this).data('whatsup'));
    $('#link_edit').val($(this).data('link'));
    document.getElementById("linkc").href = $(this).data('link');
    $('#address_edit').val($(this).data('address'));
    $('#date_edit').val($(this).data('date'));
    $('#state_edit').val($(this).data('state'));

    $('#or_edit').val($(this).data('ord'));
    $('#ch_edit').val($(this).data('chr'));

    id = $('#id_edit').val();
    document.getElementById("tel").href = $(this).data('whatslink')
    $('#editModal').modal('show');
});</script>




<script type="text/javascript">
    var that;
    $("select[name='state']").change(function () {


        var url = $(this).val();
        var n = url.includes("Order");
        var n2 = url.includes("Charge");
         var n3 = url.includes("Cost");
         var n7 = url.includes("7");
        if (n2) {
            $('#chargeModal').modal('show');
            $('#ch').attr('action', url);

        }
        if (n) {
            $('#stateModal').modal('show');
            $('#or').attr('action', url);
        }
          if (n3) {
            $('#costModal').modal('show');
            $('#ct').attr('action', url);
        }
           if (n7) {
                swal("تحذير !", "هذه الحالة من اختصاص فريق الدفع   .", "error");
        }
        that = this;
        var hide = this;
        if (!n && !n2  && !n3 &!n7) {
            $.ajax({
                url: url,
                method: 'get',
                success: function (data) {
                    swal("تم !", "تم تعديل  بنجاح.", "success");
                            @if (Request::segment(2) == 'orders' && Request::segment(3) != '')
                            $(that).closest('tr').remove();
                            @endif

                }
            });
        }

    });


  $("#ct").validate({
        rules: {
            field: {
                required: true,
            },
         
        },
        messages: {// custom messages for radio buttons and checkboxes

            purshase_cost: {
                required: "يرجى ادخال تكلفة المشتريات ",
              

            },
             charge_cost: {
                required: "يرجى ادخال تكلفة الشحن ",
              

            },
             commission: {
                required: "يرجى ادخال تكلفة العمولة ",
              

            },
             total: {
                required: "يرجى ادخال المجموع ",
              

            },
        },
        submitHandler: function (form) {
            var _token = $("input[name='_token']").val();
            var purshase_cost = $("input[name='purshase_cost']").val();
            var charge_cost = $("input[name='charge_cost']").val();
            var commission = $("input[name='commission']").val();
            var total= $("input[name='total']").val();
            $.ajax({
                url: $('#ct').attr('action'),
                type: 'get',
                data: {_token: _token, purshase_cost: purshase_cost,charge_cost:charge_cost,total:total,commission:commission},
                success: function (data) {


                    swal("تم !", "تم تعديل  بنجاح.", "success");
                    $('#ct')[0].reset();
                    $('#costModal').modal('hide');
                            @if (Request::segment(2) == 'orders' && Request::segment(3) != '')
                            $(that).closest('tr').remove();
                            @endif
                            alert(hide);
                },
                error: function (data)
                {
                    console.log(data);
                    var dt = '';
                    $.each(data.responseJSON, function (key, value) {
                        dt = dt + '<li>' + value + '</li>';
                    });
                    toastr.error(dt);


                }
            });
            // form.submit();

        }
    });
    $("#ch").validate({
        rules: {
            field: {
                required: true,
            },
            charge: {
                number: true

            },
        },
        messages: {// custom messages for radio buttons and checkboxes

            charge: {
                required: "يرجى ادخال رقم الشحنة ",
                number: "ادخل رقم"

            },
        },
        submitHandler: function (form) {
            var _token = $("input[name='_token']").val();
            var ch = $("input[name='charge']").val();



            $.ajax({
                url: $('#ch').attr('action'),
                type: 'get',
                data: {_token: _token, charge: ch},
                success: function (data) {


                    swal("تم !", "تم تعديل  بنجاح.", "success");
                    $('#ch')[0].reset();
                    $('#chargeModal').modal('hide');
                            @if (Request::segment(2) == 'orders' && Request::segment(3) != '')
                            $(that).closest('tr').remove();
                            @endif
                            alert(hide);
                },
                error: function (data)
                {
                    console.log(data);
                    var dt = '';
                    $.each(data.responseJSON, function (key, value) {
                        dt = dt + '<li>' + value + '</li>';
                    });
                    toastr.error(dt);


                }
            });
            // form.submit();

        }
    });

    $("#or").validate({
        rules: {
            field: {
                required: true,
            },
            order: {
                number: true

            },
        },
        messages: {// custom messages for radio buttons and checkboxes

            order: {
                required: "يرجى ادخال رقم الطلب ",
                number: "ادخل رقم"

            },
        },
        submitHandler: function (form) {
            var _token = $("input[name='_token']").val();
            var or = $("input[name='order']").val();



            $.ajax({
                url: $('#or').attr('action'),
                type: 'get',
                data: {_token: _token, order: or},
                success: function (data) {



                    $('#ch')[0].reset();
                    $('#stateModal').modal('hide');
                    swal("تم !", "تم تعديل  بنجاح.", "success");
                            @if (Request::segment(2) == 'orders' && Request::segment(3) != '')

                            $(that).closest('tr').remove();
                            @endif
                },
                error: function (data)
                {
                    console.log(data);
                    var dt = '';
                    $.each(data.responseJSON, function (key, value) {
                        dt = dt + '<li>' + value + '</li>';
                    });
                    toastr.error(dt);


                }
            });
            // form.submit();

        }
    });
</script>
@endsection