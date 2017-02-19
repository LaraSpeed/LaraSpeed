<?php 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('store', function (Blueprint $table) {

                        $table->smallInteger('store_id', 1);
            $table->smallInteger('manager_staff_id', 1);
            $table->smallInteger('address_id', 1);
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
        Schema::drop('store');
    }
}

?>