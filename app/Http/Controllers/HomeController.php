<?php

namespace App\Http\Controllers;


use App\Models\Car;
use App\Models\CarFeatures;
use App\Models\User;
use App\Models\CarType;
use App\Models\Maker;
use App\Models\CarImage;
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
        // $cars = Car::destroy(ids: 5);

        // $car = Car::find(1);

        // dd($car->features, $car->primaryImage);

        // $car->features->abs =0;
        // $car->features->save();

        $car = Car::find(2);

        $carFeatures = new CarFeatures([
            'abs' => false,
            'air_conditioning' => false,
            'power_windows' => false,
            'power_door_locks' => false,
            'cruise_control' => false,
            'bluetooth_connectivity' => false,
            'remote_start' => false,
            'gps_navigation' => false,
            'heater_seats' => false,
            'climate_control' => false,
            'rear_parking_sensors' => false,
            'leather_seats' => false,
        ]);

        // $car->features()->save($carFeatures);

        $car = Car::find(1);
        // dd($car->images);
        
        // $image = new CarImage([
        //     'image_path' => 'path/to/image.jpg',
        //     'position' => 3,
        // ]);
        // $car->images()->save($image);

        // $car->images()->saveMany([
        //     new CarImage([
        //         'image_path' => 'path/to/image.jpg',
        //         'position' => 4,
        //     ]),
        //     new CarImage([
        //         'image_path' => 'path/to/image.jpg',
        //         'position' => 5,
        //     ])
        // ]);

        // $car->images()->createMany([
        //     ['image_path' => 'something', 'position' => 6],
        //     ['image_path' => 'something', 'position' => 7],
        // ]);

        // $car = Car::find(1);

        // dd($car->carType);

        // $carType = CarType::where('name', 'Hatchback')->first();

        // $cars = $carType->cars;
        // $cars = Car::whereBelongsTo($carType)->get();

        // dd($cars);

        // $car = Car::find(1);

        // $car->car_type_id = $carType->id;
        // $car->save();

        // $car->carType()->associate($carType);
        // $car->save();

        // $car = Car::find(1);
        // dd($car->favouredUser);

        // $user = User::find(1);
        // dd($user->favouriteCars);

        // $user = User::find(1);
        // $user->favouriteCars()->attach([3, 4]);

        
        // $makers = Maker::factory()->count(10)->create();
        // dd($makers);

        // User::factory()->create([
        //     'name' => 'Kevin',
        // ]);

        // User::factory()->count(10)->unverified()->create();

        Maker::factory()->count(5)->has->create();
        return view('home.index');
    }
}