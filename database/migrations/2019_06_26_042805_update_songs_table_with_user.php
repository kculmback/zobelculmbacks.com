<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateSongsTableWithUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('songs', function (Blueprint $table) {
            $table->unsignedInteger('invite_id')->nullable()->after('id');
            $table->foreign('invite_id')->references('id')->on('invites')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('songs', function (Blueprint $table) {
            $table->dropColumn('invite_id');
        });
        Schema::enableForeignKeyConstraints();
    }
}
