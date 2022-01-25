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
