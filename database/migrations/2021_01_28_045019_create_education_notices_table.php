<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_notices', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('education_id');
            $table->foreign('education_id')->references('id')->on('education')->onDelete('cascade');

            $table->string('name')->nullable();
            $table->string('slug')->unique();
            $table->longText('image')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('education_notices');
    }
}
