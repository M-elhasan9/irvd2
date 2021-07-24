<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inputs', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('national_number')->nullable();
            $table->string('civil_state')->nullable();
            $table->string('gander')->nullable();
            $table->string('birth_year')->nullable();
            $table->string('prosthetics_number')->nullable();

            //Center information
            $table->string('center_name')->nullable();
            $table->string('level')->nullable();
            $table->string('form_no')->default(0);//must to be uniqe
            $table->string('available_doc')->nullable();
            $table->string('service')->nullable();
            $table->string('type')->nullable();
            $table->string('cause')->nullable();
            $table->date('date')->nullable();
            $table->string('not')->nullable();
            $table->string('pdf')->nullable();
            $table->string('pdf_repair')->nullable();
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
        Schema::dropIfExists('inputs');
    }
}
