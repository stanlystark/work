<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sendMessage(Request $request) {
        $data = $request->all();
        if ($data['name'] && $data['mdate'] && $data['comment']) {
            $id = DB::table('messages')->insertGetId(
                ['name' => $data['name'], 'mdate' => $data['mdate'], 'comment' => $data['comment']]
            );
            if($request->ajax() && $id){
                return $id;
            }
        }
    }
    public function getMessages() {
        return DB::table('messages')->count();
    }
}
