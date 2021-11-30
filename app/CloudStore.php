<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CloudStore{

    public static function updateFile($file)
    {
        $path = Storage::disk('s3')->put('files/erp', $file, 'public');
        return CloudStore::getRootDirectory() . $path;
    }


    public static function getRootDirectory()
    {
        return "https://" . env('AWS_BUCKET') . ".s3." . env('AWS_DEFAULT_REGION') . ".amazonaws.com/" ;
    }


}