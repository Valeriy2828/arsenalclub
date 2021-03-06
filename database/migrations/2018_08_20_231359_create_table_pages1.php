<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePages1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages1', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name',100);
            $table->string('alias',100);
			$table->text('caption1');			
			$table->text('caption2');
			$table->text('text1');
			$table->text('text2');
			$table->string('images',100);
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
        Schema::drop('pages1');
    }
}
