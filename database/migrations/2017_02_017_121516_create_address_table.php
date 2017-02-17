<?php 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {

                        $table->smallInteger('address_id');
            $table->string('address', 50);
            $table->string('address2', 50);
            $table->string('district', 20);
            $table->smallInteger('city_id');
            $table->string('postal_code', 10);
            $table->string('phone', 20);
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
        Schema::drop('address');
    }
}

?>