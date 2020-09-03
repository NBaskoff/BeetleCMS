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
			$table->enum("display", ["Y", "N"])->default("Y");
			$table->float("price");
			$table->float("price_sale");
			$table->text("body");
			$table->text("img");
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
