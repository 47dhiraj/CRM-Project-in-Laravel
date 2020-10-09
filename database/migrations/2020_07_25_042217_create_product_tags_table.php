<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('product_tags'))                        // Order table already exixts vanera error falna sakcha yo... yesari condtion lagayera check garera matra migrate garney garako
        {
            Schema::create('product_tags', function (Blueprint $table) 
            {
            $table->id();
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            //$table->foreign('product_id')->references('id')->on('products')->onDelete('set null');

            $table->unsignedBigInteger('tag_id')->index();
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            //$table->foreign('tag_id')->references('id')->on('tags')->onDelete('set null');

            // $table->timestamps();
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
        Schema::dropIfExists('product_tags');
    }
}
