<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = "film";

    protected $fillable = ["titre", "annee",  ];

    function acteur(){ 
       return $this->hasMany('App\Acteur');
    }
  
}

?>