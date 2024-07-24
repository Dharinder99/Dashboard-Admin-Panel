{{-- @extends('layouts.header')

@section('title','Forget Password')

@section('content') --}}
    <body>

        <style>
            /* .banner-img img{
                -webkit-animation: slide_up_down 1.7s ease-in-out infinite alternate both;
                animation: slide_up_down 1.7s ease-in-out infinite alternate both;
            } */

            @-webkit-keyframes slide_up_down {
                0% {
                    -webkit-transform: translateY(0);
                    transform: translateY(0);
                }

                100% {
                    -webkit-transform: translateY(-20px);
                    transform: translateY(-20px);
                }
            }

            @keyframes slide_up_down {
                0% {
                    -webkit-transform: translateY(0);
                    transform: translateY(0);
                }

                100% {
                    -webkit-transform: translateY(-20px);
                    transform: translateY(-20px);
                }
            }
        </style>

    {{--font awesome css  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript">
      function checkvalidation(){
        var em = document.getElementById('email').value;
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(em == '')
        {
            document.getElementById("emmessage").innerHTML = "**Fill the email please!";
            return false;
        }
        else if(!(em.match(mailformat)))
        {
          document.getElementById("emmessage").innerHTML = "**Fill the valid email please!";
          return false;
        }
        else{
            document.getElementById('reset').innerHTML ='<i class="fa fa-refresh fa-spin"></i> Sending OTP';
            document.getElementById('reset').disabled = true;
            return true;
        }
      }
      function validateemail(){
        var em = document.getElementById('email').value;
        var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(em.match(mailformat))
        {
            document.getElementById("emmessage").innerHTML = "";
        }
      }
    </script>

    <!-- <body data-layout="horizontal"> -->
        <div class="auth-page">
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-xxl-3 col-lg-4 col-md-5">
                        <div class="auth-full-page-content d-flex p-sm-5 p-4">
                            <div class="w-100">
                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5 text-center py-2" style="min-height:60px;">
                                        <a href="javascript:void(0);" class="d-block auth-logo">
                                            {{-- <img src="" alt=""> <span class="logo-txt"> <span class="logo-txt">Agicent</span> --}}
                                            <svg width="140" height="" class="site-logo" viewBox="0 0 254 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M41.4587 28.7046L26.9739 0.539062L14.7969 24.2118C8.77122 23.2333 3.04424 20.3618 0 13.731C0 13.731 2.98335 22.5602 13.4042 26.9286L12.4909 28.7046L9.32299 34.8283H16.2467L19.407 28.714C23.5567 29.4927 28.5398 29.5888 34.4779 28.5896L34.5369 28.7046L37.701 34.8283H44.621L41.4587 28.7046ZM21.5133 24.619L26.9739 14.0081L31.7305 23.2634C28.3767 24.0401 24.9551 24.4941 21.5133 24.619V24.619Z" fill="#EE3532"></path>
                                                <path d="M115.491 34.951H133.126V28.7104H115.491C112.484 28.7104 109.6 27.5267 107.474 25.4198C105.347 23.3128 104.153 20.4552 104.153 17.4755C104.153 14.4958 105.347 11.6382 107.474 9.5312C109.6 7.42425 112.484 6.24057 115.491 6.24057H133.126V0H115.491C110.813 0 106.328 1.84116 103.02 5.11845C99.713 8.39574 97.855 12.8407 97.855 17.4755C97.855 22.1103 99.713 26.5552 103.02 29.8325C106.328 33.1098 110.813 34.951 115.491 34.951V34.951Z" fill="#EE3532"></path>
                                                <path d="M147.693 34.951H173.442V28.7104H147.693C146.84 28.7045 146.023 28.3659 145.419 27.7679C144.816 27.1698 144.474 26.3604 144.468 25.5147V18.9159H167.142V12.6829H144.468V9.43627C144.474 8.59055 144.816 7.78115 145.419 7.18312C146.023 6.58509 146.84 6.2465 147.693 6.24057H173.442V0H147.693C145.175 0.0104775 142.764 1.00958 140.989 2.77836C139.213 4.54714 138.217 6.94133 138.22 9.43627V25.5128C138.217 28.0081 139.212 30.4028 140.988 32.172C142.764 33.9411 145.175 34.9405 147.693 34.951Z" fill="#EE3532"></path>
                                                <path d="M233.242 34.9999H239.538V6.29135H254V0.0507812H218.78V6.29135H233.242V34.9999Z" fill="#EE3532"></path>
                                                <path d="M184.774 12.8827L207.448 30.2074L213.745 35V0.050905L207.448 0V22.2681L184.774 4.94344L178.474 0.148944V35H184.774V12.8827Z" fill="#EE3532"></path>
                                                <path d="M64.3627 34.951H82.0041V15.7768H64.3627V22.0173H75.7006V28.7085H64.3627C61.3814 28.6703 58.5353 27.4698 56.4407 25.3672C54.3461 23.2646 53.1717 20.429 53.1717 17.4745C53.1717 14.5201 54.3461 11.6845 56.4407 9.58188C58.5353 7.47927 61.3814 6.27885 64.3627 6.24057H82.0041V0H64.3627C59.6854 0 55.1997 1.84116 51.8924 5.11845C48.5851 8.39574 46.7271 12.8407 46.7271 17.4755C46.7271 22.1103 48.5851 26.5552 51.8924 29.8325C55.1997 33.1098 59.6854 34.951 64.3627 34.951V34.951Z" fill="#EE3532"></path>
                                                <path d="M93.3324 0H87.0327V34.951H93.3324V0Z" fill="#EE3532"></path>
                                                </svg>
                                        </a>
                                    </div>
         <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <h5 class="mb-0">Reset Password</h5>
                                            <p class="text-muted mt-2">Reset Password with Agicent.</p>
                                        </div>
                                        <div class="alert alert-success text-center my-4" role="alert">
                                            Enter your Email and instructions will be sent to you!
                                        </div>
             @if(session()->has('error'))
             <div class="alert alert-danger">
                    <p>{{ session()->get('error') }}</p>
                                           </div>
                                        @endif
                                        @if(session()->has('message'))
                                           <div class="alert alert-danger">
                                              <button id="alertmailerror" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="float: right;"></button>
                                              <p>{{ session()->get('message') }}</p>
                                           </div>
                                        @endif
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif


             <form class="mt-4" action="{{route('forgetpasswordemail')}}" method="POST" onsubmit="return checkvalidation()">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <span class="text-danger" id="emmessage"></span>
                                                <input type="email" class="form-control" id="email" name="email_id" placeholder="Enter email" onkeyup="validateemail()">
                                            </div>
                                            <div class="mb-3 mt-4">
                                                <button class="btn btn-primary w-100 waves-effect waves-light" type="submit" id="reset">Send OTP</button>
                                            </div>
                                        </form>

                                        <div class="mt-5 text-center">
                                            <p class="text-muted mb-0">Remember It ?  <a href=""
                                                    class="text-primary fw-semibold"> Log in </a> </p>
                                        </div>
                                    </div>
                        <div class="mt-4 mt-md-5 text-center">
        <p class="mb-0"><script>document.write(new Date().getFullYear())</script> © Agicent   . Crafted with <i class="mdi mdi-heart text-danger"></i> by Agicent</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end auth full page content -->
                    </div>
                    <!-- end col -->
                    <div class="col-xxl-9 col-lg-8 col-md-7">
                        <div class="auth-bg d-flex">
                            {{-- <div class="bg-overlay bg-primary"></div> --}}
                            <ul class="bg-bubbles">
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <!-- end bubble effect -->
                            <div class="row justify-content-center align-items-center" style="width: 100%;">
                                <div class="banner-img d-flex justify-content-center align-items-center">
                                    <img src="{{asset('assets/images/dashboard-coverpage2.jpg')}}" alt="" style="width: 100%; height:100%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container fluid -->
        </div>
{{-- @endsection         --}}


{{-- @section('script') --}}

    <script type="text/javascript">
        setTimeout(() => {
                document.getElementById('alertmailerror').click();
        }, 4000);
    </script>

    </body>


<!-- Mirrored from themesbrand.com/minia/layouts/auth-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Jun 2023 05:22:02 GMT -->
</html>
{{-- @endsection --}}
