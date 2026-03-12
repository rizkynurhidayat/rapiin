<?php

namespace App\Http\Controllers;
use App\Models\Hero;
use App\Models\Pricing;
use App\Models\Footer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $pricings = Pricing::all();
        $hero = Hero::first();
        $footer = Footer::latest()->first();
        return view('index', compact('pricings', 'hero', 'footer'));
    }
}
