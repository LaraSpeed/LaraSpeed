use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class @yield('schemaClassName') extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('@yield('createTable')', function (Blueprint $table) {

            @yield('fields')
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('@yield('dropTable')');
    }
}

?>