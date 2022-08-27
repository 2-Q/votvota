<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('voting_id');
            $table->unsignedBigInteger('student_id');
            $table->string('status')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('voting_id')->references('id')->on('votings')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('voters');
    }
}
