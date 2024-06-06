<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Village; 
use Illuminate\Http\Request;

class DebugeController extends Controller
{
    public function index(){
        
        // $province = Province::find(11);
        // dd($province->regencies);

        $village = Village::find(1103060024);

        if ($village) {
            dd($village->district->regency->province);
        } else {
            dd('Village not found');
        }
        
    }
}
