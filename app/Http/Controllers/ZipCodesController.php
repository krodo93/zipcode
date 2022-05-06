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
        $settlements = DB::table('settlements')->where('codes',$code)->get();
        if($settlements->count() === 0){
            return 'No results';
        }

        $zip_code = collect($settlements)->first();
        $federal_entity = DB::table('federal_entities')->where('id',$zip_code->federal_entity_id)->select('id as key','name','code')->get()->first();
        $municipality = DB::table('municipalities')->where('id',$zip_code->municipalities_id)->select('id as key','name')->get()->first();

        $collect = collect([
            'zip_code' => $zip_code->codes,
            'locality' => $federal_entity->name,
            'federal_entity' => $federal_entity,
            'settlements' => collect($settlements)->map(function($item){
                return [
                    'key' => $item->id,
                    'name' => $item->name,
                    'zone_type' => $item->zone_type,
                    'settlement_type' => DB::table('settlements_types')->where('id',$item->settlements_type_id)->select('name')->get()->first()
                ];
            }),
            'municipality' => $municipality,
        ]);
        return response()->json($collect);
        
    }
}
