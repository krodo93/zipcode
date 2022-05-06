<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\{
    ZipCodes,
    FederalEntity,
    Municipality,
    Settlements,
    SettlementsType
};
class ZipCodesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {   

        $federal_entity_id = (int)$row['c_estado'];
        $municipalities_id = (int)$row['c_mnpio'];
        $settlements_id = (int)$row['id_asenta_cpcons'];

        //CREATE AND CHECK EXISTS FEDERAL ENTITY
        if(!FederalEntity::where('id',$federal_entity_id)->exists()){
            FederalEntity::create([
                'id' => $federal_entity_id,
                'name' => $row['d_estado']
            ]);
        }
        //CREATE AND CHECK EXISTS FEDERAL ENTITY

        //CREATE AND CHECK EXISTS MUNICIPALITY
        if(!Municipality::where('id',$municipalities_id)->exists()){
            Municipality::create([
                'id' => $municipalities_id,
                'name' => $row['d_mnpio']
            ]);
        }
        //CREATE AND CHECK EXISTS MUNICIPALITY

        //CREATE AND CHECK EXISTS SETTLEMENTS
        if(!Settlements::where('id',$settlements_id)->exists()){
            Settlements::create([
                'id' => $settlements_id,
                'name' => $row['d_asenta'],
                'zone_type' => $row['d_zona']
            ]);
        }
        //CREATE AND CHECK EXISTS SETTLEMENTS
        
        //CREATE AND CHECK EXISTS SETTLEMENTS
        if(!SettlementsType::where('id',(int)$row['c_tipo_asenta'])->exists()){
            SettlementsType::create([
                'id' => $row['c_tipo_asenta'],
                'name' => $row['d_tipo_asenta'],
            ]);
        }
        //CREATE AND CHECK EXISTS SETTLEMENTS

        
        return new ZipCodes([
            'codes'  => $row['d_codigo'],
            'federal_entity_id' => $federal_entity_id,
            'municipalities_id' => $municipalities_id,
            'settlements_id'    => $settlements_id
        ]);
    }
}
