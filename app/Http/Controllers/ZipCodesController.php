<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ZipCodesController extends Controller
{
    public function get_codes($code){
        if(is_null($code)){
            return 'Code Null';
        }
        $query = DB::table('settlements')->where('d_codigo',$code)->get();
        if($query->count() === 0){
            return 'No results';
        }

        $first = collect($query)->first();
       
        $collect = collect([
            'zip_code' => $first->d_codigo,
            'locality' => strtoupper($first->d_estado),
            'federal_entity' => [
                'key' => (int)$first->c_estado,
                'name' => strtoupper($first->d_estado)
            ],
            'settlements' => collect($query)->map(function($item){
                return [
                    'key' => (int) $item->id_asenta_cpcons,
                    'name' => strtoupper($item->d_asenta),
                    'zone_type' => strtoupper($item->d_zona),
                    'settlement_type' => [
                        'name' => strtoupper($item->d_tipo_asenta)
                    ]
                ];
            }),
            'municipality' => [
                'key' => (int)$first->c_mnpio,
                'name' => strtoupper($first->d_mnpio)
            ],
        ]);
        return response()->json($collect);
        
    }
}
