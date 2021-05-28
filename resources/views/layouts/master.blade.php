<!DOCTYPE HTML>
<!--
	Hielo by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
        <title>@yield('title')</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>

		<!-- Header -->
        @include('admin.layouts.partials.header')

		<!-- Nav -->
        @include('admin.layouts.partials.navigation')

        @yield('content')


		<!-- Footer -->
        @include('admin.layouts.partials.footer')

		<!-- Scripts -->
        @include('admin.layouts.partials.scripts')

	</body>
</html>
