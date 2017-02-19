<?php 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('inventory', function (Blueprint $table) {

                        $table->smallInteger('inventory_id');
            $table->smallInteger('film_id');
            $table->smallInteger('store_id');
            $table->timestamp('last_update');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('inventory');
    }
}

?>