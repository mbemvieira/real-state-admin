<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'code', 'type',
        
        'address_cep',
        'address_street',
        'address_number',
        'address_neighbour',
        'address_complements',
        'address_city',
        'address_state',

        'price', 'area',
        'number_bedrooms',
        'number_suite',
        'number_bathrooms',
        'number_rooms',
        'number_parking_places',

        'description'
    ];
}
