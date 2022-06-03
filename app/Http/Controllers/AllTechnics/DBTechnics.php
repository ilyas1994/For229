<?php

namespace App\Http\Controllers\AllTechnics;

use App\Http\Controllers\Controller;
use App\Models\db_all_technics;
use App\Models\rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DBTechnics extends Controller
{
    public function index() {
       $dbAllTechnics = DB::table('db_all_technics')->select('name', 'model', 'count', 'start_live', 'end_live')->get();
       dump($dbAllTechnics);
    }
}
