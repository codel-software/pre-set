<?php

namespace App\Http\Controllers;

use App\Core\Config\Config;
use Composer\Util\Http\Response;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    
    public function create(Request $request){

        $config = Config::where('name', $request->input('name'))->first();

        if(is_null($config)){
            $config =  Config::create( $request->all() );
        }else{
            $config->update($request->all());
        }

        return $config;

    }

    public function getKey($key){

        $config = Config::where('name', $key)->first();

        if(is_null($config)){
            return Response(["message" => "valor não encontrado"], 400);
        }

        return $config;
    }

    public function getModulosAtivos(){
        return Config::getModulosAtivos();
    }


    public function ativarModuloFinanceiro(){
        return Config::ativarModulo(Config::MODULO_FINANCEIRO);
    }

    public function ativarModuloCRM(){
        return Config::ativarModulo(Config::MODULO_CRM);
    }

    public function ativarModuloCMS(){
        return Config::ativarModulo(Config::MODULO_CMS);
    }

    public function updateAll(Request $request){
        return Config::updateAll($request->all());
    }

    


}