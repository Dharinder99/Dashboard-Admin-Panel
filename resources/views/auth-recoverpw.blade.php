
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Recover Password | Admin & Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- preloader css -->
        <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css" />

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body>

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
                                    <div class="mb-4 mb-md-5 text-center">
                                        <a href="#" class="d-block auth-logo">
                                            <img src="assets/images/iCourtLogo.jpg" alt="" height="100">
                                            <div class="text-center"></div>
                                            <span class="logo-txt"></span>
                                        </a>
                                    </div>
                                    <div class="auth-content my-auto">
                                        <div class="text-center">
                                            <h5 class="mb-0">Reset Password</h5>
                                            <p class="text-muted mt-2">Reset Password with iCourt.</p>

                 </div>
             <div class="alert alert-success text-center my-4" role="alert">
                  Enter your Email and instructions will be sent to you!
                                        </div>

    {{-- <form class="mt-4" action="{{url('/forgetpassword')}}"  method="Post" >
        @csrf
    <div class="mb-3">
             <label class="form-label">Email</label>
    <input type="text" class="form-control" id="email" placeholder="Enter email" required>
    </div>

<div class="mb-3 mt-4">

        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Reset </button></a>

</div>
  </form> --}}
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
        <input type="email" class="form-control" id="email" name="email_address" placeholder="Enter email" onkeyup="validateemail()">
    </div>
    <div class="mb-3 mt-4">
        <button class="btn btn-primary w-100 waves-effect waves-light" type="submit" id="reset">Send OTP</button>
    </div>
</form>

                        <div class="mt-5 text-center">
                                            <p class="text-muted mb-0">Remember It ?
                                                <a href="{{URL('/login')}}"
                                                    class="text-primary fw-semibold"> Log In </a> </p>
                                        </div>
                                    </div>
                                    <div class="mt-4 mt-md-5 text-center">
                                        <p class="mb-0">© <script>document.write(new Date().getFullYear())</script>.iCourt Design & Develop by Agicent</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end auth full page content -->
                    </div>
                    <!-- end col -->
                    <div class="col-xxl-9 col-lg-8 col-md-7">
                        <div class="auth-bg pt-md-5 p-4 d-flex">
                            <div class="bg-overlay bg-primary"></div>
                            {{-- <ul class="bg-bubbles">
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
                            </ul> --}}
                            <!-- end bubble effect -->
     <div class="row justify-content-center align-items-center">
            <div class="col-xl-7">
    <div class="p-0 p-sm-4 px-xl-0">

    <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators carousel-indicators-rounded justify-content-start ms-0 mb-0">
        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>

 <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>

<button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <!-- end carouselIndicators -->



                                        <!-- end review carousel -->
                                    </div>
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


        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <!-- pace js -->
        <script src="assets/libs/pace-js/pace.min.js"></script>

    </body>

</html>
