<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <link rel="manifest" href="manifest.json" crossorigin>
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="/frontend/assets/imgs/template/favicon.svg">
    <link href="/frontend/assets/css/style.css?version=4.1" rel="stylesheet">
    <title>Karir | Meiji Indonesia</title>
  </head>
  <body>
    @yield('modals')
    @include('layouts.partials.header')
    @include('layouts.partials.mobile')
    @yield('content')
    @includeIf('layouts.partials.footer')
    <script src="/frontend/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="/frontend/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="/frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="/frontend/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="/frontend/assets/js/plugins/waypoints.js"></script>
    <script src="/frontend/assets/js/plugins/wow.js"></script>
    <script src="/frontend/assets/js/plugins/magnific-popup.js"></script>
    <script src="/frontend/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="/frontend/assets/js/plugins/select2.min.js"></script>
    <script src="/frontend/assets/js/plugins/isotope.js"></script>
    <script src="/frontend/assets/js/plugins/scrollup.js"></script>
    <script src="/frontend/assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="/frontend/assets/js/noUISlider.js"></script>
    <script src="/frontend/assets/js/slider.js"></script>
    <script src="/frontend/assets/js/main.js?v=4.1"></script>
  </body>
</html>