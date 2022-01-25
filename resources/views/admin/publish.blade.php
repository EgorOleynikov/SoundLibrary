@extends('layouts.admin')

@section('content')

  <h1 class="pb-12 text-2xl font-semibold">Sounds pending publication</h1>
  <div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full">
            <div class="border-b border-gray-200 shadow">
              @foreach ($sounds as $sound)
                <form id="{{ $sound->id }}" action="{{ route('admin.publish.publish') }}" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" name="sound_id" value="{{ $sound->id }}">
                  <input type="hidden" id="destroy_path" value="{{ route('admin.publish.destroy') }}">
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
                                Catrgory
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Created at
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Publish
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-300">
                    @foreach ( $sounds as $sound )
                      <tr class="whitespace-nowrap" id="{{ 'tr' . $sound->id }}">
                          <td class="px-6 py-4 text-sm text-gray-500">
                              {{ $sound->id }}
                          </td>
                          <td class="px-6 py-4">
                              <input type="text" name="sound_name" class="text-center text-sm text-gray-900" value="{{ $sound->name }}" form="{{ $sound->id }}">
                          </td>
                          <td class="px-6 py-4">
                              <input type="text" name="sound_tags" class="text-center text-sm text-gray-500" value="{{ $sound->tags }}" form="{{ $sound->id }}">
                          </td>
                          <td class="px-6 py-4">
                              <select name="sound_category" form="{{ $sound->id }}">
                                  @foreach ($categories as $category)
                                      <option name="{{ $category->id }}" class="text-center text-sm text-gray-900" value="{{ $category->category }}" @if ($sound->category == $category->id) selected @endif>{{ $category->category }}</option>
                                  @endforeach
                              </select>
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500">
                              {{ $sound->created_at }}
                          </td>
                          <td class="px-6 py-4">
                              <button class="px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full update_btn" form="{{ $sound->id }}">Publish</button>
                          </td>
                          <td class="px-6 py-4">
                              <button class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full delete_btn" form="{{ $sound->id }}">Delete</button>
                          </td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/admin/publish/updateXML.js') }}"></script>

@endsection
