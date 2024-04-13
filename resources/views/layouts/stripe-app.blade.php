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

        
</head>

<body>
            {{ $slot }}
</body>
   
    


</html>
