<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cours', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->time("debut");
            $table->time("fin");
            $table->string("jour");
            $table->unsignedBigInteger('matiere_id')->nullable();
            $table->foreign('matiere_id')->references('id')->on('matieres')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('classroom_id')->nullable();
            $table->foreign('classroom_id')->references('id')->on('classrooms')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('classe_id')->nullable();
            $table->foreign('classe_id')->references('id')->on('classes')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('school_year_id')->nullable();
            $table->foreign('school_year_id')->references('id')->on('school_years')->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('cours');
    }
}
