<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Support\Facades\DB;
use App\Formulario;


class ExcelController extends Controller
{
    public function exportargrupos(){

    	Excel::create('Filename', function($excel){

    		$excel->sheet('grupos',function($sheet){
    			
    			$grupos = Formulario::all();
    			$sheet->fromArray($grupos);


    		});

		})->export('xlsx');
#
    }
}
