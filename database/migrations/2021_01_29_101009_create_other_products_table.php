<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('author')->unique();
            $table->string('slug')->unique();

            $table->unsignedBigInteger('other_id')->nullable();
            $table->foreign('other_id')->references('id')->on('others')->onDelete('cascade');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('price')->nullable();
            $table->longText('image')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('approve');
            $table->boolean('status')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('other_products');
    }
}
