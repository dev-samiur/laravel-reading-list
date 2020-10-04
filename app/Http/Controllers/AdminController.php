<?php

namespace App\Http\Controllers;

use App\Admin;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{

            $admins= Admin::all()->sortBy('title');

        } catch(Exception $e){

            return back()->with(['error' => $e->getMessage()]);
            
        }

        return view('pages.admins', ['admins' => $admins]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{

            $admin= Admin::findOrFail(Auth::user()->id);

            $admin->password= bcrypt($request->input('password'));

            $admin->save();

        }   catch(Exception $e){

            return back()->with(['error' => $e->getMessage()]);
            
        }

        return redirect('/admins')->with(['success' => 'Password changed']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $admin= Admin::findOrFail($id);
            $admin->delete();

        } catch(Exception $e){

            return back()->with(['error' => $e->getMessage()]);
            
        }

        return redirect('/admins')->with(['success' => 'Admin deleted']);
    }
}
