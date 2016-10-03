<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = "language";

    protected $fillable = ["language_id", "name", "last_update",  ];

    function film(){ 
       return $this->hasMany('App\Film');
    }
  
}

?>