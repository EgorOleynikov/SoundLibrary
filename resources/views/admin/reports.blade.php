@extends('layouts.admin')

@section('content')

<h1 class="pb-12 text-2xl font-semibold">Reports</h1>
<div class="container flex justify-center mx-auto">
  <div class="flex flex-col">
      <div class="w-full">
          <div id="form_container" class="border-b border-gray-200 shadow">
            @foreach ($reports as $report)
              <form id="{{ $report->id }}" action="{{ route('admin.reports.destroy') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="report_id" value="{{ $report->id }}">
              </form>
            @endforeach
              <table class="divide-y divide-gray-300">
                  <thead class="bg-gray-50">
                      <tr>
                          <th class="px-6 py-2 text-xs text-gray-500">
                              ID
                          </th>
                          <th class="px-6 py-2 text-xs text-gray-500">
                              Target ID
                          </th>
                          <th class="px-6 py-2 text-xs text-gray-500">
                              Target
                          </th>
                          <th class="px-6 py-2 text-xs text-gray-500">
                              Subject
                          </th>
                          <th class="px-6 py-2 text-xs text-gray-500">
                              User
                          </th>
                          <th class="px-6 py-2 text-xs text-gray-500">
                              Created at
                          </th>
                      </tr>
                  </thead>
                  <tbody id="table" class="bg-white divide-y divide-gray-300">
                  @foreach ( $reports as $report )
                    <tr id="{{ 'tr' . $report->id }}" class="whitespace-nowrap">
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $report->id }}
                        </td>
                        <td class="px-6 py-4 text-center text-sm text-gray-900">
                            {{ $report->sound_id }}
                        </td>
                        <td class="px-6 py-4 text-center text-sm text-gray-900">
                            {{ $report->sound_name }}
                        </td>
                        <td class="px-6 py-4 text-center text-sm text-gray-900">
                            {{ $report->subject_name }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $report->user_id }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $report->created_at }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            <button name="delete_btn" class="px-4 py-1 text-sm text-red-400 bg-red-200 rounded-full delete_btn" form="{{ $report->id }}">Delete</button>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>

<script type="text/javascript" src="{{ asset('js/admin/reports/updateXML.js') }}"></script>
@endsection
