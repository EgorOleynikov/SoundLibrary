<link href="{{ mix('css/app.css') }}" rel="stylesheet">
<style media="screen">
  body{
    height: 100vh;
    width: 100vw;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  a:hover{
    color: rgb(255 195 58);
  }
</style>
<body class="bg-gray-300">
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
      {{ csrf_field() }}
  </form>
  <div class="flex items-center content-center">
    <p class="text-4xl font-bold">
      It seems you've been banned from this site
    </p>
    <img width="250" src="{{ asset('storage/icons/emoji-oop-meme.png') }}">
  </div>
    <span class="text-2xl underline" href="">{{ Auth::user()->name }}</span>
    <a href="{{ route('logout') }}"
       class="mt-16 px-16 py-6 rounded-full bg-black text-white no-underline"
       onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">{{ __('Logout') }}
    </a>
</body>
