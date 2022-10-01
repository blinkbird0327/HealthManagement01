<?php

namespace App\Http\Controllers;

use App\Health;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HealthController extends Controller
{
    public function storeHealth(Request $request)
    {
//        dd($request->get('name'),$request->get('weight'));
        DB::table('user')->insert([
            'name'=> $request->get('name'),
            'weight'=> $request->get('weight'),
        ]);
    }

    public function getHealth()
    {
        $data = Health::where('name','bird')->orWhere('name','a')->get();
        return $data;
    }
}
