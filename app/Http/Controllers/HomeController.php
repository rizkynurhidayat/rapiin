<?php

namespace App\Http\Controllers;
use App\Models\Hero;
use App\Models\Pricing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $pricings = Pricing::all();
        $hero = Hero::first();
        return view('index', compact('pricings', 'hero'));
    }
}
