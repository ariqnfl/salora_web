<?php

namespace App\Http\Controllers;

use App\Lapangan;
use App\User;

class PanelController extends Controller
{
    public function index()
    {
        $count = User::count();
        $con_lap = Lapangan::count();
        return view('layouts.index',compact('count','con_lap'));
    }
}
