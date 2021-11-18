<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_topics', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('other_product_id');
            $table->foreign('other_product_id')->references('id')->on('other_products')->onDelete('cascade');

            $table->string('heading')->nullable();
            $table->longText('description')->nullable();
            $table->string('title')->nullable();
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
        Schema::dropIfExists('other_topics');
    }
}
