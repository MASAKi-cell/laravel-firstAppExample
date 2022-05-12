<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\DB;

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

    public function create(Requset $requset) {
        $param = [
            'name' => '$requset->name',
            'mail' => '$requset->mail',
            'age' => '$requset->age',
        ];
        DB::insert('insert into poeple(name,mail,age) values(:name,:mail,:age)', $param);
        return redirect('/hello');
    }
}
