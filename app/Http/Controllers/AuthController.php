<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use Exception;

class AuthController extends Controller
{
    public function registerPage(){

        return view('pages.register');

    }

    public function loginPage(){

        return view('pages.login');

    }

    public function register(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with(['error' => $validator->errors()]);
        }

        try{
 
            Admin::create([
                'name' => strtolower($request->input('name')),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'permission' => 2
            ]);

        } catch (Exception $e) {
            
            return back()->with(['error' => $e->getMessage()]);
        }

        return back()->with(['success' => 'Account created' ]);
    }

    public function login(Request $request) 
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->with(['error' => $validator->errors()]);
        }

        $userCredentials = $request->only('email', 'password');

        if (Auth::attempt($userCredentials)) {
            if ( Auth::check() ) {
                return redirect('/dashboard');
            }
        }

        else {
            return back()->with(['error' => 'Wrong email or password']);
        }
    }

    public function logout(Request $request ) 
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('/admin/login');
    }
}
