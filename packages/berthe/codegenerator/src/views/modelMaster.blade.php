
namespace @yield('namespace');

use Illuminate\Database\Eloquent\Model;

class @yield('modelName') extends Model
{
    protected $table = "@yield('tableName')";

    protected $fillable = [@yield('attributs')];

    @yield('relations')
}

?>