<?php 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {

                        $table->increments('staff_id');
            $table->string('first_name', 45);
            $table->string('last_name', 15);
            $table->smallInteger('address_id');
            $table->string('email', 50);
            $table->smallInteger('store_id');
            $table->tinyInteger('active');
            $table->string('username', 16);
            $table->string('password', 40);
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
        Schema::drop('staff');
    }
}

?>