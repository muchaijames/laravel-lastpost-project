<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

   Public function index()
   {
       return view('auth.register');
   }

   Public function store(Request $request)
   {
     
    //validation
    $this->validate($request, [

        'name' => 'required|max:255',
        'username' => 'required|max:255',
        'email' => 'required|email|max:255',
        'password' => 'required|confirmed',
    ]);
     //store the user

     User::create([
         'name' => $request->name,
         'username' => $request->username,
         'email' => $request->email,
         'password' => Hash::make($request->password),

     ]);

     //sign the user in the dashboard
     auth()->attempt($request->only('email', 'password'));
     //redirect

     return redirect()->route('dashboard');
     //alternative....return redirect('/dashboard')

   }
}
