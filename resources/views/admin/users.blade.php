@extends('layouts.admin')

@section('content')

  <h1 class="pb-12 text-2xl font-semibold">Users</h1>
  <div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full">
            <div class="border-b border-gray-200 shadow">
              @foreach ($users as $user)
                <form id="{{ $user->id }}" action="{{ route('admin.users.update') }}" method="POST">
                  {{ csrf_field() }}
                  <input type="hidden" name="user_id" value="{{ $user->id }}">
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
                                Email
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Created at
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Status
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Action
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Remove
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-300">
                    @foreach ( $users as $user )
                      <tr id="{{ 'tr' . $user->id }}" class="whitespace-nowrap">
                          <td class="px-6 py-4 text-sm text-gray-500">
                              {{ $user->id }}
                          </td>
                          <td class="px-6 py-4">
                              <p class="text-center text-sm text-gray-900">{{ $user->name }}</p>
                          </td>
                          <td class="px-6 py-4">
                              <p class="text-center text-sm text-gray-500">{{ $user->email }}</p>
                          </td>
                          <td class="px-6 py-4 text-sm text-gray-500">
                              {{ $user->created_at }}
                          </td>
                          <td class="px-6 py-4">
                              @switch ($user->role)
                                @case ("0")
                                  <p class="text-center text-sm text-gray-500">User</p>
                                  @break
                                @case ("1")
                                  <p class="text-center text-sm text-gray-500">Admin</p>
                                  @break
                                @case ("2")
                                  <p class="text-center text-sm text-gray-500">Banned</p>
                                  @break
                              @endswitch
                          </td>
                          <td class="px-6 py-4" id="button_container{{ $user->id }}">
                            @if ($user->role == "0")
                              <button name="ban_btn" class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full ban_btn" form="{{ $user->id }}">Ban</button>
                            @elseif ($user->role == "2")
                              <button name="unban_btn" class="px-4 py-1 text-sm text-blue-600 bg-blue-200 rounded-full unban_btn" form="{{ $user->id }}">Unban</button>
                            @endif
                          </td>
                          <td>
                            @if ($user->role != "1")
                              <button name="remove_btn" class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full remove_btn" form="{{ $user->id }}">Remove</button>
                            @endif
                          </td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/admin/users/actionXML.js') }}"></script>

@endsection
