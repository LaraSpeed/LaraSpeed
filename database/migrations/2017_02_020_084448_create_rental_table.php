<?php 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('rental', function (Blueprint $table) {

                        $table->smallInteger('rental_id');
            $table->timestamp('rental_date');
            $table->smallInteger('inventory_id');
            $table->smallInteger('customer_id');
            $table->date('return_date');
            $table->smallInteger('staff_id');
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
        Schema::drop('rental');
    }
}

?>