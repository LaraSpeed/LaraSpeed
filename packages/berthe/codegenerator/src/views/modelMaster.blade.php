
namespace @yield('namespace');

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class @yield('modelName') extends Model
{
    protected $primaryKey = "@yield('col_id')";

    protected $table = "@yield('tableName')";

    protected $fillable = [@yield('attributs')];

    @yield('relations')

    @yield('accessors')



    public function hasAttribute($attr)
    {
        return array_key_exists($attr, $this->attributes);
    }

    /**
    * The storage format of the model's date columns.
    *
    * @var string
    */
    //protected $dateFormat = 'Y-m-d'; //H:i:s

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    //protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}

?>