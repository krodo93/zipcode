<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZipCodes extends Model
{
    use HasFactory;

    protected $fillable = ['codes','federal_entity_id','municipalities_id','settlements_id'];
}
