<?php

namespace App\Core\Config;

use Exception;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{

    protected $table = "config";



    protected $fillable = [
        'name',
        'value',
        'module_id',
        'status',
    ];

    protected $casts = [
        'value' => 'array',
    ];

    public const MODULO_FINANCEIRO = 1;

    public const MODULO_CRM = 2;

    public const MODULO_CMS = 3;

    public const MODULO_AUTOMACAO = 4;

    
    public static function createNewValeu($name, $value, $module_id){
        return Config::create([
            'name' => $name,
            'value' => $value,
            'module_id' => $module_id,
        ]);
    }

    public static function getModulosAtivos()
    {
        return Config::where('name', 'ativo')->get();
    }


    public static function ativarModulo($module_id)
    {
        $modulo = Config::where('module_id',$module_id)->where('name','ativo')->first();

        if(! is_null($modulo)){
            throw new Exception("modulo já ativado", 400);            
        }

        return Config::create([
            'name' => 'ativo',
            'module_id' => $module_id,
            'value' => [],
        ]);
    }

    public static function updateAll($modulos){
        foreach($modulos as $modulo){
            $moduloModel = Config::find($modulo['id']);
            $moduloModel->update($modulo);
       } 
    }

}
