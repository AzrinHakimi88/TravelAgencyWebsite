<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Package;
use Illuminate\Http\Request;

use function Pest\Laravel\get;

class HomeController extends Controller
{
    public function index(){
        $destinations = Destination::take(5)->get();
        $packages = Package::take(5)->get();
        return view('home', compact('destinations', 'packages'));
    }
}
