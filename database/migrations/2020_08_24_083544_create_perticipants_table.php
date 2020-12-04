<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
class CreatePerticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perticipants', function (Blueprint $table) {
            $table->increments('id');

            $table->string('code')->unique();
            $table->string('password')->default(Hash::make(1));
            $table->unsignedBigInteger('poll_id')->nullable();
            $table->string('department')->nullable();
            $table->unsignedBigInteger('is_voted')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('perticipants');
    }
}
