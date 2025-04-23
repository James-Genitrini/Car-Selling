<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $cars = User::find(1)
        ->cars()
        ->with(['primaryImage', 'maker', 'model'])
        ->orderBy("created_at","desc")
        ->paginate(15);
        return view('car.index', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Car $car)
    {
        return view('car.show', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        return view('car.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $card)
    {
        //
    }

    public function search(Request $request)
    {
        // On commence par la requête de base : on récupère les voitures publiées
        $query = Car::where('published_at', '<', now())
            ->with(['primaryImage', 'city', 'carType', 'fuelType', 'maker', 'model'])
            ->orderBy('published_at', 'desc');
    
        // On applique les filtres dynamiquement si l'utilisateur a rempli les champs dans le formulaire
    
        // Filtre par marque
        if ($request->filled('maker_id')) {
            $query->where('maker_id', $request->maker_id);
        }
    
        // Filtre par modèle
        if ($request->filled('model_id')) {
            $query->where('model_id', $request->model_id);
        }
    
        // Filtre par type de carburant
        if ($request->filled('fuel_type_id')) {
            $query->where('fuel_type_id', $request->fuel_type_id);
        }
    
        // Filtre par ville
        if ($request->filled('city_id')) {
            $query->where('city_id', $request->city_id);
        }
    
        // Filtre par prix minimum
        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->price_min);
        }
    
        // Filtre par prix maximum
        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->price_max);
        }
    
        $cars = $query->paginate(15)->withQueryString();
    
        $makers = \App\Models\Maker::all();
        $models = \App\Models\Model::all();
        $cities = \App\Models\City::all();
        $fuelTypes = \App\Models\FuelType::all();
        $carTypes = \App\Models\CarType::all();
        $states = \App\Models\State::all();

        return view('car.search', [
            'cars' => $cars,
            'makers' => $makers,
            'models' => $models,
            'cities' => $cities,
            'fuelTypes' => $fuelTypes,
            'carTypes' => $carTypes,
            'states' => $states,
            'filters' => $request->all(),
        ]);
    }    
    

    public function watchlist()
    {
        $cars = User::find(4)->favouriteCars()->with(['primaryImage', 'city', 'carType', 'fuelType', 'maker', 'model'])->paginate(15);
        return view('car.watchlist', ['cars' => $cars]);
    }
}
