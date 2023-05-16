<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>APS - @yield("title")</title>
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
  <style>
    .sticky-message {
      position: fixed;
      top: 100px;
      right: 50px;
      border-radius: 20px;
    }

    .order{
    position: fixed;
    top: 280px;
    right: 100px;
    width: 500px;
    height: 300px;
    background-color: #5BD497;;
    margin-right: 100px;
    border-radius: 20px;

}
  </style>
</head>

<body>
  @include("layouts.header")

  <main>
    <div class="container">

      @yield("content")

    </div>

  </main>

  <div class="sticky-message"></div>

  <script src="{{asset('assets/js/jquery-3.6.4.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.bundle.js')}}"></script>
  @yield('page-scripts')
    <script src="{{asset('assets/js/script.js')}}"></script>

</body>

</html>