<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sounds;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class PublishController extends Controller
{
    public function index() {
      $sounds = Sounds::where('published', '==', '0')->get();
      $categories = Category::get();
      return view('admin.publish', [
        'sounds' => $sounds,
        'categories' => $categories
      ]);
    }

    public function update(Request $request) {
      if ($request->ajax()) {
        $sounds = Sounds::where("id", $request->sound_id)->where("published", "==", "0")->firstOrFail();
        $category = Category::where("category", $request->sound_category)->firstOrFail();
        $sounds->name = $request->sound_name;
        $sounds->tags = $request->sound_tags;
        $sounds->category = $category->id;
        $sounds->published = "1";
        $sounds->save();
        return "success";
      }
    }

    public function destroy(Request $request) {
      if ($request->ajax()) {
        // Deleting table record
        $sound = Sounds::where("id", $request->sound_id)->firstOrFail();
        $sound_path = $sound->sound_path;
        $cover_path = $sound->cover_path;
        $sound->delete();
        // Deleting actual sound
        $sound_path = public_path('storage/sound_storage/' . $sound_path);
        if(File::exists($sound_path)) {
          File::delete($sound_path);
        }else{
          dd($sound_path . ' File does not exists');
        }
        // Deleting actual cover
        $cover_path = public_path('storage/cover_storage/' . $cover_path);
        if(File::exists($cover_path)) {
          File::delete($cover_path);
        }else if($cover_path !== "nocover") {
          dd($cover_path . ' File does not exists');
        }
        return "success";
      }
    }
}
