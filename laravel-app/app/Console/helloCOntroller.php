<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $requset) {
        if(isset($requset->id)){
            $param = ['id' => $requset->id];
            $item = DB::select('select * from people where id = :id, $param');
        } else {
            $item = DB::select('select * from people where id = :id');
        }
        return view('hello.index', ['items' => $item]);
    }
}
