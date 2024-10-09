<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWmsWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('WMS_WAREHOUSE', function (Blueprint $table) {
            $table->id('Id'); // equivalent to `$table->bigIncrements('id');`
            $table->string('Description', 50)->nullable();
            $table->string('CreateUser', 50)->nullable();
            $table->dateTime('CreateDate')->nullable(); 
            $table->string('UpdateUser', 50)->nullable();
            $table->dateTime('UpdateDate')->nullable();

            // Add indexes or other constraints if necessary
            // $table->index('some_column');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('WMS_WAREHOUSE');
    }
};
