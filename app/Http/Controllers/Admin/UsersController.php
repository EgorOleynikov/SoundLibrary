<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
  public function index() {
    $users = User::get();
    return view('admin.users', [
      'users' => $users
    ]);
  }

  public function update(Request $request) {
    if ($request->ajax()) {
      $id = $request->id;
      $type = $request->type;
      $user = User::where("id", $id)->firstOrFail();
      if($user->role !== "1") {
        switch ($type) {
          case "unban_btn":
            $user->role = "0";
            $user->save();
            return "success";
            break;
          case "ban_btn":
            $user->role = "2";
            $user->save();
            return "success";
            break;
          case "remove_btn":
            $user->delete();
            return "success";
            break;
        }
      } else {
        return "Action denied";
      }
    } else {
      return redirect()->back();
    }
  }
}
