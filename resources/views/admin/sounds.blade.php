@extends('layouts.admin')

@section('custom_style')
<style>
  td{
    max-width: 200px;
    overflow-x: hidden;
  }
</style>
@endsection

@section('content')


  <h1 class="pb-12 text-2xl font-semibold">Sounds</h1>
  <div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full">
            <div class="border-b border-gray-200 shadow">
              @foreach ($sounds as $sound)
                <form id="{{ $sound->id }}" action="{{ route('admin.sounds.update') }}" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" name="sound_id" value="{{ $sound->id }}">
                </form>
              @endforeach
                <table class="divide-y divide-gray-300 ">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                ID
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Name
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Tags
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Category
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Sound path
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Cover path
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                User
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Created at
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Published
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-300">
                    @foreach ( $sounds as $sound )
                      <tr id="{{ 'tr' . $sound->id }}" class="whitespace-nowrap">
                          <td class="px-6 py-4 text-sm text-gray-500">
                              {{ $sound->id }}
                          </td>
                          <td class="px-6 py-4 text-center text-sm text-gray-900">
                              <input type="text" name="sound_name" value="{{ $sound->name }}" form="{{ $sound->id }}">
                          </td>
                          <td class="px-6 py-4 text-center text-sm text-gray-500">
                              <input type="text" name="sound_tags" value="{{ $sound->tags }}" form="{{ $sound->id }}">
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500">
                              <select class="" name="sound_category" form="{{ $sound->id }}">
                              @foreach ($categories as $category)
                                <option class="text-center" value="{{ $category->category }}" @if ($sound->category == $category->id) selected @endif>{{ $category->category }}</option>
                              @endforeach
                              </select>
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500">
                              <input type="text" name="sound_path" value="{{ $sound->sound_path }}" form="{{ $sound->id }}">
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500">
                              <input type="text" name="cover_path" value="{{ $sound->cover_path }}" form="{{ $sound->id }}">
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500">
                              {{ $sound->user_id }}
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500">
                              {{ $sound->created_at }}
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500">
                              <input class="w-8" type="text" name="sound_published" value="{{ $sound->published }}" form="{{ $sound->id }}">
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500">
                              <button name="update_btn" class="px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full update_btn" form="{{ $sound->id }}">Update</button>
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500">
                              <button name="delete_btn" class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full delete_btn" form="{{ $sound->id }}">Delete</button>
                          </td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/admin/sounds/updateXML.js') }}"></script>

@endsection
