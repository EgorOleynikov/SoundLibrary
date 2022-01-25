@foreach ($sounds as $sound)

<div class="_item text-center m-16 mt-0 rounded-lg text-white">
  @if ($sound->cover_path !== 'nocover')
    <img class="_img" src="storage/cover_storage/{{ $sound->cover_path }}" alt="">
  @else
    <div class="_img"></div>
  @endif
  <div class="_text">
    <h3 class="_name text-white-500 text-3xl">
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
  <a class="_download-btn italic underline decoration-dotted underline-offset-2" href="download/{{ $sound->sound_path }}">Download</a>
  <a class="_report-btn text-red-300 opacity-70" href="{{ asset('report/' . $sound->id) }}">Report</a>
</div>

@endforeach
