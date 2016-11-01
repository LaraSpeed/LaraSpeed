
namespace @yield('namespace');

use Illuminate\Database\Eloquent\Model;

class @yield('modelName') extends Model
{
    protected $primaryKey = "@yield('col_id')";

    protected $table = "@yield('tableName')";

    protected $fillable = [@yield('attributs')];

    @yield('relations')

    @yield('accessors')
}

?>