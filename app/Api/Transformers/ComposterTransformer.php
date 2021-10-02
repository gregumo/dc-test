<?php

namespace App\Api\Transformers;

use App\Models\Composter;
use Illuminate\Support\Str;

/**
 * @author Grégoire Humeau <gregoire.humeau@gmail.com>
 */
class ComposterTransformer implements DataTransformerInterface
{
    /**
     * @param $data
     *
     * @return Composter
     */
    public function transformDataToModel($data)
    {
        $composter = new Composter();

        $composter->name = $data->nom;
        $composter->slug = Str::slug($data->nom, '-');

        if(property_exists($data, 'categorie'))
            $composter->type = $data->categorie;

        if(property_exists($data, 'lien'))
            $composter->url = $data->lien;

        if(property_exists($data, 'adresse'))
            $composter->address = $data->adresse;

        if(property_exists($data, 'lieu'))
            $composter->city = $data->lieu;

        if(property_exists($data, 'annee'))
            $composter->sinceYear = $data->annee;

        return $composter;
    }
}