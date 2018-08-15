<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Page title -->
        <title>{{$setting->name}}</title>
        <!-- /Page title -->

        <!-- CSS Files
        ========================================================= -->


        <link rel="stylesheet" type="text/css" href="{{asset('style/front/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('style/front/css/style.css?v=5')}}">
        <style>

        </style>
    </head>
    <body>



        <!-- Nav -->
        <nav class="navbar navbar-default mainNav inside" style="

             ">
            <div class="container">
                <div class="navbar-header">

                    <a class="navbar-brand" href="{{route('front.index')}}" >
                        {{$setting->name}}
                    </a>
                </div>

            </div><!-- /.container -->
        </nav>
        <!--nav-->

        <div class="panel panel-default help-text">
            <div class="panel-body">{{$setting->home_text}}</div>
        </div>

        <div class="text-center img-text">
            <img src="{{asset('img/bg.jpg')}}" class="img-responsive">
        </div>
        <!--form-->
        <form class="form-horizontal" method="post" role="form"
              id="orderform" action="{{route('front.order')}}" role="form">
            {{ csrf_field() }}
            <div class="form-body">
                <div class="form-group">

                    <div class="col-md-6 col-sm-6 small-margin">

                        <input type="text" class="form-control input-medium"
                               name="name" placeholder="الاسم ثلاثي" required="">

                    </div>
                    <div class="col-md-6 col-sm-6 small-margin">
                        <select class="form-control input-medium"  id='area' name='area'>

                            <option   value="-1">
                                اختر   المنطقة </option>
                            <option   value="1">
                                اختر   المنطقة </option>



                        </select>
                    </div>

                </div>
                <div class="form-group ">

                    <div class="col-md-6 col-sm-6 small-margin">
                        <select class="form-control input-medium"  id='city' name='city'>

                            <option   value="-1">
                                اختر   المدينة </option>
                            <option   value="1">
                                اختر   المنطقة </option>



                        </select>
                    </div>
                    <div class="col-md-6 col-sm-6 small-margin">
                        <select class="form-control input-medium"  id='nationality' name='nationality'>

                            <option   value="-1">
                                اختر   الجنسية </option>
                            <option   value="1">
                                سعودي </option>
                            <option   value="2">
                                غير سعودي </option>


                        </select>
                    </div>


                </div> 
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 small-margin">

                        <input type="text" class="form-control input-medium"
                               name="tel" minlength="10" maxlength="10" placeholder=" رقم الجوال  9665XXXXXXXX" required="">

                    </div>
                    <div class="col-md-6 col-sm-6 small-margin">

                        <input type="email" class="form-control input-medium"
                               name="email" minlength="10" maxlength="10" placeholder=" البريد الإلكتروني" required="">

                    </div>
                </div>
            </div>

            <div class="form-actions">
                <div class="row">
                    <div class=" col-md-12" >
                        <button type="submit" class="btn btn-submit" >أرسل طلب</button>
                        <div class="alertm text-center hide">
                            {{$setting->google}}
                        </div>

                    </div>
                </div>
            </div>
        </form>
        <!--end form-->
        <!-- Footer -->
        <footer class="page-footer font-small blue">

            <!-- Copyright -->
            <div class="footer-copyright text-center py-3"> جميع الحقوق محفوظة:
               {{$setting->name}}© 2018
            </div>
            <!-- Copyright -->

        </footer>
        <!-- Footer -->
        <!-- Javascript Files
        ========================================================= -->
        <!-- Jquery -->
        <script src="{{asset('style/front/js/jquery-3.2.1.min.js')}}"></script>

        <!-- /Jquery -->
        <!-- Bootstrap Js -->
        <script src="{{asset('style/front/js/bootstrap.min.js')}}"></script>
        <!-- Bootstrap Js -->


        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
        <script src="{{asset('style/assets/global/scripts/jquery.validate.min.js')}}"></script>

        <script type="text/javascript">
$.validator.addMethod("valueNotEquals", function (value, element, arg) {
    return arg != value;
}, "Value must not equal arg.");
$("#orderform").validate({
    rules: {
        field: {
            required: true,
        },
        tel: {
            number: true,
        },
        area: {
            valueNotEquals: "-1"
        },
        city: {
            valueNotEquals: "-1"
        },
        nationality: {
            valueNotEquals: "-1"
        }
    },
    messages: {// custom messages for radio buttons and checkboxes

        name: {
            required: "يرجى ادخال الاسم "

        },
        email: {
            required: "يرجى ادخال البريد الالكتروني "

        },
        tel: {
            required: "يرجى ادخال رقم ",
            number: "يرجى ادخال رقم صحيح بدون احرف ",
            minlength: "الرقم يجب ان يكون 10  رقم",
            maxlength: "الرقم يجب ان يكون 10  رقم",
        },
        area: {
            valueNotEquals: "اختر المنطقة"
        },
        city: {
            valueNotEquals: "اختر المدينة"
        },
        nationality: {
            valueNotEquals: "اختر الجنسية"
        }
    },
    submitHandler: function (form) {
        var _token = $("input[name='_token']").val();
        var name = $("input[name='name']").val();
        var address = $("input[name='address']").val()
        var tel = $("input[name='tel']").val();
        var link = $("input[name='link']").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").attr('content')
            }
        });
        $.ajax({
            url: "{{route('front.order')}}",
            type: 'post',
            data: {_token: _token, name: name, address: address, tel: tel, link: link},
            success: function (data) {
                $(".alertm").removeClass('hide')
                $(".alertm").removeClass('hida')
                $(".alertm").fadeTo(2000, 500).slideUp(20500, function () {
                    $(".alertm").slideUp(20500);
                });

                //    toastr.info(' {{$setting->google}}');
                $('#orderform')[0].reset();
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

// $("#orderform").validate();            // <- INITIALIZES PLUGIN

//    console.log($("#orderform").valid());  // <- TEST VALIDATION

        </script>
    </body>
</html>