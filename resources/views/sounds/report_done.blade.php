@extends('layouts.app')

@section('content')
  <div class="py-32 w-screen h-32 bg-gray-300">
    <p class="text-3xl mt-18 ml-20 font-semibold">Report sent</p>
    <p id="timer" class="text-2xl mt-18 ml-20 font-semibold"></p>
  </div>
  <script type="text/javascript">
  function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
      minutes = parseInt(timer / 60, 10);
      seconds = parseInt(timer % 60, 10);
      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? seconds : seconds;
      display.textContent = "You'll be automatically redirect in " + seconds + " seconds.";
      if (--timer < 0) {
        document.location = "/";
      }
    }, 1000);
  }
  window.onload = function () {
    display = document.querySelector('#timer');
    startTimer(5, display);
  };
  </script>
@endsection
