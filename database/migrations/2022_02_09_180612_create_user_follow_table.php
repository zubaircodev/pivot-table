<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFollowTable extends Migration
{
    public function up()
    {
        Schema::create('user_follow', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('following_id')->nullable()->constrained('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_follow');
    }
}
