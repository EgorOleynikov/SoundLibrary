<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sounds;
use App\Models\Report;
use App\Models\Subject;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Auth;

class SoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index(Request $request) {
       // dd($request->search_text);
       if ($request->ajax()) {
         $search_text = $request->search_text;
         $category_selected = $request->categories;
         $categories = Category::get();
         $uonly = $request->uonly;
         // $p1 = Sounds::orWhere('name', 'Tomorrow');
         // $p2 = Sounds::orWhere('name', '3WW');
         // $res = $p1->union($p2); рабочий метод объединения //
         if (isset($uonly) && Auth::check()) {
           $sounds = Sounds::
              where('published', '1')
             ->where('user_id', Auth::user()->id)
             ->where(function($query) use ($search_text) {
                  $query->where('tags','LIKE','%'.$search_text.'%')
                        ->orWhere('name','LIKE','%'.$search_text.'%');
             });
         } else {
           $sounds = Sounds::
             where('published', '1')
             ->where('name', 'LIKE', '%' . $search_text . '%')
             ->orWhere('tags', 'LIKE', '%' . $search_text . '%');
         }

         $sounds = $sounds->get();

         if (isset($category_selected) && $category_selected !== 'Select category') {
           $cat = Category::find($category_selected)->sounds;
           $sounds = $sounds->intersect($cat);
         }

         return view('ajax.search', [
           'sounds' => $sounds,
           'categories' => $categories
         ])->render();

       } else {
         $sounds = Sounds::where('published', '1')->get();
         $categories = Category::get();
         return view('sounds.index', [
           'sounds' => $sounds,
           'categories' => $categories
         ]);
       }
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        // dd($categories);
        return view('sounds.create', [
          'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $request->validate([
        'name' => 'required|max:64',
        'tags' => 'required|max:64',
        'category' => 'required',
        'sound' => 'required|mimes:mp3,wav,flac,wma|max:131072',
        'cover' => 'mimes:png,jpg,gif|max:10240'
      ]);

      if ($request->hasFile('cover')) {
        $newCoverName = time() . '-' . $request->name . '.' .
        $request->cover->extension();
        $cover_path = $request->file('cover')->storeAs('public/cover_storage', $newCoverName);
      } else {
        $newCoverName = 'nocover';
      }

      $newSoundName = time() . '-' . $request->name . '.' .
      $request->sound->extension();
      $sound_path = $request->file('sound')->storeAs('public/sound_storage', $newSoundName);

      // $sound_path = $request->file('sound')->store('sound_storage');
      // $request->cover->move(public_path('cover_storage'), $newCoverName);
      $user_id = auth()->user()->id;

      $category = Category::where('category', $request->category)->get()->first()->id;
      // dd($category->id);

      $sound = Sounds::create([
        'name' => $request->input('name'),
        'tags' => $request->input('tags'),
        'sound_path' => $newSoundName,
        'category' => $category,
        'cover_path' => $newCoverName,
        'user_id' => $user_id,
        'published' => User::find($user_id)->first()->role == "1" ? "0" : "0"
      ]); // if user has admin role sound publish automatically

      return redirect('/');
    }


    public function download($id) {
      $file = public_path() . '/storage/sound_storage/' . $id;
      $fileName = 'SoundLibrary.com - ' . $id;
      return response()->download($file, $fileName);
    }


    public function report($id, Request $request) {
      if (!is_numeric($id)) {
        return redirect('/');
      }
      if (!isset($id)) {
        return redirect('/');
      }
      $res = Sounds::where('id', $id)->get()->first();
      $subjects = Subject::get();
      return view('sounds.report', [
        'sound_name' => $res->name,
        'subjects' => $subjects
      ]);
    }


    public function report_done(Request $request) {
      $request->validate([
        'options' => 'required'
      ]);

      $sound_id = Sounds::where('name', $request->sound_name)->get()->firstOrFail()->id;
      $subject = Subject::where('id', $request->options)->get()->firstOrFail()->id;

      $report = Report::create([
        'sound_id' => $sound_id,
        'user_id' => Auth::user()->id,
        'subject_id' => $subject
      ]);

      return view('sounds.report_done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
