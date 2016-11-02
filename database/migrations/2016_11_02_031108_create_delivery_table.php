<?php 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('delivery', function (Blueprint $table) {
            //$table->increments('id');
            $table->increments('id');
            $table->string('identifiant');
            $table->string('date');
            $table->longText('articles');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return  void
     */
    public function down()
    {
        Schema::drop('delivery');
    }
}

?>