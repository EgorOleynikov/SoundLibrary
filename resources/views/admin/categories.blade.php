@extends('layouts.admin')

@section('content')


<form id="0" action="{{ route('admin.categories.update') }}" class="w-3/4 flex justify-around items-center pb-12">
  <h1 class="text-2xl font-semibold">Categories</h1>
  <div class="border-2 py-2 px-6 rounded">
    <h3 class="font-semibold pl-5">Add new category</h3>
    <input type="text" name="category_name" class="mr-2" placeholder="New category name">
    <button id="add_btn" name="add_btn" class="mb-2 bg-transparent hover:bg-blue-500 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Add new</button>
  </div>
</form>
  <div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full">
            <div id="form_container" class="border-b border-gray-200 shadow">
              @foreach ($categories as $category)
                <form id="{{ $category->id }}" action="{{ route('admin.categories.update') }}" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" name="category_id" value="{{ $category->id }}">
                </form>
              @endforeach
                <table class="divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                ID
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Name
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Created at
                            </th>
                        </tr>
                    </thead>
                    <tbody id="table" class="bg-white divide-y divide-gray-300">
                    @foreach ( $categories as $category )
                      <tr id="{{ 'tr' . $category->id }}" class="whitespace-nowrap">
                          <td class="px-6 py-4 text-sm text-gray-500">
                              {{ $category->id }}
                          </td>
                          <td class="px-6 py-4 text-center text-sm text-gray-900">
                              <input type="text" name="category_name" value="{{ $category->category }}" form="{{ $category->id }}">
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500">
                              {{ $category->created_at }}
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500">
                              <button name="update_btn" class="px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full update_btn" form="{{ $category->id }}">Update</button>
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500">
                              <button name="delete_btn" class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full delete_btn" form="{{ $category->id }}">Delete</button>
                          </td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/admin/categories/updateXML.js') }}"></script>
@endsection
