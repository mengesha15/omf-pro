<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    public function test(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else {
            $values = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ];
            $query = DB::table('test')->insert($values);
            if ($query) {
                return response()->json(['status'=>1,'msg'=>'New record has been successfully registered']);
            }
        }
        return view('testing');
    }
}
