<?php

namespace App\Http\Controllers\ResponseAdmin;

use App\Http\Controllers\Controller;
use App\Models\rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class InsertResponse extends Controller
{
    public function index(Request $request) {

        // 1 ноут
        // 2 проектор
        $category = 0;
//        dd($request->all());
        switch ($request->input('getOption')){
            case 1 : {
                $category = 7;
                break;
            }
            case 2 : {
                $category = 8;
                break;
            }

        }
        $request->validate([
            'getOption' => 'required',
            'start' => 'required|date',
            'end' => 'required|date'
        ]);
        // 1 ноутбук
        // 2 проектор


        try {
            DB::beginTransaction();
            rent::create([
                'user_id' => Auth::id(),
                'phone_number' => Auth::user()->phone_number,
                'id_category' => $category,
                'status' => 'short_rent',
                'count' => 1,
                'email_admin' => 'qwe@qwe',
                'cabinet_number' => '777'
            ]);
            \App\Models\responseAdmin::create([
                'user_id' => Auth::id(),
                'status_response' => 'newResponse',
                'admin_email' => 'null',
                'start_live' => $request->input('start'),
                'end_live' => $request->input('end'),
            ]);
            DB::commit();
            dd('SUCCESS');
        }catch (Exception $exception) {
            DB::rollBack();
            dd($exception);
        }


    }
}
