<?php

namespace App\Imports;
use App\Models\Settlements;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ZipCodesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {   
        return Settlements::create([
            'd_codigo' => $row['d_codigo'],
            'd_asenta' => strtoupper($row['d_asenta']),
            'd_tipo_asenta' => strtoupper($row['d_tipo_asenta']),
            'd_mnpio' => strtoupper($row['d_mnpio']),
            'd_estado' => strtoupper($row['d_estado']),
            'd_ciudad' => strtoupper($row['d_ciudad']),
            'd_cp' => $row['d_cp'],
            'c_estado' => $row['c_estado'],
            'c_oficina' => $row['c_oficina'],
            'c_mnpio' => $row['c_mnpio'],
            'c_tipo_asenta' => $row['c_tipo_asenta'],
            'id_asenta_cpcons' => $row['id_asenta_cpcons'],
            'd_zona' => $row['d_zona']
        ]);
    }
}
