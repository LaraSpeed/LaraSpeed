use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {
    public function up()
    {
        @yield('constraints')
    }
    public function down()
    {
        @yield('dropTables')
    }
}