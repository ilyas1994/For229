<?php

namespace App\Http\Controllers\ResponseAdmin;

use App\Http\Controllers\Controller;
use App\Models\responseAdmin\Status_response_false;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class StatusResponseFalse extends Controller
{
    public function index(Request $request) {
        $getIDResponse = $request->get('id');
        $commentAdmin = $request->get('comment');
        $adminEmail = Auth::user()->email;
        try {
            DB::beginTransaction();
            Status_response_false::create([
                'response_admin_id' => $getIDResponse,
                'comment' => $commentAdmin,
                'resolution_admin_email' => $adminEmail,
            ]);
//            DB::table('status_response_falses')->insert([
//                'response_admin_id' => $getIDResponse,
//                'comment' => $commentAdmin,
//                'resolution_admin_email' => $adminEmail,
//            ]);
            DB::commit();
            dump('SucessRESPONSEFalse');
        } catch (Exception $exception) {
            DB::rollBack();
            dump('FAILERROR');
        }
    }
}
