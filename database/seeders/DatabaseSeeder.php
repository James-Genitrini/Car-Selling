<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\FuelType;
use App\Models\Maker;
use App\Models\State;
use App\Models\User;
use App\Models\CarType;
use App\Models\Model;
use App\Models\Car;
use App\Models\CarImage;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \Illuminate\Database\Eloquent\Factories\Sequence;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        CarType::factory()
            ->sequence(
                ['name' => 'Sedan'],
                ['name' => 'Hatchback'],
                ['name' => 'SUV'],
                ['name' => 'Pickup Truck'],
                ['name' => 'Minivan'],
                ['name' => 'Jeep'],
                ['name' => 'Coupe'],
                ['name' => 'CrossOver'],
                ['name' => 'Sports Car']
            )
            ->count(9)
            ->create();
        
        FuelType::factory()
        ->sequence(
            ['name' => 'Gasoline'],
            ['name' => 'Diesel'],
            ['name' => 'Electric'],
            ['name' => 'Hybrid'],
        )
        ->count(4)
        ->create();

        $states = [
            'California' => ['Los Angeles', 'San Francisco', 'San Diego'],
            'Texas' => ['Houston', 'Dallas', 'Austin'],
            'Florida' => ['Miami', 'Orlando', 'Tampa'],
            'New York' => ['New York City', 'Buffalo', 'Rochester'],
            'Illinois' => ['Chicago', 'Aurora', 'Naperville'],
            'Pennsylvania' => ['Philadelphia', 'Pittsburgh', 'Allentown'],
            'Ohio' => ['Columbus', 'Cleveland', 'Cincinnati'],
            'Georgia' => ['Atlanta', 'Savannah', 'Augusta'],
            'North Carolina' => ['Charlotte', 'Raleigh', 'Greensboro'],
            'Michigan' => ['Detroit', 'Grand Rapids', 'Ann Arbor'],
        ];

        foreach ($states as $state => $cities) {
            State::factory()
                ->state(['name' => $state])
                ->has(City::factory()->count(count($cities))->sequence(...array_map(fn($city) => ['name' => $city], $cities)))
                ->create();
        }

        $makers = [
            'Toyota' => ['Corolla', 'Camry', 'RAV4'],
            'Ford' => ['F-150', 'Mustang', 'Explorer'],
            'Honda' => ['Civic', 'Accord', 'CR-V'],
            'Chevrolet' => ['Silverado', 'Malibu', 'Equinox'],
            'Nissan' => ['Altima', 'Rogue', 'Sentra'],
            'Lexus' => ['RX', 'ES', 'NX'],
        ];

        foreach ($makers as $makers => $models) {
            Maker::factory()
                ->state(['name' => $makers])
                ->has(Model::factory()->count(count($models))->sequence(...array_map(fn($model) => ['name' => $model], $models)))
                ->create();
        }

        User::factory()
            ->count(3)
            ->create();
        
        User::factory()
            ->count(2)
            ->has(Car::factory()
            ->count(50)
            ->has(
                CarImage::factory()
                ->count(5)
                ->sequence(fn (Sequence $sequence) => ['position' => $sequence->index + 1]),
                'images'
            )
            ->hasFeatures(),
             'favouriteCars')
            ->create();

        
    }
}
