<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cars = Car::get();

        $car = Car::where('published_at', '!=', null)->first();

        // dump($car);
        return view('home.index');
    }
}