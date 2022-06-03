<?php

namespace App\Http\Controllers\ResponseAdmin;

use App\Http\Controllers\Controller;
use App\Models\responseAdmin\Status_response_true;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class StatusResponseTrue extends Controller
{
    public function index(Request $request) {

       $asd =  $request->all();
       $getIDResponse = $request->get('id');
       $adminEmail = Auth::user()->email;
        $getCurrentResponseID = DB::table('status_response_trues')->where('response_id', '=', $getIDResponse)->exists();
        try {
            DB::beginTransaction();
            if ($getCurrentResponseID) {
                // update с Показом created_at и updated_at
                Status_response_true::query()->where('response_id', '=', $getIDResponse)->
                update([
                    'response_id' => $getIDResponse,
                    'resolution_admin_email' => $adminEmail,
                    'state_lease' => 'used',
                ]);
            } else {
                // update с Показом created_at и updated_at
                Status_response_true::create([
                    'response_id' => $getIDResponse,
                    'resolution_admin_email' => $adminEmail,
                    'state_lease' => 'await',
                ]);

            }

            DB::commit();
            dd('success');
        } catch (Exception $exception) {
            DB::rollBack();
            dd('FAIL');
        }





    }
}
