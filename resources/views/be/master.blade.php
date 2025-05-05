<!DOCTYPE html>
<html lang="en">

<head>
    <title>Flat Able - Premium Admin Template by Phoenixcoded</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon -->
<link rel="icon" href="{{ asset('back-end/images/favicon.ico') }}" type="image/x-icon">

<!-- Vendor CSS -->
<link rel="stylesheet" href="{{ asset('back-end/css/style.css') }}">

</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ Navigation Menu ] start -->
    @yield('navbar')
    @yield('sidebar')

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ Breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Dashboard Analytics</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Dashboard Analytics</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Breadcrumb ] end -->

            <!-- [ Content ] start -->
            @yield('content')
            <!-- [ Content ] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <!-- Warning Section -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade to any of the following web browsers.</p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li><a href="http://www.google.com/chrome/"><img src="back-end/images/browser/chrome.png" alt="Chrome"><div>Chrome</div></a></li>
                    <li><a href="https://www.mozilla.org/en-US/firefox/new/"><img src="back-end/images/browser/firefox.png" alt="Firefox"><div>Firefox</div></a></li>
                    <li><a href="http://www.opera.com"><img src="back-end/images/browser/opera.png" alt="Opera"><div>Opera</div></a></li>
                    <li><a href="https://www.apple.com/safari/"><img src="back-end/images/browser/safari.png" alt="Safari"><div>Safari</div></a></li>
                    <li><a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie"><img src="back-end/images/browser/ie.png" alt="IE"><div>IE (11 & above)</div></a></li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Js -->
    <script src="{{ asset('back-end/js/vendor-all.min.js') }}"></script>
<script src="{{ asset('back-end/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('back-end/js/pcoded.min.js') }}"></script>
<script src="{{ asset('back-end/js/plugins/apexcharts.min.js') }}"></script>
<script src="{{ asset('back-end/js/pages/dashboard-main.js') }}"></script>


</body>
</html>
