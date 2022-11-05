<?php

namespace App\Http\Controllers;

use App\Health;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HealthController extends Controller
{
    public function getName(Request $request)
    {
//        dd($request->get('name'),$request->get('weight'));
        if(!$request->get('name')){                                 //判斷欄位是否為空欄，式的話回傳'error'
            return 'error';
        }
        if(!$request->get('weight')){
            return 'error';
        }
        if(!$request->get('gender')){
            return 'error';
        }
        if(!$request->get('height')){
            return 'error';
        }
        if(!$request->get('age')){
            return 'error';
        }
        if(!$request->get('date')){
            return 'error';
        }
        DB::table('user')->insert([                     //存入資料表'user'
            'name' => $request->get('name'),
            'weight' => $request->get('weight'),
            'height'=> $request->get('height'),
            'age'=> $request->get('age'),
            'gender'=> $request->get('gender'),
            'date'=> $request->get('date'),
        ]);
        return 'sucess';
    }
//    public function getHealth()
//    {
//        $data = Health::where('name','abc')->get();     //where是and閘 orwhere是或閘
//        return $data;
//    }
}
