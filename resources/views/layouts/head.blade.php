<!-- Title -->
<title>@yield('title')</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon" />

<!-- Font -->
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<!--- Style css -->
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

{{-- Datatables --}}

<link href="{{ asset('assets/datatables/datatables.min.css') }}" rel="stylesheet">

<link href="{{ asset('assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet">



<!--- Style css -->
{{-- @if (App::getLocale() == 'en')
    <link href="{{ asset('assets/css/ltr.css') }}" rel="stylesheet">
@else
    <link href="{{ asset('assets/css/rtl.css') }}" rel="stylesheet">
@endif --}}

<link href="{{ asset('assets/css/rtl.css') }}" rel="stylesheet">

@stack('css')
