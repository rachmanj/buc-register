<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBucsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bucs', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->string('activity_name');
            $table->string('project_code');
            $table->unsignedBigInteger('person_incharge_id'); //penanggung jawab kegiatan
            $table->date('start_date');
            $table->double('budget');
            $table->integer('duration'); // days
            $table->string('status')->default('PROGRESS');
            $table->text('remarks')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->softDeletes(); // created by
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
        Schema::dropIfExists('bucs');
    }
}
