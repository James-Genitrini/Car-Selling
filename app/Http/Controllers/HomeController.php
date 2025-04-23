<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Maker;
use App\Models\FuelType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $carData = [
        //     'maker_id' => 1,
        //     'model_id' => 1,
        //     'year' => 2024,
        //     'price' => 20000,
        //     'vin' => '9999',
        //     'mileage' => 10000,
        //     'car_type_id' => 1,
        //     'fuel_type_id' => 1,
        //     'user_id' => 1,
        //     'city_id' => 1,
        //     'address' => '123 Main St',
        //     'phone' => '1234567890',
        //     'description' => 'This is a test car',
        //     'published_at' => now(),
        // ];

        // Car::create($carData);

        // $cars = Car::get();

        // $car = Car::where('published_at', '!=', null)->first();

        // dump($car);

        // $car = car::find(1);
        // $car->price = 5000;
        // $car->save();

        // Car::updateOrCreate(attributes: ['vin' => 999, 'price' => 20000], ['price' => 25000]);

        // Car::destroy([1, 2]);

        // Car::where('published_at', null)
        //     ->where('user_id', 1)
        //     ->delete();

        // Car::truncate(); 

        // // Retrieve all Cars record where the price is greater than 10000
        // $cars = Car::where('price', '>', 20000)->get();

        // // Fetch the Maker details where the Maker name is 'Toyota'
        // $maker = Maker::where('name', 'Toyota')->first();

        // // Insert a new FuelType with the name 'Hydrogen'
        // FuelType::create(['name' => 'Hydrogen']);

        // // Update the price of the Car with id 1 to 30000
        // $car = Car::find(1);
        // $car->price = 30000;
        // $car->save();

        // Delete car id 2
        $cars = Car::destroy(5);
        
        return view('home.index');
    }
}