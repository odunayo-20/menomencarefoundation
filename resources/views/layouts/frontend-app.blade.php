<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Menomen Care Foundation: Empowering Communities Through Compassionate Care. Explore our initiatives aimed at enhancing healthcare access and promoting well-being in underserved areas.">
    <meta name="keywords" content="Menomen Care Foundation, healthcare, community outreach, well-being, advocacy">
    <meta name="author" content="Winatech Solution Limited">
    
    <title>{{ $title ?? 'Menomen Care Foundation' }}</title>
    <link href="{{ asset('frontend/img/logo/men2.png') }}" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&family=Roboto:wght@500;700&display=swap"
            rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">

            <!-- Libraries Stylesheet -->
    <link href="{{ asset('frontend/lib/animate/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

 <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">

        <!-- Template Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">


@livewireStyles
</head>

<body>
    <livewire:frontend.includes.topbar>
        <livewire:frontend.includes.navbar>
            {{ $slot }}
            <livewire:frontend.includes.footer>
</body>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/owlcarousel/assets/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/lib/lightbox/js/lightbox.min.js') }}"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('frontend/js/main.js') }}"></script>

    <!-- JavaScript Libraries -->

    <script src="frontend/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="frontend/js/main.js"></script>
    <script>
        setTimeout(function() {
    $(".alert").alert('close');
        }, 3500);
    </script>

    @livewireScripts

</html>
