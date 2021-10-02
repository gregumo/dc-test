<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Composter;

/**
 * @author Grégoire Humeau <gregoire.humeau@gmail.com>
 */
class ComposterController extends Controller
{

    /**
     * @return Composter[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Composter::all();
    }

    /**
     * @param string $slug
     *
     * @return Composter|null
     */
    public function show($slug)
    {
        $composter = Composter::where('slug', $slug)->first();

        if(!$composter){
            return response()->json(['message' => 'Composter not found'], 404);
        }

        return $composter;
    }
}