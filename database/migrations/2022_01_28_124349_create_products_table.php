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
        Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->integer('supplier_id')->nullable();
                $table->integer('category_id');
                $table->string('name');
                $table->text('image')->nullable();
                $table->string('code')->nullable();
                $table->string('quantity');
                $table->string('buy_price');
                $table->string('seller_price');
                $table->string('root')->nullable();
                $table->string('buy_date')->nullable();
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
        Schema::dropIfExists('products');
    }
}
