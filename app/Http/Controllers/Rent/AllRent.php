<?php

namespace App\Http\Controllers\Rent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AllRent extends Controller
{
    public function index()
    {
        $data = DB::select("SELECT rents.id ,users.name, rents.cabinet_number, rents.phone_number, rents.status, rents.count, rents.email_admin, cs.name AS category, dball.model AS modelTechnics
                                    FROM rents
                                    JOIN users ON rents.user_id = users.id
                                    JOIN categories AS cs ON rents.id_category = cs.id
                                    LEFT JOIN db_all_technics AS dball ON rents.id = dball.id
                                    ");

        $arr = [];
        $arrData = [];
        $id = 0;
        $asdARR= [];
        for ($i = 0; $i < count($data); $i++) {
            foreach ($data[$i] as $key => $val){

                if ($key == 'name') {

                    if (isset($arr[$val])) {
                             array_unshift($arr[$data[$i]->category],  $data[$i]->modelTechnics);
                        } else {
                            $arr[$data[$i]->category] =  $data[$i]->modelTechnics;
                        if (!isset($asdARR[$val]))
                            $asdARR[$val] = $data[$i]->id;


                    }

                }


            }
            $arrData[$data[$i]->name] = [
                'oborudovanie' => $arr,
                'id' => $asdARR[$data[$i]->name],
                'cabinet_number' => $data[$i]->cabinet_number,
                'phone_number' => $data[$i]->phone_number,
                'status' => $data[$i]->status,
                'count' => $data[$i]->count,
                'email_admin' => $data[$i]->email_admin
            ];

        }

//        return $arrData;
        dump(Auth::user());
    }


}
