<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Electronic;

class ElectronicsController extends Controller
{
    public function index(){
        $electronics = Electronic::all();
        return view('student.allelectronics',compact('electronics'));
}
}