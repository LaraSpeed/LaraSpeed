<?php 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('language', function (Blueprint $table) {

                        $table->increments('language_id');
            $table->string('name', 20);
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
        Schema::drop('language');
    }
}

?>