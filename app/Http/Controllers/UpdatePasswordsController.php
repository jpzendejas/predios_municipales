<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\ActualizarClave;
use Mail;


class UpdatePasswordsController extends Controller
{
    public function user_password_update(Request $request){
      $users = User::orderBy('id')->where('department','==','catastro')->get();
      foreach ($users as $key => $user) {
      Mail::to($user->email)->send(new ActualizarClave($user));
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
    public function send_link(Request $request){
      $users_emails = User::orderBy('id')->where('department',"catastro")->get();
      // MAIL HERE
      // dd($users_emails);
      foreach ($users_emails as $key => $user_email) {
        try {
          Mail::to($user_email->email)->send(new ActualizarClave($user_email));

        } catch (\Exception $e) {
          echo 'Error - '.$e;
        }

      }
    }
}
