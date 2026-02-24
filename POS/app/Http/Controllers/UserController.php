<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index() {
    $data = [
        'nama' => 'Pelanggan Pertama',
    ];
    UserModel::where('username', 'customer1')->update($data);

    $user = UserModel::all();
    return view('user', ['data' => $user]);


  }
}
