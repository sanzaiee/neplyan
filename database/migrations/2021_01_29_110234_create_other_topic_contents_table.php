<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherTopicContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_topic_contents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('other_topic_id');
            $table->foreign('other_topic_id')->references('id')->on('other_topics')->onDelete('cascade');

            $table->string('title')->nullable();

            $table->longText('content')->nullable();
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
        Schema::dropIfExists('other_topic_contents');
    }
}
