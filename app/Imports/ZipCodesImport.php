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
        return Settlements::create($row);
    }
}
