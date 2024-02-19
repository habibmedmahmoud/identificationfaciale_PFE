<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identifications', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('file1Name')->nullable();
            $table->string('file2Name')->nullable();
            $table->text('token')->nullable();
            $table->datetime('tokenValideTo')->nullable();
            $table->string('status')->nullable();
            $table->string('nni')->nullable();
            $table->string('tel')->nullable();
            $table->string('type_document')->nullable();
            $table->integer('matching')->nullable();
            $table->integer('matching_human')->nullable();
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
        Schema::dropIfExists('identifications');
    }
}
