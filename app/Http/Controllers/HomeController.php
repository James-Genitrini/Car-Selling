<?php

namespace App\Http\Controllers;


use App\Models\Car;
use App\Models\CarFeatures;
use App\Models\User;
use App\Models\CarType;
use App\Models\Maker;
use App\Models\Model;
use App\Models\CarImage;
use App\Models\FuelType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::where('published_at', '<', now())
            ->with(['primaryImage', 'city', 'carType', 'fuelType', 'maker', 'model'])
            ->orderBy('published_at', 'desc')
            ->limit(30)
            ->get();

        

        return view('home.index', ['cars' => $cars]);
    }
}