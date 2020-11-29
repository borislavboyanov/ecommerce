<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Home-Page 1 || Boloba</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico in the root directory -->
		<link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
		<!-- google fonts -->
		<link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

		<!-- all css here -->
		<!-- bootstrap v3.3.6 css -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
		<!-- animate css -->
        <link rel="stylesheet" href="/css/animate.css">
		<!-- jquery-ui.min css -->
        <link rel="stylesheet" href="/css/jquery-ui.min.css">
		<!-- meanmenu css -->
        <link rel="stylesheet" href="/css/meanmenu.min.css">
		<!-- owl.carousel css -->
        <link rel="stylesheet" href="/css/owl.carousel.css">
	    <!-- nivo slider CSS -->
		<link rel="stylesheet" href="/lib/css/nivo-slider.css" type="text/css" />
		<link rel="stylesheet" href="/lib/css/preview.css" type="text/css" media="screen" />
		<!-- font-awesome css -->
        <link rel="stylesheet" href="/css/font-awesome.min.css">
		<!-- style css -->
		<link rel="stylesheet" href="/css/style.css">
		<!-- responsive css -->
        <link rel="stylesheet" href="/css/responsive.css">
		<!-- modernizr js -->
        <script src="/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <style>
    [v-cloak] {
        display: none;
    }
</style>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div id="main">
    @yield('content')
    </div>
		<!-- all js here -->
		<!-- jquery latest version -->
        <script src="/js/vendor/jquery-1.12.0.min.js"></script>
		<!-- bootstrap js -->
        <script src="/js/bootstrap.min.js"></script>
		<!-- nivo slider js -->
		<script src="/lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
		<script src="/lib/home.js" type="text/javascript"></script>
		<!-- owl.carousel js -->
        <script src="/js/owl.carousel.min.js"></script>
		<!-- meanmenu js -->
        <script src="/js/jquery.meanmenu.js"></script>
		<!-- jquery-ui js -->
        <script src="/js/jquery-ui.min.js"></script>
		<!-- elevateZoom js -->
        <script src="/js/jquery.elevateZoom-3.0.8.min.js"></script>
		<!-- wow js -->
        <script src="/js/wow.min.js"></script>
		<!-- plugins js -->
        <script src="/js/plugins.js"></script>
		<!-- main js -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
