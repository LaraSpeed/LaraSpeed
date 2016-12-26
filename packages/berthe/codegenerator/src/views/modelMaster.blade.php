
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

}

?>