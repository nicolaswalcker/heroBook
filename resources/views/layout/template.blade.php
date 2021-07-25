<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('titulo')</title>
  <!-- Import styles -->
  <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
  <!-- Import fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <header>
    <a href="{{route('heroes.index')}}">HeroBook</a>
  </header>
  <main>
    @yield('content')
  </main>
</body>
</html>