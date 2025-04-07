<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstName')->after('id')->nullable();
            $table->string('lastName')->after('firstName')->nullable();
            $table->dropColumn('name'); // remove o campo antigo
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['firstName', 'lastName']);
            $table->string('name')->nullable(); // opcional: recria o campo name se reverter
        });
    }

};
