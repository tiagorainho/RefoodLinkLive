<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establishments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('owner_id');
            $table->string('name');
            $table->longText('description');
            $table->string('image_url');
            $table->longText('schedule');
            $table->string('address');
            $table->string('city');
            $table->string('country');
            $table->json('coordinates')->nullable();
            $table->string('contact');
            $table->string('rating')->nullable();
            $table->foreignId('validated_by')->nullable();
            $table->timestamp('validated_at')->nullable();
            $table->softDeletesTz();
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
        Schema::dropIfExists('establishments');
    }
}
