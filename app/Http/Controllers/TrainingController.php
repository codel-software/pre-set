<?php

namespace App\Http\Controllers;

use App\CloudStore;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function trainingHome(){
        return view('user.training.trainingHome');
    }
}
