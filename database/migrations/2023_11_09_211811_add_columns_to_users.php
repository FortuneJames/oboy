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
            $table->enum('role', ['user', 'admin'])->default('user')->after('email');
            $table->decimal('balance', 10, 2)->default(0)->after('email');
            $table->decimal('profit', 10, 2)->default(0)->after('email');
            $table->decimal('bonus', 10, 2)->default(0)->after('email');

            $table->string('image')->nullable()->after('email');
            $table->string('number')->nullable()->after('email');
            $table->string('country')->nullable()->after('email');
            $table->string('street')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role','balance','profit','bonus','image','number','country','street');
        });
    }
};
