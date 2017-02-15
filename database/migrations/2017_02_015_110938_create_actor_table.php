<?php 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('actor', function (Blueprint $table) {

                        $table->smallInteger('actor_id', 1);
            $table->string('first_name', 30);
            $table->string('last_name', 30);
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
        Schema::drop('actor');
    }
}

?>