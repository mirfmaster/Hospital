<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('address', 100)->nullable();
            $table->string('city')->nullable();
            $table->string('sex', 10)->default('Male');
            $table->string('salary', 15)->nullable();
            $table->string('experience', 3)->nullable();
            $table->string('specialization', 30)->nullable();
            $table->string('contact')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('users')->insert(
            array(
                'email' => 'super@admin.com',
                'name' => 'Super Admin',
                'password' => Hash::make("123123"),
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
