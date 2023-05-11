<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('email_verified_at');
            $table->dropColumn('password');

            $table->string('location')->nullable()->after('email');
            $table->text('bio')->after('email');
            $table->date('birthdate')->nullable()->after('email');
            $table->string('username')->unique()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();

            $table->dropColumn('username');
            $table->dropColumn('bio');
            $table->dropColumn('map_location');
            $table->dropColumn('birthdate');
        });
    }
};
