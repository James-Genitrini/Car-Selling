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
        User::factory()
            ->has(Car::factory()->count(5), 'favouriteCars')
            ->create();

        return view('home.index');
    }
}