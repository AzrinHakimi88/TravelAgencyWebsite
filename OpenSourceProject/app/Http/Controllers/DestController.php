<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Package;
use Illuminate\Http\Request;

class DestController extends Controller
{
    public function index(){
        $destinations = Destination::all();
        return view('destination', compact('destinations'));
    }

    public function show($id){
        $destination = Destination::findOrFail($id);
        $packages = $destination->package;
        return view('destinations.show', compact('destination','packages'));
    }


}
