<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index(){
        $packages = Package::all();
        return view('package',compact('packages'));
    }

    public function show($id){
        $package = Package::findOrFail($id);
        
        return view('packages.show', compact('package'));
    }
    
}
