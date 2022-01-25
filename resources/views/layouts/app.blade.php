<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    @yield('custom_style')
</head>
<body class="bg-gray-100 antialiased leading-none font-sans">
    <div id="app">
        <header class="fixed w-screen bg-teal-700 py-6 top-0 z-50">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                        SoundLibrary
                    </a>
                </div>
                <form class="flex items-center" action="{{ route('index') }}" method="get" id="search_form">
                  <!-- @csrf -->

                  @if (Request::is('/'))
                    <select id="category_box" class="mr-5 w-44 h-10 rounded" name="categories">
                      <option class="_dropdown_item text-center bg-silver-400" value="">Select category</option>
                      @if (isset($categories))
                        @foreach ($categories as $category)
                          <option class="_dropdown_item text-center border-solid" value="{{ $category->id }}" @if (isset($category_selected) && $category->id == $category_selected) selected="selected"  @endif> {{ $category->category }} </option>
                        @endforeach
                      @endif
                    </select>
                  @endif

                  <div class="flex items-center justify-center ">
                    <div class="flex border-2 border-gray-200 rounded-lg">
                        <input id="search_text" type="text" name="search_text" class="px-4 py-2 w-80" placeholder="Search" value="@if (isset($search_text) && $search_text !== NULL) {{ $search_text }} @endif">
                        <button id="search_button" class="px-4 bg-white" type="submit">
                            <img width="24" src="{{ asset('storage/icons/search.png') }}"></a>
                        </button>
                    </div>
                  </div>

                  @guest
                  @else
                  @if (Request::is('/'))
                    <div class="ml-5 flex items-center">
                      <input id="ur_only_checkbox" type="checkbox" name="uonly" class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer" @if (isset($uonly) && $uonly == true) checked @endif>
                      <span class="text-white pl-1">By you only</span>
                    </div>
                  @endif
                  @endguest

                </form>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    <a href="{{ route('admin.index') }}">Admin area</a>
                    @guest
                        <a class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-full" href="/register">Sign in to upload your sound</a>
                        <a class="text-white no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="text-white no-underline hover:underline" href="{{ route('register') }}">{{ __('Sign up') }}</a>
                        @endif
                    @else

                        <a class="bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-2 px-4 rounded-full" href="/create">Upload</a>

                        <span class="text-white underline" href="">{{ Auth::user()->name }}</span>

                        <a href="{{ route('logout') }}"
                           class="text-white no-underline hover:underline"
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>
                    @endguest
                </nav>
            </div>
        </header>

        @yield('content')

    </div>
    <script type="text/javascript" src="{{ asset('js/searchXML.js') }}"></script>
</body>
</html>
