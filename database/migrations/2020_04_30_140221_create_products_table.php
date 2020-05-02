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
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->unsignedBigInteger('category_id')->index();
            $table->unsignedBigInteger('amount')->unsigned()->default(0);
            $table->decimal('current_price',12,2)->default(0);
            $table->decimal('previous_price',12,2)->default(0);
            $table->integer('discount')->unsigned()->default(0);
            $table->text('short_description')->nullable();
            $table->text('full_description')->nullable();
            $table->text('specifications')->nullable();
            $table->text('extra_info')->nullable();
            $table->unsignedBigInteger('views')->default(0);
            $table->unsignedBigInteger('sales')->default(0);
            $table->string('status')->nullable();
            $table->char('active',2)->nullable();
            $table->char('slider',2)->nullable();

            $table->foreign('category_id')->references('id')
                                                  ->on('categories');

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
