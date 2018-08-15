@extends('admin.app')
@section('title', 'عرض  المستخدمين')
@section('breadcrumb')
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}">   </a>
    </li>
    <li>المستخدمين</li>
</ul>
@endsection
@section('content')
<div class="page-fixed-main-content">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-users" aria-hidden="true"></i>المستخدمين</div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body ">
            <a href="{{ Route('users.create')}}" class="btn blue">إضافة</a>
            <br>
            <br>
            <div class="flash-message">
                @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                @if(Session::has('alert-' . $msg))

                <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
                @endforeach
            </div>  
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>

                        <th >رقم </th>
                        <th >الاسم</th>
                        <th >البريد</th>
                        <th >الهاتف</th>
                        <th>خيارات</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $co = 1; ?>
                    @foreach($users as $c)
                    <tr>

                        <td data-title="رقم ">{{ $co}}</td>
                        <td  class='noter' data-title="الاسم">{{$c->name }}
                        </td>
                        <td  class='noter' data-title="البريد الإلكتروني">{{$c->email }}</td>
                        <td  class='noter' data-title=" رقم الهاتف">{{$c->tel }}</td>
                        <td data-title="خيارات">
@if($c->orders==null)

                            <a 
                                data-token="{{ csrf_token() }}" 
                                value='{{route("users.destroy",["user" =>$c])}}'
                                data-id="{{ $c->id }}" 
                                class="delete-post-link"
                                > <i class="fa fa-trash" aria-hidden="true"></i>
                            </a>
@else
المستخدم لديه طلبات لايمكن حذفه
@endif
                            <a href="{{route("users.edit",["user" =>$c])}}" >
                                <i class="fa fa-pencil" aria-hidden="true"></i></a>



                        </td>
                    </tr>
                    <?php $co++; ?>
                    @endforeach  
                </tbody>
            </table></div>
    </div>
</div>
@endsection
@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>

 $('#example tbody').on('click', '.delete-post-link', function (e) {
    var that = this;

    swal({
        title: "هل انت متاكد",
        text: "هل تريد حذف المستخدم؟",
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
            var country = $(that).attr("value")

            $.ajax({
                method: 'delete',
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
</script>
@endsection