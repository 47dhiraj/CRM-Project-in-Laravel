<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\True_;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('orders'))                        // Order table already exixts vanera error falna sakcha yo... yesari condtion lagayera check garera matra migrate garney garako
        {
            Schema::create('orders', function (Blueprint $table) 
            {
            $table->id();
            $table->string('status')->nullable()->default('Pending');
            $table->string('note')->nullable()->default('Product Ordered');

            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('set null');

            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            //$table->foreign('product_id')->references('id')->on('products')->onDelete('set null');

            
            $table->timestamp('ordered_at');
            $table->timestamps();

            $table->softDeletes();
          
            
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');

    
        Schema::table('orders', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
