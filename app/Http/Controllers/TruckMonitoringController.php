<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TruckMonitoringController extends Controller
{
    public function index()
    {
        return view('pages.truck-monitoring');
    }
}
