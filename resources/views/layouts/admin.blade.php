<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>SoundLibrary</title>
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <!-- Styles -->
  <link rel="icon" href="{{ asset('css/favicon.jpg') }}">
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <style media="screen">
    body{
      background-image: url("{{ asset('/storage/bg_admin_cover.webp') }}");
      background-size: cover;
      background-attachment: fixed;
    }
    header{
      background-color: darkslategrey;
    }
    ._links{
      background-color: dimgrey;
    }
    main{
      background-color: rgba(0, 0, 0, 0.2);
    }
    input{
      border: 1px solid darkgray;
      border-radius: 3px;
      padding-left: 10px;
      color: black;
    }
    select{
      color: black;
    }
  </style>
  @yield('custom_style')
</head>
<header class="w-screen pt-6 top-0 z-50">
    <div class="container mx-auto flex justify-between items-center px-6">
        <div>
            <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                SoundLibrary
            </a>
        </div>
        <form class="flex items-center" action="/" method="get">
          <!-- @csrf -->

          <div class="flex items-center justify-center ">
            <div class="flex border-2 border-gray-200 rounded-lg">
                <input type="text" name="search_text" class="px-4 py-2 w-80" placeholder="Search..." value="@if (isset($search_text) && $search_text !== NULL) {{ $search_text }} @endif">
                <button class="px-4 text-white bg-gray-600 border-l rounded" type="submit">
                    Search
                </button>
            </div>
          </div>

        </form>
        <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
            <a href="{{ route('index') }}">Back to user area</a>

            <a class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-full" href="/create">Upload sound</a>

            <span><a class="text-white underline" href="">{{ Auth::user()->name }}</a></span>

            <a href="{{ route('logout') }}"
               class="text-white no-underline hover:underline"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                {{ csrf_field() }}
            </form>

        </nav>
    </div>
    <div class="_links w-screen h-12 mt-6 flex justify-around items-center text-white text-lg">
      <a class="bg-transparent hover:text-white-700 font-semibold hover:text-white py-2 px-4 border-x-4 hover:border-yellow-300 border-transparent @if (url()->current() == route('admin.publish.index')) text-yellow-300 hover:text-yellow-300 @endif" href="{{ route('admin.publish.index') }}">Publish sounds</a>
      <a class="bg-transparent hover:text-white-700 font-semibold hover:text-white py-2 px-4 border-x-4 hover:border-yellow-300 border-transparent @if (url()->current() == route('admin.users.index')) text-yellow-300 hover:text-yellow-300 @endif" href="{{ route('admin.users.index') }}">Manage users</a>
      <a class="bg-transparent hover:text-white-700 font-semibold hover:text-white py-2 px-4 border-x-4 hover:border-yellow-300 border-transparent @if (url()->current() == route('admin.sounds.index')) text-yellow-300 hover:text-yellow-300 @endif" href="{{ route('admin.sounds.index') }}">Manage sounds</a>
      <a class="bg-transparent hover:text-white-700 font-semibold hover:text-white py-2 px-4 border-x-4 hover:border-yellow-300 border-transparent @if (url()->current() == route('admin.categories.index')) text-yellow-300 hover:text-yellow-300 @endif" href="{{ route('admin.categories.index') }}">Manage categories</a>
      <a class="bg-transparent hover:text-white-700 font-semibold hover:text-white py-2 px-4 border-x-4 hover:border-yellow-300 border-transparent @if (url()->current() == route('admin.reports.index')) text-yellow-300 hover:text-yellow-300 @endif" href="{{ route('admin.reports.index') }}">Manage reports</a>
    </div>
</header>
<body class="overflow-x-hidden">
  <main class="text-white flex flex-col justify-center items-center mt-8 w-full px-52 pb-48 pt-24">
    @yield('content')
  </main>
</body>
</html>
