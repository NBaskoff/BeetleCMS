<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("catalog_items", function (Blueprint $table) {
            $table->id();
			$table->integer("parent_id")->index();
			$table->integer("position")->index();
            $table->string("name");
			$table->enum("active", ["Y", "N"])->default("Y");
            $table->text("title")->nullable();
            $table->text("description")->nullable();
            $table->text("keywords")->nullable();
			$table->float("price")->nullable();
			$table->float("price_sale")->nullable();
			$table->text("body")->nullable();
			$table->text("img")->nullable();
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
        Schema::dropIfExists("catalog_items");
    }
}
