<?php

namespace App\Imports;
use App\Models\Settlements;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use DB;
class ZipCodesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {   

        $federal_entity_id = (int)$row['c_estado'];
        $municipalities_id = (int)$row['c_mnpio'];
        $settlements_type_id = (int)$row['c_tipo_asenta'];

        //CREATE AND CHECK EXISTS FEDERAL ENTITY
        if(!DB::table('federal_entities')->where('id',$federal_entity_id)->exists()){
            DB::table('federal_entities')->insert([
                'id' => $federal_entity_id,
                'name' => $row['d_estado']
            ]);
        }
        //CREATE AND CHECK EXISTS FEDERAL ENTITY

        //CREATE AND CHECK EXISTS MUNICIPALITY
        if(!DB::table('municipalities')->where('id',$municipalities_id)->exists()){
            DB::table('municipalities')->insert([
                'id' => $municipalities_id,
                'name' => $row['d_mnpio']
            ]);
        }
        //CREATE AND CHECK EXISTS MUNICIPALITY
        
        //CREATE AND CHECK EXISTS SETTLEMENTS TYPE
        if(!DB::table('settlements_types')->where('id',$settlements_type_id)->exists()){
            DB::table('settlements_types')->insert([
                'id' => $row['c_tipo_asenta'],
                'name' => $row['d_tipo_asenta'],
            ]);
        }
        //CREATE AND CHECK EXISTS SETTLEMENTS TYPE

        
        return Settlements::create([
            'codes'  => $row['d_codigo'],
            'name' => $row['d_asenta'],
            'zone_type' => $row['d_zona'],
            'federal_entity_id' => $federal_entity_id,
            'municipalities_id' => $municipalities_id,
            'settlements_type_id'    => $settlements_type_id
        ]);
    }
}
