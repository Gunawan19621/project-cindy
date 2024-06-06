<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Menu;

class VillageController extends Controller
{
    // public function serachKelurahan(Request $request){
    //     dd($request->all());
    // }

    public function searchKelurahan(Request $request){
        // $searchTerm = $request->input('search');
        // dd($request->all());

        $villages = Village::where('name', 'LIKE', '%' . $request->search . '%')->get();

        $kelurahan = [];
        foreach ($villages as $key => $village) {
            $kelurahan[$key]['id'] = $village->id;
            $kelurahan[$key]['text'] = $village->name;
        }

        // dd($villages);
        // return response()->json($villages);
        // return response()->json(['results' => $villages]);

        return response()->json(['results' => $kelurahan]);
    }
}
