<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(){
        $modules = DB::table('modules')->where('Mobile',1)->get();
        return view('home', compact('modules'));
    }

    public function changeURL(Request $request){

        $url = '';

        $data = view('changeURL', compact('url'))->render();

        return response()->json(['data' => $data]);
    }

    public function changeURLSubmit(Request $request){

        $validate = Validator($request->all(), [
            'url'=> 'required',
        ]);

        if($validate->fails()){
            $errors = $validate->errors()->all();
            return response()->json(['status'=> 1, 'errors' => $errors]);
        }
        
        $url = "http://" . $request->url;

        return response()->json(['status' => 2, 'url' => $url]);
    }
}
