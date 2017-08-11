<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('status')->nullable();
            $table->string('Gender');
            $table->string('lives')->nullable();
            $table->date('BirthDate')->nullable;
            $table->string('genphoto')->nullable();
            $table->text('photo')->nullable();
            $table->text('description')->nullable();
            $table->text('lookingFor')->nullable();
            $table->integer('user_id')->unique();
            $table->integer('is_online')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
