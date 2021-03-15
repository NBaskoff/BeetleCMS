<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("page", function (Blueprint $table) {
            $table->id();
			$table->integer("position")->index();
            $table->string("name");
            $table->text("title")->nullable();
            $table->text("description")->nullable();
            $table->text("keywords")->nullable();
            $table->string("link");
			$table->text("body");
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
        Schema::dropIfExists("page");
    }
}
