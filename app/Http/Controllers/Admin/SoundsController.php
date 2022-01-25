<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sounds;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class SoundsController extends Controller
{
    public function index() {
      $sounds = Sounds::get();
      $categories = Category::get();
      return view('admin.sounds', [
        'sounds' => $sounds,
        'categories' => $categories
      ]);
    }

    public function update(Request $request) {
      if ($request->ajax()) {
        $request->validate([
          'sound_name' => 'required|max:64',
          'sound_tags' => 'required|max:64',
          'sound_category' => 'required|max:96',
          'sound_path' => 'required|max:96',
          'sound_published' => 'required|numeric|min:0|max:1'
        ]);
        // parsing
        $id = $request->sound_id;
        $name = $request->sound_name;
        $tags = $request->sound_tags;
        $category = $request->sound_category;
        $category = Category::where("category", $category)->firstOrFail()->id;
        $sound_path = $request->sound_path;
        $cover_path = $request->cover_path;
        $published = $request->sound_published;
        $type = $request->type;
        $sound = Sounds::where("id", $id)->firstOrFail();
        if ($type == "update_btn") {
          $sound->name = $name;
          $sound->tags = $tags;
          $sound->category = $category;
          $sound->sound_path = $sound_path;
          $sound->cover_path = $cover_path;
          $sound->published = $published;
          $sound->save();
          return "success";
        } else {
          $sound->delete();
          // Deleting actual sound
          $sound_path = public_path('storage/sound_storage/' . $sound_path);
          if(File::exists($sound_path)) {
            File::delete($sound_path);
          }else{
            dd($sound_path . ' File does not exists');
          }
          // Deleting actual cover
          $cover_full_path = public_path('storage/cover_storage/' . $cover_path);
          if(File::exists($cover_full_path)) {
            File::delete($cover_full_path);
          }else if($cover_path !== "nocover") {
            dd($cover_full_path . ' File does not exists');
          }
          return "success";
        }
      } else {
        return redirect()->back();
      }
    }
}
