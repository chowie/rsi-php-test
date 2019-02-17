<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <base href="{{ url('/') }}">

  <title>Christopher Howie</title>

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">

  <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{url('/')}}{{mix('css/app.css')}}">
    <link rel="stylesheet" href="{{url('/')}}{{mix('css/theme.css')}}">

    <script defer src="https://use.fontawesome.com/releases/v5.7.1/js/all.js" integrity="sha384-eVEQC9zshBn0rFj4+TU78eNA19HMNigMviK/PU/FFjLXqa/GKPgX58rvt5Z8PLs7" crossorigin="anonymous"></script>

</head>

<body id="page-top">

    @include('components.navigation')

  <div id="app">
      <div class="container-fluid p-0">
          @yield('content')
      </div>
  </div>

  <script src="{{url('/')}}{{mix('js/vendor.js')}}"></script>
  <script src="{{url('/')}}{{mix('js/app.js')}}"></script>

</body>

</html>
