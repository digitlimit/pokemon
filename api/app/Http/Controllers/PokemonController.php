<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadPokemonRequest;
use App\Http\Resources\PokemonCollection;
use App\Services\PokemonService;
use App\Models\Pokemon;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pokemans = Pokemon::latest()->paginate();
        return new PokemonCollection($pokemans);
    }

    /**
     * Import resources from a csv.
     */
    public function import(UploadPokemonRequest $request)
    {
        PokemonService::import($request->pokemons);
        return response()->noContent();
    }
}
