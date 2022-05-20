<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->string('label')->after('name')->nullable();
            $table->softDeletes();
        });

        Schema::table('roles', function (Blueprint $table) {
            $table->string('label')->after('name')->nullable();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::table('permissions', function (Blueprint $table) {
            $table->dropColumn('label');
        });

        Schema::table('roles', function (Blueprint $table) {
            $table->dropColumn('label');
        });
    }
};
