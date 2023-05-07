<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('role');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        $user1 = new User();
        $user1->name = 'Admin';
        $user1->email = 'admin@email.com';
        $user1->role = 'admin';
        $user1->password = Hash::make('admin@');
        $user1->save();

        $user2 = new User();
        $user2->name = 'User';
        $user2->email = 'user@email.com';
        $user2->role = 'user';
        $user2->password = Hash::make('user@1');
        $user2->save();
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
