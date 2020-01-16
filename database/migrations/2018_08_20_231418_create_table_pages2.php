<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePages2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages2', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name',100);
            $table->string('alias',100);
			$table->text('caption1');			
			$table->text('caption2');
			$table->text('text');			
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pages2');
    }
}
