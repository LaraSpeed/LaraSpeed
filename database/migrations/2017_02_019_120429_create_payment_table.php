<?php 
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return  void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {

                        $table->smallInteger('payment_id');
            $table->smallInteger('customer_id');
            $table->smallInteger('rental_id');
            $table->decimal('amount', 4, 4);
            $table->timestamp('payment_date');
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
        Schema::drop('payment');
    }
}

?>