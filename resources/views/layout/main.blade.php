<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Styles--}}
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    {{-- DataTables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

    {{-- Vite --}}
    @vite(
		[
			'resources/css/app.css',
			// 'resources/css/app.scss',
			'resources/js/app.js'
		]
	)
</head>

<body>
    @yield('header')
    @yield('content')
    @yield('footer')
    <script src="https://kit.fontawesome.com/c3621d3bda.js" crossorigin="anonymous"></script>
    @stack('script')
</body>

</html>
