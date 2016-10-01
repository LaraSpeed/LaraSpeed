<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Acteur extends Model
{
    protected $table = "acteur";

    protected $fillable = ["nom", "age",  ];

    function film(){ 
       return $this->belongsTo('App\Film');
    }
  
}

?>