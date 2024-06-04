<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Package;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $destinations = Destination::all();
        $packages = Package::all();
        return view('home', compact('destinations', 'packages'));
    }
}
