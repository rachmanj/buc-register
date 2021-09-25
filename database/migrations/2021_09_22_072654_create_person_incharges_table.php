<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonInchargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_incharges', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title'); //jabatan
            $table->string('project_code')->nullable();
            $table->integer('active')->default(0);
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('created_by'); // created by
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
        Schema::dropIfExists('person_incharges');
    }
}
