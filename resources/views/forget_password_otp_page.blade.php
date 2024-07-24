{{-- @extends('layouts.master') --}}

{{-- @section('title','Forget Password') --}}

{{-- @section('content') --}}
{{-- <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" /> --}}

<link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- preloader css -->
        <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        {{-- Toastr css --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">

           {{-- toastr --}}
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

   <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>

<body>
        <style>
             .blur{
                filter: blur(5px);
            }
        </style>

    {{--font awesome css  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="modal fade bs-example-modal-center" id="viewUserDetails" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">User Profile View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body display-user-data">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


    <!-- ============ Forget Password Otp Modal Start========== -->
        <div class="modal  fade bs-example-modal-center" id="Forget-OTP-modal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="forgetotpModalLabel"  role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content position-relative">

                <div class="modal-header">
                    <div class="mb-2 mb-md-3 text-center" >
                        <a href="javascript:void(0);" class="d-block auth-logo">
                            <img src="assets/images/iCourtLogo.jpg" style="width: 100px" alt="logo" />
                            {{-- <span class="logo-txt">ICourt</span> --}}

                            </a>
                            </div>
                            <div class="" style="text-align: right;">
                                <button type="button" class="btn-close Forget-OTP-modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                </div>

                                <div class="modal-header border-0">
                                    <h5 class="modal-title">
                            <span class="modial-head">Verification!</span>
                            <p class="sub-modal-title otp-sub-modal-title col-9 position-relative">We have sent a 4 digit
                                code to your email <strong style="color:blue;">{{$email_address}}</strong></p>
                        </h5>
                    </div>
                    <div class="modal-body">

                        <p id="forgetmessage_error" style="color:red;"></p>
                        <p id="forgetmessage_success" style="color:green;"></p>
                        <div id="forgetotptimerid">
                            <p class="forgettime" style="color:green;"></p>
                        </div>

                        <form action="" id="forgetmyOtp">
                            <div class="form-box">
                                <div class="row">
                                    <div class="col-10 mx-auto">
                                        <input type="hidden" class="form-control" id="forget_phone_modal" value="{{$email_address}}"
                                        name="phone" readonly>
                                        <div id="otp" class=" otp-inputs d-flex flex-row justify-content-center mt-2">
                                            <input class="m-2 text-center form-control rounded" type="text" id="forgetfirst" onkeypress="return (event.charCode >47 && event.charCode < 58)" maxlength="1" required/>
                                            <input class="m-2 text-center form-control rounded" type="text" id="forgetsecond" onkeypress="return (event.charCode >47 && event.charCode < 58)" maxlength="1" required/>
                                            <input class="m-2 text-center form-control rounded" type="text" id="forgetthird" onkeypress="return (event.charCode >47 && event.charCode < 58)" maxlength="1" required/>
                                            <input class="m-2 text-center form-control rounded" type="text" id="forgetfourth" onkeypress="return (event.charCode >47 && event.charCode < 58)" maxlength="1" required/>
                                        </div>

                                        <p class="error" id="forget-phone-error-message" style="color:red; font-size:12px;"></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 ">
                                        <p class="sub-modal-title otp-sub-modal-title text-end"> Didn’t receive it?<a
                                                href="javascript:void(0)" id="forgetresendOtpVerification">Resend Verification OTP</a></p>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary forget-verify-phone-model-form" type="button">Submit</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    <!-- ============ Forget Password Otp Modal End========== -->

    <!-- ===========Make New Password Model=============== -->
        <div class="modal  fade " id="Make-new-password" tabindex="-1" data-bs-backdrop="static" aria-labelledby="makenewpasswordModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content position-relative p-md-4">
                    <div class="pattern-modal-top">
                        <div class="pb-2" style="text-align: right;">
                            <button type="button" class="btn-close Forget-OTP-modal-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="mb-4 mb-md-5 text-center py-2" style="min-height:60px;">
                            <a href="javascript:void(0);" class="d-block auth-logo">
                                <img src="" alt=""> <span class="logo-txt"><span class="logo-txt">ICourt</span>

                            </a>
                        </div>
                    </div>
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="makenewpasswordModalLabel">
                            <span class="modial-head">Make New Password</span>
                        </h5>
                    </div>
                    <div class="modal-body">

                        <form class="Make-new-password-form" action="{{url('/reset-password')}}" method="post" onsubmit="return forgetcheckPassword()">
                            @csrf
                            <div class="form-box">
                                {{-- <input type="hidden" class="form-control" id="forget_phone_modal_email" value=""
                                    name="email_id" readonly> --}}
                                    <input type="hidden" name="email_address" value="{{ $email_address }}">

                                    {{-- <input type="hidden" class="form-control" id="forget_phone_modal_email" value="{{ $user->email_id }}" name="email_id" readonly> --}}


                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-3 position-relative">
                                            <span class="input-group-text" id="basic-addon1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="19"
                                                    viewBox="0 0 9 12" fill="none">
                                                    <path
                                                        d="M4.5 0C2.625 0 1.125 1.5 1.125 3.375V4.875C0.4875 4.875 0 5.3625 0 6V10.875C0 11.5125 0.4875 12 1.125 12H7.875C8.5125 12 9 11.5125 9 10.875V6C9 5.3625 8.5125 4.875 7.875 4.875V3.375C7.875 1.5 6.375 0 4.5 0ZM8.25 6V10.875C8.25 11.1 8.1 11.25 7.875 11.25H1.125C0.9 11.25 0.75 11.1 0.75 10.875V6C0.75 5.775 0.9 5.625 1.125 5.625H1.5H7.5H7.875C8.1 5.625 8.25 5.775 8.25 6ZM1.875 4.875V3.375C1.875 1.9125 3.0375 0.75 4.5 0.75C5.9625 0.75 7.125 1.9125 7.125 3.375V4.875H1.875Z"
                                                        fill="#2C3DEE" />
                                                    <path
                                                        d="M4.5 6.75C3.8625 6.75 3.375 7.2375 3.375 7.875C3.375 8.3625 3.675 8.775 4.125 8.925V9.75C4.125 9.975 4.275 10.125 4.5 10.125C4.725 10.125 4.875 9.975 4.875 9.75V8.925C5.325 8.775 5.625 8.3625 5.625 7.875C5.625 7.2375 5.1375 6.75 4.5 6.75ZM4.5 8.25C4.275 8.25 4.125 8.1 4.125 7.875C4.125 7.65 4.275 7.5 4.5 7.5C4.725 7.5 4.875 7.65 4.875 7.875C4.875 8.1 4.725 8.25 4.5 8.25Z"
                                                        fill="#2C3DEE" />
                                                </svg>
                                            </span>

                                            <input type="password" name="password" id="forgetpwd" onKeyUp="forgetcheckPassword()"
                                                class="form-control forget-create-Password" placeholder="Create Password" required>
                                            <span class="icons-right fs-5 input-group-text" style="cursor: pointer;"><i
                                                class='bx bx-hide forget-create-Password-icon'></i></span>

                                        </div>
                                        <span class="error" id="forgetmessage" style="color:red"> </span>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-3 position-relative">
                                            <span class="input-group-text" id="basic-addon1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="19"
                                                    viewBox="0 0 9 12" fill="none">
                                                    <path
                                                        d="M4.5 0C2.625 0 1.125 1.5 1.125 3.375V4.875C0.4875 4.875 0 5.3625 0 6V10.875C0 11.5125 0.4875 12 1.125 12H7.875C8.5125 12 9 11.5125 9 10.875V6C9 5.3625 8.5125 4.875 7.875 4.875V3.375C7.875 1.5 6.375 0 4.5 0ZM8.25 6V10.875C8.25 11.1 8.1 11.25 7.875 11.25H1.125C0.9 11.25 0.75 11.1 0.75 10.875V6C0.75 5.775 0.9 5.625 1.125 5.625H1.5H7.5H7.875C8.1 5.625 8.25 5.775 8.25 6ZM1.875 4.875V3.375C1.875 1.9125 3.0375 0.75 4.5 0.75C5.9625 0.75 7.125 1.9125 7.125 3.375V4.875H1.875Z"
                                                        fill="#2C3DEE" />
                                                    <path
                                                        d="M4.5 6.75C3.8625 6.75 3.375 7.2375 3.375 7.875C3.375 8.3625 3.675 8.775 4.125 8.925V9.75C4.125 9.975 4.275 10.125 4.5 10.125C4.725 10.125 4.875 9.975 4.875 9.75V8.925C5.325 8.775 5.625 8.3625 5.625 7.875C5.625 7.2375 5.1375 6.75 4.5 6.75ZM4.5 8.25C4.275 8.25 4.125 8.1 4.125 7.875C4.125 7.65 4.275 7.5 4.5 7.5C4.725 7.5 4.875 7.65 4.875 7.875C4.875 8.1 4.725 8.25 4.5 8.25Z"
                                                        fill="#2C3DEE" />
                                                </svg>
                                            </span>

                                            <input type="password" id="forgetcpwd" name="pwd_confirmation" class="form-control forget-confirm-password"
                                                placeholder="Confirm Password" onKeyUp="forgetcheckPassword()" required>
                                            <span class="icons-right fs-5 input-group-text" style="cursor: pointer;"><i
                                                class='bx bx-hide forget-confirm-password-icon'></i></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary submit-new-password" id="forgetpasswordsetbutton" type="submit">Submit</button>
                                </div>

                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    <!-- ===========Make New Password Model END=============== -->
{{-- @endsection --}}


{{-- @section('script') --}}

    <script>
        function forgetcheckPassword() {
            var password = $("#forgetpwd").val();
            var confirmpassword = $("#forgetcpwd").val();
            var passw =
                "^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})"; ///^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
            if (!password.match(passw)) {
                $("#forgetmessage").html("Password is not strong.").css('color', 'red');
                // document.getElementById('forgetpasswordsetbutton').disabled = true;
                return false;
            } else if (password == '' || confirmpassword == '') {
                $("#forgetmessage").html("");
                // document.getElementById('forgetpasswordsetbutton').disabled = true;
                return false;
            } else if (password.length < 8 || confirmpassword.length < 8) {
                $("#forgetmessage").html("Password length must be atleast 8 characters.").css('color', 'red');
                // document.getElementById('forgetpasswordsetbutton').disabled = true;
                return false;
            } else if (password != confirmpassword) {
                $("#forgetmessage").html("Password Didn't Match").css('color', 'red');
                // document.getElementById('forgetpasswordsetbutton').disabled = true;
                return false;
            } else {
                $("#forgetmessage").html("Password Match").css('color', 'green');
                // document.getElementById('forgetpasswordsetbutton').disabled = false;
                return true;
            }
        }

        function forgetotptimer()
        {
                var seconds = 60;
                var minutes = 0;
                forgettimer = setInterval(() => {

                    if(minutes < 0){
                        $('.forgettime').text('');
                        clearInterval(forgettimer);
                    }
                    else{
                        let tempMinutes = minutes.toString().length > 1? minutes:'0'+minutes;
                        let tempSeconds = seconds.toString().length > 1? seconds:'0'+seconds;

                        $('.forgettime').text(tempMinutes+':'+tempSeconds);
                    }

                    if(seconds <= 0){
                        minutes--;
                        seconds = 59;
                    }

                    seconds--;

                    }, 1000);

        }
        function forgetotptimerclear()
        {
            $('.forgettime').text('');
            clearInterval(forgettimer);
        }

        // Show toastr message on receiving forget otp
            var UpdateMessage = "<?php echo $message?>";
            if(UpdateMessage)
            {
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 3000
                    };
                toastr.success(UpdateMessage);
                }, 300);
            }

        $(document).ready(function(){
            $('#Forget-OTP-modal').modal('show');
            $('.container-fluid').addClass('blur');
            forgetotptimer();

            //Admin forget OTP verify
            $(document).on('click', '.forget-verify-phone-model-form', function() {
                var email = $('#forget_phone_modal').val();
                var first = $('#forgetfirst').val();
                var second = $('#forgetsecond').val();
                var third = $('#forgetthird').val();
                var fourth = $('#forgetfourth').val();
                var otp = first + second + third + fourth;

                if (email != '' && first!='' && second!='' && third!='' && fourth!='') {

                    $.ajax({
                        type: "GET",
                        url: "{{ url('/forget-validate-email-by-otp') }}",
                        data: {
                            'email_address': email,
                            'otp': otp
                        },
                        success: function(data) {
                                if(data.success){
                                    $('#forgetmyOtp')[0].reset();
                                    forgetotptimerclear();
                                    $('#Forget-OTP-modal').modal('hide');
                                    toastr.options={
                                      "closeButton":true,
                                       "progressBar":true,
                                    }
                                    toastr.success(data.msg);
                                    $('#forget_phone_modal_email').val(data.email);
                                    $('#Make-new-password').modal('show');
                                }
                                else{
                                    toastr.options={
                                      "closeButton":true,
                                       "progressBar":true,
                                    }
                                    toastr.error(data.msg);

                                    $('#forgetmessage_error').text(data.msg);
                                    setTimeout(() => {
                                        $('#forgetmessage_error').text('');
                                    }, 3000);
                                }
                            },
                        error: function(err) {
                           alert(err.responseText);
                        }

                    });
                }
                else{
                    $("#forget-phone-error-message").html("** Please Fill the OTP !!");
                    setTimeout(() => {
                        $("#forget-phone-error-message").html('');
                    }, "3000");

                }

            });

            //Admin forget Resend OTP
            $('#forgetresendOtpVerification').click(function(){
                $(this).text('Wait...');
                var userMail = $('#forget_phone_modal').val();
                $.ajax({
                    url:"{{ url('/resendotp') }}",
                    type:"GET",
                    data: {email:userMail },
                    success:function(res){
                        $('#forgetresendOtpVerification').text('Resend Verification OTP');
                        if(res.success){
                            forgetotptimer();
                            $('#forgetmessage_success').text(res.msg);
                            setTimeout(() => {
                                $('#forgetmessage_success').text('');
                            }, 3000);
                        }
                        else{
                            $('#forgetmessage_error').text(res.msg);
                            setTimeout(() => {
                                $('#forgetmessage_error').text('');
                            }, 3000);
                        }
                    },
                    error:function(error){
                        alert(error.responseText);
                    }
                });
            });
        });

        // on close modal
        $('.modal').on('hidden.bs.modal',function(){
            if(! $('.modal').is(':visible'))
            {
                forgetotptimerclear();
                $('.container-fluid').removeClass('blur');
                window.location.href = "{{url('/forgetpassword')}}";
            }
        });

        //for otp model buttons
            const inputs = document.getElementById("otp");

            inputs.addEventListener("input", function (e) {
                const target = e.target;
                const val = target.value;

                if (isNaN(val)) {
                    target.value = "";
                    return;
                }

                if (val != "") {
                    const next = target.nextElementSibling;
                    if (next) {
                    next.focus();
                    }
                }
            });

            inputs.addEventListener("keyup", function (e) {
                const target = e.target;
                const key = e.key.toLowerCase();

                if (key == "backspace" || key == "delete") {
                    target.value = "";
                    const prev = target.previousElementSibling;
                    if (prev) {
                    prev.focus();
                    }
                    return;
                }
            });

        // =================== Forget Form Password hide and show========
            const forgetcreatePassword = document.querySelector(".forget-create-Password");
            const forgetconfirmPassword = document.querySelector(".forget-confirm-password");
            const forgeticon = document.querySelector(".forget-create-Password-icon");
            const forgetconfirmPasswordIcon = document.querySelector(".forget-confirm-password-icon");
            forgeticon.addEventListener('click', () => {
                // toggle the type attribute
                const typecreate = forgetcreatePassword.getAttribute('type') === 'password' ? 'text' : 'password';
                forgetcreatePassword.setAttribute('type', typecreate);
                // toggle the eye show hide icon
                if (typecreate == "password") {
                    forgeticon.classList.remove('bx-show');
                    forgeticon.classList.add("bx-hide")
                } else if (typecreate == "text") {
                    forgeticon.classList.add("bx-show");

                }

            });
            forgetconfirmPasswordIcon.addEventListener('click', () => {
                // toggle the type attribute
                const typecreate = forgetconfirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
                forgetconfirmPassword.setAttribute('type', typecreate);
                // toggle the eye show hide icon
                if (typecreate == "password") {
                    forgetconfirmPasswordIcon.classList.remove('bx-show');
                    forgetconfirmPasswordIcon.classList.add("bx-hide")
                } else if (typecreate == "text") {
                    forgetconfirmPasswordIcon.classList.add("bx-show");

                }

            });

    </script>

    </body>



<script src="assets/libs/jquery/jquery.min.js"></script>
<script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/libs/metismenu/metisMenu.min.js"></script>
<script src="assets/libs/simplebar/simplebar.min.js"></script>
<script src="assets/libs/node-waves/waves.min.js"></script>
<script src="assets/libs/feather-icons/feather.min.js"></script>
<!-- pace js -->
<script src="assets/libs/pace-js/pace.min.js"></script>

<!-- Required datatable js -->
<script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/js/pages/datatables.init.js"></script>

<script src="assets/js/app.js"></script>

<!-- Mirrored from themesbrand.com/minia/layouts/auth-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Jun 2023 05:22:02 GMT -->
</html>
{{-- @endsection --}}
