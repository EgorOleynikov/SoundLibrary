<form id="{{ $category->id }}" action="{{ route('admin.categories.update') }}" method="POST">
  {{ csrf_field() }}
  <input type="hidden" name="category_id" value="{{ $category->id }}">
</form>
