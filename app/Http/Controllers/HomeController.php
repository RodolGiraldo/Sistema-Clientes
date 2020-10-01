<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function testDBConection(){
        try{
            DB::connection()->getPdo();
            if(DB::connection()->getDatabaseName()){
                return "Funciona!!!!";
            }else{
                die("No se encuentra la base de datos");
            }
        }catch(\Exception $e){
            die("No puede abrir el servidor de base de datos");
        }
    }
}
