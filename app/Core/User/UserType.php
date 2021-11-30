<?php

namespace App\Core\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'module_finance',
        'module_user',
        'module_module',
        'module_agend'
    ];
}
