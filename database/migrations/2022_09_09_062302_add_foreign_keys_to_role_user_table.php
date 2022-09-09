<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('role_user', function (Blueprint $table) {
            //
        $table->foreign('role_id','fk_role_user_to_role')->reference('id')->on('role')->onUpdate('CASCADE')->onDelete('CASCADE');
        $table->foreign('user_id','fk_role_user_to_users')->reference('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('role_user', function (Blueprint $table) {
            //
            $table->dropForeign('fk_role_user_to_role');
            $table->dropForeign('fk_role_user_to_users');
        });
    }
};
