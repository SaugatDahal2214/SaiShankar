<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sai Shankar Multi Services</title>
    
    @vite(['resources/css/app.css', 'resources/css/index.css'])
    
</head>
<body>
    @include('partials.navbar')
    <main>
        @yield('content')
    </main>
    @include('partials.footer')
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>  
</body>
</html>