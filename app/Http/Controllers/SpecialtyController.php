<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Specialty;

class SpecialtyController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }
    public function index(){
      $specialties = Specialty::all();

      return view('specialties.index', compact('specialties'));
    }
    public function create(){
      return view('specialties.create');
    }

    public function store(Request $request){

      // dd($request->all());
      $rules = [
        'name' => 'required|min:3'
      ];
      $messages = [
        'name.required' => 'Es necesario ingresar un nombre.',
        'name.min' => 'Como mínimo el nombre debe tener 3 caracteres',
      ];

      $this->validate($request, $rules, $messages);
      $specialty = new Specialty();
      $specialty->name= $request->input('name');
      $specialty->description=$request->input('description');
      $specialty->save();

      return redirect('/specialties');

    }
}
