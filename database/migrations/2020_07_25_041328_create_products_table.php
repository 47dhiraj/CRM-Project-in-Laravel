<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('products'))                        // Order table already exixts vanera error falna sakcha yo... yesari condtion lagayera check garera matra migrate garney garako
        {
            Schema::create('products', function (Blueprint $table) 
            {
            $table->id();
            $table->string('name')->nullable();
            $table->double('price', 15, 2); 
            $table->string('category')->nullable()->default('Indoor');
            $table->string('description')->nullable();

            $table->timestamps();
            });
        }

        DB::table('products')->insert(['name' => 'T-shirt', 'price' => '1000', 'category' => 'Wear', 'description' => 'Cotton Tshirt','created_at' =>  \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()->toDateTimeString()]);
        DB::table('products')->insert(['name' => 'Jacket', 'price' => '5000', 'category' => 'Wear', 'description' => 'Woolen Jacket','created_at' =>  \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()->toDateTimeString()]);
        DB::table('products')->insert(['name' => 'Football', 'price' => '6000', 'category' => 'Outdoor', 'description' => 'large size ball','created_at' =>  \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()->toDateTimeString()]);
        DB::table('products')->insert(['name' => 'Bag', 'price' => '3000', 'category' => 'Fashion', 'description' => 'trending bag','created_at' =>  \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()->toDateTimeString()]);
        DB::table('products')->insert(['name' => 'Grinder', 'price' => '7000', 'category' => 'Kitchen', 'description' => 'Quality blades','created_at' =>  \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()->toDateTimeString()]);
        DB::table('products')->insert(['name' => 'Laptop', 'price' => '100000', 'category' => 'Electronics', 'description' => 'Gaming Laptop','created_at' =>  \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()->toDateTimeString()]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
