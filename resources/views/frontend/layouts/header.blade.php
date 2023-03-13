
<head>
    <meta charset="UTF-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ $site_info->title ?? 'E-WEB - MD NOBIR HASAN' }} </title>
    <base />
    <meta name="description" content="petboxbd" />
    <meta name="keywords" content=" " />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="{{--{{ $site_info->logo }}--}}" rel="icon" />

    {{-- Front-awesome  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    {{-- Custom js  --}}
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    @stack('custom-css')


{{-- Facebook google tag or link here  --}}
 {{!! $google_tag ? $google_tag->gtag_header : '' !!}}
 {{!! $pixel_tag ? $pixel_tag->ptag_header : '' !!}}
{{-- End Facebook google tag or link  --}}
</head>
