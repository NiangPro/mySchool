<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedDouble("valeur");
            $table->string("appreciation");
            $table->unsignedBigInteger('matiere_id')->nullable();
            $table->foreign('matiere_id')->references('id')->on('matieres')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('apprenant_id')->nullable();
            $table->foreign('apprenant_id')->references('id')->on('users')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('period_id')->nullable();
            $table->foreign('period_id')->references('id')->on('periods')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('enseignant_id')->nullable();
            $table->foreign('enseignant_id')->references('id')->on('users')->onUpdate('cascade')
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
        Schema::dropIfExists('notes');
    }
}
