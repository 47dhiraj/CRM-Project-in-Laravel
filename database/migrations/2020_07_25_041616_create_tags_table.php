<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('tags'))                        // Order table already exixts vanera error falna sakcha yo... yesari condtion lagayera check garera matra migrate garney garako
        {
            Schema::create('tags', function (Blueprint $table) 
            {
            $table->id();
            $table->string('name');
            $table->timestamps();
            });
        }

        DB::table('tags')->insert(['name' => 'Summer','created_at' =>  \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()->toDateTimeString()]);
        DB::table('tags')->insert(['name' => 'Winter','created_at' =>  \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()->toDateTimeString()]);
        DB::table('tags')->insert(['name' => 'Sports','created_at' =>  \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()->toDateTimeString()]);
        DB::table('tags')->insert(['name' => 'Fashion','created_at' =>  \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()->toDateTimeString()]);
        DB::table('tags')->insert(['name' => 'Kitchen','created_at' =>  \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()->toDateTimeString()]);
        DB::table('tags')->insert(['name' => 'Electronics','created_at' =>  \Carbon\Carbon::now(),'updated_at' => \Carbon\Carbon::now()->toDateTimeString()]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
