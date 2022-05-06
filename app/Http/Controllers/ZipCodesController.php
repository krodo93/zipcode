<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZipCodesController extends Controller
{
    public function get_codes($code){
        if(!is_null($code)){
            return 'Code Null';
        }
        
    }
}
