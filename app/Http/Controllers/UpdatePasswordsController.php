<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\ActualizarContraseña;
use Mail;


class UpdatePasswordsController extends Controller
{
    public function user_password_update(Request $request){
      $users = User::orderBy('id')->where('department','<>','NULL')->get();
      foreach ($users as $key => $user) {
          Mail::to($user->email)->send(new ActualizarContraseña($user));
      }
    }

    public function update_passwords(Request $request){
      return view('passwords.update');
    }

    public function update_password(Request $request){

    }
}
