<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        return view('index');
    }

    public function login(Request $request){

        $validateUser = Validator::make($request->all(), [
            'employeeID' => 'required',
            'password' => 'required|in:password'
        ]);

        if($validateUser->fails()){
            return redirect()->back()->withErrors($validateUser)->withInput();
        }

        return view('warehouse');
    }
}
