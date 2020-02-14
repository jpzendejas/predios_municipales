<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\ActualizarContraseña;
use Mail;


class UpdatePasswordsController extends Controller
{
    public function user_password_update(Request $request){
      $users = User::orderBy('id')->where('department','<>','NULL')->get();
      foreach ($users as $key => $user) {
          // Mail::to($user->email)->send(new ActualizarContraseña($user));
      }
    }

    public function update_passwords(Request $request){
      return view('passwords.update');
    }

    public function password_updates(Request $request){
      $rules = [
        'email'=>'required',
        'password'=>'required|min:6'
      ];
      $this->validate($request, $rules);
      $user = User::where('email', $request->email)->first();
      $user->password = Hash::make($request->password);
      $user->save();
      $notification = array(
        'message' =>'Contraseña Actualizada Correctamente',
        'alert-type' => 'success'
      );
      return redirect('login')->with($notification);
    }
}
