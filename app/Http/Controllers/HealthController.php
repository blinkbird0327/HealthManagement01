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
        if(!$request->get('name')){                                 //判斷欄位是否為空欄，是的話回傳'error'
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

        DB::table('user')->insert([                     //存入資料表'user'
            'name' => $request->get('name'),
            'height'=> $request->get('height'),
            'age'=> $request->get('age'),
            'gender'=> $request->get('gender'),
        ]);
        return 'success';                                        //回傳'success'
    }
    public  function getData(Request $request){                 //跟資料庫拿資料
        $name = $request->get('name');
        $height= $request->get('height');
        $age= $request->get('age');
        $gender= $request->get('gender');
        $date= $request->get('date');
        $weight= $request->get('weight');
        $bmi= $request->get('bmi');
        $bodyfat= $request->get('bodyfat');
        $heightnow= $request->get('heightnow');



        $result = DB::table('user')
            ->where('user.name',$name)
            ->join('userweight', 'user.name', '=', 'userweight.name')
            ->orwhere('height',$height)
            ->orwhere('age',$age)
            ->orwhere('gender',$gender)
            ->orwhere('date',$date)
            ->orwhere('weight',$weight)
            ->orwhere('bmi',$bmi)
            ->orwhere('bodyfat',$bodyfat)
            ->orwhere('heightnow',$heightnow)
            ->get();
//        dd($result->count());
        if ($result->count()==0) {
            return 'data not found';

        }

        return $result;

    }
    public function getWeight(Request $request)
    {
//        dd($request->get('name'),$request->get('weight'));
        if (!$request->get('name')) {                                 //判斷欄位是否為空欄，是的話回傳'error'
            return 'error';
        }
        if (!$request->get('weight')) {
            return 'error';
        }
        if (!$request->get('heightnow')) {
            return 'error';
        }
        if (!$request->get('bmi')) {
            return 'error';
        }
        if (!$request->get('bodyfat')) {
            return 'error';
        }
        if(!$request->get('date')){
            return 'error';
        }
        DB::table('userweight')->insert([                     //存入資料表'user'
            'name' => $request->get('name'),
            'weight' => $request->get('weight'),
            'heightnow' => $request->get('heightnow'),
            'bmi' => $request->get('bmi'),
            'bodyfat' => $request->get('bodyfat'),
            'date'=> $request->get('date'),
        ]);
        return 'success';                                        //回傳'success'
    }
    public  function editData(Request $request){
        if(!$request->get('name')){                                 //判斷欄位是否為空欄，是的話回傳'error'
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
        $name = $request->get('name');
        $height= $request->get('height');
        $age= $request->get('age');
        $gender= $request->get('gender');



        DB::table('user')
            ->where('name',$name)
            ->update([
                'height'=>$height,
                'age'=>$age,
                'gender'=>$gender,
            ]);
        return 'done';

    }
    public  function getAllData(Request $request){                 //跟資料庫拿資料
        $result = DB::table('user')
            ->join('userweight', 'user.name', '=', 'userweight.name')
            ->get();
//        dd($result->count());
        if ($result->count()==0) {
            return 'data not found';
        }

        return $result;

    }
    public  function getUserData(Request $request){                 //跟資料庫拿資料
        $name = $request->get('name');
        $height= $request->get('height');
        $age= $request->get('age');
        $gender= $request->get('gender');



        $result = DB::table('user')
            ->where('user.name',$name)
            ->orwhere('height',$height)
            ->orwhere('age',$age)
            ->orwhere('gender',$gender)
            ->get();
//        dd($result->count());
        if ($result->count()==0) {
            return 'data not found';

        }

        return $result;

    }

}
