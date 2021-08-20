<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Imports\ExcelImport;
use Illuminate\Support\Facades\DB;
use\Maatwebsite\Excel\Facades\Excel;

class UploadExcel extends Controller
{
    //
    public function excel(Request $request){
        $file = $request->file;

        //dd($file);

        Excel::import(new ExcelImport, $file);
        echo "Inserted Successfully";

        return view('swiftsms.uploadcontact');
    }
}
