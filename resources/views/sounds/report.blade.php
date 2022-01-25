@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:max-w-lg sm:mt-32">
    <div class="flex">
        <div class="w-full">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    Submit a report
                </header>

                <form class="w-full px-6 pb-6 space-y-6 sm:px-10 sm:space-y-8" name="request" method="POST" action="/report/done">
                    @csrf

                    <div class="flex flex-wrap">
                        <label for="item" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                          {{ __('Report target') }}:
                        </label>

                        <p type="text" class="form-input w-full border-2" name="item" required autocomplete="email" autofocus>
                          {{ $sound_name }}
                        </p>

                        <input type="hidden" name="sound_name" value="{{ $sound_name }}">

                    </div>

                    <div class="flex flex-wrap">
                        <label for="subject" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Report subject') }}:
                        </label>

                        <select class="form-input w-full @error('options') border-red-500 @enderror border-2" name="options" required>
                          @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                          @endforeach
                        </select>

                        @error('options')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <button type="submit"
                        class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-blue-700 sm:py-4">
                            {{ __('Send') }}
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</main>
@endsection
