@extends('layouts.app')

@section('custom_style')
<style media="screen">
  body{
    background-image: url({{ asset('/storage/' . 'bg_cover.jpg') }});
    background-size: cover;
    background-attachment: fixed;
    color: white;
  }
  #container{
    padding: 50px;
    padding-left: 100px;
    padding-right: 100px;
    /* background-color: rgba(70, 70, 90, 0.4); */
    background: rgb(179,128,0);
    background: radial-gradient(circle, rgba(179,128,0,.3) 0%, rgba(181,126,45,.3) 44%, rgba(26,134,166,.4) 70%);
  }
  select, input:not([type="file"]){
    color: black;
  }
</style>
@endsection

@section('content')

<div class="w-full h-full flex justify-center items-center flex-col">
  <form id="container" class="flex flex-col justify-center items-center mt-32 w-2/4 rounded" action="/" method="POST" enctype="multipart/form-data">
    @csrf
    <h1 class="text-xl text-white mb-5">Creating new sound</h1>
    <label for="name" class="w-full pl-3 py-2 text-left">Name your sound</label>
    <input class="p-3 rounded m-3 w-full" type="text" name="name" placeholder="Sound name...">
    <label for="tags" class="w-full pl-3 py-2 text-left">Give your sound tags</label>
    <input class="p-3 rounded m-3 w-full" type="text" name="tags" placeholder="Sound tags...">
    <label for="category" class="w-full pl-3 py-2 text-left">Select category</label>
    <select class="p-3 rounded m-3 w-full" name="category">
      @if (isset($categories) && $categories !== NULL)
        @foreach ($categories as $category)
          <option value="{{ $category->category }}">{{ $category->category }}</option>
        @endforeach
      @endif
    </select>
    <div class="m-3 border-2 w-full flex justify-between items-center">
      <label class="pl-4" for="sound">Sound file</label>
      <input class="p-1 m-3" type="file" name="sound">
    </div>
    <div class="m-3 border-2 w-full flex justify-between items-center">
      <label class="pl-4" for="sound">Album cover</label>
      <input class="p-1 m-3" type="file" name="cover">
    </div>
    @if ($errors->any())
      <div class="w-4/8 m-auto text-center">
        @foreach ($errors->all() as $error)
          <li class="text-red-300 list-none">
            {{ $error }}
          </li>
        @endforeach
      </div>
    @endif
    @if (auth()->user()->isAdmin())
      <div class="w-48 h-20 border-2 border-blue-400 rounded mt-4">
        <p class="text-white font-semibold text-center mt-2">Since you are an admin, the sound will be published automatically</p>
      </div>
    @else
      <div class="w-48 h-20 border-2 border-blue-400 rounded mt-4">
        <p class="text-white font-semibold text-center mt-2">The sound will be published after admin approval</p>
      </div>
    @endif
    <button class="mt-3 bg-transparent hover:bg-blue-500 text-white font-semibold hover:text-white py-2 px-4 border border-white hover:border-transparent rounded" type="submit" name="" value="Submit">Submit</button>
  </form>
</div>

@endsection
