<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>پولو ادمین</title>
    <link rel="shortcut icon" href="/dist/images/favicon.ico">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="/dist/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/dist/vendors/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="/dist/vendors/jquery-ui/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="/dist/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/dist/vendors/flags-icon/css/flag-icon.min.css">
    <link rel="stylesheet" href="/dist/vendors/flag-select/css/flags.css">
    <!-- END Template CSS-->

    <!-- START: Page CSS-->
    <link rel="stylesheet" href="/dist/vendors/morris/morris.css">
    <link rel="stylesheet" href="/dist/vendors/weather-icons/css/pe-icon-set-weather.min.css">
    <link rel="stylesheet" href="/dist/vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="/dist/vendors/starrr/starrr.css">
    <link href="/dist/vendors/bootstrap-tour/css/bootstrap-tour-standalone.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/dist/vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/dist/vendors/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/dist/vendors/sweetalert/sweetalert.css">
    <!-- END: Page CSS-->

    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="/dist/css/main.css">
    <!-- END: Custom CSS-->
    <style type="text/css">/* Chart.js */
        @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style></head>

<body id="main-container" class="default semi-dark">
<!-- START: Pre Loader-->
<div class="se-pre-con" style="display: none;">
    <img src="/dist/images/logo.png" alt="logo" width="23" class="img-fluid" style="transform: rotate(14445deg);">
</div>
<!-- END: Pre Loader-->

<!-- START: Header-->
@include('partials.navbar1')
<!-- END: Header-->

<!-- START: Main Menu-->

<!-- END: Main Menu-->

<!-- START: Main Content-->
<main>
    <div class="container-fluid">
        <!-- START: Breadcrumbs-->
        <div class="row mt-3">
            <div class="col-12  align-self-center">
                @include('partials.alerts')
            </div>
        </div>
        <!-- END: Breadcrumbs-->

        <!-- START: Card Data-->
        <div class="row" id="app">
            @yield('content')
        </div>
        <!-- END: Card DATA-->
    </div>
</main>
<!-- END: Content-->

<!-- START: Footer-->
<!-- END: Footer-->

<!-- START: Back to top-->
\
<!-- END: Back to top-->

<!-- START: Chat Button-->

<!-- END: Chat Button-->

<!-- START: Buy Now Button-->

<!-- END: Buy Now Button-->

<!-- START: Template JS-->
<script src="/dist/vendors/jquery/jquery-3.3.1.min.js"></script>
<script src="/dist/vendors/jquery-ui/jquery-ui.min.js"></script>
<script src="/dist/vendors/moment/moment.js"></script>
<script src="/dist/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dist/vendors/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/dist/vendors/flag-select/js/jquery.flagstrap.min.js"></script>
<!-- END: Template JS-->

<!-- START: APP JS-->
<script src="/dist/js/app.js"></script>
<!-- END: APP JS-->

<!-- START: Page Vendor JS-->
<!-- END: Page Vendor JS-->

<!-- START: Page JS-->
<script src="/dist/js/home.script.js"></script><i title="Raphaël Colour Picker" style="display: none; color: rgb(115, 103, 240);"></i>
<script src="/js/app.js"></script>
<!-- END: Page JS-->

<!-- END: Body-->


</body>
</html>
