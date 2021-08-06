<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_classes', function (Blueprint $table) {
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('classe_id')
                ->constrained('classes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('school_year_id')
                ->constrained('school_years')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->primary(['user_id', 'classe_id', 'school_year_id']);
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
        Schema::dropIfExists('users_classes');
    }
}
