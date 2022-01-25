<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
  public function index() {
    $categories = Category::get();
    return view('admin.categories', [
      'categories' => $categories
    ]);
  }

  public function update(Request $request) {
    $type = $request->type;
    $name = $request->category_name;
    if ($type !== "delete_btn") {
      $request->validate([
        'category_name' => 'unique:categories,category|required|max:32'
      ]);
    }
    if ($type !== "add_btn") {
      $id = $request->category_id;
      $category = Category::where('id', $id)->firstOrFail();
    }
    switch ($type) {
    case "update_btn":
      $category->category = $name;
      $category->save();
      return "success";
    case "delete_btn":
      $category->delete();
      return "success";
    case "add_btn":
      $category = Category::create([
        'category' => $name
      ]);
      return ["success", view('ajax.category.category', ['category' => $category])->render(), view('ajax.category.form', ['category' => $category])->render()];
    };
  }
}
