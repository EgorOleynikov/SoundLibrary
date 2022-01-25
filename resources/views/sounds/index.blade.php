@extends('layouts.app')

@section('custom_style')

<style media="screen">
  ._dropdown_item:first-child{
    background-color: #036672;
    filter: hue-rotate();
    color: white;
  }
  input:focus{
    outline: none;
  }
  body{
    background-image: url({{ asset('/storage/' . 'bg_cover.jpg') }});
    background-size: cover;
    background-attachment: fixed;
  }
  ._item{
    border: 3px solid #F9E79F;
    width: 20rem;
    height: 32rem;
    display: grid;
    grid-row-gap: 5px;
    grid-template-columns: [first] 25px [col2-start] calc(50% - 25px) [col3-start] calc(50% - 25px) [col4-start] 25px [last];
    grid-template-rows: [first] 20px [row1-start] 50% [row2-start] 110px [row3-start] 65px [row4-start] auto [row5start] 5px [last];
    align-items: center;
  }
  ._img{
    width: 100%;
    height: 100%;
    grid-column-start: 2;
    grid-column-end: 4;
    grid-row-start: 2;
    grid-row-end: 3;
  }
  ._text{
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
    padding-top: 10px;
    padding-bottom: 10px;
    grid-column-start: 2;
    grid-column-end: 4;
    grid-row-start: 3;
    grid-row-end: 3;
  }
  .audioplayer{
    padding-left: 15px;
    padding-right: 15px;
    margin-top: 5px;
    grid-column-start: 1;
    grid-column-end: 5;
    grid-row-start: 4;
    grid-row-end: 4;
  }
  ._tags, ._category{
    color: lightgray;
  }
  ._download-btn{
    text-align: left;
    color: rgb(251, 231, 136);
    padding-top: 7px;
    padding-left: 15px;
    grid-column-start: 3;
    grid-column-end: 4;
    grid-row-start: 5;
    grid-row-end: 5;
  }
  ._report-btn{
    text-align: right;
    padding-top: 7px;
    padding-right: 15px;
    grid-column-start: 2;
    grid-column-end: 3;
    grid-row-start: 5;
    grid-row-end: 5;
  }
</style>

@endsection

@section('content')

<main class="flex w-full flex-wrap mt-32" id="main">

@foreach ($sounds as $sound)

<div class="_item text-center m-16 mt-0 rounded-lg text-white">
  @if ($sound->cover_path !== 'nocover')
    <img class="_img" src="storage/cover_storage/{{ $sound->cover_path }}" alt="">
  @else
    <div class="_img"></div>
  @endif
  <div class="_text">
    <h3 class="_name font-semibold text-white-500 text-3xl">
      {{ $sound->name }}
    </h3>
    <p class="_tags">
      {{ $sound->tags }}
    </p>
    <p class="_category">
      {{ $categories->where("id", $sound->category)->first()->category }}
    </p>
  </div>
  <audio preload="none" controls src="storage/sound_storage/{{ $sound->sound_path }}"></audio>
  <a class="_download-btn underline decoration-dotted underline-offset-2" href="download/{{ $sound->sound_path }}">Download</a>
  <a class="_report-btn text-red-300 opacity-70" href="{{ asset('report/' . $sound->id) }}">Report</a>
</div>

@endforeach

</main>

<link rel="stylesheet" href="{{ asset('css/audio_player.css') }}" />
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="{{ asset('js/audio_player.js') }}"></script>
<script>$( function() { $( 'audio' ).audioPlayer(); } );</script>
<!-- <script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script> -->

@endsection
