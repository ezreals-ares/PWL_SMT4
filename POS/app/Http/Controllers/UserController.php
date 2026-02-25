<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index() {

    // $user = UserModel::where('level_id', 1)->first();
    // $user = UserModel::find(1);
    // $user = UserModel::firstwhere('level_id', 1);
    $user = UserModel::findOr(20, ['username', 'nama'], function() {
      abort(404);
    });

    return view('user', ['data' => $user]);

  }
}
