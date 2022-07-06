<?php
namespace App\Models;

use illuminate\Database\Eloquent\Model;

class Pokemon extends Model{
    protected $table = 'pokemons';
    protected $fillable = [
        'id', 'name', 'flavor_text',                                 
    ];
}