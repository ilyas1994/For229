<?php

namespace App\Http\Controllers\ResponseAdmin;

use App\Http\Controllers\Controller;
use App\Models\rent;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class ResponseAdmin extends Controller
{
        public function index() {
           $status =  DB::table('response_admins')->where('status_response', '=', 'newResponse')->get();
            return $status;

        }
}
