<?php 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {

                        $table->increments('customer_id');
            $table->smallInteger('store_id');
            $table->string('first_name', 25);
            $table->string('last_name', 45);
            $table->string('email', 50);
            $table->smallInteger('address_id');
            $table->boolean('active');
            $table->date('create_date');
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
        Schema::drop('customer');
    }
}

?>